<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <h1>Book List</h1>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Available Days</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($books as $book)
                                    <tr>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->available_days }}</td>
                                        <td>
                                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                                            {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
                                                {!! Form::token() !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this book?")']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Records Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <a href="{{ route('books.create') }}" class="btn btn-success">Add Book</a>
                    </div>

                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary my-5">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
