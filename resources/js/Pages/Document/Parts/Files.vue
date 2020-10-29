<template>
  <div style="padding-top: 20px">
      <h3 style="font-family: 'Open Sans', sans-serif; font-weight: 700">
        Files
        </h3>
        <div class="padding_r" style="padding-right: 30%">
        <p class="content_text">
            Plus-dev conten multy type of advertiseng and all category and country have deffrint type of message.
        </p>
        </div>
     <v-container>
            <v-row justify="center" align="center" align-content="center">
              <v-col cols="12">
            <h4 class="grey--text">Files Contain alot of type of message template.</h4>
                <v-card>
                  <v-card-title> Files </v-card-title>
                  <v-simple-table>
                    <template v-slot:default>
                      <thead>
                        <tr>
                          <th class="text-left">Category</th>
                          <th class="text-left">Files</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="item in files" :key="item.id">
                          <td>{{ item.categories.title }}</td>
                          <td>
                            <v-icon style="cursor: pointer" small
                            @click="open_dialog(item)"
                              >mdi-eye</v-icon
                            >
                          </td>
                        </tr>
                      </tbody>
                    </template>
                  </v-simple-table>
                </v-card>
              </v-col>
            </v-row>
          </v-container>
    <v-overlay :value="overlay">
      <OverlayCard :countries="countries" :selected="selected" :clickClose="changeOverlay" :categories_id="categories_id" />
    </v-overlay>
  </div>
</template>
<script>
import OverlayCard from '../../Files/Parts/OverlayCard'
export default {
  components: { OverlayCard },
  data() {
    return {
      overlay: false,
      windowWidth: "",
      windowHeight: "",
      categories_id:0,
      files:[],
      countries:[],
      selected:{}
    };
  },
  created() {
    this.windowWidth = window.innerWidth;
    this.windowHeight = window.innerHeight;
    this.install();
  },
  methods:{
    changeOverlay() {
      let vm = this;
      vm.overlay = !vm.overlay
    },
    open_dialog(item) {
      let vm = this;
      vm.categories_id = item.id
      vm.selected = item;
      vm.overlay = !vm.overlay
    },
    install() {
      let vm = this;
      axios.get('/files/index').then(res => {
        vm.files = res.data.templates
        vm.countries = res.data.countries
      }).catch(err =>  {
        console.log(err);
      });
    }
  }
};
</script>
<style scoped>
.overview {
  padding-top: 30px;
}
.content_text {
  color: #6d757c;
  font-family: "Open Sans", sans-serif;
  font-size: 1.2em;
  line-height: 2;
}
.content_text_ {
  color: #6d757c;
  font-family: "Open Sans", sans-serif;
  line-height: 2;
}
.scc {
  overflow-y: scroll;
}
</style>