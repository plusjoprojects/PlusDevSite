<template>
  <v-app>
    <v-main class="blue lighten-1">
      <v-container>
        <v-row justify="center" align="center" align-content="center">
          <v-col cols="2">
            <v-progress-circular
              indeterminate
              color="white"
            ></v-progress-circular>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>
<script>
export default {
    created() {
        let vm = this;
        let _token = window.localStorage.getItem('@token');
        if(!_token) {
            vm.$router.push('Login')
        }else {
            vm.$router.push('Home')
        }
    }
}
</script>