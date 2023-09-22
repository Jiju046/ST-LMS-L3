

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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="sidebar-brand-icon rotate-n-15 text-center mb-3">
                                        <img src="{{ asset('books.png') }}" width="45">
                                    </div>
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        </div>
                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        {!! Form::open(['route' => 'login']) !!}
                                        {{ csrf_field() }}

                                            <!-- Email Address -->
                                            <div class="mb-3">
                                                {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
                                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'autofocus' => 'autofocus', 'autocomplete' => 'username']) !!}
                                                <x-input-error :messages="$errors->get('email')" class="alert alert-danger" style="list-style: none" />
                                            </div>

                                            <!-- Password -->
                                            <div class="mb-3">
                                                {!! Form::label('password', 'Password', ['class' => 'form-label']) !!}
                                                {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'current-password']) !!}
                                                <x-input-error :messages="$errors->get('password')" class="alert alert-danger" style="list-style: none" />
                                            </div>

                                            <!-- Remember Me -->
                                            <div class="mb-3 form-check">
                                                {!! Form::checkbox('remember', '1', false, ['class' => 'form-check-input', 'id' => 'remember_me']) !!}
                                                {!! Form::label('remember_me', __('Remember me'), ['class' => 'form-check-label']) !!}
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                {!! Form::submit('Log in', ['class' => 'btn btn-primary ms-3']) !!}
                                            </div>
                                        {!! Form::close() !!}

        
                                        <hr>
                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('register') }}">Create an Account!</a>
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
