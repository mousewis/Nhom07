@extends('layouts.app')
@section('content')
    @include('nguoiban.panel')
    <?php if (isset($nguoiban)): ?>
    <h2><?=$nguoiban->nd_sdt?></h2>
    <?php endif; ?>
@endsection