<template>
    <div class="payout">
        <v-container>
            <v-row>
                <v-col cols="2">
                    <v-card elevation="2" outlined style="text-align:center;" class="green white--text">
                        <h3 style="text-align:center;">{{wallet.amount}}JOD</h3>
                        <v-card-text>Wallet</v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
        <v-container>
            <v-text-field
                v-model="phone"
                label="Phone"
                required
            ></v-text-field>
            <v-row>
                <v-col cols="12">
                    <v-subheader class="pl-0">
                    Amount
                    </v-subheader>
                    <v-slider
                    v-model="amount"
                    :thumb-size="24"
                    thumb-label
                    color="green"
                    thumb-color="green"
                    :max="wallet.amount"
                    min="0"
                    ></v-slider>
                </v-col>
            </v-row>
            <v-textarea
                label="Note"
                v-model="note"
                ></v-textarea>
                <v-btn color="green white--text" @click="store">Send</v-btn>
        </v-container>
    </div>
</template>
<script>
export default {
    data() {
        return {
            phone:'',
            amount:0,
            wallet:{},
            note:'',
            user_id:0
        }
    },
    methods:{
        install() {
            let vm = this;

            let _user = JSON.parse(window.localStorage.getItem('@user'))
            vm.user_id = _user.id
            axios.get('api/dashboard/indexPayout/' + _user.id).then(res => {
                vm.wallet = res.data.wallet
            }).catch(err => {console.log(err)});
        },
        store() {
            let vm = this;
            console.log(vm.amount)
            axios.post('api/dashboard/payout/store', {
                phone:vm.phone,
                amount:vm.amount,
                user_id:vm.user_id,
                note:vm.note
            }).then(res => {
                alert('success')
                location.reload()
            }).catch(err => {
                alert('There error')
            });
        }
    },
    created() {
        let vm = this;
        vm.install()
    }
}
</script>