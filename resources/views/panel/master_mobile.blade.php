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
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="panel-logo" href="/"><img src="/images/LOGO.png"></a>
            <a class="navbar-brand" href="/">پنل نیباک</a>
        </div>
        <ul class="nav navbar-right top-nav">
            <li>
                <a href="#"><i class="fa fa-fw fa-power-off"></i>خروج</a>
            </li>

            <li>
                <a ><i class="fa fa-fw fa-envelope"></i>ورود به سایت </a>


            <li>
                <a ><i class="fa fa-fw fa-envelope"></i>پیام ها</a>
            </li>
            <li class="divider"></li>

        </ul>
    </nav>

    <div class="materialContainer modal fade" id="modalLRForm">
        <p class="login-text close-modal-btn" data-dismiss="modal">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-close fa-stack-1x"></i>
            </span>
        </p>
        <form class="login-form">
            <p class="login-text">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-lock fa-stack-1x"></i>
            </span>
            </p>
            <input type="email" class="login-username form-control" autofocus="true" required="true" placeholder="ایمیل یا نام کاربری" />
            <input type="password" class="login-password form-control" required="true" placeholder="رمز عبور" />
            <input type="submit" name="Login" value="ورود" class="login-submit form-control submit-btn" />
            <a href="#" class="login-forgot-pass">رمز عبور خود را فراموش کرده اید؟</a>
        </form>

        <div class="underlay-photo"></div>
        <div class="underlay-black"></div>
    </div>
    <div class="materialContainer modal fade" id="SignUp">
        <p class="login-text close-modal-btn" data-dismiss="modal">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-close fa-stack-1x"></i>
            </span>
        </p>
        <form class="login-form">
            <p class="login-text">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-lock fa-stack-1x"></i>
            </span>
            </p>
            <input style="background: #d3d3d35c" type="email" class="login-username form-control" autofocus="true" required="true" placeholder="ایمیل" />
            <input style="background: #d3d3d35c" type="text" class="login-username form-control" autofocus="true" required="true" placeholder="نام کاربری" />
            <input type="password" class="login-password form-control" required="true" placeholder="رمز عبور" />
            <input type="password" class="login-password form-control" required="true" placeholder="تکرار عبور" />
            <input type="submit" name="Login" value="ورود" class="login-submit form-control submit-btn" />
        </form>

        <div class="underlay-photo"></div>
        <div class="underlay-black"></div>
    </div>
    <div id="accordian">
        <ul>
            <li>
                <h3><span class="icon-dashboard"></span><i class="fa fa-user"></i>پروفایل</h3>
                <ul>
                    <li><router-link :to="{name:'Account'}">حساب کاربری</router-link></li>
                    <li><router-link :to="{name:'UsersList'}">لیست کاربران</router-link></li>
                </ul>
            </li>
            <!-- we will keep this LI open by default -->
            <li>
                <h3><span class="icon-tasks"></span><i class="fa fa-pencil"></i>تولید محتوا</h3>
                <ul>
                    <li><router-link :to="{name:'Article'}">تولید محتوای متنی</router-link></li>
                    <li><router-link :to="{name:'Portfolio'}">بارگذاری نمونه کارها</router-link></li>
                    <li><router-link :to="{name:'PricePlan'}">پلن های قیمتی</router-link></li>
                    <li><router-link :to="{name:'SlideShow'}">اسلایدشوها</router-link></li>
                </ul>
            </li>
            <li>
                <h3><span class="icon-calendar"></span><i class="fa fa-book"></i>گزارش</h3>
                <ul>
                    <li> <router-link :to="{name:'ReportFollowUp'}">پیگیری</router-link></li>
                    <li><router-link :to="{name:'ReportTasks'}">وظایف</router-link></li>
                    <li><router-link :to="{name:'ReportFactors'}">فاکتورها</router-link></li>
                    <li><router-link :to="{name:'ReportTickets'}">تیکت ها</router-link></li>
                    <li><router-link :to="{name:'ReportUsers'}">کاربران</router-link></li>
                    <li><router-link :to="{name:'ReportContent'}">تولید محتوا</router-link></li>
                    <li><router-link :to="{name:'ReportOrders'}">سفارشات</router-link></li>
                    <li><router-link :to="{name:'ReportWorks'}">گزارش کار</router-link></li>
                    <li><router-link :to="{name:'ReportFile'}">فایل</router-link></li>
                    <li><router-link :to="{name:'ReportSends'}">مرسولات</router-link></li>
                    <li><router-link :to="{name:'ReportProject'}">تحویل پروژه</router-link></li>
                    <li><router-link :to="{name:'ReportContract'}">قراردادها</router-link></li>
                </ul>
            </li>
            <li>
                <h3><span class="icon-tasks"></span><i class="fa fa-shopping-cart"></i>سفارشات</h3>
                <ul>
                    <li><router-link :to="{name:'OrderForm'}">ثبت سفارش</router-link></li>
                    <li><router-link :to="{name:'OrderTable'}">مشاهده سفارشات</router-link></li>
                </ul>
            </li>
            <li class="single"><h3><li>
                <router-link :to="{name:'Setting'}"><i class="fa fa-cogs"></i>تنظیمات</router-link>
            </li></h3></li>
            <li>
                <h3><span class="icon-heart"></span><i class="fa fa-ticket"></i>تیکت ها</h3>
                <ul>
                    <li><router-link :to="{name:'TicketForm'}">ثبت تیکت</router-link></li>
                    <li><router-link :to="{name:'TicketTable'}">مشاهده تیکت ها</router-link></li>
                </ul>
            </li>
            <li>
                <h3><span class="icon-heart"></span><i class="fa fa-edit"></i>گزارش کار</h3>
                <ul>
                    <li><router-link :to="{name:'WorkReportForm'}">افزودن گزارش کار</router-link></li>
                    <li><router-link :to="{name:'WorkReportTable'}">مشاهده گزارش کار</router-link></li>
                </ul>
            </li>
            <li class="single"><h3><li>
                <router-link :to="{name:'Chats'}"><i class="fa fa-comments-o"></i>گفت و گو</router-link>
            </li></h3></li>
            <li class="single"><h3><li>
                <router-link :to="{name:'Group'}"><i class="fa fa-group"></i>انجمن</router-link>
            </li></h3></li>
            <li>
                <h3><span class="icon-heart"></span><i class="fa fa-file"></i>فایل</h3>
                <ul>
                    <li><router-link :to="{name:'FileForm'}">بارگزاری فایل</router-link></li>
                    <li><router-link :to="{name:'FileTable'}">مشاهده فایل ها</router-link></li>
                </ul>
            </li>
            <li>
                <h3><span class="icon-heart"></span><i class="fa fa-paper-plane"></i>مرسوله</h3>
                <ul>
                    <li><router-link :to="{name:'SendsForm'}">افزودن مرسوله</router-link></li>
                    <li><router-link :to="{name:'SendsTable'}">مشاهده مرسوله</router-link></li>
                </ul>
            </li>
            {{--<li class="single"><h3><li>--}}
            {{--<router-link :to="{name:'ProjectDelivery'}"><i class="fa fa-tasks"></i>تحویل پروژه</router-link>--}}
            {{--</li></h3></li>--}}
            <li>
                <h3><span class="icon-heart"></span><i class="fa fa-folder"></i>تحویل پروژه</h3>
                <ul>
                    <li><router-link :to="{name:'ProjectDeliveryForm'}">افزودن پروژه</router-link></li>
                    <li><router-link :to="{name:'ProjectDeliveryTable'}">مشاهده پروژه</router-link></li>
                </ul>
            </li>
            <li class="single"><h3><li>
                <router-link :to="{name:'Contract'}"><i class="fa fa-archive"></i>قراردادها</router-link>
            </li></h3></li>
            <li class="single"><h3><li>
                <router-link :to="{name:'Contacts'}"><i class="fa fa-group"></i>مخاطبین</router-link>
            </li></h3></li>
            <li>
                <h3><span class="icon-calendar"></span><i class="fa fa-tasks"></i>وظایف</h3>
                <ul>
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
            <li class="single"><h3><li>
                <router-link :to="{name:'Roles'}"><i class="fa fa-list"></i>نقش ها</router-link>
            </li></h3></li>
            <li class="single"><h3><li>
                <router-link :to="{name:'Access'}"><i class="fa fa-eye"></i>نوع دسترسی ها</router-link>
            </li></h3></li>
        </ul>
    </div>

    <div id="page-wrapper" class="text-center" style="padding-top: 55px">

        <div class="container-fluid">
            <dashboard-component></dashboard-component>
        </div>
    </div>
