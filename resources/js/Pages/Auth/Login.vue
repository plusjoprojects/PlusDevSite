<template>
  <v-app id="inspire">
    <v-main class="blue lighten-1">
      <v-container>
        <v-row align="center" justify="center" align-content="center">
          <v-col  md="6" sm="12" lg="6" xl="6" >
            <h3 class="font-weight-black text-center">Plus-Dev</h3>
            <hr />
            <v-card class="d-flex align-center blue darken-3" sm="12">
              <v-container>
                <v-row justify="center">
                  <div class="font-weight-bold white--text" style="padding-bottom: 40px;font-size:18px;">
                    Login
                  </div>
                </v-row>
                <div class="form-template">
                  <v-text-field
                    solo
                    label="PhoneNumber"
                    prepend-inner-icon="mdi-phone"
                    v-model="inputs.phone"
                  ></v-text-field>
                  <v-text-field
                    solo
                    label="Password"
                    prepend-inner-icon="mdi-key"
                    type="password"
                    v-model="inputs.password"
                  ></v-text-field>
                  <v-btn block elevation="2" @click="login" color="primary text--white" large>Login</v-btn>
                </div>
              </v-container>
            </v-card>
            <div style="padding-top:20px;">
                <p class="white--text text-center">© 2020 Plus-Dev</p>
            </div>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      inputs:{
        phone:'',
        password:''
      }
    }
  },
  methods:{
    login() {
      let vm = this;
      axios.post('/api/auth/login',vm.inputs).then(res => {
        let token = res.data.token
        let user = res.data.user

        let _store_in_the_local_storage = () => {
          window.localStorage.setItem('@token',token)
          window.localStorage.setItem('@user',JSON.stringify(user))
          _navigation()
        }

        let _navigation = () => {
          vm.$router.push('Home')
        }

        _store_in_the_local_storage()

      }).catch(err => alert('There Are error in the login Information'));
    }
  }
}
</script>