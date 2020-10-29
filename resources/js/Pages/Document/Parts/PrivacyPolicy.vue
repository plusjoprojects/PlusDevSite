<template>
  <div class="privacy">
    <h3 style="font-family: 'Open Sans', sans-serif; font-weight: 700">
      Privacy policy
    </h3>
    <div class="padding_r" style="padding-right: 30%; padding-bottom: 15px">
      <p class="content_text">
        Plus-dev have simple privacy policy you must knows hem to can understand
        how Sender work.
      </p>
    </div>
    <hr />
    <ul>
        <li>You can send up to 50 Numbers in the day.</li>
        <li>You well get 0.10JOD for the number.</li>
        <li>You must approve you are send the message be take screenshot to the sended message.</li>
        <li>You can get weekly payout up to 35JOD in week.</li>
        <li>Plus-dev team check the Sended message manualy and approve it.</li>
    </ul>
    <div class="hei" style="padding-top: 15px"></div>
    <hr />
    <v-container>
      <v-row>
          
        <v-col cols="6">
          <h4 style="padding-bottom: 5px"><strong>Back</strong></h4>
          <v-card @click="changeType('Overview')">
            <v-card-text>Overview</v-card-text>
          </v-card>
        </v-col>
        <v-col cols="6">
          <h4 style="padding-bottom: 5px;text-align:right;"><strong>Next</strong></h4>
          <v-card @click="changeType('Privacy policy')">
            <v-card-text>Files</v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
export default {};
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