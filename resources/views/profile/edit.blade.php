@extends('layouts.app')
@section('title', 'Update Profile')
    
@section('content')

{{-- update profile information --}}
    <div class="p-4 rounded shadow px-5 mb-5">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Profile Information
                </h2>
        
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Update your account's profile information and email address.
                </p>
            </header>
        
            {!! Form::open(['method' => 'patch', 'route' => 'profile.update', 'class' => 'mt-6 space-y-6']) !!}
            {{ csrf_field() }}
            
            {{-- name --}}
            <div class="mb-3">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', old('name', $user->name), ['class' => 'form-control', 'autocomplete' => 'name']) !!}
                @error('name')
                    <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                @enderror
            </div>
            
            {{-- email --}}
            <div class="mb-3">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', old('email', $user->email), ['class' => 'form-control', 'autocomplete' => 'username']) !!}
                @error('email')
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @enderror
        
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                            Your email address is unverified.
        
                            {!! Form::button('Click here to re-send the verification email', ['form' => 'send-verification', 'class' => 'underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800']) !!}
                        </p>
        
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-success">
                                A new verification link has been sent to your email address.
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        
            <div class="d-flex align-items-center gap-4">
                {!! Form::submit('Save', ['class' => 'btn btn-success mb-5']) !!}
            </div>
            @if (session('status') === 'profile-updated')
                    <div class="alert alert-success">
                        Saved.
                    </div>
            @endif
            {!! Form::close() !!}
        
        </section>
    </div>

@endsection
