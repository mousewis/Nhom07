@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Hoadon</span></h2>
<hr>

@include('hoadon._form', ['action'=> 'store'])

<p><a href="{{url('hoadon')}}">Back</a></p>
</div>
@endsection