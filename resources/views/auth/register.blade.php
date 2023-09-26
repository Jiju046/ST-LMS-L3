@extends('layouts.guest')
@section('content')
    

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="sidebar-brand-icon rotate-n-15 text-center mb-3">
                            <img src="{{ asset('books.png') }}" width="45">
                        </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                            {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
                            {{-- name --}}
                                <div class="form-group">
                                    <div class="form-group">
                                            {!! Form::label('name', 'Name') !!}
                                            {!! Form::text('name', old('name'), ['class' => 'form-control form-control-user w-100', 'autofocus' => 'autofocus']) !!}
                                            <x-input-error :messages="$errors->get('name')" class="alert alert-danger" style="list-style: none" />
                                    </div>
                                    
                                {{-- email --}}
                                <div class="form-group">
                                    {!! Form::label('email', 'Email') !!}
                                    {!! Form::email('email', old('email'), ['class' => 'form-control form-control-user']) !!}
                                    <x-input-error :messages="$errors->get('email')" class="alert alert-danger" style="list-style: none" />
                                </div>

                                {{-- password --}}
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        {!! Form::label('password', 'Password') !!}
                                        {!! Form::password('password', ['class' => 'form-control form-control-user']) !!}
                                        <x-input-error :messages="$errors->get('password')" class="alert alert-danger" style="list-style: none" />
                                    </div>

                                    {{-- cnfrm password --}}
                                    <div class="col-sm-6">
                                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                        {!! Form::password('password_confirmation', ['class' => 'form-control form-control-user']) !!}
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="alert alert-danger" style="list-style: none" />
                                    </div>

                                </div>

                                {{-- role --}}
                                <div class="form-group">
                                    {!! Form::label('role', 'Role') !!}
                                    {!! Form::select('role', ['user' => 'User', 'admin' => 'Admin'], null, ['class' => 'form-control form-control-user']) !!}
                                    <x-input-error :messages="$errors->get('role')" class="alert alert-danger" style="list-style: none" />

                                </div>

                                {!! Form::submit('Register', ['class' => 'btn btn-primary btn-user btn-block']) !!}
                                
                                
                                {!! Form::close() !!}
                            <hr>
                            <div class="text-center w-100">
                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center w-100">
                                <a class="small" href="{{ route('login') }}">
                                    Already registered?
                                </a>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