</div>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/vue.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#accordian h3").click(function(){
            //slide up all the link lists
            $("#accordian ul ul").slideUp();
            //slide down the link list below the h3 clicked - only if its closed
            if(!$(this).next().is(":visible"))
            {
                $(this).next().slideDown();
            }
        })
    });
    $(function() {

        $(".input input").focus(function() {

            $(this).parent(".input").each(function() {
                $("label", this).css({
                    "line-height": "18px",
                    "font-size": "18px",
                    "font-weight": "100",
                    "top": "0px"
                })
                $(".spin", this).css({
                    "width": "100%"
                })
            });
        }).blur(function() {
            $(".spin").css({
                "width": "0px"
            })
            if ($(this).val() == "") {
                $(this).parent(".input").each(function() {
                    $("label", this).css({
                        "line-height": "60px",
                        "font-size": "24px",
                        "font-weight": "300",
                        "top": "10px"
                    })
                });

            }
        });

        $(".button").click(function(e) {
            var pX = e.pageX,
                pY = e.pageY,
                oX = parseInt($(this).offset().left),
                oY = parseInt($(this).offset().top);

            $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
            $('.x-' + oX + '.y-' + oY + '').animate({
                "width": "500px",
                "height": "500px",
                "top": "-250px",
                "left": "-250px",

            }, 600);
            $("button", this).addClass('active');
        });

        $(".alt-2").click(function() {
            if (!$(this).hasClass('material-button')) {
                $(".shape").css({
                    "width": "100%",
                    "height": "100%",
                    "transform": "rotate(0deg)"
                });

                setTimeout(function() {
                    $(".overbox").css({
                        "overflow": "initial"
                    })
                }, 600);

                $(this).animate({
                    "width": "140px",
                    "height": "140px"
                }, 500, function() {
                    $(".box").removeClass("back");

                    $(this).removeClass('active')
                });

                $(".overbox .title").fadeOut(300);
                $(".overbox .input").fadeOut(300);
                $(".overbox .button").fadeOut(300);

                $(".alt-2").addClass('material-buton');
            }

        });

        $(".material-button").click(function() {

            if ($(this).hasClass('material-button')) {
                setTimeout(function() {
                    $(".overbox").css({
                        "overflow": "hidden"
                    });
                    $(".box").addClass("back");
                }, 200);
                $(this).addClass('active').animate({
                    "width": "700px",
                    "height": "700px"
                });

                setTimeout(function() {
                    $(".shape").css({
                        "width": "50%",
                        "height": "50%",
                        "transform": "rotate(45deg)"
                    });

                    $(".overbox .title").fadeIn(300);
                    $(".overbox .input").fadeIn(300);
                    $(".overbox .button").fadeIn(300);
                }, 700);

                $(this).removeClass('material-button');

            }

            if ($(".alt-2").hasClass('material-buton')) {
                $(".alt-2").removeClass('material-buton');
                $(".alt-2").addClass('material-button');
            }

        });

    });
</script>
</body>

</html>
