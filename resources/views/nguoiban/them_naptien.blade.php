@extends('layouts.app')
@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('error-message'))
        <div class="alert alert-danger">
            {{ session('error-message') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-sm-3">
        <div class="left-sidebar">
            @include('nguoiban.panel')
        </div>
    </div>
    <div class="col-sm-9 padding-right text-center">
        <div class="signup-form"><!--sign up form-->
            <h2>Nạp tiền vào tài khoản</h2>
            <div class="col-sm-6 col-sm-offset-3">
                <form action="{{url('nguoiban/naptien/them/paypal')}}" method="post" class="form-horizontal">
                    <table>
                        <tr>
                            <td>
                                <select name="hdtk_gia">
                                    <option value="5">100,000 VND</option>
                                    <option value="10">200,000 VND</option>
                                    <option value="15">300,000 VND</option>
                                    <option value="20">400,000 VND</option>
                                    <option value="25">500,000 VND</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit">Nạp tiền</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

@endsection