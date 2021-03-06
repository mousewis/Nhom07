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
                            <li><a href="{{url('nguoimua')}}">Thông tin tài khoản</a></li>
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
                            <li><a href="{{url('nguoimua/hoadon')}}">Lịch sử giao dịch</a></li>
                            <li><a href="{{url('nguoimua/hoadon?hd_tinhtrang=0')}}">Đang xử lý</a></li>
                            <li><a href="{{url('nguoimua/hoadon?hd_tinhtrang=1')}}">Đã xác nhận</a></li>
                            <li><a href="{{url('nguoimua/hoadon?hd_tinhtrang=2')}}">Đã hoàn tất</a></li>
                            <li><a href="{{url('nguoimua/hoadon?hd_tinhtrang=-1')}}">Đã hủy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordian" href="#danhgia">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Đánh giá người bán
                        </a>
                    </h4>
                </div>
                <div id="danhgia" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li><a href="{{url('nguoimua/danhgia')}}">Lịch sử đánh giá</a></li>
                            <li><a href="{{url('nguoimua/danhgia/them')}}">Thêm đánh giá</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--/category-products-->
