<template>
    <div id="Job">
        <form v-if="Status == 1" @submit.prevent="UpdateBusiness()">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <label>بارگزاری تصویر</label>
                        <!--preview-->
                        <div class="avatar-div">
                            <img v-if="SingleObject.avatar == null" class="output avatar-img" src="/images/LOGO.png">
                            <img v-else class="output avatar-img" :src="SingleObject.avatar">
                        </div>
                        <!--preview-->
                        <label for="files" class="upload-btn userImg-btn"><i
                                class="fa fa-upload"></i></label>
                        <input style="visibility:hidden;" id="files" type="file" class="upload-btn"
                               accept="image/*"
                               @change="UploadImageEdit($event)" name="avatar">
                    </div>
                    <div class="col-md-3">
                        <label>حوزه فعالیت</label>
                        <select class="form-control" @change="SelectJobFieldEdit($event)">
                            <option selected>{{SingleObject.activity_title}}</option>
                            <option v-for="item in JobField" :value="item.activity_id">{{item.activity_title}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>استان</label>
                        <select class="form-control" @change="SelectStateEdit($event)">
                            <option selected>{{SingleObject.state_name}}</option>
                            <option v-for="s in State" :value="s.state_id">{{s.state_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>شهر</label>
                        <select class="form-control" @change="SelectCityEdit($event)">
                            <option selected>{{SingleObject.city_name}}</option>
                            <option v-for="c in City" :value="c.city_id">{{c.city_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>منطقه</label>
                        <select class="form-control" @change="SelectRegionEdit($event)">
                            <option selected>{{SingleObject.region_name}}</option>
                            <option v-for="r in Region" :value="r.region_id">{{r.region_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>بخش</label>
                        <select class="form-control" @change="SelectSectionEdit($event)">
                            <option selected>{{SingleObject.part_name}}</option>
                            <option v-for="sec in Section" :value="sec.part_id">{{sec.part_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>دهستان</label>
                        <select class="form-control" @change="SelectVillageEdit($event)">
                            <option selected>{{SingleObject.village_name}}</option>
                            <option v-for="vil in Village" :value="vil.village_id">{{vil.village_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>روستا</label>
                        <select class="form-control" @change="SelectRuralEdit($event)">
                            <option selected>{{SingleObject.rural_name}}</option>
                            <option v-for="rural in Rural" :value="rural.rural_id">{{rural.rural_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>خیابان</label>
                        <input class="form-control" v-model="SingleObject.street"/>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>نوع شبکه های اجتماعی</label>
                            <select id="select" class="form-control" @change="GetSocialName($event)">
                                <option selected disabled>نوع شبکه اجتماعی</option>
                                <option v-for="item in Social" :value="item.id">{{item.title}}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>آدرس شبکه های اجتماعی</label>
                            <input id="select2" placeholder="آدرس شبکه اجتماعی" class="form-control"
                                   v-model="SocialAddress">
                            <div class="submit-btn">
                                <button type="button" @click="AddSocialEdit()">افزودن</button>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <ul class="tag-ul">
                                <li v-for="(social,index) in SingleObject.social_network">
                                    <i @click="RemoveSocialEdit(index)" class="fa fa-remove"></i>
                                    {{social.social_title}}-
                                    {{social.link}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>شماره تلفن</label>
                        <input class="form-control" v-model="phone"/>
                        <div class="submit-btn">
                            <button type="button" @click="AddPhoneEdit()">افزودن</button>
                        </div>
                        <div class="col-xs-12">
                            <ul class="tag-ul">
                                <li v-for="(phone,index) in SingleObject.phone">
                                    <i @click="RemovePhoneEdit(index)" class="fa fa-remove"></i>
                                    {{phone}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>توضیحات</label>
                        <textarea class="form-control" v-model="SingleObject.explanation"></textarea>
                    </div>

                    <div class="col-xs-12 submit-btn">
                        <button>بروز رسانی</button>
                    </div>
                </div>
            </div>
        </form>
        <form v-else @submit.prevent="SendBusiness()">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <label>بارگزاری تصویر</label>
                        <!--preview-->
                        <div class="avatar-div">
                            <img v-if="!PreviewImg" class="output avatar-img" src="/images/LOGO.png">
                            <img v-else class="output avatar-img" :src="PreviewImg">
                        </div>
                        <!--preview-->
                        <label for="files" class="upload-btn userImg-btn"><i
                                class="fa fa-upload"></i></label>
                        <input style="visibility:hidden;" id="files" type="file" class="upload-btn"
                               accept="image/*"
                               @change="UploadImage($event)" name="avatar">
                    </div>
                    <div class="col-md-3">
                        <label>حوزه فعالیت</label>
                        <select class="form-control" @change="SelectJobField($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="item in JobField" :value="item.activity_id">{{item.activity_title}}</option>
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
                    <div class="col-md-3">
                        <label>بخش</label>
                        <select class="form-control" @change="SelectSection($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="sec in Section" :value="sec.part_id">{{sec.part_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>دهستان</label>
                        <select class="form-control" @change="SelectVillage($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="vil in Village" :value="vil.village_id">{{vil.village_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>روستا</label>
                        <select class="form-control" @change="SelectRural($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="rural in Rural" :value="rural.rural_id">{{rural.rural_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>خیابان</label>
                        <input class="form-control" v-model="street"/>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>نوع شبکه های اجتماعی</label>
                            <select id="select" class="form-control" @change="GetSocialName($event)">
                                <option selected disabled>نوع شبکه اجتماعی</option>
                                <option v-for="item in Social" :value="item.id">{{item.title}}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>آدرس شبکه های اجتماعی</label>
                            <input id="select2" placeholder="آدرس شبکه اجتماعی" class="form-control"
                                   v-model="SocialAddress">
                            <div class="submit-btn">
                                <button type="button" @click="AddSocial()">افزودن</button>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <ul class="tag-ul">
                                <li v-for="tag in SocialArray">
                                    <i @click="RemoveSocialTag(tag.id)" class="fa fa-remove"></i>
                                    {{tag.title}}-
                                    {{tag.address}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>شماره تلفن</label>
                        <input class="form-control" v-model="phone"/>
                        <div class="submit-btn">
                            <button type="button" @click="AddPhone()">افزودن</button>
                        </div>
                        <div class="col-xs-12">
                            <ul class="tag-ul">
                                <li v-for="(tag,index) in PhoneArray">
                                    <i @click="RemovePhoneTag(index)" class="fa fa-remove"></i>
                                    {{tag}}
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label>توضیحات</label>
                        <textarea class="form-control" v-model="explanation"></textarea>
                    </div>

                    <div class="col-xs-12 submit-btn">
                        <button>ذخیره</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</template>

<script>
    export default {
        name: "AddBusiness",
        data() {
            return {
                PreviewImg: '',
                image: '',
                explanation: '',
                job_field: '',
                JobField: [],
                State: [],
                state: '',
                City: [],
                city: '',
                Section: [],
                section: '',
                Region: [],
                region: '',
                Village: [],
                village: '',
                Rural: [],
                Status: {},
                rural: '',
                Social: [
                    {id: 'اینستاگرام', title: 'اینستاگرام'},
                    {id: 'تلگرام', title: 'تلگرام'},
                    {id: 'واتساپ', title: 'واتساپ'},
                    {id: 'آپارات', title: 'آپارات'},
                ],
                SocialId: '',
                SocialName: '',
                SocialAddress: '',
                phone: '',
                street: '',
                SocialList: [],//send to api
                SocialArray: [],
                PhoneArray: [],//send to api
                BusinessObject: {},
                // BusinessObject:{},
                SingleID: '',
                SingleObject: {},
            }
        },
        methods: {
            GetState() {
                axios.get('/farasho/Option/state')
                    .then(response => {
                        this.State = response.data;
                        // console.log(this.State)
                    })
                    .catch(error => {
                        console.log(error)
                    })
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
            },
            UploadImageEdit(event) {
                this.SingleObject.avatar = event.target.files[0];
                let ImageSize = this.SingleObject.avatar.size / 1024 / 1024; //mb
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
                    this.SingleObject.avatar = e.target.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            },
            SelectJobField(event) {
                this.job_field = event.target.value;
                // this.SingleObject.activity_id = this.job_field;
            },
            SelectJobFieldEdit(event) {
                this.SingleObject.activity_id = this.job_field;
            },
            GetSocialName(event) {
                this.SocialId = event.target.value;
                console.log(this.SocialId);
                this.SocialName = this.Social.find(object => object.id == this.SocialId).title;
                console.log(this.SocialName)

            },
            AddSocial() {
                if (this.SocialId == '' || this.SocialAddress == '') {
                    swal({
                        title: "عملیات ناموفق",
                        text: "لطفا نوع شبکه اجتماعی و آدرس را وارد نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;

                } else {
                    this.SocialList.push({
                        social_title: this.SocialId,
                        link: this.SocialAddress
                    });
                    this.SocialArray.push({
                        id: this.SocialId,
                        title: this.SocialName,
                        address: this.SocialAddress
                    });
                    $('#select option').prop('selected', function () {
                        return this.defaultSelected;
                    });
                    $('#select2').val('');
                    this.SocialAddress = '';
                }
                console.log(this.SocialList)
            },
            AddSocialEdit() {
                if (this.SocialId == '' || this.SocialAddress == '') {
                    swal({
                        title: "عملیات ناموفق",
                        text: "لطفا نوع شبکه اجتماعی و آدرس را وارد نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;

                } else {
                    this.SocialList.push({
                        social_title: this.SocialId,
                        link: this.SocialAddress
                    });
                    this.SocialArray.push({
                        id: this.SocialId,
                        title: this.SocialName,
                        address: this.SocialAddress
                    });
                        this.SingleObject.social_network.push({
                            social_title:this.SocialId,
                            link:this.SocialAddress,
                        })

                    $('#select option').prop('selected', function () {
                        return this.defaultSelected;
                    });
                    $('#select2').val('');
                    this.SocialAddress = '';
                }
                console.log(this.SocialList)
            },
            RemoveSocialTag(Id) {
                this.SocialList = this.SocialList.filter(item => !(item.id == Id))
                console.log(this.SocialList);
                this.SocialArray = this.SocialArray.filter(item => !(item.id == Id))
            },
            RemoveSocialEdit(index){
                let i = index;
                this.SingleObject.social_network.splice(i, 1)
            },
            AddPhone() {
                if(this.phone == ''){
                    swal({
                        title: "عملیات ناموفق",
                        text: "لطفا شماره تماس را وارد نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }else if(this.phone.length != 11){
                    swal({
                        title: "عملیات ناموفق",
                        text: "شماره تماس صحیح نمی باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }else if(this.PhoneArray.indexOf(this.phone)>-1 ){
                    swal({
                        title: "عملیات ناموفق",
                        text: "شماره تماس تکراری می باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }else{
                    this.PhoneArray.push(this.phone)
                    // this.SingleObject.phone.push(this.phone)
                    this.phone = '';
                    console.log(this.PhoneArray)
                }

            },
            AddPhoneEdit() {
                if(this.SingleObject.phone == ''){
                    swal({
                        title: "عملیات ناموفق",
                        text: "لطفا شماره تماس را وارد نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }else if(this.SingleObject.phone.length != 11){
                    swal({
                        title: "عملیات ناموفق",
                        text: "شماره تماس صحیح نمی باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }else if(this.PhoneArray.indexOf(this.phone)>-1 || this.SingleObject.phone.indexOf(this.phone)>-1){
                    swal({
                        title: "عملیات ناموفق",
                        text: "شماره تماس تکراری می باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }else{
                    this.PhoneArray.push(this.phone)
                    this.SingleObject.phone.push(this.phone)
                    this.SingleObject.phone = '';
                    console.log(this.PhoneArray)
                }

            },
            RemovePhoneTag(index) {
                this.PhoneArray.splice(index, 1)
            },
            RemovePhoneEdit(index){
                let i = index;
                this.SingleObject.phone.splice(i, 1)
            },
            SelectState(event) {
                this.state = event.target.value;
                axios.get(`/farasho/Option/city/${this.state}`)
                    .then(response => {
                        this.City = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })

            },
            SelectStateEdit(event) {
                this.state = event.target.value;
                this.SingleObject.state_id = event.target.value;
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
                axios.get(`/farasho/Option/region/${this.city}`)
                    .then(response => {
                        this.Region = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectCityEdit(event) {
                this.city = event.target.value;
                this.SingleObject.city_id = event.target.value;
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
                axios.get(`/farasho/Option/part/${this.region}`)
                    .then(response => {
                        this.Section = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectRegionEdit(event) {
                this.region = event.target.value;
                this.SingleObject.region_id = event.target.value;
                axios.get(`/farasho/Option/part/${this.region}`)
                    .then(response => {
                        this.Section = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectSection(event) {
                this.section = event.target.value;
                axios.get(`/farasho/Option/village/${this.section}`)
                    .then(response => {
                        this.Village = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectSectionEdit(event) {
                this.section = event.target.value;
                this.SingleObject.part_id = event.target.value;
                axios.get(`/farasho/Option/village/${this.section}`)
                    .then(response => {
                        this.Village = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectVillage(event) {
                this.village = event.target.value;
                axios.get(`/farasho/Option/rural/${this.village}`)
                    .then(response => {
                        this.Rural = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectVillageEdit(event) {
                this.village = event.target.value;
                this.SingleObject.village_id = event.target.value;
                axios.get(`/farasho/Option/rural/${this.village}`)
                    .then(response => {
                        this.Rural = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectRural(event) {
                this.rural = event.target.value;

            },
            SelectRuralEdit(event) {
                this.rural = event.target.value;
                this.SingleObject.rural_id = event.target.value;
            },
            GetActivity() {
                axios.get('/farasho/Option/activity')
                    .then(response => {
                        this.JobField = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            SendBusiness() {
                // social
                let json1 = JSON.stringify(this.SocialList);
                let social_data = {json_data1: json1};
                // phone
                let json2 = JSON.stringify(this.PhoneArray);
                let phone_data = {json_data2: json2};
                // send data
                let formdata = new FormData();
                formdata.append('phone', phone_data.json_data2);
                formdata.append('avatar', this.image);
                formdata.append('state_id', this.state);
                formdata.append('city_id', this.city);
                formdata.append('region_id', this.region);
                formdata.append('part_id', this.section);
                formdata.append('village_id', this.village);
                formdata.append('rural_id', this.rural);
                formdata.append('activity_id', this.job_field);
                formdata.append('street', this.street);
                formdata.append('explanation', this.explanation);
                formdata.append('social_network', social_data.json_data1);
                axios.post('/farasho/AddBusiness/store', formdata)
                    .then(response => {
                        this.User = response.data[0];
                        window.location.reload()
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            UpdateBusiness() {
                let json1 = JSON.stringify(this.SingleObject.social_network);
                let social_data = {json_data1: json1};
                // phone
                let json2 = JSON.stringify(this.SingleObject.phone);
                let phone_data = {json_data2: json2};
                // send data
                let formdata = new FormData();
                formdata.append('phone', phone_data.json_data2);
                formdata.append('avatar', this.SingleObject.avatar);
                formdata.append('state_id', this.SingleObject.state_id);
                formdata.append('city_id', this.SingleObject.city_id);
                formdata.append('region_id', this.SingleObject.region_id);
                formdata.append('part_id', this.SingleObject.part_id);
                formdata.append('village_id', this.SingleObject.village_id);
                formdata.append('rural_id', this.SingleObject.rural_id);
                formdata.append('activity_id', this.SingleObject.activity_id);
                formdata.append('street', this.SingleObject.street);
                formdata.append('explanation', this.SingleObject.explanation);
                formdata.append('social_network', social_data.json_data1);
                axios.post(`/farasho/AddBusiness/update/${this.SingleID}`, formdata)
                    .then(response => {
                        this.User = response.data[0];
                        // alert('updated')
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
            GetBusinessStatus() {
                axios.get('/farasho/AddBusiness/BusinessStatus')
                    .then(response => {
                        this.Status = response.data.business_status;
                        this.SingleID = response.data.id;
                        console.log(this.Status, 'statusss');
                        console.log(this.SingleID, 'IDDD')
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            GetEdit() {
                // this.GetBusinessStatus();
                axios.get('/farasho/AddBusiness/BusinessStatus')
                    .then(response => {

                        this.Status = response.data.business_status;
                        this.SingleID = response.data.id;
                        console.log(this.Status, 'statusss');

                        axios.get(`/farasho/AddBusiness/edit/${this.SingleID}`)
                            .then(response => {
                                this.BusinessObject = response.data;
                                this.SingleObject = this.BusinessObject.find(item => item.id == this.SingleID);
                                console.log(this.SingleID, 'SingleID');
                                console.log(this.SingleObject, 'SingleObject')
                                console.log(this.BusinessObject, 'BusinessObject');
                            })
                            .catch(error => {
                                console.log(error)
                            })

                    })
                    .catch(error => {
                        console.log(error)
                    })
                console.log(this.SingleID, 'idddddddd');
                // if(this.Status == 1){
                // let iddd = this.SingleID;
                axios.get(`/farasho/AddBusiness/edit/${this.SingleID}`)
                    .then(response => {

                        this.BusinessObject = response.data

                    })
                    .catch(error => {
                        console.log(error)
                    })
                // }

            },


        },
        created() {
            this.GetState();
            this.GetActivity();
            this.GetBusinessStatus();
            this.GetEdit()
        }
    }
</script>

<style scoped>

</style>