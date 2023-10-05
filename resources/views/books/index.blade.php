@extends('layouts.app')
 
@section('content')
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header">Manage Books <a href="{{ route('books.create') }}" class="btn btn-success" style="margin-left: 900px">Create</a></div>
            <div class="card-body">
                {{ $dataTable->table(['id' => 'book-table']) }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>

    {{-- for delete --}}
    <script>
        function deleteBook(button) {
            let bookId = $(button).data('id');
    
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: '/books/' + bookId,
                    type: 'DELETE',
                    success: function () {
                        // Reload the DataTable after successful deletion
                        $('#book-table').DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        alert('Error deleting book.');
                    }
                });
            }
        }
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
   
@endpush