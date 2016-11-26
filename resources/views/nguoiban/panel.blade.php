<div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#taikhoan">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Quản lý tài khoản
                        </a>
                    </h4>
                </div>
                <div id="taikhoan" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{url('nguoiban')}}">Thông tin tài khoản</a></li>
                            <li><a href="{{url('nguoiban/danhgia')}}">Đánh giá của người mua</a></li>
                            <li><a href="{{url('nguoiban/hoadonnhap')}}">Lịch sử đăng tin</a></li>
                            <li><a href="product.php">Nạp tiền vào tài khoản</a></li>
                            <li><a href="product.php">Lịch sử nạp tiền</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#donhang">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Quản lý đơn hàng
                        </a>
                    </h4>
                </div>
                <div id="donhang" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{url('nguoiban/hoadon')}}">Lịch sử đặt hàng</a></li>
                            <li><a href="{{url('nguoiban/hoadon?hd_tinhtrang=0')}}">Đang xử lý</a></li>
                            <li><a href="{{url('nguoiban/hoadon?hd_tinhtrang=1')}}">Đã xác nhận</a></li>
                            <li><a href="{{url('nguoiban/hoadon?hd_tinhtrang=2')}}">Đã hoàn tất</a></li>
                            <li><a href="{{url('nguoiban/hoadon?hd_tinhtrang=-1')}}">Đã hủy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#sanpham">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Quản lý sản phẩm
                        </a>
                    </h4>
                </div>
                <div id="sanpham" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{url('nguoiban/dienthoai')}}">Danh sách sản phẩm</a></li>
                            <li><a href="{{url('nguoiban/dienthoai/them')}}">Thêm sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/category-products-->

