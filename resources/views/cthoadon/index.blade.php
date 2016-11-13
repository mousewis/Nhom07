@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Cthoadon</span></h2>
<a href="<?=url('cthoadon/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create cthoadon</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($cthoadon)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Cthd Soluong</th>
			<th>Cthd Gia</th>
			<th>Cthd Tinhtrang</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($cthoadon as $item): ?>
		<tr>
			<td><?= $item->cthd_soluong ?></td>
			<td><?= $item->cthd_gia ?></td>
			<td><?= $item->cthd_tinhtrang ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('cthoadon/show/'.$item->cthd_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('cthoadon/edit/'.$item->cthd_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('cthoadon/delete/'.$item->cthd_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No cthoadon . </p>

<?php endif; ?>

</div>
@endsection