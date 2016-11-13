@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Hoadonnhap</span></h2>
<hr>

@include('hoadonnhap._form', ['action'=> 'store'])

<p><a href="{{url('hoadonnhap')}}">Back</a></p>
</div>
@endsection