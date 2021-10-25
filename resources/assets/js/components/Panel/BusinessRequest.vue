<template>
    <div id="BusinessRequest">
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr>
                    <th>حوزه فعالیت</th>
                    <th>استان</th>
                    <th>جزئیات بیشتر</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="req in Request">
                    <td>{{req.activity_title}}</td>
                    <td>{{req.state_name}}</td>
                    <td class="submit-btn">
                        <button data-toggle="modal" data-target="#Details" @click="DisplayDetails(req.id)">مشاهده
                        </button>
                    </td>
                    <td v-if="req.action == 'show'">
                        <span class="accepted"><i class="fa fa-check"></i>تایید شده</span>
                    </td>
                    <td v-if="req.action == 'show'">
                        <button class="reject-request" @click="Reject(req.id)">رد</button>
                    </td>

                    <td v-if="req.action == 'hidden'">
                        <span class="rejected"><i class="fa fa-remove"></i>رد شده</span>
                    </td>
                    <td v-if="req.action == 'hidden'">
                        <button class="accept-request" @click="Accept(req.id)">تایید</button>
                    </td>


                    <td v-if ="req.action == 'waiting'" >
                        <span class="rejected"><i class="fa fa-spinner"></i>در انتظار</span>
                    </td>
                    <td v-if ="req.action == 'waiting'" >
                        <button class="accept-request" @click="Accept(req.id)">تایید</button>
                        <button class="reject-request" @click="Reject(req.id)">رد</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="box" v-for="req in Request">
                <div class="row">
                    <div class="col-xs-6">
                        <label>حوزه فعالیت:</label>
                        <span>{{req.activity_title}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>استان:</label>
                        <span>{{req.state_name}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>شهر:</label>
                        <span>{{req.city_name}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>منطقه:</label>
                        <span>{{req.region_name}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>بخش:</label>
                        <span>{{req.part_name}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>دهستان:</label>
                        <span>{{req.village_name}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>روستا:</label>
                        <span>{{req.rural_name}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>خیابان:</label>
                        <span>{{req.street}}</span>
                    </div>
                    <div class="col-xs-6">
                        <label>شبکه های اجتماعی:</label>
                        <div v-for="social in req.social_network">
                            <span>{{social.social_title}}</span><i style="padding-right: 3px" class="fa fa-arrow-left"></i>
                            <span>{{social.link}}</span><br>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label>شماره های تماس:</label>
                        <div v-for="phone in req.phone">
                            <span>{{phone}}</span><br>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <label>توضیحات:</label>
                        <div><p>{{req.explanation}}</p></div>
                    </div>
                    <div class="col-xs-12">
                        <label>وضعیت:</label>
                        <span v-if="req.action == 'show'">
                            <span class="accepted"><i class="fa fa-check"></i>تایید شده</span>
                        </span>
                        <span v-if="req.action == 'hidden'">
                            <span class="rejected"><i class="fa fa-remove"></i>رد شده</span>
                        </span>
                        <span v-if ="req.action == 'waiting'">
                            <span class="rejected"><i class="fa fa-spinner"></i>در انتظار</span>
                        </span>
                    </div>
                    <div class="col-xs-12">
                        <label>عملیات:</label>
                        <span v-if="req.action == 'show'">
                            <button class="reject-request" @click="Reject(req.id)">رد</button>
                        </span>
                        <span v-if="req.action == 'hidden'">
                            <button class="accept-request" @click="Accept(req.id)">تایید</button>
                        </span>
                        <span v-if ="req.action == 'waiting'">
                            <button class="accept-request" @click="Accept(req.id)">تایید</button>
                            <button class="reject-request" @click="Reject(req.id)">رد</button>
                        </span>
                    </div>
                </div>
            </div>
            <div id="Details" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">اطلاعات بیشتر</h4>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 details-item">
                                        <span class="first">شهر:</span>
                                        <span>{{city}}</span>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">منطقه:</span>
                                        <span>{{region}}</span>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">بخش:</span>
                                        <span>{{part}}</span>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">دهستان:</span>
                                        <span>{{village}}</span>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">روستا:</span>
                                        <span>{{rural}}</span>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">خیابان:</span>
                                        <span>{{street}}</span>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">شبکه های اجتماعی:</span>
                                        <div v-for="social in SocialArray" class="socials">
                                            <span>{{social.social_title}}/</span>
                                            <span>{{social.link}}</span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">شماره های تماس:</span>
                                        <div v-for="phone in PhoneArray" class="phones">
                                            <span>{{phone}}</span><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6 details-item">
                                        <span class="first">توضیحات:</span>
                                        <span>{{description}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button class="btn btn-default mx-auto" data-dismiss="modal">بستن</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BusinessRequest",
        data() {
            return {
                Request: [],
                IdUser: '',
                action: '',
                user: '',
                Object: {},
                city: '',
                region: '',
                part: '',
                village: '',
                rural: '',
                street: '',
                description: '',
                PhoneArray: [],
                SocialArray: [],
            }
        },
        methods: {
            DisplayDetails(userID) {
                this.IdUser = userID;
                this.Object = this.Request.find(item => item.id == this.IdUser);
                console.log(this.Object.city_name)
                this.PhoneArray = this.Object.phone;
                this.SocialArray = this.Object.social_network;
                this.city = this.Object.city_name;
                this.region = this.Object.region_name;
                this.part = this.Object.part_name;
                this.village = this.Object.village_name;
                this.rural = this.Object.rural_name;
                this.street = this.Object.street;
                this.description = this.Object.explanation;
            },
            async Reject(userID) {
                this.IdUser = userID;
                this.action = 'hidden'
                await axios.get(`/farasho/AddBusiness/acceptBusiness/?id=${this.IdUser}&action=${this.action}`)
                    .then((response) => {
                        this.Request = response.data;
                        window.location.reload()
                    })
                    .catch(error => {
                        console.log(error);

                    })
            },
            async Accept(userid) {
                console.log(userid);
                this.user = this.Request.filter((item) => {
                    return item.id == userid;
                });
                this.IdUser = userid;
                this.action = 'show';
                await axios.get(`/farasho/AddBusiness/acceptBusiness/?id=${this.IdUser}&action=${this.action}`)
                    .then((response) => {
                        this.Request = response.data;
                        window.location.reload()
                    })
                    .catch(error => {
                        console.log(error);

                    })
            },
            GetList() {
                axios.get('/farasho/AddBusiness/list')
                    .then(response => {
                        this.Request = response.data;
                        console.log(this.Request)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
        },
        created() {
            this.GetList()
        }
    }
</script>

<style>
    .modal-footer {
        text-align: center !important;
    }
</style>