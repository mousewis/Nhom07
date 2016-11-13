@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Nguoidung</span></h2>
<hr>

@include('nguoidung._form', ['action'=> 'store'])

<p><a href="{{url('nguoidung')}}">Back</a></p>
</div>
@endsection