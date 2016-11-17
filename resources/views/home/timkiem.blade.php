<div class="price-range"><!--brands_products-->
    <h2>Tìm kiếm</h2>
            <form name="searchAd" action="{{url('home/timkiem')}}" method="get">
                <table>
                <tr><td colspan="2">
                <div class="search_box" style="width:100%;">
                    <input type="text" name="dt_ten" placeholder="Nhập tên sản phẩm để tìm">
                </div>
                    </td></tr>
                <tr>
                    <td colspan="2">
                <select name="dt_thuonghieu" class="brandSelect">
                    <option value="0">Lựa chọn thương hiệu</option>
                    <?php if (isset($thuonghieu)): ?>
                    <?php foreach($thuonghieu as $item): ?>
                    <option value="<?= $item->th_maso ?>"><?= $item->th_ten ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                    </td>
                </tr>
                <tr>
                    <td>Từ:</td>
                    <td>
                        <input name="dt_gia_tu" type="number" min="0" value="0" class="number">
                    </td>
                    </tr>
                    <tr>
                        <td>Đến:</td>
                        <td>
                        <input name="dt_gia_den" type="number" min="0" value="2000000" class="number">
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Tìm kiếm" class="btn btn-primary pull-right">
            </form>
        </div>
