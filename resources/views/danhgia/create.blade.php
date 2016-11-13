@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Danhgia</span></h2>
<hr>

@include('danhgia._form', ['action'=> 'store'])

<p><a href="{{url('danhgia')}}">Back</a></p>
</div>
@endsection