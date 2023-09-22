@extends('layouts.layout')
@section('title', 'Profile')
    
@section('content')

{{-- update profile information --}}
    <div class="p-4 rounded shadow px-5 mb-5">
        @include('profile.partials.update-profile-information-form')
    </div>

{{-- update password --}}
    <div class="p-4 rounded shadow px-5 mb-5">
        @include('profile.partials.update-password-form')
    </div>

{{-- delete user --}}
    <div class="p-4 rounded shadow px-5">
        @include('profile.partials.delete-user-form')
    </div>
@endsection
