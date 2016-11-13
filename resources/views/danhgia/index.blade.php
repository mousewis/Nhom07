@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Danhgia</span></h2>
<a href="<?=url('danhgia/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create danhgia</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($danhgia)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Dg Nguoimua</th>
			<th>Dg Nguoiban</th>
			<th>Dg Diem</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($danhgia as $item): ?>
		<tr>
			<td><?= $item->dg_nguoimua ?></td>
			<td><?= $item->dg_nguoiban ?></td>
			<td><?= $item->dg_diem ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('danhgia/show/'.$item->dg_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('danhgia/edit/'.$item->dg_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('danhgia/delete/'.$item->dg_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No danhgia . </p>

<?php endif; ?>

</div>
@endsection