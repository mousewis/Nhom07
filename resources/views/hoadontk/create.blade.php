@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Hoadontk</span></h2>
<hr>

@include('hoadontk._form', ['action'=> 'store'])

<p><a href="{{url('hoadontk')}}">Back</a></p>
</div>
@endsection