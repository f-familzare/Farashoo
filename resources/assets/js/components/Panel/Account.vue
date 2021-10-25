<template>
    <div id="profile">
        <form v-if="Status == 0" @submit.prevent="Create()">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <label>بارگزاری تصویر</label>
                        <!--preview-->
                        <div class="avatar-div">
                            <img v-if="!PreviewImg" class="output avatar-img" src="/images/User-Icon.jpg">
                            <img v-else class="output avatar-img" :src="PreviewImg">
                            <!--<img class="output avatar-img" :src="image">-->
                        </div>
                        <!--preview-->
                        <label for="files" class="upload-btn userImg-btn"><i
                                class="fa fa-upload"></i></label>
                        <input style="visibility:hidden;" id="files" type="file" class="upload-btn"
                               accept="image/*"
                               @change="UploadImage($event)" name="image">
                    </div>
                    <div class="col-md-3">
                        <label>نام</label>
                        <input placeholder="نام" class="form-control" v-model="name" name="name">
                    </div>
                    <div class="col-md-3">
                        <label>نام خانوادگی</label>
                        <input placeholder="نام خانوادگی" class="form-control" v-model="lastname" name="lastname">
                    </div>
                    <div class="col-md-3">
                        <label>شماره همراه</label>
                        <input placeholder="0912..." class="form-control" v-model="mobile" name="mobile">
                    </div>
                    <div class="col-md-3">
                        <label>جنسیت</label>
                        <select class="form-control" @change="SelectGender($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option value="مرد">مرد</option>
                            <option value="زن">زن</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>استان</label>
                        <select class="form-control" @change="SelectState($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="s in State" :value="s.state_id">{{s.state_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>شهر</label>
                        <select class="form-control" @change="SelectCity($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="c in City" :value="c.city_id">{{c.city_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>منطقه</label>
                        <select class="form-control" @change="SelectRegion($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="r in Region" :value="r.region_id">{{r.region_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-12 submit-btn">
                        <button>ذخیره</button>
                    </div>
                </div>
            </div>
        </form>
        <form v-if="Status == 1" @submit.prevent="Update()">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <label>بارگزاری تصویر</label>
                        <!--preview-->
                        <div class="avatar-div">
                            <img v-if="User.avatar == null" class="output avatar-img" src="/images/User-Icon.jpg">
                            <img v-else class="output avatar-img" :src="User.avatar">
                        </div>
                        <!--preview-->
                        <label for="files" class="upload-btn userImg-btn"><i
                                class="fa fa-upload"></i></label>
                        <input style="visibility:hidden;" id="files" type="file" class="upload-btn"
                               accept="image/*"
                               @change="UploadImageEdit($event)" name="image">
                    </div>
                    <div class="col-md-3">
                        <label>نام</label>
                        <input placeholder="نام" class="form-control" v-model="User.name" name="name">
                    </div>
                    <div class="col-md-3">
                        <label>نام خانوادگی</label>
                        <input placeholder="نام خانوادگی" class="form-control" v-model="User.lastname" name="lastname">
                    </div>
                    <div class="col-md-3">
                        <label>شماره همراه</label>
                        <input placeholder="0912..." class="form-control" v-model="User.mobile" name="mobile">
                    </div>
                    <div class="col-md-3">
                        <label>جنسیت</label>
                        <select class="form-control" @change="SelectGender($event)">
                            <option selected>{{User.gender}}</option>
                            <option value="مرد">مرد</option>
                            <option value="زن">زن</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>استان</label>
                        <select class="form-control" @change="SelectState($event)">
                            <option selected disabled>{{User.state_name}}</option>
                            <option v-for="s in State" :value="s.state_id">{{s.state_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>شهر</label>
                        <select class="form-control" @change="SelectCity($event)">
                            <option disabled selected>{{User.city_name}}</option>
                            <option v-for="c in City" :value="c.city_id">{{c.city_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>منطقه</label>
                        <select class="form-control" @change="SelectRegion($event)">
                            <option selected disabled>{{User.region_name}}</option>
                            <option v-for="r in Region" :value="r.region_id">{{r.region_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-12 submit-btn">
                        <button>بروزسانی</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
    import swal from 'sweetalert';

    export default {
        name: "Account",
        components: {swal},
        data() {
            return {
                name: '',
                Status: '',
                Id: '',
                User: {},
                lastname: '',
                mobile: '',
                gender: '',
                image: '',
                PreviewImg: '',
                state: '',
                city: '',
                region: '',
                State: [],
                City: [],
                Region: [],

            }
        },
        methods: {
            SelectGender(event) {
                this.gender = event.target.value;
                this.User.gender = this.gender;
            },
            SelectState(event) {
                this.state = event.target.value;
                this.User.state_id = this.state;
                axios.get(`/farasho/Option/city/${this.state}`)
                    .then(response => {
                        this.City = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })

            },
            SelectCity(event) {
                this.city = event.target.value;
                this.User.city_id = this.city;
                axios.get(`/farasho/Option/region/${this.city}`)
                    .then(response => {
                        this.Region = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectRegion(event) {
                this.region = event.target.value;
                this.User.region_id = this.region;
            },
            UploadImage(event) {
                this.image = event.target.files[0];
                let ImageSize = this.image.size / 1024 / 1024; //mb
                if (ImageSize > 1) {
                    swal({
                        title: "عملیات ناموفق",
                        text: "حجم تصویر باید کمتر از 1 مگابایت باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }
                // ----preview----
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.PreviewImg = e.target.result;
                };
                reader.readAsDataURL(event.target.files[0]);
                // ----preview----
//
            },
            UploadImageEdit(event) {
                this.User.avatar = event.target.files[0];
                let ImageSize = this.User.avatar.size / 1024 / 1024; //mb
                if (ImageSize > 1) {
                    swal({
                        title: "عملیات ناموفق",
                        text: "حجم تصویر باید کمتر از 1 مگابایت باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }
                // ----preview----
                let reader = new FileReader();
                reader.onload = (e) => {
                    // this.User.avatar = e.target.result;
                };
                reader.readAsDataURL(event.target.files[0]);
                // ----preview----
//
            },
            GetStatus() {
                axios.get('/farasho/Account/accountStatus')
                    .then(response => {
                        this.Status = response.data.status;
                        this.Id = response.data.id;
                        console.log(this.Status, 'sttus');
                        console.log(this.Id, 'this.Id')
                        this.GetUpdate()
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            GetState() {
                axios.get('/farasho/Option/state')
                    .then(response => {
                        this.State = response.data;
                        console.log(this.State)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            async Create() {
                if (this.name == '' ||
                    this.lastname == '' ||
                    this.mobile == '' ||
                    this.gender == '' ||
                    this.state == '' ||
                    this.city == '' ||
                    this.region == ''

                ) {
                    swal({
                        title: "عملیات ناموفق",
                        text: "لطفا تمامی اطلاعات را وارد نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }
                if (this.mobile.length != 11 || this.mobile.charAt(0) != 0) {
                    swal({
                        title: "عملیات ناموفق",
                        text: "شماره وارد شده صحیح نمی باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }
                let formdata = new FormData();
                formdata.append('name', this.name);
                formdata.append('lastname', this.lastname);
                formdata.append('mobile', this.mobile);
                formdata.append('gender', this.gender);
                formdata.append('avatar', this.image);
                formdata.append('state_id', this.state);
                formdata.append('city_id', this.city);
                formdata.append('region_id', this.region);
                formdata.append('account_status', this.Status);
                await axios.post('/farasho/Account/store', formdata)
                    .then(response => {
                        window.location.reload()
                    }).catch(error => {
                        console.log(error)
                    })

            },
            GetUpdate() {
                if (this.Status == 1) {
                    axios.get(`/farasho/Account/edit/${this.Id}`)
                        .then(response => {
                            this.User = response.data;
                            console.log(this.User, 'user');
                            console.log(this.Id, 'thisId')
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            },
            Update() {
                let formdata = new FormData();
                formdata.append('name', this.User.name);
                formdata.append('lastname', this.User.lastname);
                formdata.append('mobile', this.User.mobile);
                formdata.append('gender', this.User.gender);
                formdata.append('avatar', this.User.avatar);
                formdata.append('state_id', this.User.state_id);
                formdata.append('city_id', this.User.city_id);
                formdata.append('region_id', this.User.region_id);
                axios.post(`/farasho/Account/update/${this.Id}`, formdata)
                    .then(response => {
                        // this.User = response.data[0];
                        // console.log(this.User,'user');
                        // console.log(this.Id,'thisId')
                        swal({
                            title: "عملیات موفق",
                            text: "اطلاعات با موفقیت بروزرسانی شد.",
                            icon: "success",
                            button: "تایید",
                        });
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

        },
        created() {
            this.GetStatus();
            this.GetState();
            this.GetUpdate();
        }
    }
</script>

<style>
    .swal-footer {
        text-align: center !important;
    }
</style>