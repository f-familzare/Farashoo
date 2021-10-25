<template>
    <div id="SingleRezume" class="container padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div v-if="RezumeList.rezume.avatar == null" class="avatar">
                        <img src="/images/LOGO.png">
                    </div>
                    <div v-else class="avatar">
                        <img :src="RezumeList.rezume.avatar">
                    </div>
                </div>
                <div class="col-xs-12 name">
                    <div>{{RezumeList.rezume.name}} {{RezumeList.rezume.last_name}}</div>
                </div>
                <div class="title text-center">
                    اطلاعات پایه
                </div>
                <div class="description">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span>سن:</span>
                                <span>{{RezumeList.rezume.age}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>وضعیت تاهل:</span>
                                <span>{{RezumeList.rezume.status}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>ایمیل:</span>
                                <span>{{RezumeList.rezume.email}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>استان سکونت:</span>
                                <span>{{RezumeList.rezume.state_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>شهر:</span>
                                <span>{{RezumeList.rezume.city_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>منطقه:</span>
                                <span>{{RezumeList.rezume.region_name}}</span>
                            </div>
                            <div class="col-md-12 text-center item">
                                <span>درباره من:</span>
                                <span>{{RezumeList.rezume.about_me}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="title text-center">
                    سوابق تحصیلی
                </div>
                <div class="description" v-for="(academy,index) in AcademyList">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span class="number">{{index+1}} - </span>
                                <span>مدرک تحصیلی:</span>
                                <span>{{academy.degree_of_education_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>رشته تحصیلی:</span>
                                <span>{{academy.major_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>نام موسسه:</span>
                                <span>{{academy.collage_name}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>وضعیت تحصیلی:</span>
                                <span>{{academy.education_status}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>تاریخ شروع تحصیل:</span>
                                <span>{{academy.start_date}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>تاریخ پایان تحصیل</span>
                                <span>{{academy.end_date}}</span>
                            </div>
                            <div class="col-md-12 col-sm-12 text-center item">
                                <span>معدل:</span>
                                <span>12</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description item" v-if="!AcademyList.length">اطلاعاتی ثبت نشده است</div>

                <div class="title text-center">
                    سوابق شغلی
                </div>
                <div class="description" v-for="(job,index) in jobList">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span class="number">{{index+1}} - </span>
                                <span>حوزه فعالیت:</span>
                                <span>{{job.activity_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>سمت:</span>
                                <span>{{job.job_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>نحوه همکاری:</span>
                                <span>{{job.cooperation_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>حقوق دریافتی:</span>
                                <span>{{job.salary_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>مدت فعالیت:</span>
                                <span>{{job.activity_time_title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description item" v-if="!jobList.length">اطلاعاتی ثبت نشده است</div>

                <div class="title text-center">
                    سوابق مهارتی
                </div>
                <div class="description" v-for="(skill,index) in skillList">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span class="number">{{index+1}} - </span>
                                <span>نام مهارت:</span>
                                <span>{{skill.skill_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>سطح مهارت:</span>
                                <span>{{skill.skill_level}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description item" v-if="!skillList.length">اطلاعاتی ثبت نشده است</div>

                <div class="title text-center">
                    سوابق نرم افزار
                </div>
                <div class="description" v-for="(software,index) in softwareList">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span class="number">{{index+1}} - </span>
                                <span>نام نرم افزار:</span>
                                <span>{{software.software_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>سطح مهارت:</span>
                                <span>{{software.software_level}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description item" v-if="!softwareList.length">اطلاعاتی ثبت نشده است</div>
                <div class="title text-center">
                    سوابق زبان
                </div>
                <div class="description" v-for="(lang,index) in languageList">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2 col-sm-3 item">
                                <span class="number">{{index+1}} - </span>
                                <span>نام زبان:</span>
                                <span>{{lang.language_title}}</span>
                            </div>
                            <div class="col-md-2 col-sm-3 item">
                                <span>سطح مهارت:</span>
                                <span>{{lang.language_level}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="description item" v-if="!languageList.length">اطلاعاتی ثبت نشده است</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SingleRezume",
        data() {
            return {
                RezumeList: [],
                AcademyList:[],
                skillList:[],
                languageList:[],
                softwareList:[],
                jobList:[],
                SingleId:''
            }
        },
        methods: {

            GetID(){
                this.SingleId = this.$route.params.id;
                console.log( this.SingleId,'singleid')
            },
            GetRezumeList() {
                axios.get(`/farasho/AddRezume/edit/${this.SingleId}`)
                    .then(response => {
                        this.RezumeList = response.data;
                        console.log(this.RezumeList,'rezumelits')
                        this.AcademyList = response.data.academy;
                        this.skillList = response.data.skill;
                        this.languageList = response.data.language;
                        this.softwareList = response.data.software;
                        this.jobList = response.data.job;
                        console.log( this.jobList)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },


        },
        created() {
            this.GetID();
            this.GetRezumeList();

        }
    }
</script>

<style scoped>

</style>