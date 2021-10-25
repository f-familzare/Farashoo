<template>
    <div id="SingleRezume" class="container padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="avatar"><img src="/images/LOGO.png"></div>
                </div>
                <div class="col-xs-12 name">
                    <label>حوزه فعالیت:</label>
                    <div>لوله کشی</div>
                </div>
                <div class="title text-center">
                    اطلاعات کسب و کار
                </div>
                <div class="description" v-for="bus in BusinessList">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span class="item-title">استان:</span>
                                <span>{{bus.state_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span class="item-title">شهر:</span>
                                <span>{{bus.city_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span class="item-title">منطقه:</span>
                                <span>{{bus.region_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span class="item-title">بخش:</span>
                                <span>{{bus.part_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>دهستان:</span>
                                <span>{{bus.village_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>روستا:</span>
                                <span>{{bus.rural_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>خیابان:</span>
                                <span>{{bus.street}}</span>
                            </div>
                            <div class="col-md-3 item">
                                <span>توضیحات:</span>
                                <span>{{bus.explanation}}</span>
                            </div>
                            <div class="col-md-12 item">
                                <span>شبکه های اجتماعی:</span>
                                <div v-for="social in bus.social_network">
                                    <span>نوع شبکه اجتماعی</span>
                                    <span>{{social.social_title}}</span>
                                    /
                                    <span>آدرس</span>
                                    <span>{{social.link}}</span>
                                </div>
                            </div>
                            <div class="col-md-12 item">
                                <span>شماره تماس:</span>
                                <div v-for="p in bus.phone">
                                    <div>
                                        <span>{{p}}</span><br>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SingleBusiness.vue",
        data(){
            return{
                BusinessList:[]
            }
        },
        methods:{
            GetID(){
                this.SingleId = this.$route.params.id;
                console.log( this.SingleId,'singleid')
            },
            GetBusinessList() {
                axios.get(`/farasho/AddBusiness/edit/${this.SingleId}`)
                    .then(response => {
                        this.BusinessList = response.data;
                        console.log( this.BusinessList)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
        },
        created() {
            this.GetID();
            this.GetBusinessList();

        }
    }
</script>

<style >

</style>