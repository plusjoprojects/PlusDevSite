<template>
  <div class="numbers">
    <v-container>
      <v-row>
        <v-col cols="4">
          <v-select
            :items="list.categories"
            @change="changeFilters"
            item-value="id"
            item-text="title"
            v-model="filter.category"
            label="Category"
          ></v-select>
        </v-col>
        <v-col cols="4">
          <v-select
            :items="list.countries"
            @change="changeFilters"
            item-text="title"
            item-value="id"
            v-model="filter.country"
            label="Country"
          ></v-select>
        </v-col>
      </v-row>
    </v-container>
    <v-data-table
      :headers="headers"
      :items="numbers"
      sort-by="calories"
      class="elevation-1"
    >
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="openDialog(item.id)">
          mdi-eye
        </v-icon>
      </template>
    </v-data-table>
    <v-overlay :value="overlay">
      <v-card :style="{ width: windowWidth / 2 + 'px' }">
        <v-card-title>Submit Number</v-card-title>
        <v-divider />
        <v-container>
          <input
          type="file"
          v-on:change="onImageChange"
            label="Approve image"
            truncate-length="15"
          ></input>
          <v-textarea label="Note" v-model="approve.note"></v-textarea>
          <v-container>
            <v-row>
              <v-col cols="6">
                <v-btn block color="success" @click="storeApprove">Save</v-btn>
              </v-col>
              <v-col cols="6">
                <v-btn block color="info" @click="overlay = !overlay">
                  close
                </v-btn>
              </v-col>
            </v-row>
          </v-container>
        </v-container>
      </v-card>
    </v-overlay>
  </div>
</template>
<script>
export default {
  data: () => ({
    overlay: false,
    headers: [
      {
        text: "ID",
        align: "start",
        sortable: true,
        value: "id",
      },
      {
        sortable: false,
        text: "Name",
        value: "name",
      },
      {
        sortable: false,
        text: "Phone",
        value: "phone",
      },
      {
        sortable: false,
        text: "Category",
        value: "categories.title",
      },
      {
        sortable: false,
        text: "Country",
        value: "countries.title",
      },
      { text: "Actions", value: "actions", sortable: false },
    ],
    numbers: [],
    list: {
      countries: [],
      categories: [],
    },
    filter: {
      country: null,
      category: null,
    },
    windowWidth: "",
    approve: {
      note: "",
      image: "",
      numbers_id: 0,
      user_id: 1,
    },
  }),

  created() {
    this.initialize();
    this.windowWidth = window.innerWidth;
  },

  methods: {
    initialize() {
      let vm = this;
      axios
        .get("/numbers/index")
        .then((res) => {
          vm.numbers = res.data.numbers;
          vm.list.countries = res.data.countries;
          vm.list.categories = res.data.categories;
        })
        .catch((err) => {
          console.log(err.response);
        });

      let _register_user_id = () => {
        let user = window.localStorage.getItem('@user');
        let _user = JSON.parse(user)
        vm.approve.user_id = _user.id
      }
      _register_user_id()
    },
    changeFilters() {
      let vm = this;
      axios
        .post("/numbers/indexWithFilter", vm.filter)
        .then((res) => {
          vm.numbers = res.data;
        })
        .catch((err) => {
          console.log(err.response);
        });
    },
    storeApprove() {
      let vm = this;
      axios
        .post("/approve/store", vm.approve)
        .then((res) => {
          vm.numbers.forEach((trg,index) => {
            if(vm.approve.numbers_id == trg.id) {
              vm.numbers.splice(index,1)
            }
          })
          vm.overlay = !vm.overlay;
        })
        .catch((err) => {
          console.log(err.response);
        });
    },
    onImageChange(e) {
     let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
            return;
        this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.approve.image = e.target.result;
            };
            reader.readAsDataURL(file);
    },
    openDialog(id) {
      let vm = this;
      vm.overlay = !vm.overlay;
      vm.approve.numbers_id = id
      

    }
  },
};
</script>