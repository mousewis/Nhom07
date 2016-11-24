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
    <!--[if lt IE 9]>
    <script src="{{URL::asset('js/html5shiv.js')}}"></script>
    <script src="{{URL::asset('js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::asset('images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::asset('images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::asset('images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::asset('images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"></i>Xin chào <?= Session::has('nd_maso')?Session::get('nd_maso'):' Khách'?></a></li>

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

                            <?php if (Session::has('nd_maso')&&Session::has('nd_loai')): ?>
                                <li><a href="{{(Session::get('nd_loai')==1)?url('nguoiban'):url('nguoimua')}}"><i class="fa fa-user"></i> Tài khoản</a></li>
                                {{--<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>--}}
                                <?php if(Session::get('nd_loai')=='2'):?>
                                    <li><a href="{{url('home/thanhtoan')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                    <li>
                                        <ol class="breadcrumb">
                                        <li><a href="{{url('home/giohang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                        <li><?= Cart::content()->groupBy('id')->count() ?></li>
                                        </ol>
                                    </li>
                                <?php endif;?>
                                <li>
                                    <a href="{{url('nguoidung/dangxuat')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a>
                                </li>
                            <?php else:?>
                            <li><a href="{{url('nguoidung/dangki')}}"><i class="fa fa-lock"></i>Đăng kí</a></li>
                            <li><a href="{{url('nguoidung/dangnhap')}}"><i class="fa fa-sign-in"></i>Đăng nhập</a></li>
                            <?php endif; ?>
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
            @yield('content')
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
<script src="{{URL::asset('js/delivery.js')}}"></script>
<script src="{{URL::asset('js/image-preview.js')}}"></script>
<script>
    $(document).ready(function () {

        $(".number").number(true,0);
    });
</script>
</body>
</html>