@extends('layouts.app')

@section('content')
    <div class="container shadow p-4 mb-4">
        <h2 class="ml-2">Upload Image</h2>
        {!! Form::open(['route' => 'images.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        {{-- name --}}
        <div class="form-group mb-3">
            {!! Form::label('name', 'Image Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        
        {{-- image --}}
        <div class="form-group mb-3">
            {!! Form::label('image', 'Choose Image:') !!}<br>
            {!! Form::file('image', ['class' => 'form-control', 'id' => 'imageInput']) !!}
            <p>Accepted file types are jpeg, png, jpg, and gif, max size 2mb.</p>
            <div id="imagePreview"></div>
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        {!! Form::submit('Upload', ['class' => 'btn btn-primary']) !!}
        <a class="btn btn-secondary" href="{{ route('images.index') }}">Cancel</a>
    {!! Form::close() !!}

    </div>

    <script>
        $(document).ready(function() {
            // Function to preview the selected image
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').html('<img src="' + e.target.result + '" class="img-fluid" alt="Image Preview" />');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            // Trigger the preview when a new image is selected
            $("#imageInput").change(function() {
                readURL(this);
            });
        });
    </script>
@endsection