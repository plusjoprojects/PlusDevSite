<template>
    <v-app-bar
      app
      color="white"
      flat
    >
      <v-container class="py-0 fill-height">
        <v-avatar
          class="mr-10"
          color="grey darken-1"
          size="32"
        >
        <img
        :src="require('../assets/Logo.png')"
        alt="Logo"
        >
        </v-avatar>

        <v-btn
          v-for="link in links"
          :key="link"
          text
          @click="$router.push(link)"
        >
          {{ link }}
        </v-btn>

        <v-spacer></v-spacer>

        <v-responsive max-width="260">
          <v-text-field
            dense
            flat
            hide-details
            rounded
            solo-inverted
          ></v-text-field>
        </v-responsive>
      </v-container>
    </v-app-bar>

</template>
<script>
export default {
    data: () => ({
      links: [
        'Home',
        'Document',
        'Files',
      ],
    }),
}
</script>