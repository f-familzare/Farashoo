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
    <title>فراشو</title>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/site-style.css')}}" rel="stylesheet">

</head>

<body>

<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top normal-nav" role="navigation">
        <ul class="nav navbar-right top-nav">
            <ul class="items-list">
                <li style="float: right">
                    <a class="navbar-brand" href="/">فراشو</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/AddBusiness">ثبت کسب و کار</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/AddRezume">ثبت رزومه</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/BusinessList">بانک مشاغل</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/RezumeList">بانک رزومه</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/Support">پشتیبانی</a>
                </li>
            </ul>
            @guest
                <li><a href="{{ route('login') }}">ورود</a></li>
                <li><a href="{{ route('register') }}">ثبت نام</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                       aria-haspopup="true" v-pre>
                        @if(empty(auth()->user()->account()->first()))
                            {{ Auth::user()->username }}
                        @else
                            {{auth()->user()->account->name}} {{auth()->user()->account->lastname}}
                        @endif
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu login-logout">
                        <li>
                            <a href="{{ route('panel') }}">
                                ورود به پنل
                            </a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </nav>
    <nav class="navbar navbar-inverse responsive-list" role="navigation">
        <ul class="nav navbar-right top-nav">

            <li style="float: right" class="menu-bars">
                <a><i class="fa fa-bars"></i></a>
            </li>
            <li style="float: right" class="menu-remove">
                <a><i class="fa fa-remove"></i></a>
            </li>
            <li style="float: right">
                <a class="navbar-brand" href="/">فراشو</a>
            </li>
            <ul class="items-list-responsive">

                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/AddBusiness">ثبت کسب و کار</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/AddRezume">ثبت رزومه</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/BusinessList">بانک مشاغل</a>
                </li>
                <li style="float: right">
                    <a class="navbar-brand link" style="font-size: 13px" href="/farasho/RezumeList">بانک رزومه</a>
                </li>
            </ul>
            @guest
                <li><a href="{{ route('login') }}">ورود</a></li>
                <li><a href="{{ route('register') }}">ثبت نام</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                       aria-haspopup="true" v-pre>
                        @if(empty(auth()->user()->account()->first()))
                            {{ Auth::user()->username }}
                        @else
                            {{auth()->user()->account->name}} {{auth()->user()->account->lastname}}
                        @endif
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu login-logout" style="  right: -120px !important;">
                        <li>
                            <a href="{{ route('panel') }}">
                                ورود به پنل
                            </a>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </nav>
    @yield('content')

</div>
<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/vue.js')}}"></script>
<script type="text/javascript">
    $('.menu-bars').click(function () {
        // $('.items-list-responsive').toggle(function () {
        $(".items-list-responsive").fadeIn();
        $('.items-list-responsive li').css('display', 'block')
        $(this).css('display', 'none')
        $('.menu-remove').css('display', 'block')
        // });
    });
    // $('#wrapper').click(function(){
    //         $(".items-list-responsive").fadeOut();
    //         $('.items-list-responsive li').css('display','none')
    //
    // })
    $('.menu-remove').css('display','none')
    $('.menu-remove').click(function () {
        // $('.items-list-responsive').toggle(function () {
        $(".items-list-responsive").fadeOut();
        $('.items-list-responsive li').css('display', 'none')
        $(this).css('display', 'none');
        $('.menu-bars').css('display', 'block')
        // });
    });



</script>
</body>
<footer class="footer">
    <ul>
        <li><a href="/farasho/Extra">درباره کاریش</a></li>
        <li><a href="/farasho/Extra">تماس با ما</a></li>
        <li><a href="/farasho/Extra">خدمات</a></li>
        <li><a href="/farasho/Extra">آموزش</a></li>
        <li><a href="/farasho/Extra">تعرفه ها</a></li>
        <li><a href="/farasho/Extra">سیاست و حریم خصوصی</a></li>
    </ul>
</footer>

</html>
