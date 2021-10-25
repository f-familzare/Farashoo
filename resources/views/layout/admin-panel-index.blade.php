<!DOCTYPE html>
<html lang="fa">

<head>
    <base href="/" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}">


    <title>مدیریت وب سایت</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">پنل نیباک</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> نام مدیر <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> پروفایل</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> صندوق ورودی</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> تنظیمات</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> خروج</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <router-link :to="{name:'Dashboard'}"><i class="fa fa-fw fa-dashboard"></i>داشبورد</router-link>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#Profile"><i class="fa fa-fw fa-users"></i>پروفایل<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="Profile" class="collapse">
                        <li>
                            <router-link :to="{name:'Account'}">حساب کاربری</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'UsersList'}">لیست کاربران</router-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#content"><i class="fa fa-fw fa-file-text"></i>تولید محتوا<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="content" class="collapse">
                        <li>
                            <router-link :to="{name:'Article'}">تولید محتوای متنی</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Portfolio'}">بارگذاری نمونه کارها</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'PricePlan'}">پلن های قیمتی</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'SlideShow'}">اسلایدشوها</router-link>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#Reports"><i class="fa fa-fw fa-tasks"></i>گزارش<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="Reports" class="collapse">
                        <li>
                            <router-link :to="{name:'ReportFollowUp'}">پیگیری</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportTasks'}">وظایف</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportFactors'}">فاکتورها</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportTickets'}">تیکت ها</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportUsers'}">کاربران</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportContent'}">تولید محتوا</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportOrders'}">سفارشات</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportWorks'}">گزارش کار</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportFile'}">فایل</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportSends'}">مرسولات</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportProject'}">تحویل پروژه</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'ReportContract'}">قراردادها</router-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <router-link :to="{name:'Orders'}">سفارشات</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Setting'}"><i class="fa fa-fw fa-tasks"></i>تنظیمات</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Tickets'}">تیکت ها</router-link>
                </li>
                <li>
                    <router-link :to="{name:'WorkReport'}">گزارش کار</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Chats'}">گفت و گو</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Group'}">انجمن</router-link>
                </li>
                <li>
                    <router-link :to="{name:'File'}">فایل</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Sends'}">مرسوله</router-link>
                </li>
                <li>
                    <router-link :to="{name:'ProjectDelivery'}">تحویل پروژه</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Contract'}">قراردادها</router-link>
                </li>
                <li>
                    <router-link :to="{name:'Contacts'}">مخاطبین</router-link>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#Tasks"><i class="fa fa-fw fa-file-text"></i>وظایف<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="Tasks" class="collapse">
                        <li>
                            <router-link :to="{name:'ReportUsersTasks'}">گزارش کار کاربران</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'AddTasks'}">افزودن وظایف</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'NewTasks'}">وظایف جدید</router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'AllTasks'}">کل وظایف</router-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <router-link :to="{name:'Roles'}">نقش ها</router-link>
                </li>

                <li>
                    <router-link :to="{name:'Access'}">نوع دسترسی ها</router-link>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper" class="text-center" style="padding-top: 55px">

        <div class="container-fluid">


            <!-- /.row -->
            {{--<router-view></router-view>--}}
        <dashboard-component></dashboard-component>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/vue.js')}}"></script>
{{--<script src="{{asset('/js/index.js')}}"></script>--}}


</body>

</html>
