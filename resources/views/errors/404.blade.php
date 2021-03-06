<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Điện thoại di động</title>

    <link href="{{ URL::asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/animate.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/normalize.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/component.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/responsive.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/css/select2.min.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{URL::asset('js/html5shiv.js')}}"></script>
    <script src="{{URL::asset('js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato', sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"></i>Xin chào <?= Session::has('qt_maso')?Session::get('qt_maso'):' Khách'?></a></li>

                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{url('/')}}"><img src="{{URL::asset('/images/home/logo.png')}}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

</header><!--/header-->

<section>
    <div class="container">
        <div class="row">
            <p>
                KHÔNG TÌM THẤY TRANG NÀY. VUI LÒNG KIỂM TRA LẠI ĐỊA CHỈ
            </p>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top"></div>
    <div class="footer-widget"></div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Thương mại điện tử - Nhóm 7</p>
                <p class="pull-right">Mai Huỳnh | Nguyễn Đặng Thành Long | Trần Phối Lương</p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{URL::asset('js/price-range.js')}}"></script>
<script src="{{URL::asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{URL::asset('js/main.js')}}"></script>
<script src="{{URL::asset('js/jquery-ui.js')}}"></script>
<script src="{{URL::asset('js/jquery.number.min.js')}}"></script>
<script src="{{URL::asset('js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {

        $(".number").number(true,0);
    });
</script>
<script>
    $('select').select2();
</script>
</body>
</html>