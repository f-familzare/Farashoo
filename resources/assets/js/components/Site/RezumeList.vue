<template>

    <div id="RezumeList" class="padding text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-3 margin-b" v-for="rezume in RezumeList" :key="rezume.id" @click="SendID(rezume.id)" >
                    <div class="single-rezume-list" >
                        <div class="image item">
                            <img src="/images/LOGO.png">
                        </div>
                        <div class="name item">
                            {{rezume.name}} {{rezume.last_name}}
                        </div>
                        <div class="name item">
                            سن:
                            {{rezume.age}}
                        </div>
                        <div class="field item">
                            عنوان شغلی:
                            <div v-for="job in rezume.jobs">
                                <span>{{job.job_title}}</span>
                                <br>
                            </div>
                        </div>

                    </div>
                </div>
                <div v-if="!RezumeList.length">رزومه ای ثبت نشده است</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "RezumeList",
        data() {
            return {
                RezumeList: []
            }
        },
        methods: {
            GetRezumeList() {
                axios.get('/farasho/AddRezume/list')
                    .then(response => {
                        this.RezumeList = response.data;
                        console.log(this.RezumeList)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SendID(ID){
                this.$router.push({name: 'SingleRezume', params: {id:ID}});
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