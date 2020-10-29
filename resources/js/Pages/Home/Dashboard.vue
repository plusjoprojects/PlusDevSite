<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="6" lg="6" xl="6">
        <line-chart :chart-data="datacollection"></line-chart>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="6">
        <v-card elevation="2" outlined dark>
          <v-card-text
            >{{ approves_today.length }}/50 Avalible number</v-card-text
          >
        </v-card>
      </v-col>
      <v-col cols="6">
        <v-card elevation="2" outlined class="red white--text">
          <v-card-text>{{ wallet.amount }}JOD in Wallet</v-card-text>
        </v-card>
      </v-col>
    </v-row>

    <v-row>
      <v-col cols="6">
        <v-card elevation="2" outlined dark>
          <v-card-text>{{ approves }} Number Sended</v-card-text>
        </v-card>
      </v-col>
      <v-col cols="6">
        <v-card elevation="2" outlined dark>
          <v-card-text>{{ wallet.full }}JOD All the amount</v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import LineChart from "./js/LineChart.js";
export default {
  components: {
    LineChart,
  },
  data() {
    return {
      datacollection: null,
      approves_today: [],
      wallet: {},
      approves: 0,
    };
  },
  mounted() {
    this.fillData();
    this.install();
  },
  methods: {
    fillData() {
      this.datacollection = {
        labels: ["Approved Numbers"],
        datasets: [],
      };
    },
    install() {
      let vm = this;
      let user = window.localStorage.getItem("@user");
      let _user = JSON.parse(user);

      axios
        .get("api/dashboard/charts/" + _user.id)
        .then((res) => {
          let _data = [
            {
              label: res.data.approves_00_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_00],
            },
            {
              label: res.data.approves_01_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_01],
            },
            {
              label: res.data.approves_02_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_02],
            },
            {
              label: res.data.approves_03_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_03],
            },
            {
              label: res.data.approves_04_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_04],
            },
            {
              label: res.data.approves_05_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_05],
            },
            {
              label: res.data.approves_06_date,
              backgroundColor: "#f87979",
              data: [res.data.approves_06],
            },
          ];
          vm.datacollection = {
            labels: ["Approved Numbers"],
            datasets: _data.reverse(),
          };
        })
        .catch((err) => {
          console.log(err);
        });

      axios
        .get("api/dashboard/index/" + _user.id)
        .then((res) => {
          vm.approves_today = res.data.approves_today;
          vm.wallet = res.data.wallet;
          vm.approves = res.data.approves;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>