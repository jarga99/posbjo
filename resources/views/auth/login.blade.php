@extends('layouts.auth')

@section('login')
<div class="login-box ">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ url ('/') }}" class="h1">
                <img src="{{ asset ('img/store.png') }}" alt="store.png" width="100">
            </a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">AYAM BAKAR B-JO</p>
            <form action="{{ route ('login') }}" method="post">
                @csrf
                <div class="input-group mb-3 @error('email') has-error @enderror">
                    <input type="email" name="email" class="form-control" placeholder="Email" required
                        value="{{ old ('email') }}" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                @error('email')
                <span class="help-block">
                    <p class="text-danger">{{$message}}</p>
                </span>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection