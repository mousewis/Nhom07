<div class="price-range"><!--brands_products-->
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
