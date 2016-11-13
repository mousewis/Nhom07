@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Dienthoai</span></h2>
<a href="<?=url('dienthoai/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create dienthoai</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($dienthoai)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Dt Ten</th>
			<th>Dt Hdn</th>
			<th>Dt Sluong</th>
			<th>Dt Thuonghieu</th>
			<th>Dt Gia</th>
			<th>Dt Hinh</th>
			<th>Dt Loai</th>
			<th>Dt Kco</th>
			<th>Dt Pgiai</th>
			<th>Dt Pin</th>
			<th>Dt Hdh</th>
			<th>Dt Ram</th>
			<th>Dt Bnho</th>
			<th>Dt Cam</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($dienthoai as $item): ?>
		<tr>

			<td><?= $item->dt_ten ?></td>
			<td><?= $item->dt_hdn ?></td>
			<td><?= $item->dt_sluong ?></td>
			<td><?= $item->dt_thuonghieu ?></td>
			<td><?= $item->dt_gia ?></td>
			<td><?= $item->dt_hinh ?></td>
			<td><?= $item->dt_loai ?></td>
			<td><?= $item->dt_kco ?></td>
			<td><?= $item->dt_pgiai ?></td>
			<td><?= $item->dt_pin ?></td>
			<td><?= $item->dt_hdh ?></td>
			<td><?= $item->dt_ram ?></td>
			<td><?= $item->dt_bnho ?></td>
			<td><?= $item->dt_cam ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('dienthoai/show/'.$item->dt_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('dienthoai/edit/'.$item->dt_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('dienthoai/delete/'.$item->dt_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No dienthoai . </p>

<?php endif; ?>

</div>
@endsection