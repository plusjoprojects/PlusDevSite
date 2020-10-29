<template>
  <v-app id="inspire">
    <!-- Header -->
    <Header />
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2">
            <v-sheet rounded="lg">
              <v-list color="transparent">
                <v-list-item v-for="l in list" :key="l" link>
                  <v-list-item-content @click="type = l">
                    <v-list-item-title> {{ l }} </v-list-item-title>
                  </v-list-item-content>
                </v-list-item>

                <v-divider class="my-2"></v-divider>

                <v-list-item link color="grey lighten-4">
                  <v-list-item-content>
                    <v-list-item-title @click="logout"> Logout </v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </v-sheet>
          </v-col>

          <v-col>
            <v-sheet min-height="70vh" rounded="lg">
              <v-card-title>
                  {{type}}
              </v-card-title>

              <v-divider></v-divider>
              <Dashboard  v-if="type == 'Dashboard'"/>
              <Numbers  v-if="type == 'Numbers'"/>
              <Wallet  v-if="type == 'Wallet'"/>
              <Payout  v-if="type == 'Payout'"/>
              <Sended  v-if="type == 'Sended'"/>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import Header from "../../components/Header.vue";
import Dashboard from "./Dashboard";
import Numbers from './Numbers'
import Wallet from './Wallet'
import Payout from './Payout'
import Sended from './Sended'
export default {
  components: { Header, Dashboard,Numbers,Wallet,Payout,Sended },
  data() {
    return {
      list:[
        'Dashboard',
        'Numbers',
        'Wallet',
        'Payout',
        'Sended'
      ],
      type:'Dashboard'
    }
  },
  methods:{
    logout() {
      let vm = this;
      window.localStorage.removeItem('@token')
      vm.$router.push('Login');
    }
  }
};
</script>