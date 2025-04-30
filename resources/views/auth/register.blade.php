@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>GST</b>Billing</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Register</p>
        <form action="{{ url('register_post') }}" method="post">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="User Name" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        <span style="color:red">{{ $errors->first('email') }}</span>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        <span style="color:red">{{ $errors->first('password') }}</span>
    </div>
    <div class="row">
        <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </div>
</form>
        <p class="mb-1">
          <a href="{{ url('forgot-password') }}">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ url('/') }}"   class="text-center">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection