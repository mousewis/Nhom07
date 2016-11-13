@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Quantri</span></h2>
<hr>
@include('quantri._form', ['quantri' => $quantri, 'action'=> 'update'])
<p>
	<a href="{{url('quantri/show/'.$quantri->qt_maso)}}"> View</a> |
	<a href="{{url('quantri')}}">Back</a>
</p>
</div>
@endsection