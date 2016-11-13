@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Quantri</span></h2>
<hr>

@include('quantri._form', ['action'=> 'store'])

<p><a href="{{url('quantri')}}">Back</a></p>
</div>
@endsection