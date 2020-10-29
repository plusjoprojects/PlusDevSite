<template>
  <div class="files">
    <v-app id="inspire">
      <v-main class="white lighten-3">
        <Header />
        <div style="padding-top: 20px">
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
        </div>
         <v-overlay :value="overlay">
      <OverlayCard :countries="countries" :selected="selected" :clickClose="changeOverlay" :categories_id="categories_id" />
    </v-overlay>
      </v-main>
    </v-app>
  </div>
</template>
<script>
import Header from "../../components/Header";
import OverlayCard from './Parts/OverlayCard'
export default {
  components: { Header,OverlayCard },
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
<style>
.scc {
  overflow-y: scroll;
}
</style>