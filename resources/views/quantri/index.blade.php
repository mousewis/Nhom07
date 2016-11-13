@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Quantri</span></h2>
<a href="<?=url('quantri/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create quantri</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($quantri)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Qt Email</th>
			<th>Qt Matkhau</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($quantri as $item): ?>
		<tr>
			<td><?= $item->qt_email ?></td>
			<td><?= $item->qt_matkhau ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('quantri/show/'.$item->qt_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('quantri/edit/'.$item->qt_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('quantri/delete/'.$item->qt_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No quantri . </p>

<?php endif; ?>

</div>
@endsection