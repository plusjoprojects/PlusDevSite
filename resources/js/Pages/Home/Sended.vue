<template>
    <div class="sended">
        <v-container>
            <v-row>
                 <v-col cols="2">
                    <v-card elevation="2" outlined style="text-align:center;" class="green white--text">
                        <h3 style="text-align:center;">{{len.all}}</h3>
                        <v-card-text>Message Sended</v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="2">
                    <v-card elevation="2" outlined style="text-align:center;" class="green white--text">
                        <h3 style="text-align:center;">{{len.approved}}</h3>
                        <v-card-text>Approved Sended</v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="2">
                    <v-card elevation="2" outlined style="text-align:center;" class="orange white--text">
                        <h3 style="text-align:center;">{{len.not_approved}}</h3>
                        <v-card-text>Pending Sended</v-card-text>
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
          { text: 'Phone', value: 'phone',sortable:false },
          { text: 'Name', value: 'name',sortable:false },
          { text: 'Approve', value: 'approve',sortable:false },
          { text: 'Created at', value: 'created_at' },
        ],
        items: [
        ],
        len:{
          all:0,
          approved:0,
          not_approved:0
        }
      }
    },
    methods: {
     install() {
       let vm = this;
       let _user = JSON.parse(window.localStorage.getItem('@user'))
       axios.get('api/dashboard/indexSended/' + _user.id).then(res => {
         vm.len.all = res.data.approves.length;
         vm.len.approved = res.data.approve_approved.length;
         vm.len.not_approved = res.data.approve_not_approved.length;

         res.data.approves.forEach((trg,index) => {
           vm.items.push({
             text:trg.id,
             phone:trg.numbers.id,
             name:trg.numbers.name,
             approve:trg.approve == 0? 'Not Approve':'Approved',
             created_at:trg.created_at.slice(0,10)
           })
         })
       }).catch(err => {console.log(err)});
     }
    },
    created(){
      let vm = this;
      vm.install()
    }
  }
</script>