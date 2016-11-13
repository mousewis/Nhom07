@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Nguoidung</span></h2>
<a href="<?=url('nguoidung/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create nguoidung</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($nguoidung)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Nd Email</th>
			<th>Nd Matkhau</th>
			<th>Nd Hoten</th>
			<th>Nd Sdt</th>
			<th>Nd Dchi</th>
			<th>Nd Loai</th>
			<th>Nd Taikhoan</th>
			<th>Nd Tinhtrang</th>
			<th>Nd Danhgia</th>
			<th>Nd Kichhoat</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($nguoidung as $item): ?>
		<tr>
			<td><?= $item->nd_email ?></td>
			<td><?= $item->nd_matkhau ?></td>
			<td><?= $item->nd_hoten ?></td>
			<td><?= $item->nd_sdt ?></td>
			<td><?= $item->nd_dchi ?></td>
			<td><?= $item->nd_loai ?></td>
			<td><?= $item->nd_taikhoan ?></td>
			<td><?= $item->nd_tinhtrang ?></td>
			<td><?= $item->nd_danhgia ?></td>
			<td><?= $item->nd_kichhoat ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('nguoidung/show/'.$item->nd_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('nguoidung/edit/'.$item->nd_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('nguoidung/delete/'.$item->nd_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No nguoidung . </p>

<?php endif; ?>

</div>
@endsection