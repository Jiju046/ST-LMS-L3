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
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}" class="user">
                                    @csrf
                                    
                                    <!-- Email Address -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
                                        <!-- Include any error messages here -->
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @enderror
                                
                                    <div class="flex items-center justify-end mt-4">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Email Password Reset Link</button>
                                    </div>
                                </form>
                                
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

