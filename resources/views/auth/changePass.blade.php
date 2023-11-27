@extends('layouts.app')
@section('content')
    <div class="hold-transtion login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">

                </div>
                <div class="card-body">
                    {{-- @foreach($errors->all() as $message)
                        <div class="alert alert-danger">{{ $message }}</div>
                    @endforeach --}}
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
                    <p class="login-box-msg">
                        Now you can change your current password.
                    </p>
                    <form action="{{ route('update.password') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="password" required class="form-control @error('current_pass') is-invalid @enderror" name="current_pass"
                                 placeholder="Current Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('current_pass')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" required name="password" 
                                class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" required name="password_confirmation"
                                 class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirm Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Change password</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="login.html">Login</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
@endsection
