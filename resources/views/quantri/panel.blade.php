<div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#taikhoan">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Quản lý người dùng
                        </a>
                    </h4>
                </div>
                <div id="taikhoan" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{url('quantri/nguoiban')}}">Danh sách người bán</a></li>
                            <li><a href="{{url('quantri/nguoimua')}}">Danh sách người mua</a></li>
                            <li><a href="{{url('quantri/nguoidung/them')}}">Thêm người dùng</a></li>
                            <li><a href="{{url('quantri/nguoidung/matkhau')}}">Đặt lại mật khẩu</a></li>
                            <li><a href="{{url('quantri/nguoidung/khoa')}}">Khóa/Mở khóa người dùng</a></li>
                            <li><a href="{{url('quantri/danhgia')}}">Quản lý đánh giá</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#chungtu">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Quản lý chứng từ
                        </a>
                    </h4>
                </div>
                <div id="chungtu" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{url('quantri/naptien')}}">Chứng từ nạp tiền- Lợi nhuận</a></li>
                            <li><a href="{{url('quantri/hoadonnhap')}}">Chứng từ hóa đơn nhập</a></li>
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
                            <li><a href="{{url('quantri/hoadon')}}">Danh sách đơn hàng</a></li>
                            <li><a href="{{url('quantri/hoadon?hd_tinhtrang=-1')}}">Đơn hàng đã hủy</a></li>
                            <li><a href="{{url('quantri/hoadon?hd_tinhtrang=0')}}">Đơn hàng đang xử lý</a></li>
                            <li><a href="{{url('quantri/hoadon?hd_tinhtrang=1')}}">Đơn hàng đã xác nhận</a></li>
                            <li><a href="{{url('quantri/hoadon?hd_tinhtrang=2')}}">Đơn hàng đã hoàn tất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/category-products-->

