@extends('layouts.app')
@section('title', 'Update Password')
    
@section('content')

{{-- update password --}}
<div class="p-4 rounded shadow px-5 mb-5">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Update Password
            </h2>
    
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Ensure your account is using a long, random password to stay secure.
            </p>
        </header>
    
            {!! Form::open(['method' => 'put', 'route' => 'password.update', 'class' => 'mt-6 space-y-6']) !!}
            {{ csrf_field() }}

                {{-- current password --}}
                <div class="mb-3">
                    {!! Form::label('current_password', 'Current Password') !!}
                    {!! Form::password('current_password', ['class' => 'form-control', 'autocomplete' => 'current-password']) !!}
                    @error('current_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                {{-- New password --}}
                <div class="mb-3">
                    {!! Form::label('password', 'New Password') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                
                {{-- confirm password --}}
                <div class="mb-3">
                    {!! Form::label('password_confirmation', 'Confirm Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                </div>
    
                <div class="d-flex align-items-center gap-4">
                    {!! Form::submit('Save', ['class' => 'btn btn-success mb-5']) !!}

                </div>
                @if (session('status') === 'password-updated')
        
                            <div class="alert alert-success w-100">Saved.</div>
                        
                @endif
            {!! Form::close() !!}
    
    </section>
</div>

@endsection