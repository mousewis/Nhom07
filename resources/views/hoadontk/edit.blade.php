@extends('layouts.app')
@section('content')
<div class="container">
<h2>Edit <span class='muted'>Hoadontk</span></h2>
<hr>
@include('hoadontk._form', ['hoadontk' => $hoadontk, 'action'=> 'update'])
<p>
	<a href="{{url('hoadontk/show/'.$hoadontk->hdtk_maso)}}"> View</a> |
	<a href="{{url('hoadontk')}}">Back</a>
</p>
</div>
@endsection