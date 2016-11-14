	<div class="price-range"><!--brands_products-->
			<h2>Người bán</h2>
			<div class="brands-name">
				<?php if (isset($nguoiban)):?>
				<?php foreach ($nguoiban as $item): ?>
				<ul class="nav nav-pills nav-stacked">
					<li><a href="<?= url('home/nguoiban/'.$item->nd_maso) ?>"><?= $item->nd_maso ?></a></li>
				</ul>
				<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div><!--/brands_products-->
