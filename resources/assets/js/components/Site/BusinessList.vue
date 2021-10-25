<template>
    <div id="BusinessList" class="padding text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-3 margin-b" v-for="business in BusinessList" @click="SendID(business.id)">
                    <div class="single-rezume-list">
                        <div class="image item">
                            <img src="/images/LOGO.png">
                        </div>
                        <div class="field item">
                            <i class="fa fa-check"></i>
                            حوزه فعالیت:
                            <span>{{business.activity_title}}</span>
                        </div>
                        <div class="degree item">
                            <i class="fa fa-check"></i>
                            استان:
                            <span>{{business.state_name}}</span>
                        </div>
                    </div>
                </div>
                <div v-if="!BusinessList.length">مشاغلی ثبت نشده است</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BusinessList",
        data() {
            return {
                BusinessList: []
            }
        },
        methods: {
            GetRezumeList() {
                axios.get('/farasho/AddBusiness/acceptedList')
                    .then(response => {
                        this.BusinessList = response.data;
                        console.log(this.BusinessList)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SendID(ID){
                this.$router.push({name: 'SingleBusiness', params: {id:ID}});
                window.location.reload();
            },


        },

        created() {
            this.GetRezumeList();
        }

    }
</script>

<style scoped>

</style>