<template>
  <div class="overview">
    <h3 style="font-family: 'Open Sans', sans-serif; font-weight: 700">
      Overview
    </h3>
    <div class="padding_r" style="padding-right: 30%">
      <p class="content_text">
        Plus-dev is company for developer Mobile application and website and
        social media ads and point of sale system we have office in Amman,Irbid
        and we can do any type of software.
      </p>
    </div>
    <div class="hei" style="padding-top: 15px"></div>
    <hr />
    <h3 style="font-family: 'Open Sans', sans-serif">
      Welcome to Plus-dev Sender System
    </h3>
    <div style="padding-right: 10%">
      <p class="content_text_">
        Plus-dev sender system is new system for advertising for the company.
        <br />
        Our Partner (You) Can use our system to get payment for any number send
        message to it.
        <br />
        You can send up to 50 numbers in the day and the idea is get the numbers
        from our list and all the numbers has categories and country from it and
        any categories or country has message template you can get it and just
        send it to the number from whatsapp.
        <br />
        <br />
        how i can do that ?
        <br />
        <strong>You can check the document and get details.</strong>
      </p>
    </div>
    <div class="hei" style="padding-top: 15px"></div>
    <hr />
    <v-container>
      <v-row>
        <v-col cols="6">
          <h4 style="padding-bottom: 5px"><strong>Next</strong></h4>
          <v-card @click="changeType('Privacy policy')">
            <v-card-text>Privacy policy</v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {
    props:{
        changeType:{type:Function}
    }
}
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
</style>