<!DOCTYPE html>
<html lang="fa">

<head>
    <base href="/"/>
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
        <ul class="nav navbar-right top-nav">
            <li style="float: right">
                <a class="navbar-brand" href="/">فراشو</a>
            </li>

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-fw fa-power-off"></i>
                    خروج
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <li>
                <a href="{{route('site')}}"><i class="fa fa-fw fa-sign-in"> </i> ورود به سایت</a>
            </li>
            <li class="divider"></li>

        </ul>
    </nav>

    <div id="accordian">
        <ul>

            <li>
                <router-link :to="{name:'Account'}"><h3><span class="icon-heart"></span><i class="fa fa-user"></i>حساب
                        کاربری</h3></router-link>
            </li>
            <li>
                <router-link :to="{name:'AddRezume'}"><h3><span class="icon-heart"></span><i class="fa fa-book"></i>ثبت
                        رزومه</h3></router-link>
            </li>
            <li>
                <router-link :to="{name:'AddBusiness'}"><h3><span class="icon-heart"></span><i
                                class="fa fa-briefcase"></i>ثبت کسب و کار</h3></router-link>
            </li>
            @can('accept-business')
                <li>
                    <router-link :to="{name:'BusinessRequest'}"><h3><span class="icon-heart"></span><i
                                    class="fa fa-archive"></i>لیست مشاغل</h3></router-link>
                </li>
            @endcan

            <li>
                <router-link :to="{name:'RequestResult'}"><h3><span class="icon-heart"></span><i
                                class="fa fa-question"></i>درخواست ها</h3></router-link>
            </li>
            @can('change-admin')
                <li>
                    <router-link :to="{name:'DefineRole'}"><h3><span class="icon-heart"></span><i
                                    class="fa fa-group"></i>تعیین نقش</h3></router-link>
                </li>
            @endcan

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
    $(document).ready(function () {
        $("#accordian h3").click(function () {
            $("#accordian ul ul").slideUp();
            if (!$(this).next().is(":visible")) {
                $(this).next().slideDown();
            }
        })
    });
    $(function () {

        $(".input input").focus(function () {

            $(this).parent(".input").each(function () {
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
        }).blur(function () {
            $(".spin").css({
                "width": "0px"
            })
            if ($(this).val() == "") {
                $(this).parent(".input").each(function () {
                    $("label", this).css({
                        "line-height": "60px",
                        "font-size": "24px",
                        "font-weight": "300",
                        "top": "10px"
                    })
                });

            }
        });

        $(".button").click(function (e) {
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

        $(".alt-2").click(function () {
            if (!$(this).hasClass('material-button')) {
                $(".shape").css({
                    "width": "100%",
                    "height": "100%",
                    "transform": "rotate(0deg)"
                });

                setTimeout(function () {
                    $(".overbox").css({
                        "overflow": "initial"
                    })
                }, 600);

                $(this).animate({
                    "width": "140px",
                    "height": "140px"
                }, 500, function () {
                    $(".box").removeClass("back");

                    $(this).removeClass('active')
                });

                $(".overbox .title").fadeOut(300);
                $(".overbox .input").fadeOut(300);
                $(".overbox .button").fadeOut(300);

                $(".alt-2").addClass('material-buton');
            }

        });

        $(".material-button").click(function () {

            if ($(this).hasClass('material-button')) {
                setTimeout(function () {
                    $(".overbox").css({
                        "overflow": "hidden"
                    });
                    $(".box").addClass("back");
                }, 200);
                $(this).addClass('active').animate({
                    "width": "700px",
                    "height": "700px"
                });

                setTimeout(function () {
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
