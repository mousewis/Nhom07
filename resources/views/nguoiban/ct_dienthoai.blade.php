@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error-message'))
        <div class="alert alert-danger">
            {{ session('error-message') }}
        </div>
    @endif
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('nguoiban.panel');
        </div>
    </div>
    <?php if(isset($dienthoai)):?>
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{url('dienthoai/hinh/'.$dienthoai->dt_hinh)}}" alt=""/>
                </div>
                <div id="similar-product" class="carousel slide" style="width:10px">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2><?= $dienthoai->dt_ten ?></h2>
                    <p>Mã số: <?= $dienthoai->dt_maso?></p>
                    <span>
									<span class="number"><?= $dienthoai->dt_gia ?></span>
						</span>
                    <span>
                        <form action="{{url('home/giohang/them')}}" method="post">
                        <label>Số lượng:</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" value="<?= $dienthoai->dt_maso ?>" name="dt_maso">
                            <input type="hidden" value="<?= $dienthoai->dt_ten?>" name="dt_ten">
                            <input type="hidden" value="<?= $dienthoai->dt_gia?>" name="dt_gia">
                            		<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
                            </form>
								</span>
                    <div class="choose">
                    <ul>
                        <li><p><i class="fa fa-tags"></i>   <b>Thương hiệu: </b><a href=""><?= $dienthoai->dt_thuonghieu?></a></p></li>
                        <li><p><i class="fa fa-user"></i>   <b>Người bán: </b><a href="{{url('home/nguoiban/'.$dienthoai->hdn_nguoidung)}}"><?= $dienthoai->hdn_nguoidung?></a></p></li>
                    </ul>
                    </div>
                    </ul>
                    </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <!--<div class="category-tab shop-details-tab">-->
            <!--category-tab-->
            <div class="component">
                    <table>
                        <tr>
                            <th>Loại</th>
                            <td><?= $dienthoai->dt_loai?></td>
                        </tr>
                        <tr>
                            <th>Kích cỡ</th>
                            <td><?= $dienthoai->dt_kco?></td>
                        </tr>
                        <tr>
                            <th>Độ phân giải</th>
                            <td><?= $dienthoai->dt_pgiai?></td>
                        </tr>
                        <tr>
                            <th>Dung lượng pin</th>
                            <td><?= $dienthoai->dt_pin?></td>
                        </tr>
                        <tr>
                            <th>Hệ điều hành</th>
                            <td><?= $dienthoai->dt_hdh?></td>
                        </tr>
                        <tr>
                            <th>Dung lượng RAM</th>
                            <td><?= $dienthoai->dt_ram?></td>
                        </tr>
                        <tr>
                            <th>Bộ nhớ</th>
                            <td><?= $dienthoai->dt_bnho?></td>
                        </tr>
                        <tr>
                            <th>Camera</th>
                            <td><?= $dienthoai->dt_cam?></td>
                        </tr>
                    </table>

            </div>
        <!--</div><!--/category-tab-->
    </div>
    <?php endif;?>
@endsection