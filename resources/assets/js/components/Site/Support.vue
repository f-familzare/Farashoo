<template>
    <div id="Support">
        <div class="container-fluid">
           <form @submit.prevent="SendSupport()">
               <div class="row">
                   <!--<div class="col-md-12 text-center contact-us">تماس با کاریش</div>-->
                   <div class="col-md-3 col-sm-4">
                       <label>نام و نام خانوادگی</label>
                       <input class="form-control" v-model="name">
                   </div>
                   <div class="col-md-3 col-sm-4">
                       <label>ایمیل</label>
                       <input class="form-control" v-model="email">
                   </div>
                   <div class="col-md-3 col-sm-4">
                       <label>شماره تماس</label>
                       <input class="form-control" v-model="phone">
                   </div>
                   <div class="col-md-3 col-sm-4">
                       <label>مربوط به</label>
                       <select class="form-control" @change="GetRelatedID($event)">
                           <option selected disabled>انتخاب کنید</option>
                           <option v-for="related in Related" :value="related.related_id">{{related.related_title}}</option>
                       </select>
                   </div>
                   <div class="col-md-3 col-sm-4">
                       <label>توضیحات</label>
                       <textarea class="form-control" v-model="description"></textarea>
                   </div>
                   <div class="col-xs-12">
                      <div class="submit-btn text-center">
                          <button>ارسال</button>
                      </div>
                   </div>
               </div>
           </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Support",
        data(){
            return{
                Related:[],
                relatedID:'',
                description:'',
                name:'',
                email:'',
                phone:'',
            }
        },
        methods:{
            GetRelated() {
                axios.get('/farasho/Option/related')
                    .then(response => {
                        this.Related = response.data;
                        console.log(this.Related)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            GetRelatedID(event){
                this.relatedID = event.target.value;
            },
            SendSupport(){
                let formdata = new FormData();
                formdata.append('name', this.name);
                formdata.append('email', this.email);
                formdata.append('phone', this.phone);
                formdata.append('related_id', this.relatedID);
                formdata.append('request', this.description);
                axios.post('/farasho/Contact/store',formdata)
                    .then(response => {
                        swal({
                            title: "عملیات موفق!",
                            text: "درخواست شما به واحد پشتیبانی ارسال شد.",
                            icon: "success",
                            button: "تایید",
                        });
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
        },
        created(){
        this.GetRelated();
        }
    }
</script>

<style scoped>

</style>