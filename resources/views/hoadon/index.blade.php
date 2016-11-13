@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Hoadon</span></h2>
<a href="<?=url('hoadon/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create hoadon</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($hoadon)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Hd Nguoimua</th>
			<th>Hd Tinhtrang</th>
			<th>Hd Gia</th>
			<th>Hd Tgian</th>
			<th>Hd Dchi</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($hoadon as $item): ?>
		<tr>
			<td><?= $item->hd_nguoimua ?></td>
			<td><?= $item->hd_tinhtrang ?></td>
			<td><?= $item->hd_gia ?></td>
			<td><?= $item->hd_tgian ?></td>
			<td><?= $item->hd_dchi ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('hoadon/show/'.$item->hd_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('hoadon/edit/'.$item->hd_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('hoadon/delete/'.$item->hd_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No hoadon . </p>

<?php endif; ?>

</div>
@endsection