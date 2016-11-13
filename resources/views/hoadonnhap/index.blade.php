@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Hoadonnhap</span></h2>
<a href="<?=url('hoadonnhap/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create hoadonnhap</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($hoadonnhap)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Hdn Nguoidung</th>
			<th>Hdn Tgian</th>
			<th>Hdn Gia</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($hoadonnhap as $item): ?>
		<tr>
			<td><?= $item->hdn_nguoidung ?></td>
			<td><?= $item->hdn_tgian ?></td>
			<td><?= $item->hdn_gia ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('hoadonnhap/show/'.$item->hdn_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('hoadonnhap/edit/'.$item->hdn_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('hoadonnhap/delete/'.$item->hdn_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No hoadonnhap . </p>

<?php endif; ?>

</div>
@endsection