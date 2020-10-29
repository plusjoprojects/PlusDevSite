<template>
  <v-card :style="{ width: windowWidth / 2 + 'px' }">
    <v-card-title v-if="item.categories != null">{{item.categories.title}} Files</v-card-title>
    <v-divider />
    <v-container>
      <v-card class="white" light style="background-color: white" color="white">
        <v-container fluid>
          <v-row align="center">
            <v-col cols="6">
              <v-select
                v-model="select"
                :items="countries"
                hint="Change country to your want country"
                item-text="title"
                item-value="id"
                label="Countrys"
                persistent-hint
                return-object
                single-line
                @change="changeCountry"
              ></v-select>
            </v-col>
          </v-row>
        </v-container>
        <v-card-title v-if="item.categories != null">The message</v-card-title>
        <div class="scc" :style="{ height: windowHeight / 3 + 'px' }">
          <div
          v-if="item.categories != null"
            style="
              color: black;
              font-size: 12px;
              font-family: 'Open Sans', sans-serif;
              text-align:right;
              padding:15px;
              border:1px solid black;
              border-radius:4px;
            "
            v-html="item.message"
          >
          
          </div>
          <div v-if="item.categories == null">
            <h2 style="text-align:center;">There are now template</h2>
          </div>
        </div>
      </v-card>
      <v-row>
        <v-col>
          <v-btn color="pink" @click="open_pdf" v-if="item.categories != null">Download pdf files</v-btn>
        </v-col>
        <v-col>
          <v-btn color="primary" @click="clickClose()">Close</v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-card>
</template>
<script>
export default {
  data() {
    return {
      windowWidth: "",
      windowHeight: "",
      select: null,
      item:{}
    };
  },
  created() {
    this.windowWidth = window.innerWidth;
    this.windowHeight = window.innerHeight;
    this.item = this.selected
  },
  props: {
    clickClose: { type: Function },
    countries:{type: Array},
    selected:{type: Object}
  },
  methods:{
    changeCountry() {
      let vm = this;
      let data = {
        categories_id: vm.selected.categories_id,
        countries_id:vm.select.id
      };
      axios.post('/files/indexWithProps',data).then(res => {
        vm.item = res.data;
      }).catch(err => {
        console.log(err)
      });
    },
    open_pdf() {
      let vm = this;
      window.open(vm.item.file);
    }
  }
};
</script>