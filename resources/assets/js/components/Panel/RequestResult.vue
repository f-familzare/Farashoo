<template>
    <div class="container-fluid">
        <div class="result-box">
            <!--<div class="row">-->
                <div class="item" v-if="UserRequest.action == 'show'">
                    درخواست شما برای نمایش پذیرفته شده است.
                </div>
                <div class="item" v-if="UserRequest.action == 'hidden'">
                    درخواست شما برای نمایش پذیرفته نشده است.
                </div>
                <div class="item" v-if="UserRequest.action == 'waiting'">
                    درخواست شما در حالت انتظار است.
                </div>
            <!--</div>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "RequestResult",
        data() {
            return {
                SingleID: '',
                Request: [],
                UserRequest: {},
            }
        },
        methods: {
            GetList() {
                axios.get('/farasho/AddBusiness/list')
                    .then(response => {
                        this.Request = response.data;
                        console.log(this.Request, 'request')
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            GetID() {
                axios.get('/farasho/AddBusiness/BusinessStatus')
                    .then(response => {
                        this.SingleID = response.data.id;
                        this.UserRequest = this.Request.find(item => item.id == this.SingleID)
                        console.log(this.UserRequest, 'userrequest')

                    })
                    .catch(error => {
                        console.log(error)
                    });

            },
        },
        created() {
            this.GetList();
            this.GetID();
        }
    }
</script>

<style scoped>

</style>