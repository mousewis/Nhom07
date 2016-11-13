@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Hoadontk</span></h2>
<a href="<?=url('hoadontk/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create hoadontk</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($hoadontk)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Hdtk Nguoidung</th>
			<th>Hdtk Tgian</th>
			<th>Hdtk Gia</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($hoadontk as $item): ?>
		<tr>
			<td><?= $item->hdtk_nguoidung ?></td>
			<td><?= $item->hdtk_tgian ?></td>
			<td><?= $item->hdtk_gia ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('hoadontk/show/'.$item->hdtk_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('hoadontk/edit/'.$item->hdtk_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('hoadontk/delete/'.$item->hdtk_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No hoadontk . </p>

<?php endif; ?>

</div>
@endsection