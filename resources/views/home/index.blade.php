@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="col-sm-3">
        <div class="left-sidebar">
            {{--<h2>Category</h2>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear" class="collapsed">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Sportswear
                            </a>
                        </h4>
                    </div>
                    <div id="sportswear" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <ul>
                                <li><a href="">Nike </a></li>
                                <li><a href="">Under Armour </a></li>
                                <li><a href="">Adidas </a></li>
                                <li><a href="">Puma</a></li>
                                <li><a href="">ASICS </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#mens" class="collapsed">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Mens
                            </a>
                        </h4>
                    </div>
                    <div id="mens" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li><a href="">Fendi</a></li>
                                <li><a href="">Guess</a></li>
                                <li><a href="">Valentino</a></li>
                                <li><a href="">Dior</a></li>
                                <li><a href="">Versace</a></li>
                                <li><a href="">Armani</a></li>
                                <li><a href="">Prada</a></li>
                                <li><a href="">Dolce and Gabbana</a></li>
                                <li><a href="">Chanel</a></li>
                                <li><a href="">Gucci</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#womens" class="collapsed">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Womens
                            </a>
                        </h4>
                    </div>
                    <div id="womens" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                <li><a href="">Fendi</a></li>
                                <li><a href="">Guess</a></li>
                                <li><a href="">Valentino</a></li>
                                <li><a href="">Dior</a></li>
                                <li><a href="">Versace</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Kids</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Fashion</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Households</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Interiors</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Clothing</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Bags</a></h4>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">Shoes</a></h4>
                    </div>
                </div>
            </div><!--/category-productsr-->
--}}
            <div class="brands_products"><!--brands_products-->
                <h2>Thương hiệu</h2>
                <div class="brands-name">
                    <?php if (isset($thuonghieu)):?>
                    <?php foreach ($thuonghieu as $item): ?>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="<?= url('home/thuonghieu/'.$item->th_maso) ?>"><?= $item->th_ten ?></a></li>
                    </ul>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div><!--/brands_products-->

        </div>
    </div>

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Danh sách điện thoại</h2>
            <?php if (isset($dienthoai)): ?>
            <?php foreach ($dienthoai as $item): ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/product-details/<?= $item->dt_hinh ?>" alt="" >
                            <h2 class="number"><?= $item->dt_gia ?></h2>
                            <p><?= $item->dt_ten ?></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                        <?php
                        echo floor(abs(time() - strtotime($item->hdn_tgian))/86400)<10?"<img src='images/home/new.png' class='new' alt=''>":"" ?>

                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>

            <p>Không có danh sách điện thoại</p>

            <?php endif; ?>
            <div class="col-sm-12 text-center">
                <ul class="pagination">
                    {!! $dienthoai->links() !!}
                </ul>
            </div><!--features_items-->


        </div>
        </div>
@endsection