@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="ml-2">Edit Image</h2>
        <div class="shadow p-4 mb-4">
            {!! Form::model($image, ['route' => ['images.update', $image->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'imageForm']) !!}
                @csrf
                @method('PUT')

                {{-- name --}}
                <div class="form-group mb-3">
                    {!! Form::label('name', 'Image Name:') !!}
                    {!! Form::text('name', $image->name, ['class' => 'form-control']) !!}
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- image --}}
                <div class="form-group mb-3">
                    {!! Form::label('image', 'Choose New Image (optional):') !!}
                    {!! Form::file('image', ['class' => 'form-control mb-3', 'id' => 'imageInput']) !!}
                    <p>Accepted file types are jpeg, png, jpg, and gif, max size 2mb.</p>
                    <div id="imagePreview"></div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                <a class="btn btn-secondary" href="{{ route('images.index') }}">Cancel</a>

            {!! Form::close() !!}
        </div>
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
