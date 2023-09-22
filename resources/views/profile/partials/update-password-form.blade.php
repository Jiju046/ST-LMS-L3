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

            <div class="mb-3">
                {!! Form::label('current_password', 'Current Password') !!}
                {!! Form::password('current_password', ['class' => 'form-control', 'autocomplete' => 'current-password']) !!}
                @error('current_password')
                    <div class="alert alert-danger">{{ $errors->first('updatePassword.current_password') }}</div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('password', 'New Password') !!}
                {!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
                @error('password')
                    <div class="alert alert-danger">{{ $errors->first('updatePassword.password') }}</div>
                @enderror
            </div>

            <div class="mb-3">
                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'new-password']) !!}
                @error('password_confirmation')
                    <div class="alert alert-danger">{{ $errors->first('updatePassword.password_confirmation') }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-4">
                {!! Form::submit('Save', ['class' => 'btn btn-success mb-5']) !!}

                @if (session('status') === 'password-updated')
                    <p class="text-success">
                        Saved.
                    </p>
                @endif
            </div>
        {!! Form::close() !!}

</section>