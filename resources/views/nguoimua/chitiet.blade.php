@extends('layouts.app')
@section('content')
    @include('nguoimua.panel')
    <?php if (isset($nguoimua)): ?>
    <h2><?=$nguoimua->nd_sdt?></h2>
    <?php endif; ?>
@endsection