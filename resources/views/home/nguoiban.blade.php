<?php if(isset($danhgia)&&isset($ct_nguoiban)): ?>
<div ><!--category-tab-->
    <h2 class="title text-center">Thông tin người bán</h2>
    <table>
        <tr>
            <th><i class="fa fa-user"></i>Tài khoản</th>
            <th><i class="fa fa-info"></i>Họ tên</th>
            <th><i class="fa fa-star"></i>Điểm đánh giá</th>
            <th><i class="fa fa-comment"></i>Lượt đánh giá</th>
        </tr>
        <tr>
            <td><?= $ct_nguoiban->nd_maso ?></td>
            <td><?= $ct_nguoiban->nd_hoten ?></td>
            <td><?= $ct_nguoiban->nd_danhgia ?></td>
            <td><?= $ct_nguoiban->nd_luotdanhgia ?></td>
        </tr>
    </table>
    <h4 class="title text-center">Đánh giá</h4>
    <table>
        <tr>
            <th><i class="fa fa-user"></i>Người đánh giá</th>
            <th><i class="fa fa-clock-o"></i>Thời gian</th>
            <th><i class="fa fa-star"></i>Điểm</th>
        </tr>
        @foreach($danhgia as $item)
            <tr>
                <td><?= $item->dg_nguoimua?></td>
                <td><?= $item->dg_tgian ?></td>
                <td><?= $item->dg_diem ?></td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="text-center">{{ $danhgia->appends(Request::input())->links() }}</td>
        </tr>
    </table>
</div>
</div>
<?php endif; ?>