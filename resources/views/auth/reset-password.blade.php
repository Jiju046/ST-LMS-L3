@extends('layouts.guest')
@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
    
            <div class="col-xl-10 col-lg-12 col-md-9">
    
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('https://images.pexels.com/photos/2177482/pexels-photo-2177482.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset your password</h1>
                                    </div>
    
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
    
                                    {!! Form::open(['route' => 'password.store', 'method' => 'POST']) !!}
                                    {{ csrf_field() }}
                                
                                    <!-- Password Reset Token -->
                                    {!! Form::hidden('token', $request->route('token')) !!}
                                
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        {!! Form::label('email', __("Email")) !!}
                                        {!! Form::email('email', old('email', $request->email), ['class' => 'form-control', 'autofocus' => 'autofocus', 'placeholder' => __("Enter your email")]) !!}
                                        @error('email')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <!-- Password -->
                                    <div class="form-group mt-4">
                                        {!! Form::label('password', __("New Password")) !!}
                                        {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password', 'placeholder' => __("Enter a secure new password")]) !!}
                                        @error('password')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <!-- Confirm Password -->
                                    <div class="form-group mt-4">
                                        {!! Form::label('password_confirmation', __("Confirm New Password")) !!}
                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'new-password', 'placeholder' => __("Confirm your new password")]) !!}
                                        @error('password_confirmation')
                                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                
                                    <div class="form-group mt-4">
                                        {!! Form::submit(__("Reset Password"), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>
    
    </div>


@endsection
