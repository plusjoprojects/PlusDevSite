<template>
    <div class="wallet">
        <v-container>
            <v-row>
                <v-col cols="2">
                    <v-card elevation="2" outlined style="text-align:center;" class="red white--text">
                        <h3 style="text-align:center;">{{wallet.amount}}JOD</h3>
                        <v-card-text>Wallet</v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="2">
                    <v-card elevation="2" outlined style="text-align:center;" class="green white--text">
                        <h3 style="text-align:center;">{{wallet.full}}JOD</h3>
                        <v-card-text>All</v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
        <v-container>
            <v-card>
                 <v-data-table
                    :headers="headers"
                    :items="items"
                    class="elevation-1"
                >
                    <template v-slot:item.amount="{ item }">
                    <v-chip
                        :color="getColor(item.amount)"
                        dark
                    >
                        {{ item.amount }}
                    </v-chip>
                    </template>
                </v-data-table>
            </v-card>
        </v-container>
    </div>
</template>
<script>
  export default {
    data () {
      return {
        headers: [
          { text: '#', value: 'text',sortable:false },
          { text: 'Amount', value: 'amount',sortable:false },
          { text: 'Created at', value: 'created_at' },
        ],
        items: [
          // {
          //   text:'We send 200JOD to you',
          //   amount:-200,
          //   created_at:'2020-02-22'
          // },
          // {
          //   text:'You get 30 from phone 0777523',
          //   amount:30,
          //   created_at:'2020-02-22'
          // },
        ],
        wallet:{},
        approves:[]
      }
    },
    methods: {
      getColor (amount) {
        if (amount < 0) return 'red'
        else return 'green'
      },
      install() {
        let user = window.localStorage.getItem('@user');
        let _user = JSON.parse(user)
        let vm = this;

        axios.get('api/dashboard/indexWallet/' + _user.id).then(res => {
          vm.wallet = res.data.wallet
          vm.approves = res.data.approves
          vm.payout =  res.data.payout;

          let make_items = () => {
            let _data = [];
            vm.approves.forEach((trg,index) => {
              _data.push({
                text:'You Get ' + 0.10 + 'JOD from send to number ' + trg.numbers.phone,
                amount: 0.10,
                created_at:trg.created_at.slice(0,19)
              })
            })
            vm.payout.forEach((trg,index) => {
              _data.push({
                text:'We send ' + trg.amount + 'JOD to you ',
                amount: -trg.amount,
                created_at:trg.created_at.slice(0,19)
              })
            })
            let __data = _data.sort((a, b) => a.created_at.localeCompare(b.created_at));
            vm.items = __data.reverse()
          }
          make_items()
          
        }).catch(err  => {
          console.log(err)
        });
      }
    },
    created() {
      let vm = this;
      vm.install();
    }
  }
</script>