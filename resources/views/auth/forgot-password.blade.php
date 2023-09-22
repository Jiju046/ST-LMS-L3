@extends('layouts.auth')
@section('content')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>
                                {!! Form::open(['route' => 'password.email','class' => 'user']) !!}
                                    {!! csrf_field() !!}
                                    
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        {!! Form::label('email', 'Email') !!}
                                        {!! Form::email('email', old('email'), ['id' => 'email','class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                                        <!-- Include any error messages here -->
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        {!! Form::submit('Email Password Reset Link', ['class' => 'btn btn-primary btn-user btn-block']) !!}
                                    </div>
                                {!! Form::close() !!}
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection

