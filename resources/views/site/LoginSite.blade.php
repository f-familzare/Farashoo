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
            <a class="navbar-brand" href="/">نیباک</a>
        </div>
        <ul class="nav navbar-right top-nav">

            <li data-toggle="modal" data-target="#modalLRForm">
                <a><i class="fa fa-fw fa-sign-in"></i>ورود</a>
            </li>
            <li data-toggle="modal" data-target="#SignUp">
                <a><i class="fa fa-plus-circle"></i>عضویت</a>
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


    {{--<div id="page-wrapper" class="text-center" style="padding-top: 55px">--}}

        {{--<div class="container-fluid">--}}
            {{--<dashboard-component></dashboard-component>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/vue.js')}}"></script>

</body>

</html>
