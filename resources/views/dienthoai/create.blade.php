@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Dienthoai</span></h2>
<hr>

@include('dienthoai._form', ['action'=> 'store'])

<p><a href="{{url('dienthoai')}}">Back</a></p>
</div>
@endsection