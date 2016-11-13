@extends('layouts.app')
@section('content')
<div class="container">
<h2>Listing <span class='muted'>Thuonghieu</span></h2>
<a href="<?=url('thuonghieu/create')?>" class = "btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Create thuonghieu</a>
<hr>
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<?php if (isset($thuonghieu)): ?>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Th Ten</th>
			<th width="20%">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($thuonghieu as $item): ?>
		<tr>
			<td><?= $item->th_ten ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<a href="<?=url('thuonghieu/show/'.$item->th_maso)?>" class = "btn btn-info btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
						<a href="<?=url('thuonghieu/edit/'.$item->th_maso)?>" class = "btn btn-warning btn-sm"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
						<a href="<?=url('thuonghieu/delete/'.$item->th_maso)?>" class = "btn btn-danger btn-sm" onclick = "return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No thuonghieu . </p>

<?php endif; ?>

</div>
@endsection