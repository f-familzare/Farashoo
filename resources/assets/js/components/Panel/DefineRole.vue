<template>
    <div id="DefineRole">
        <div class="container-fluid">
            <form @submit.prevent="SaveRole()">
                <div class="row">
                    <div class="col-md-3">
                        <label>نام کاربری</label>
                        <select class="form-control" @change="GetUserID($event)">
                            <!--<option v-for="user in Persons" :value="user.id">{{user.name}}{{user.lastname}}</option>-->
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="user in Persons" :value="user.id">{{user.username}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>نقش</label>
                        <select class="form-control" @change="GetUserRole($event)">
                            <option selected disabled>انتخاب کنید</option>
                            <option v-for="role in RoleList" :value="role.id">{{role.title}}</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="submit-btn"><button>ثبت</button></div>
                    </div>
                </div>
            </form>
            <!--<form @submit.prevent="UpdateRole()">-->
                <!--<div class="row">-->
                    <!--<div class="col-md-3">-->
                        <!--<label>نام کاربری</label>-->
                        <!--<select class="form-control" @change="GetUserID($event)">-->
                            <!--&lt;!&ndash;<option v-for="user in Persons" :value="user.id">{{user.name}}{{user.lastname}}</option>&ndash;&gt;-->
                            <!--<option selected disabled>انتخاب کنید</option>-->
                            <!--<option v-for="user in Persons" :value="user.id">{{user.username}}</option>-->
                        <!--</select>-->
                    <!--</div>-->
                    <!--<div class="col-md-3">-->
                        <!--<label>نقش</label>-->
                        <!--<select class="form-control" @change="GetUserRole($event)">-->
                            <!--<option selected disabled>انتخاب کنید</option>-->
                            <!--<option v-for="role in RoleList" :value="role.id">{{role.title}}</option>-->
                        <!--</select>-->
                    <!--</div>-->
                    <!--<div class="col-md-12">-->
                        <!--<div class="submit-btn"><button>ثبت</button></div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</form>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "DefineRole",
        data(){
            return{
                Persons:[],
                RoleList:[],
                username:'',
                UserId :'',//send this
                Role :'',//send this
            }
        },
        methods:{
            GetUsers(){
                axios.get('/farasho/Option/users')
                    .then((response) => {
                        this.Persons = response.data;
                        console.log(this.Persons)
                    })
                    .catch(error => console.log(error));

            },
            GetRole(){
                axios.get('/farasho/Option/roles')
                    .then((response) => {
                        this.RoleList = response.data;
                        console.log(this.Persons)
                    })
                    .catch(error => console.log(error));

            },
            GetUserID(event){
                this.UserId = event.target.value
            },
            GetUserRole(event){
                this.Role = event.target.value
            },
            SaveRole(){
                let formdata = new FormData();
                formdata.append('user_id', this.UserId);
                formdata.append('role_id', this.Role);
                axios.post('/farasho/Roles/storeRoleUser', formdata)
                .then(response => {
                    // window.location.reload()
                    swal({
                        title: "عملیات موفق",
                        text: "اطلاعات با موفقیت ثبت شد.",
                        icon: "success",
                        button: "تایید",
                    });
                })
                .catch(error => {
                    console.log(error)
                })

            },


        },
        created(){
            this.GetUsers();
            this.GetRole();
        },

    }
</script>

<style scoped>

</style>