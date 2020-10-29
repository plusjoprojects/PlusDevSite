<template>
  <v-app id="inspire">
    <Header />
    <v-main class="white lighten-3">
      <v-row>
        <v-col cols="3">
            <v-container>
                <div class="left_">
                    <h3 class="left_head_text">Plus-Dev introduction</h3>
                    <div class="left_text" v-for="(i,index) in intro" :key="index" @click="changeType(i)">{{i}}</div>
                    <h3 class="left_head_text" style="padding-top:25px;">Tutorial</h3>
                    <div class="left_text" v-for="(i,index) in tutorial" :key="index" @click="changeType(i)">{{i}}</div>
                </div>
            </v-container>
        </v-col>
        <v-col cols="9">
            <Overview v-if="type == 'Overview'" :changeType="changeType" />
            <PrivacyPolicy v-if="type == 'Privacy policy'" :changeType="changeType" />
            <Files v-if="type == 'Files'" :changeType="changeType" />
            <HowItsWork v-if="type == 'How its Work'" :changeType="changeType" />
        </v-col>
      </v-row>
    </v-main>
    
  </v-app>
</template>
<script>
import Header from "../../components/Header";
import Overview from './Parts/Overview'
import PrivacyPolicy from './Parts/PrivacyPolicy'
import Files from './Parts/Files'
import HowItsWork from './Parts/HowItsWork'
export default {
  components: {
    Header,
    Overview,
    PrivacyPolicy,
    Files,
    HowItsWork
  },
  data() {
      return {
          height:window.innerHeight - 100,
          intro:[
              'Overview',
              'Privacy policy',
              'Files',
          ],
          tutorial:[
            'How its Work'
          ],
          type:'How its Work'
      }
  },
  methods:{
      changeType(next) {
          let vm = this
          vm.type = next
      }
  }
};
</script>
<style scoped>
    .left_head_text{font-size:inherit;text-transform: uppercase; font-family: 'Open Sans',Helvetica,Arial,sans-serif;}
    .left_{padding-left:5px;}
    .left_text{color:black;cursor: pointer;transition: ease 0.5s;padding-left:5px;border-radius: 4px;padding-top: 1px;padding-bottom: 1px;}
    .left_text:hover{background-color: rgba(0,0,0,0.04);}
</style>