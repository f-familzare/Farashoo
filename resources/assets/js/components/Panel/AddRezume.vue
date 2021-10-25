<template>
    <div id="Job">
        <div v-if="!InfoStatus" class="container-fluid information">
            <form v-if="InformationStatus == 1" @submit.prevent="UpdateInformation()">
                <div class="row">
                    <div class="col-12">
                        <label>بارگزاری تصویر</label>
                        <!--preview-->
                        <div v-if="Information.avatar == null" class="avatar-div">
                            <img  class="output avatar-img" src="/images/LOGO.png">

                        </div>
                        <div v-else class="avatar-div">
                            <img class="output avatar-img" :src="Information.avatar">
                        </div>
                        <!--preview-->
                        <label for="files" class="upload-btn userImg-btn"><i
                                class="fa fa-upload"></i></label>
                        <input style="visibility:hidden;" id="files" type="file" class="upload-btn"
                               accept="image/*"
                               @change="UploadImageEdit($event)" name="avatar">
                    </div>
                    <div class="col-md-3">
                        <label>نام</label>
                        <input class="form-control" v-model="Information.name" name="name">
                    </div>
                    <div class="col-md-3">
                        <label>نام خانوادگی</label>
                        <input class="form-control" v-model="Information.last_name" name="last_name">
                    </div>
                    <div class="col-md-3">
                        <label>سن</label>
                        <input class="form-control" v-model="Information.age" name="age">
                    </div>
                    <div class="col-md-3">
                        <label>وضعیت تاهل</label>
                        <select @change="MaritialStatusEdit($event)" class="form-control">
                            <option selected>{{Information.status}}</option>
                            <option value="متاهل">متاهل</option>
                            <option value="مجرد">مجرد</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>ایمیل</label>
                        <input class="form-control" v-model="Information.email" name="email">
                    </div>
                    <div class="col-md-3">
                        <label>استان</label>
                        <select @change="SelectStateEdit($event)" class="form-control">
                            <option selected >{{Information.state_name}}</option>
                            <option v-for="item in State" :value="item.state_id" name="state_id">{{item.state_name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>شهر</label>
                        <select @change="SelectCityEdit($event)" class="form-control">
                            <option selected >{{Information.city_name}}</option>
                            <option v-for="item in City" :value="item.city_id" name="city_id">{{item.city_name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>منطقه</label>
                        <select @change="SelectRegionEdit($event)" class="form-control" name="region_id">
                            <option selected >{{Information.region_name}}</option>
                            <option v-for="item in Region" :value="item.region_id">{{item.region_name}}</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>درباره من</label>
                        <textarea v-model="Information.about_me" name="aboutme" class="form-control"></textarea>
                    </div>
                    <div class="col-xs-12 submit-btn">
                        <button>بروزرسانی اطلاعات پایه</button>
                    </div>
                </div>
                <div class=" mt-5 tab-pane active container-fluid" style="display: block" role="tabpanel">
                    <div class="row">
                        <div class="col-xs-12 addJob">
                            <div class="">
                                <div class="title">
                                    سوابق شغلی
                                </div>
                                <div class="Jobs-list container-fluid text-right" v-for="(job,index) in JobList">
                                    <div class="row">
                                        <div class="col-12 index">{{index+1}}</div>
                                        <div class="col-md-3 section">
                                            <span>حوزه فعالیت:</span>
                                            <span>{{job.activity_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>سمت:</span>
                                            <span>{{job.job_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>نحوه همکاری:</span>
                                            <span>{{job.cooperation_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>حقوق دریافتی:</span>
                                            <span>{{job.salary_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>مدت فعالیت:</span>
                                            <span>{{job.activity_time_title}}</span>
                                        </div>
                                        <div class="action col-xs-12">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditJob"
                                                  @click="EditJob(job.id)">ویرایش</span>
                                                    </div>
                                                    <div class="delete col-xs-6">
                                                        <span @click="DeleteJob(job.id)">حذف</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="!JobList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                                <div class="Extra-job">
                                    <form @submit.prevent="SubmitJob()">
                                        <div class="container-fluid hidden2">
                                            <div class="row">
                                                <!--<div class="col-12 index">{{index+1}}</div>-->
                                                <div class="col-md-3">
                                                    <label>حوزه فعالیت</label>
                                                    <select class="form-control" @change="SelectJobField($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in JobField" :value="item.activity_id">
                                                            {{item.activity_title}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>عنوان شغلی</label>
                                                    <input class="form-control" v-model="job_title">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>نحوه همکاری</label>
                                                    <select class="form-control" @change="SelectJobType($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in Type" :value="item.cooperation_id">
                                                            {{item.cooperation_title}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>حقوق دریافتی</label>
                                                    <select class="form-control" @change="SelectJobSalary($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in Salary" :value="item.salary_id">
                                                            {{item.salary_title}}
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>مدت فعالیت</label>
                                                    <select class="form-control" @change="SelectJobTime($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in Duration" :value="item.activity_time_id">
                                                            {{item.activity_time_title}}
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div v-if="!JobaddStatus" class="add-btn" @click="AddMoreJob()"><i
                                                class="fa fa-plus"></i>ایجاد
                                            سابقه کاری
                                        </div>
                                        <div v-if="JobaddStatus" class="col-12 save">
                                            <button>ذخیره سوابق شغلی</button>
                                        </div>
                                    </form>
                                </div>
                                <div id="EditJob" class="modal fade" role="dialog">
                                    <form @submit.prevent="SubmitEditJob()">
                                        <div>
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">ویرایش سوابق شغلی</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>حوزه فعالیت</label>
                                                                    <select class="form-control" @change="SelectJobFieldEdit($event)">
                                                                        <option selected>{{JobObject.activity_title}}</option>
                                                                        <option v-for="item in JobField" :value="item.activity_id">
                                                                            {{item.activity_title}}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>عنوان شغلی</label>
                                                                    <input class="form-control" v-model="JobObject.job_title">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>نحوه همکاری</label>
                                                                    <select class="form-control" @change="SelectJobTypeEdit($event)">
                                                                        <option selected>{{JobObject.activity_time_title}}</option>
                                                                        <option v-for="item in Type" :value="item.cooperation_id">
                                                                            {{item.cooperation_title}}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>حقوق دریافتی</label>
                                                                    <select class="form-control" @change="SelectJobSalaryEdit($event)">
                                                                        <option selected>{{JobObject.salary_title}}</option>
                                                                        <option v-for="item in Salary" :value="item.salary_id">
                                                                            {{item.salary_title}}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>مدت فعالیت</label>
                                                                    <select class="form-control" @change="SelectJobTimeEdit($event)">
                                                                        <option selected>{{JobObject.activity_time_title}}</option>
                                                                        <option v-for="item in Duration" :value="item.activity_time_id">
                                                                            {{item.activity_time_title}}
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <button class="btn btn-default">ویرایش</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 addAcademy">
                            <div class="title">
                                سوابق تحصیلی
                            </div>
                            <div class="Jobs-list container-fluid text-right" v-for="(academy,index) in AcademicList">
                                <div class="row">
                                    <div class="col-12 index">{{index+1}}</div>

                                    <div class="col-md-3 section">
                                        <span>مدرک تحصیلی:</span>
                                        <span>{{academy.degree_of_education_title}}</span>
                                    </div>
                                    <div class="col-md-3 section">
                                        <span>رشته تحصیلی:</span>
                                        <span>{{academy.major_title}}</span>
                                    </div>
                                    <div class="col-md-3 section">
                                        <span>نام موسسه:</span>
                                        <span>{{academy.collage_name}}</span>
                                    </div>
                                    <div class="col-md-3 section">
                                        <span>وضعیت تحصیلی:</span>
                                        <span>{{academy.education_status}}</span>
                                    </div>
                                    <div class="col-md-3 section">
                                        <span>تاریخ شروع تحصیل:</span>
                                        <span>{{academy.start_date}}</span>
                                    </div>
                                    <div class="col-md-3 section">
                                        <span>تاریخ پایان تحصیل:</span>
                                        <span>{{academy.end_date}}</span>
                                    </div>
                                    <div class="col-md-3 section">
                                        <span>معدل:</span>
                                        <span>{{academy.mark}}</span>
                                    </div>
                                    <div class="action col-xs-12">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditAcademy"
                                                  @click="EditAcademy(academy.id)">ویرایش</span>
                                                </div>
                                                <div class="delete col-xs-6">
                                                    <span @click="DeleteAcademy(academy.id)">حذف</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="!AcademicList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                            <div class="Extra-Academy">
                                <form @submit.prevent="SubmitAcademic()">
                                    <div class="container-fluid hidden3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>مدرک تحصیلی</label>
                                                <select class="form-control" @change="SelectAcademicDegree($event)">
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option v-for="item in AcademicDegree"
                                                            :value="item.degree_of_education_id">
                                                        {{item.degree_of_education_title}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>رشته تحصیلی</label>
                                                <select class="form-control" @change="SelectAcademicField($event)">
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option v-for="item in AcademicField" :value="item.major_id">
                                                        {{item.major_title}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>نام موسسه</label>
                                                <input class="form-control" v-model="academic_institue">
                                            </div>
                                            <div class="col-md-3">
                                                <label>وضعیت تحصیلی</label>
                                                <select class="form-control" @change="SelectAcademicStatus($event)">
                                                    <option selected disabled>انتخاب کنید</option>
                                                    <option v-for="item in AcademicStatus" :value="item.id">{{item.title}}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label>تاریخ شروع تحصیل</label>
                                                <input class="form-control" v-model="academic_start_date">
                                            </div>
                                            <div class="col-md-3">
                                                <label>تاریخ پایان تحصیل</label>
                                                <input class="form-control end-date" v-model="academic_end_date">
                                            </div>
                                            <div class="col-md-3">
                                                <label>معدل</label>
                                                <input class="form-control mark" v-model="mark"
                                                       @keyup="ValidateMark($event)">
                                            </div>

                                        </div>
                                    </div>
                                    <div v-if="!AcademyaddStatus" class="add-btn" @click="AddMoreAcademic()"><i
                                            class="fa fa-plus"></i>ایجاد
                                        سابقه تحصیلی
                                    </div>
                                    <div v-if="AcademyaddStatus" class="col-12 save">
                                        <div>
                                            <button><i class="fa fa-save"></i>ذخیره سوابق تحصیلی</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="EditAcademy" class="modal fade" role="dialog">
                                <form @submit.prevent="SubmitEditAcademy()">
                                    <div>
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">ویرایش سوابق تحصیلی</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>مدرک تحصیلی</label>
                                                                <select class="form-control"
                                                                        @change="SelectAcademicDegreeEdit($event)">
                                                                    <option selected>{{AcademyObject.degree_of_education_title}}
                                                                    </option>
                                                                    <option v-for="item in AcademicDegree"
                                                                            :value="item.degree_of_education_id">
                                                                        {{item.degree_of_education_title}}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>رشته تحصیلی</label>
                                                                <select class="form-control"
                                                                        @change="SelectAcademicFieldEdit($event)">
                                                                    <option selected>{{AcademyObject.major_title}}</option>
                                                                    <option v-for="item in AcademicField"
                                                                            :value="item.major_id">
                                                                        {{item.major_title}}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>نام موسسه</label>
                                                                <input class="form-control"
                                                                       v-model="AcademyObject.collage_name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>وضعیت تحصیلی</label>
                                                                <select class="form-control"
                                                                        @change="SelectAcademicStatusEdit($event)">
                                                                    <option selected>{{AcademyObject.education_status}}</option>
                                                                    <option v-for="item in AcademicStatus" :value="item.id">
                                                                        {{item.title}}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>تاریخ شروع تحصیل</label>
                                                                <input class="form-control" v-model="AcademyObject.start_date">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>تاریخ پایان تحصیل</label>
                                                                <input class="form-control end-date"
                                                                       v-model="AcademyObject.end_date">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>معدل</label>
                                                                <input class="form-control mark" v-model="AcademyObject.mark"
                                                                       @keyup="ValidateMark($event)">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <button class="btn btn-default">ویرایش</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-xs-12 addSkill">
                            <div class="">
                                <div class="title">
                                    مهارت ها
                                </div>
                                <div class="Jobs-list container-fluid text-right" v-for="(skill,index) in SkillList">
                                    <div class="row">
                                        <div class="col-12 index">{{index+1}}</div>
                                        <div class="col-md-3 section">
                                            <span>نام مهارت:</span>
                                            <span>{{skill.skill_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>سطح مهارت:</span>
                                            <span>{{skill.skill_level}}</span>
                                        </div>
                                        <div class="action col-xs-12">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditSkill"
                                                  @click="EditSkill(skill.skill_id)">ویرایش</span>
                                                    </div>
                                                    <div class="delete col-xs-6">
                                                        <span @click="DeleteSkill(skill.skill_id)">حذف</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="!SkillList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                                <div class="Extra-Skill">
                                    <form @submit.prevent="SubmitSkill()">
                                        <div class="container-fluid hidden4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>نام مهارت</label>
                                                    <input class="form-control" v-model="skill_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>سطح مهارت</label>
                                                    <select class="form-control" @change="SelectSkillLevel($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in Level" :value="item.id">{{item.title}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="!SkilladdStatus" class="add-btn" @click="AddMoreSkill()"><i
                                                class="fa fa-plus"></i>ایجاد
                                            مهارت
                                        </div>
                                        <div v-if="SkilladdStatus" class="col-12 save">
                                            <div>
                                                <button>ذخیره سوابق مهارت ها</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="EditSkill" class="modal fade" role="dialog">
                                    <form @submit.prevent="SubmitEditSkill()">
                                        <div>
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">ویرایش مهارت ها</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>نام مهارت</label>
                                                                    <input class="form-control" v-model="SkillObject.skill_title">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>سطح مهارت</label>
                                                                    <select class="form-control" @change="SelectSkillLevelEdit($event)">
                                                                        <option selected>{{SkillObject.skill_level}}</option>
                                                                        <option v-for="item in Level" :value="item.id">{{item.title}}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <button class="btn btn-default">ویرایش</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 addSoftware">
                            <div class="">
                                <div class="title">
                                    نرم افزار
                                </div>
                                <div v-if="!SoftwareList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                                <div class="Jobs-list container-fluid text-right" v-for="(software,index) in SoftwareList">
                                    <div class="row">
                                        <div class="col-12 index">{{index+1}}</div>
                                        <div class="col-md-3 section">
                                            <span>نام نرم افزار:</span>
                                            <span>{{software.software_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>سطح مهارت:</span>
                                            <span>{{software.software_level}}</span>
                                        </div>
                                        <div class="action col-xs-12">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditSoftware"
                                                  @click="EditSoftware(software.software_id)">ویرایش</span>
                                                    </div>
                                                    <div class="delete col-xs-6">
                                                        <span @click="DeleteSoftware(software.software_id)">حذف</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Extra-Software">
                                    <form @submit.prevent="SubmitSoftware()">
                                        <div class="container-fluid hidden5">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>نام نرم افزار</label>
                                                    <input class="form-control" v-model="software_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>سطح نرم افزار</label>
                                                    <select id="select1" class="form-control"
                                                            @change="SelectSoftwareLevel($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in Level" :value="item.id">{{item.title}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="!SoftwareaddStatus" class="add-btn" @click="AddMoreSoftware()"><i
                                                class="fa fa-plus"></i>ایجاد
                                            نرم افزار
                                        </div>
                                        <div v-if="SoftwareaddStatus" class="col-12 save">
                                            <div>
                                                <button>ذخیره سوابق نرم افزار</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="EditSoftware" class="modal fade" role="dialog">
                                    <form @submit.prevent="SubmitEditSoftware()">
                                        <div>
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">ویرایش مهارت ها</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>نام مهارت</label>
                                                                    <input class="form-control" v-model="SoftwareObject.software_title">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>سطح مهارت</label>
                                                                    <select class="form-control" @change="SelectSoftwareLevelEdit($event)">
                                                                        <option selected>{{SoftwareObject.software_level}}</option>
                                                                        <option v-for="item in Level" :value="item.id">{{item.title}}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <button class="btn btn-default">ویرایش</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 addLang">
                            <div class="">
                                <div class="title">
                                    زبان
                                </div>
                                <div v-if="!LanguageList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                                <div class="Jobs-list container-fluid text-right" v-for="(lang,index) in LanguageList">
                                    <div class="row">
                                        <div class="col-12 index">{{index+1}}</div>
                                        <div class="col-md-3 section">
                                            <span>نام زبان:</span>
                                            <span>{{lang.language_title}}</span>
                                        </div>
                                        <div class="col-md-3 section">
                                            <span>سطح مهارت:</span>
                                            <span>{{lang.language_level}}</span>
                                        </div>
                                        <div class="action col-xs-12">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditLanguage"
                                                  @click="EditLanguage(lang.language_id)">ویرایش</span>
                                                    </div>
                                                    <div class="delete col-xs-6">
                                                        <span @click="DeleteLanguage(lang.language_id)">حذف</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Extra-Lang">
                                    <form @submit.prevent="SubmitLang()">
                                        <div class="container-fluid hidden6">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>نام زبان</label>
                                                    <input class="form-control" v-model="lang_name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>سطح زبان</label>
                                                    <select id="select2" class="form-control" @change="SelectLangLevel($event)">
                                                        <option selected disabled>انتخاب کنید</option>
                                                        <option v-for="item in Level" :value="item.id">{{item.title}}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="!LangaddStatus" class="add-btn" @click="AddMoreLang()"><i
                                                class="fa fa-plus"></i>ایجاد
                                            زبان
                                        </div>
                                        <div v-if="LangaddStatus" class="col-12 save">
                                            <div>
                                                <button>ذخیره سوابق زبان</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="EditLanguage" class="modal fade" role="dialog">
                                    <form @submit.prevent="SubmitEditLanguage()">
                                        <div>
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">ویرایش زبان ها</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label>نام زبان</label>
                                                                    <input class="form-control" v-model="LanguageObject.language_title">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>سطح زبان</label>
                                                                    <select class="form-control" @change="SelectLangLevelEdit($event)">
                                                                        <option selected>{{LanguageObject.language_level}}</option>
                                                                        <option v-for="item in Level" :value="item.id">{{item.title}}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer text-center">
                                                        <button class="btn btn-default">ویرایش</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form v-else @submit.prevent="SaveInformation()">
            <div class="row">
                <div class="col-12">
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
                    <label>نام</label>
                    <input class="form-control" v-model="name" name="name">
                </div>
                <div class="col-md-3">
                    <label>نام خانوادگی</label>
                    <input class="form-control" v-model="lname" name="lname">
                </div>
                <div class="col-md-3">
                    <label>سن</label>
                    <input class="form-control" v-model="age" name="age">
                </div>
                <div class="col-md-3">
                    <label>وضعیت تاهل</label>
                    <select @change="MaritialStatus($event)" class="form-control">
                        <option selected disabled>انتخاب کنید</option>
                        <option value="متاهل">متاهل</option>
                        <option value="مجرد">مجرد</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>ایمیل</label>
                    <input class="form-control" v-model="email" name="email">
                </div>
                <div class="col-md-3">
                    <label>استان</label>
                    <select @change="SelectState($event)" class="form-control">
                        <option selected disabled>انتخاب کنید</option>
                        <option v-for="item in State" :value="item.state_id" name="state_id">{{item.state_name}}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>شهر</label>
                    <select @change="SelectCity($event)" class="form-control">
                        <option selected disabled>انتخاب کنید</option>
                        <option v-for="item in City" :value="item.city_id" name="city_id">{{item.city_name}}
                        </option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>منطقه</label>
                    <select @change="SelectRegion($event)" class="form-control" name="region_id">
                        <option selected disabled>انتخاب کنید</option>
                        <option v-for="item in Region" :value="item.region_id">{{item.region_name}}</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>درباره من</label>
                    <textarea v-model="aboutme" name="aboutme" class="form-control"></textarea>
                </div>
                <div class="col-xs-12 submit-btn">
                    <button>ذخیره اطلاعات پایه</button>
                </div>
            </div>
        </form>

        </div>

        <div class="container-fluid buttons">
            <div v-if="InfoStatus" class="submit-btn mb-5 displayinfo" style="display: block">
                <button @click="DisplayInfo">نمایش اطلاعات پایه</button>
            </div>
            <div class="row btns">
                <div class="col-md-2">
                    <div @click="DisplayAcademy()" class="button-1 active2 academy-btn">سوابق تحصیلی</div>
                </div>
                <div class="col-md-2">
                    <div @click="DisplayJob()" class="button-1 job-btn">سوابق شغلی</div>
                </div>
                <div class="col-md-2">
                    <div @click="DisplaySkill()" class="button-1 skill-btn">سوابق مهارتی</div>
                </div>
                <div class="col-md-2">
                    <div @click="DisplaySoftware()" class="button-1 software-btn">سوابق نرم افزار</div>
                </div>
                <div class="col-md-2">
                    <div @click="DisplayLang()" class="button-1 lang-btn">سوابق زبان</div>
                </div>
            </div>
        </div>
        <div class="container-fluid Extras mt-5 tab-pane active" role="tabpanel">
            <div class="row">
                <div class="col-xs-12 addJob">
                    <div class="">
                        <div class="title">
                            سوابق شغلی
                        </div>
                        <div class="Jobs-list container-fluid text-right" v-for="(job,index) in JobList">
                            <div class="row">
                                <div class="col-12 index">{{index+1}}</div>
                                <div class="col-md-3 section">
                                    <span>حوزه فعالیت:</span>
                                    <span>{{job.activity_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>سمت:</span>
                                    <span>{{job.job_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>نحوه همکاری:</span>
                                    <span>{{job.cooperation_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>حقوق دریافتی:</span>
                                    <span>{{job.salary_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>مدت فعالیت:</span>
                                    <span>{{job.activity_time_title}}</span>
                                </div>
                                <div class="action col-xs-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditJob"
                                                  @click="EditJob(job.id)">ویرایش</span>
                                            </div>
                                            <div class="delete col-xs-6">
                                                <span @click="DeleteJob(job.id)">حذف</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="!JobList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                        <div class="Extra-job">
                            <form @submit.prevent="SubmitJob()">
                                <div class="container-fluid hidden2">
                                    <div class="row">
                                        <!--<div class="col-12 index">{{index+1}}</div>-->
                                        <div class="col-md-3">
                                            <label>حوزه فعالیت</label>
                                            <select class="form-control" @change="SelectJobField($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in JobField" :value="item.activity_id">
                                                    {{item.activity_title}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>عنوان شغلی</label>
                                            <input class="form-control" v-model="job_title">
                                        </div>
                                        <div class="col-md-3">
                                            <label>نحوه همکاری</label>
                                            <select class="form-control" @change="SelectJobType($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in Type" :value="item.cooperation_id">
                                                    {{item.cooperation_title}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>حقوق دریافتی</label>
                                            <select class="form-control" @change="SelectJobSalary($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in Salary" :value="item.salary_id">
                                                    {{item.salary_title}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>مدت فعالیت</label>
                                            <select class="form-control" @change="SelectJobTime($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in Duration" :value="item.activity_time_id">
                                                    {{item.activity_time_title}}
                                                </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div v-if="!JobaddStatus" class="add-btn" @click="AddMoreJob()"><i
                                        class="fa fa-plus"></i>ایجاد
                                    سابقه کاری
                                </div>
                                <div v-if="JobaddStatus" class="col-12 save">
                                    <button>ذخیره سوابق شغلی</button>
                                </div>
                            </form>
                        </div>
                        <div id="EditJob" class="modal fade" role="dialog">
                            <form @submit.prevent="SubmitEditJob()">
                                <div>
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">ویرایش سوابق شغلی</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>حوزه فعالیت</label>
                                                            <select class="form-control" @change="SelectJobFieldEdit($event)">
                                                                <option selected>{{JobObject.activity_title}}</option>
                                                                <option v-for="item in JobField" :value="item.activity_id">
                                                                    {{item.activity_title}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>عنوان شغلی</label>
                                                            <input class="form-control" v-model="JobObject.job_title">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>نحوه همکاری</label>
                                                            <select class="form-control" @change="SelectJobTypeEdit($event)">
                                                                <option selected>{{JobObject.activity_time_title}}</option>
                                                                <option v-for="item in Type" :value="item.cooperation_id">
                                                                    {{item.cooperation_title}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>حقوق دریافتی</label>
                                                            <select class="form-control" @change="SelectJobSalaryEdit($event)">
                                                                <option selected>{{JobObject.salary_title}}</option>
                                                                <option v-for="item in Salary" :value="item.salary_id">
                                                                    {{item.salary_title}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>مدت فعالیت</label>
                                                            <select class="form-control" @change="SelectJobTimeEdit($event)">
                                                                <option selected>{{JobObject.activity_time_title}}</option>
                                                                <option v-for="item in Duration" :value="item.activity_time_id">
                                                                    {{item.activity_time_title}}
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button class="btn btn-default">ویرایش</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 addAcademy">
                    <div class="title">
                        سوابق تحصیلی
                    </div>
                    <div class="Jobs-list container-fluid text-right" v-for="(academy,index) in AcademicList">
                        <div class="row">
                            <div class="col-12 index">{{index+1}}</div>

                            <div class="col-md-3 section">
                                <span>مدرک تحصیلی:</span>
                                <span>{{academy.degree_of_education_title}}</span>
                            </div>
                            <div class="col-md-3 section">
                                <span>رشته تحصیلی:</span>
                                <span>{{academy.major_title}}</span>
                            </div>
                            <div class="col-md-3 section">
                                <span>نام موسسه:</span>
                                <span>{{academy.collage_name}}</span>
                            </div>
                            <div class="col-md-3 section">
                                <span>وضعیت تحصیلی:</span>
                                <span>{{academy.education_status}}</span>
                            </div>
                            <div class="col-md-3 section">
                                <span>تاریخ شروع تحصیل:</span>
                                <span>{{academy.start_date}}</span>
                            </div>
                            <div class="col-md-3 section">
                                <span>تاریخ پایان تحصیل:</span>
                                <span>{{academy.end_date}}</span>
                            </div>
                            <div class="col-md-3 section">
                                <span>معدل:</span>
                                <span>{{academy.mark}}</span>
                            </div>
                            <div class="action col-xs-12">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditAcademy"
                                                  @click="EditAcademy(academy.id)">ویرایش</span>
                                        </div>
                                        <div class="delete col-xs-6">
                                            <span @click="DeleteAcademy(academy.id)">حذف</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="!AcademicList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                    <div class="Extra-Academy">
                        <form @submit.prevent="SubmitAcademic()">
                            <div class="container-fluid hidden3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>مدرک تحصیلی</label>
                                        <select class="form-control" @change="SelectAcademicDegree($event)">
                                            <option selected disabled>انتخاب کنید</option>
                                            <option v-for="item in AcademicDegree"
                                                    :value="item.degree_of_education_id">
                                                {{item.degree_of_education_title}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>رشته تحصیلی</label>
                                        <select class="form-control" @change="SelectAcademicField($event)">
                                            <option selected disabled>انتخاب کنید</option>
                                            <option v-for="item in AcademicField" :value="item.major_id">
                                                {{item.major_title}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>نام موسسه</label>
                                        <input class="form-control" v-model="academic_institue">
                                    </div>
                                    <div class="col-md-3">
                                        <label>وضعیت تحصیلی</label>
                                        <select class="form-control" @change="SelectAcademicStatus($event)">
                                            <option selected disabled>انتخاب کنید</option>
                                            <option v-for="item in AcademicStatus" :value="item.id">{{item.title}}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>تاریخ شروع تحصیل</label>
                                        <input class="form-control" v-model="academic_start_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label>تاریخ پایان تحصیل</label>
                                        <input class="form-control end-date" v-model="academic_end_date">
                                    </div>
                                    <div class="col-md-3">
                                        <label>معدل</label>
                                        <input class="form-control mark" v-model="mark"
                                               @keyup="ValidateMark($event)">
                                    </div>

                                </div>
                            </div>
                            <div v-if="!AcademyaddStatus" class="add-btn" @click="AddMoreAcademic()"><i
                                    class="fa fa-plus"></i>ایجاد
                                سابقه تحصیلی
                            </div>
                            <div v-if="AcademyaddStatus" class="col-12 save">
                                <div>
                                    <button><i class="fa fa-save"></i>ذخیره سوابق تحصیلی</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="EditAcademy" class="modal fade" role="dialog">
                        <form @submit.prevent="SubmitEditAcademy()">
                            <div>
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">ویرایش سوابق تحصیلی</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>مدرک تحصیلی</label>
                                                        <select class="form-control"
                                                                @change="SelectAcademicDegreeEdit($event)">
                                                            <option selected>{{AcademyObject.degree_of_education_title}}
                                                            </option>
                                                            <option v-for="item in AcademicDegree"
                                                                    :value="item.degree_of_education_id">
                                                                {{item.degree_of_education_title}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>رشته تحصیلی</label>
                                                        <select class="form-control"
                                                                @change="SelectAcademicFieldEdit($event)">
                                                            <option selected>{{AcademyObject.major_title}}</option>
                                                            <option v-for="item in AcademicField"
                                                                    :value="item.major_id">
                                                                {{item.major_title}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>نام موسسه</label>
                                                        <input class="form-control"
                                                               v-model="AcademyObject.collage_name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>وضعیت تحصیلی</label>
                                                        <select class="form-control"
                                                                @change="SelectAcademicStatusEdit($event)">
                                                            <option selected>{{AcademyObject.education_status}}</option>
                                                            <option v-for="item in AcademicStatus" :value="item.id">
                                                                {{item.title}}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>تاریخ شروع تحصیل</label>
                                                        <input class="form-control" v-model="AcademyObject.start_date">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>تاریخ پایان تحصیل</label>
                                                        <input class="form-control end-date"
                                                               v-model="AcademyObject.end_date">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>معدل</label>
                                                        <input class="form-control mark" v-model="AcademyObject.mark"
                                                               @keyup="ValidateMark($event)">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button class="btn btn-default">ویرایش</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xs-12 addSkill">
                    <div class="">
                        <div class="title">
                            مهارت ها
                        </div>
                        <div class="Jobs-list container-fluid text-right" v-for="(skill,index) in SkillList">
                            <div class="row">
                                <div class="col-12 index">{{index+1}}</div>
                                <div class="col-md-3 section">
                                    <span>نام مهارت:</span>
                                    <span>{{skill.skill_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>سطح مهارت:</span>
                                    <span>{{skill.skill_level}}</span>
                                </div>
                                <div class="action col-xs-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditSkill"
                                                  @click="EditSkill(skill.skill_id)">ویرایش</span>
                                            </div>
                                            <div class="delete col-xs-6">
                                                <span @click="DeleteSkill(skill.skill_id)">حذف</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="!SkillList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                        <div class="Extra-Skill">
                            <form @submit.prevent="SubmitSkill()">
                                <div class="container-fluid hidden4">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>نام مهارت</label>
                                            <input class="form-control" v-model="skill_name">
                                        </div>
                                        <div class="col-md-3">
                                            <label>سطح مهارت</label>
                                            <select class="form-control" @change="SelectSkillLevel($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in Level" :value="item.id">{{item.title}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="!SkilladdStatus" class="add-btn" @click="AddMoreSkill()"><i
                                        class="fa fa-plus"></i>ایجاد
                                    مهارت
                                </div>
                                <div v-if="SkilladdStatus" class="col-12 save">
                                    <div>
                                        <button>ذخیره سوابق مهارت ها</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="EditSkill" class="modal fade" role="dialog">
                            <form @submit.prevent="SubmitEditSkill()">
                                <div>
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">ویرایش مهارت ها</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>نام مهارت</label>
                                                            <input class="form-control" v-model="SkillObject.skill_title">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>سطح مهارت</label>
                                                            <select class="form-control" @change="SelectSkillLevelEdit($event)">
                                                                <option selected>{{SkillObject.skill_level}}</option>
                                                                <option v-for="item in Level" :value="item.id">{{item.title}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button class="btn btn-default">ویرایش</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 addSoftware">
                    <div class="">
                        <div class="title">
                            نرم افزار
                        </div>
                        <div v-if="!SoftwareList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                        <div class="Jobs-list container-fluid text-right" v-for="(software,index) in SoftwareList">
                            <div class="row">
                                <div class="col-12 index">{{index+1}}</div>
                                <div class="col-md-3 section">
                                    <span>نام نرم افزار:</span>
                                    <span>{{software.software_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>سطح مهارت:</span>
                                    <span>{{software.software_level}}</span>
                                </div>
                                <div class="action col-xs-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditSoftware"
                                                  @click="EditSoftware(software.software_id)">ویرایش</span>
                                            </div>
                                            <div class="delete col-xs-6">
                                                <span @click="DeleteSoftware(software.software_id)">حذف</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Extra-Software">
                            <form @submit.prevent="SubmitSoftware()">
                                <div class="container-fluid hidden5">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>نام نرم افزار</label>
                                            <input class="form-control" v-model="software_name">
                                        </div>
                                        <div class="col-md-3">
                                            <label>سطح نرم افزار</label>
                                            <select id="select1" class="form-control"
                                                    @change="SelectSoftwareLevel($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in Level" :value="item.id">{{item.title}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="!SoftwareaddStatus" class="add-btn" @click="AddMoreSoftware()"><i
                                        class="fa fa-plus"></i>ایجاد
                                    نرم افزار
                                </div>
                                <div v-if="SoftwareaddStatus" class="col-12 save">
                                    <div>
                                        <button>ذخیره سوابق نرم افزار</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="EditSoftware" class="modal fade" role="dialog">
                            <form @submit.prevent="SubmitEditSoftware()">
                                <div>
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">ویرایش مهارت ها</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>نام مهارت</label>
                                                            <input class="form-control" v-model="SoftwareObject.software_title">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>سطح مهارت</label>
                                                            <select class="form-control" @change="SelectSoftwareLevelEdit($event)">
                                                                <option selected>{{SoftwareObject.software_level}}</option>
                                                                <option v-for="item in Level" :value="item.id">{{item.title}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button class="btn btn-default">ویرایش</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 addLang">
                    <div class="">
                        <div class="title">
                            زبان
                        </div>
                        <div v-if="!LanguageList.length" style="padding: 10px">اطلاعاتی ثبت نشده است</div>
                        <div class="Jobs-list container-fluid text-right" v-for="(lang,index) in LanguageList">
                            <div class="row">
                                <div class="col-12 index">{{index+1}}</div>
                                <div class="col-md-3 section">
                                    <span>نام زبان:</span>
                                    <span>{{lang.language_title}}</span>
                                </div>
                                <div class="col-md-3 section">
                                    <span>سطح مهارت:</span>
                                    <span>{{lang.language_level}}</span>
                                </div>
                                <div class="action col-xs-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="edit col-xs-6 text-left">
                                            <span data-toggle="modal" data-target="#EditLanguage"
                                                  @click="EditLanguage(lang.language_id)">ویرایش</span>
                                            </div>
                                            <div class="delete col-xs-6">
                                                <span @click="DeleteLanguage(lang.language_id)">حذف</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Extra-Lang">
                            <form @submit.prevent="SubmitLang()">
                                <div class="container-fluid hidden6">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label>نام زبان</label>
                                            <input class="form-control" v-model="lang_name">
                                        </div>
                                        <div class="col-md-3">
                                            <label>سطح زبان</label>
                                            <select id="select2" class="form-control" @change="SelectLangLevel($event)">
                                                <option selected disabled>انتخاب کنید</option>
                                                <option v-for="item in Level" :value="item.id">{{item.title}}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="!LangaddStatus" class="add-btn" @click="AddMoreLang()"><i
                                        class="fa fa-plus"></i>ایجاد
                                    زبان
                                </div>
                                <div v-if="LangaddStatus" class="col-12 save">
                                    <div>
                                        <button>ذخیره سوابق زبان</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="EditLanguage" class="modal fade" role="dialog">
                            <form @submit.prevent="SubmitEditLanguage()">
                                <div>
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">ویرایش زبان ها</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>نام زبان</label>
                                                            <input class="form-control" v-model="LanguageObject.language_title">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>سطح زبان</label>
                                                            <select class="form-control" @change="SelectLangLevelEdit($event)">
                                                                <option selected>{{LanguageObject.language_level}}</option>
                                                                <option v-for="item in Level" :value="item.id">{{item.title}}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer text-center">
                                                <button class="btn btn-default">ویرایش</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AddRezume",
        data() {
            return {
                image: '',
                DefaultImage: '/images/LOGO.png',
                name: '',
                lname: '',
                age: '',
                PreviewImg: '',
                maritial: '',
                email: '',
                InfoStatus: false,
                Level: [
                    {id: 'مبتدی', title: 'مبتدی'},
                    {id: 'متوسط', title: 'متوسط'},
                    {id: 'حرفه ای', title: 'حرفه ای'}
                ],
                State: [],
                state: '',
                City: [],
                city: '',
                Region: [],
                region: '',
                aboutme: '',
                InformationStatus: '',
                InformationSingleID:'',
                Information:'',
                // job
                JobList: [],
                JobID: '',
                JobObject: {},
                JobField: [],
                Type: [],
                Duration: [],
                Salary: [],
                job_field: '',
                job_field_title: '',
                job_title: '',
                job_type: '',
                job_type_title: '',
                job_time: '',
                job_time_title: '',
                job_salary: '',
                job_salary_title: '',
                JobaddStatus: false,
                JobTagStatus: false,
                // academic
                AcademicField: [],
                AcademyID: '',
                AcademyObject: {},
                AcademicList: [],
                AcademicDegree: [],
                AcademicStatus: [
                    {id: 'در حال تحصیل', title: 'در حال تحصیل'},
                    {id: 'فارغ التحصیل', title: 'فارغ التحصیل'},
                ],
                academic_degree: '',
                academic_degree_title: '',
                academic_field: '',
                academic_field_title: '',
                academic_status: '',
                academic_institue: '',
                academic_start_date: '',
                academic_end_date: '',
                AcademicTagsList: [],
                AcademyaddStatus: false,
                AcademyTagStatus: false,
                mark: '',
                validmark: '',
                // skill
                SkillList: [],
                SkillObject: {},
                SkillID: '',
                SkilladdStatus: false,
                SkillTagStatus: false,
                skill_name: '',
                skill_level: '',
                SkillTagsList: [],
                // software
                SoftwareList: [],
                SoftwareObject: {},
                SoftwareID:'',
                SoftwareaddStatus: false,
                SoftwareTagStatus: false,
                software_name: '',
                software_level: '',
                SoftwareTagsList: [],
                // language
                LanguageList: [],
                LanguageObject: {},
                LanguageID: '',
                LangaddStatus: false,
                LangTagStatus: false,
                lang_name: '',
                lang_level: '',
                LangTags: [],//send to api
                LangTagsList: [],
            }
        },
        methods: {
            DisplayInfo() {
                $('.information').slideDown();
                $('.Extras').slideUp();
                $('.btns').slideUp();
                this.InfoStatus = false;
            },
            DisplayAcademy() {
                $('.academy-btn').addClass('active2');
                $('.skill-btn').removeClass('active2');
                $('.job-btn').removeClass('active2');
                $('.software-btn').removeClass('active2');
                $('.lang-btn').removeClass('active2');
                $('.addAcademy').slideDown();
                $('.addJob').slideUp();
                $('.addSkill').slideUp();
                $('.addSoftware').slideUp();
                $('.addLang').slideUp();
            },
            DisplayJob() {
                $('.job-btn').addClass('active2');
                $('.skill-btn').removeClass('active2');
                $('.academy-btn').removeClass('active2');
                $('.software-btn').removeClass('active2');
                $('.lang-btn').removeClass('active2');
                $('.addJob').slideDown();
                $('.addAcademy').slideUp();
                $('.addSkill').slideUp();
                $('.addSoftware').slideUp();
                $('.addLang').slideUp();
            },
            DisplaySkill() {
                $('.skill-btn').addClass('active2');
                $('.job-btn').removeClass('active2');
                $('.academy-btn').removeClass('active2');
                $('.software-btn').removeClass('active2');
                $('.lang-btn').removeClass('active2');
                $('.addSkill').slideDown();
                $('.addAcademy').slideUp();
                $('.addJob').slideUp();
                $('.addSoftware').slideUp();
                $('.addLang').slideUp();
            },
            DisplaySoftware() {
                $('.software-btn').addClass('active2');
                $('.job-btn').removeClass('active2');
                $('.academy-btn').removeClass('active2');
                $('.skill-btn').removeClass('active2');
                $('.lang-btn').removeClass('active2');
                $('.addSoftware').slideDown();
                $('.addAcademy').slideUp();
                $('.addJob').slideUp();
                $('.addSkill').slideUp();
                $('.addLang').slideUp();
            },
            DisplayLang() {
                $('.lang-btn').addClass('active2');
                $('.job-btn').removeClass('active2');
                $('.academy-btn').removeClass('active2');
                $('.skill-btn').removeClass('active2');
                $('.software-btn').removeClass('active2');
                $('.addLang').slideDown();
                $('.addAcademy').slideUp();
                $('.addJob').slideUp();
                $('.addSkill').slideUp();
                $('.addSoftware').slideUp();
            },
            // info
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
                this.avatar = event.target.files[0];
                let ImageSize = this.avatar .size / 1024 / 1024; //mb
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
                    this.avatar  = e.target.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            },
            MaritialStatus(event) {
                this.maritial = event.target.value;
            },
            MaritialStatusEdit(event) {
                this.maritial = event.target.value;
                this.Information.status = this.maritial
            },
            SelectState() {
                this.state = event.target.value;
                axios.get(`/farasho/Option/city/${this.state}`)
                    .then(response => {
                        this.City = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectStateEdit() {
                this.state = event.target.value;
                this.Information.state = this.state
                axios.get(`/farasho/Option/city/${this.state}`)
                    .then(response => {
                        this.City = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectCity() {
                this.city = event.target.value;
                axios.get(`/farasho/Option/region/${this.city}`)
                    .then(response => {
                        this.Region = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectCityEdit() {
                this.city = event.target.value;
                this.Information.city = this.city;
                axios.get(`/farasho/Option/region/${this.city}`)
                    .then(response => {
                        this.Region = response.data
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            SelectRegion() {
                this.region = event.target.value;
            },
            SelectRegionEdit() {
                this.region = event.target.value;
                this.Information.region = this.region;
            },
            // ----preview----
            SaveInformation() {
                if(!this.age ||
                    !this.maritial ||
                    !this.email ||
                    !this.name ||
                    !this.lname ||
                    !this.state ||
                    !this.city ||
                    !this.region ||
                    !this.aboutme){
                    swal({
                        title: "عملیات ناموفق",
                        text: "لطفا تمامی اطلاعات را وارد نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                    return;
                }
                console.log(this.image)

                let formdata = new FormData();
                formdata.append('name', this.name);
                formdata.append('last_name', this.lname);
                formdata.append('age', this.age);
                formdata.append('avatar', this.image);
                formdata.append('email', this.email);
                formdata.append('status', this.maritial);
                formdata.append('state_id', this.state);
                formdata.append('city_id', this.city);
                formdata.append('region_id', this.region);
                formdata.append('about_me', this.aboutme);
                axios.post('/farasho/AddRezume/store', formdata)
                    .then(response => {
                        this.User = response.data[0];
                        console.log(this.User, 'user');
                    })
                    .catch(error => {
                        console.log(error)
                    });
                $('.information').slideUp();
                $('.Extras').slideDown();
                $('.buttons').css('display', 'block');
                $('.addAcademy').css('display', 'block');
                this.InfoStatus = true;
                $('.displayinfo').css('display','block')
                $('.btns').slideDown();

            },
            UpdateInformation() {
                // if(!this.age ||
                //     !this.maritial ||
                //     !this.email ||
                //     !this.state ||
                //     !this.city ||
                //     !this.region ||
                //     !this.aboutme){
                //     swal({
                //         title: "عملیات ناموفق",
                //         text: "لطفا تمامی اطلاعات را وارد نمایید.",
                //         icon: "error",
                //         button: "تایید",
                //     });
                //     return;
                // }
                // if(this.Information.avatar)
                if(this.Information.avatar == null){
                    this.avatar = this.DefaultImage;
                }
                console.log(this.avatar,'updateavatar')
                let formdata = new FormData();
                formdata.append('name', this.Information.name);
                formdata.append('last_name', this.Information.lname);
                formdata.append('age', this.Information.age);
                formdata.append('avatar', this.avatar);
                formdata.append('email', this.Information.email);
                formdata.append('status', this.Information.status);
                formdata.append('state_id', this.Information.state_id);
                formdata.append('city_id', this.Information.city_id);
                formdata.append('region_id', this.Information.region_id);
                formdata.append('about_me', this.Information.about_me);
                axios.post(`/farasho/AddRezume/update/${this.InformationSingleID}`, formdata)
                    .then(response => {
                        this.User = response.data[0];
                        console.log(this.User, 'user');
                    })
                    .catch(error => {
                        console.log(error)
                    });
                $('.information').slideUp();
                $('.Extras').slideDown();
                $('.buttons').css('display', 'block');
                $('.addAcademy').css('display', 'block');
                this.InfoStatus = true;
                $('.displayinfo').css('display','block');
                $('.btns').slideDown();

            },
            //---- job------
            AddMoreJob() {
                this.JobaddStatus = true;
                $('.hidden2').slideDown();
                $('.Extra-job').css('paddingTop', '10px');
            },
            SelectJobField(event) {
                this.job_field = event.target.value;
                this.job_field_title = this.JobField.find(item => item.activity_id == this.job_field).activity_title;
                console.log(this.job_field_title)
            },
            SelectJobFieldEdit(event) {
                this.job_field = event.target.value;
                this.JobObject.activity_id = this.job_field;
                this.job_field_title = this.JobField.find(item => item.activity_id == this.job_field).activity_title;
                console.log(this.job_field_title)
            },
            SelectJobType(event) {
                this.job_type = event.target.value;
                this.job_type_title = this.Type.find(item => item.cooperation_id == this.job_type).cooperation_title;

            },
            SelectJobTypeEdit(event) {
                this.job_type = event.target.value;
                this.JobObject.cooperation_id = this.job_type;
                this.job_type_title = this.Type.find(item => item.cooperation_id == this.job_type).cooperation_title;

            },
            SelectJobSalary(event) {
                this.job_salary = event.target.value;
                this.job_salary_title = this.Salary.find(item => item.salary_id == this.job_salary).salary_title;
            },
            SelectJobSalaryEdit(event) {
                this.job_salary = event.target.value;
                this.JobObject.salary_id = this.job_salary;
                this.job_salary_title = this.Salary.find(item => item.salary_id == this.job_salary).salary_title;
            },
            SelectJobTime(event) {
                this.job_time = event.target.value;
                this.job_time_title = this.Duration.find(item => item.activity_time_id == this.job_time).activity_time_title;

            },
            SelectJobTimeEdit(event) {
                this.job_time = event.target.value;
                this.JobObject.activity_time_id = this.job_time;
                this.job_time_title = this.Duration.find(item => item.activity_time_id == this.job_time).activity_time_title;

            },
            SubmitJob() {
                let formdata = new FormData();
                formdata.append('salary_id', this.job_salary);
                formdata.append('activity_id', this.job_field);
                formdata.append('job_title', this.job_title);
                formdata.append('cooperation_id', this.job_type);
                formdata.append('activity_time_id', this.job_time);
                axios.post('/farasho/AddJob/store', formdata)
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error)
                    });
                let newJob = [];
                newJob.push({
                    job_title: this.job_title,
                    cooperation_id: this.job_type,
                    cooperation_title: this.job_type_title,
                    activity_id: this.job_field,
                    activity_title: this.job_field_title,
                    activity_time_id: this.job_time,
                    activity_time_title: this.job_time_title,
                    salary_id: this.job_salary,
                    salary_title: this.job_salary_title
                });
                this.JobList = this.JobList.concat(newJob);
                $('.hidden2').slideUp();
                this.JobaddStatus = false
            },
            EditJob(ID) {
                this.JobID = ID;
                this.JobObject = this.JobList.find(item => item.id == this.JobID);
                console.log(this.JobObject);
            },
            DeleteJob(ID) {
                this.JobID = ID;
                this.JobList = this.JobList.filter(item => !(item.id == this.JobID));
                axios.delete(`/farasho/AddJob/delete/${this.JobID}`)
                    .then(response => {
                        console.log(response)
                        alert('حذف شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            SubmitEditJob() {
                let formdata = new FormData();
                formdata.append('salary_id', this.JobObject.salary_id);
                formdata.append('activity_id', this.JobObject.activity_id);
                formdata.append('job_title', this.JobObject.job_title);
                formdata.append('cooperation_id', this.JobObject.cooperation_id);
                formdata.append('activity_time_id', this.JobObject.activity_time_id);
                if (
                    this.JobObject.salary_id == '' ||
                    this.JobObject.activity_id == '' ||
                    this.JobObject.job_title == '' ||
                    this.JobObject.cooperation_id == '' ||
                    this.JobObject.activity_time_id == ''
                ) {
                    swal({
                        title: "عملیات ناموفق!",
                        text: "لطفا تمامی موارد را انتخاب نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                }
                axios.post(`/farasho/AddJob/update/${this.JobID}`, formdata)
                    .then(response => {
                        console.log(response)
                        alert('بروزرسانی شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            // -----academic-----
            AddMoreAcademic() {
                this.AcademyaddStatus = true;
                $('.hidden3').slideDown();
                $('.Extra-Academy').css('paddingTop', '10px');
            },
            SelectAcademicDegree(event) {
                this.academic_degree = event.target.value;
                this.academic_degree_title = this.AcademicDegree.find(
                    item => item.degree_of_education_id == this.academic_degree).degree_of_education_title;
            },
            SelectAcademicDegreeEdit(event) {
                this.academic_degree = event.target.value;
                this.AcademyObject.degree_of_education_id = this.academic_degree;
                this.academic_degree_title = this.AcademicDegree.find(
                    item => item.degree_of_education_id == this.academic_degree).degree_of_education_title;
            },
            SelectAcademicField(event) {
                this.academic_field = event.target.value;
                this.academic_field_title = this.AcademicField.find(
                    item => item.major_id == this.academic_field).major_title;
            },
            SelectAcademicFieldEdit(event) {
                this.academic_field = event.target.value;
                this.AcademyObject.major_id = this.academic_field;
                this.academic_field_title = this.AcademicField.find(
                    item => item.major_id == this.academic_field).major_title;
            },
            SelectAcademicStatus(event) {
                this.academic_status = event.target.value;
                if (this.academic_status == 'در حال تحصیل') {
                    $('.end-date').attr('disabled', true)
                } else {
                    $('.end-date').attr('disabled', false)
                }
            },
            SelectAcademicStatusEdit(event) {
                this.academic_status = event.target.value;
                if (this.academic_status == 'در حال تحصیل') {
                    $('.end-date').attr('disabled', true)
                } else {
                    $('.end-date').attr('disabled', false)
                }
                this.AcademyObject.education_status = this.academic_status;
            },
            ValidateMark(event) {
                this.validmark = event.target.value;
                if (this.validmark > 20 || this.validmark.length > 2) {
                    swal({
                        title: "خطا!",
                        text: "معدل باید عددی بین 10 تا 20 باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    this.mark = '';
                    $('.mark').val('')
                    // return;

                }
            },
            SubmitAcademic() {
                if (this.validmark < 10) {
                    swal({
                        title: "خطا!",
                        text: "معدل باید عددی بین 10 تا 20 باشد.",
                        icon: "error",
                        button: "تایید",
                    });
                    this.mark = '';
                    $('.mark').val('');
                    return;

                }
                let newAcademic = [];
                newAcademic.push({
                    education_status: this.academic_status,
                    mark: this.mark,
                    collage_name: this.academic_institue,
                    start_date: this.academic_start_date,
                    end_date: this.academic_end_date,
                    degree_of_education: this.degree_of_education,
                    major_id: this.academic_field,
                    major_title: this.academic_field_title,
                    degree_of_education_id: this.academic_degree,
                    degree_of_education_title: this.academic_degree_title

                });
                this.AcademicList = this.AcademicList.concat(newAcademic);
                console.log(this.AcademicList);
                let formdata = new FormData();
                formdata.append('degree_of_education_id', this.academic_degree);
                formdata.append('major_id', this.academic_field);
                formdata.append('collage_name', this.academic_institue);
                formdata.append('education_status', this.academic_status);
                formdata.append('start_date', this.academic_start_date);
                formdata.append('end_date', this.academic_end_date);
                formdata.append('mark', this.mark);
                axios.post('/farasho/Academy/store', formdata)
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error)
                    });
                this.AcademyaddStatus = false;
                $('.hidden3').slideUp();

            },
            EditAcademy(ID) {
                this.AcademyID = ID;
                this.AcademyObject = this.AcademicList.find(item => item.id == this.AcademyID);
                console.log(this.AcademyObject);
            },
            DeleteAcademy(ID) {
                this.AcademyID = ID;
                this.AcademicList = this.AcademicList.filter(item => !(item.id == this.AcademyID));
                axios.delete(`/farasho/Academy/delete/${this.AcademyID}`)
                    .then(response => {
                        console.log(response)
                        alert('حذف شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            SubmitEditAcademy() {
                let formdata = new FormData();
                formdata.append('degree_of_education_id', this.AcademyObject.degree_of_education_id);
                formdata.append('major_id', this.AcademyObject.major_id);
                formdata.append('collage_name', this.AcademyObject.collage_name);
                formdata.append('education_status', this.AcademyObject.education_status);
                formdata.append('start_date', this.AcademyObject.start_date);
                formdata.append('end_date', this.AcademyObject.end_date);
                formdata.append('mark', this.AcademyObject.mark);
                if (
                    this.AcademyObject.degree_of_education_id == '' ||
                    this.AcademyObject.major_id == '' ||
                    this.AcademyObject.collage_name == '' ||
                    this.AcademyObject.education_status == '' ||
                    this.AcademyObject.start_date == '' ||
                    this.AcademyObject.mark == ''
                ) {
                    swal({
                        title: "عملیات ناموفق!",
                        text: "لطفا تمامی موارد را انتخاب نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                }
                if (this.AcademyObject.end_date == '') {
                    this.AcademyObject.end_date == 'در حال تحصیل'
                }
                axios.post(`/farasho/Academy/update/${this.AcademyID}`, formdata)
                    .then(response => {
                        console.log(response)
                        alert('ویرایش شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            // ---skill
            SelectSkillLevel(event) {
                this.skill_level = event.target.value;
            },
            SelectSkillLevel(event) {
                this.skill_level = event.target.value;
                this.SkillObject.skill_level = this.skill_level;
            },
            AddMoreSkill() {
                this.SkilladdStatus = true;
                $('.hidden4').slideDown();
                $('.Extra-Skill').css('paddingTop', '10px');
            },
            SubmitSkill() {
                let newSkill = [];
                newSkill.push({
                    skill_title: this.skill_name,
                    skill_level: this.skill_level,
                });
                this.SkillList = this.SkillList.concat(newSkill);

                let formdata = new FormData();
                formdata.append('skill_title', this.skill_name);
                formdata.append('skill_level', this.skill_level);
                axios.post('/farasho/Skill/store', formdata)
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error)
                    });
                this.SkilladdStatus = false;
                $('.hidden4').slideUp();
            },
            EditSkill(ID) {
                this.SkillID = ID;
                this.SkillObject = this.SkillList.find(item => item.skill_id == this.SkillID);
                console.log(this.SkillObject);
            },
            DeleteSkill(ID) {
                this.SkillID = ID;
                this.SkillList = this.SkillList.filter(item => !(item.skill_id == this.SkillID));
                axios.delete(`/farasho/Skill/delete/${this.SkillID}`)
                    .then(response => {
                        console.log(response)
                        alert('حذف شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            SubmitEditSkill() {
                console.log(this.SkillID)
                let formdata = new FormData();
                formdata.append('skill_title', this.SkillObject.skill_title);
                formdata.append('skill_level', this.SkillObject.skill_level);
                if (
                    this.SkillObject.skill_title == '' ||
                    this.SkillObject.skill_level == ''

                ) {
                    swal({
                        title: "عملیات ناموفق!",
                        text: "لطفا تمامی موارد را انتخاب نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                }
                axios.post(`/farasho/Skill/update/${this.SkillID}`, formdata)
                    .then(response => {
                        console.log(response)
                        alert('ویرایش شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            // ---software
            SelectSoftwareLevel(event) {
                this.software_level = event.target.value;
            },
            SelectSoftwareLevelEdit(event) {
                this.software_level = event.target.value;
                this.SoftwareObject.software_level = this.software_level;
            },
            AddMoreSoftware() {
                this.SoftwareaddStatus = true;
                $('.hidden5').slideDown();
                $('.Extra-Software').css('paddingTop', '10px');
            },
            SubmitSoftware() {
                this.SoftwareTagStatus = true;
                let newSoftware = [];
                newSoftware.push({
                    software_title: this.software_name,
                    software_level: this.software_level,
                });
                this.SoftwareList = this.SoftwareList.concat(newSoftware);
                let formdata = new FormData();
                formdata.append('software_title', this.software_name);
                formdata.append('software_level', this.software_level);
                axios.post('/farasho/Software/store', formdata)
                    .then(response => {
                        console.log(response)
                        // console.log(this.Id,'thisId')
                    })
                    .catch(error => {
                        console.log(error)
                    });
                this.SoftwareaddStatus = false;
                $('.hidden5').slideUp();
            },
            EditSoftware(ID) {
                this.SoftwareID = ID;
                this.SoftwareObject = this.SoftwareList.find(item => item.software_id == this.SoftwareID);
                console.log(this.SoftwareObject);
            },
            DeleteSoftware(ID) {
                this.SoftwareID = ID;
                this.SoftwareList = this.SoftwareList.filter(item => !(item.software_id == this.SoftwareID));
                axios.delete(`/farasho/Software/delete/${this.SoftwareID}`)
                    .then(response => {
                        console.log(response);
                        alert('حذف شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            SubmitEditSoftware() {
                console.log(this.SoftwareID);
                let formdata = new FormData();
                formdata.append('software_title', this.SoftwareObject.software_title);
                formdata.append('software_level', this.SoftwareObject.software_level);
                if (
                    this.SoftwareObject.software_title == '' ||
                    this.SoftwareObject.software_level == ''

                ) {
                    swal({
                        title: "عملیات ناموفق!",
                        text: "لطفا تمامی موارد را انتخاب نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                }
                axios.post(`/farasho/Software/update/${this.SoftwareID}`, formdata)
                    .then(response => {
                        console.log(response)
                        alert('ویرایش شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            // ---language
            SelectLangLevel(event) {
                this.lang_level = event.target.value;
            },
            SelectLangLevelEdit(event) {
                this.lang_level = event.target.value;
                this.LanguageObject.language_level = this.lang_level
            },
            AddMoreLang() {
                this.LangaddStatus = true;
                $('.hidden6').slideDown();
                $('.Extra-Lang').css('paddingTop', '10px');
            },
            SubmitLang() {
                this.LangTagStatus = true;
                let newLanguage = [];
                newLanguage.push({
                    language_title: this.lang_name,
                    language_level: this.lang_level,
                });
                this.LanguageList = this.LanguageList.concat(newLanguage);

                let formdata = new FormData();
                formdata.append('language_title', this.lang_name);
                formdata.append('language_level', this.lang_level);
                axios.post('/farasho/Language/store', formdata)
                    .then(response => {
                        console.log(response)
                    })
                    .catch(error => {
                        console.log(error)
                    });
                this.LangaddStatus = false;
                $('.hidden6').slideUp();
            },
            EditLanguage(ID) {
                this.LanguageID = ID;
                this.LanguageObject = this.LanguageList.find(item => item.language_id == this.LanguageID);
                console.log(this.LanguageObject);
            },
            DeleteLanguage(ID) {
                this.LanguageID = ID;
                this.LanguageList = this.LanguageList.filter(item => !(item.language_id == this.LanguageID));
                axios.delete(`/farasho/Language/delete/${this.LanguageID}`)
                    .then(response => {
                        console.log(response);
                        alert('حذف شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            SubmitEditLanguage() {
                console.log(this.LanguageID);
                let formdata = new FormData();
                formdata.append('language_title', this.LanguageObject.language_title);
                formdata.append('language_level', this.LanguageObject.language_level);
                if (
                    this.LanguageObject.language_title == '' ||
                    this.LanguageObject.language_level == ''

                ) {
                    swal({
                        title: "عملیات ناموفق!",
                        text: "لطفا تمامی موارد را انتخاب نمایید.",
                        icon: "error",
                        button: "تایید",
                    });
                }
                axios.post(`/farasho/Language/update/${this.LanguageID}`, formdata)
                    .then(response => {
                        console.log(response)
                        alert('ویرایش شد')
                    })
                    .catch(error => {
                        console.log(error)
                    });
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
            GetStatus() {
                axios.get('/farasho/AddRezume/rezumeStatus')
                    .then(response => {
                        this.InformationStatus = response.data.status;
                        this.InformationSingleID = response.data.id;
                        console.log(this.InformationStatus, 'InformationStatus');
                        console.log(this.InformationSingleID, 'InformationSingleID')
                        this.GetUpdate()
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },
            GetUpdate() {
                if (this.InformationStatus == 1) {

                    axios.get(`/farasho/AddRezume/edit/${this.InformationSingleID}`)
                        .then(response => {
                            this.Information = response.data.rezume;
                            console.log(this.Information,'Information');
                            console.log(this.InformationStatus,'InformationStatus')
                        })
                        .catch(error => {
                            console.log(error)
                        })
                }
            },
            GetField() {
                axios.get('/farasho/Option/major')
                    .then(response => {
                        this.AcademicField = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetDegree() {
                axios.get('/farasho/Option/degreeOfEducation')
                    .then(response => {
                        this.AcademicDegree = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetCooperationType() {
                axios.get('/farasho/Option/cooperation')
                    .then(response => {
                        this.Type = response.data;

                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetSalary() {
                axios.get('/farasho/Option/salary')
                    .then(response => {
                        this.Salary = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
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
            GetDuration() {
                axios.get('/farasho/Option/activityTime')
                    .then(response => {
                        this.Duration = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetJobList() {
                axios.get('/farasho/AddJob/list')
                // axios.get(`/farasho/AddJob/edit/${this.InformationSingleID}`)
                    .then(response => {
                        this.JobList = response.data;

                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetAcademyList() {
                axios.get('/farasho/Academy/list')
                    .then(response => {
                        this.AcademicList = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetSkillList() {
                axios.get('/farasho/Skill/list')
                    .then(response => {
                        this.SkillList = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetSoftwareList() {
                axios.get('/farasho/Software/list')
                    .then(response => {
                        this.SoftwareList = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetLanguageList() {
                axios.get('/farasho/Language/list')
                    .then(response => {
                        this.LanguageList = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                    });
            },
            GetRezumeStatus(){
                axios.get('/farasho/AddBusiness/BusinessStatus')
                    .then(response => {
                        this.Status = response.data.status;
                        this.SingleID = response.data.id;
                        console.log(this.Status, 'statusss');
                        console.log(this.SingleID, 'IDDD');

                    })
                    .catch(error => {
                        console.log(error)
                    })
            }

        },

        created() {
            this.GetState();
            this.GetStatus();
            this.GetField();
            this.GetDegree();
            this.GetCooperationType();
            this.GetSalary();
            this.GetActivity();
            this.GetDuration();
            //lists
            this.GetJobList();
            this.GetAcademyList();
            this.GetSkillList();
            this.GetSoftwareList();
            this.GetLanguageList();
            this.GetRezumeStatus();
        }
    }
</script>

<style>
    .addJob,
    .addAcademy,
    .addLang,
    .addSoftware,
    .addSkill {
        display: none;
        margin-top: 20px;
    }

    .button-1 {
        border-radius: 10px;
        padding: 7px 5px;
        background: #386b97;
        color: white;
        cursor: pointer;
        margin-top: 10px
    }

    .active2 {
        background: #81328e;
    }
    .displayinfo{
        display: block;
    }
</style>