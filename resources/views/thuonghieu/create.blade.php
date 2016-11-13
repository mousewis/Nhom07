@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Thuonghieu</span></h2>
<hr>

@include('thuonghieu._form', ['action'=> 'store'])

<p><a href="{{url('thuonghieu')}}">Back</a></p>
</div>
@endsection