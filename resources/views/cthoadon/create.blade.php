@extends('layouts.app')
@section('content')
<div class="container">
<h2>Create <span class='muted'>Cthoadon</span></h2>
<hr>

@include('cthoadon._form', ['action'=> 'store'])

<p><a href="{{url('cthoadon')}}">Back</a></p>
</div>
@endsection