@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo"><b>GST</b> Billing</div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Enter your email to get reset link</p>
            @include('_message')
            <form action="{{ url('forgot-password') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">Send Link</button>
                    </div>
                </div>
            </form>
            <p class="mt-3"><a href="{{ url('login') }}">Back to login</a></p>
        </div>
    </div>
</div>
@endsection