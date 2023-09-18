<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Book List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        @if(session('success'))
                        {{-- alert --}}
                            <div class="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table>
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
                                            <a href="{{ route('books.show', $book->id) }}" class="button button-blue">View</a>
                                            <a href="{{ route('books.edit', $book->id) }}" class="button button-cyan">Edit</a>
                                            {!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'DELETE', 'style' => 'display: inline;']) !!}
                                                {!! Form::token() !!}
                                                {!! Form::submit('Delete', ['class' => 'button button-red', 'onclick' => 'return confirm("Are you sure you want to delete this book?")']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="center-text">No Records Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <a href="{{ route('books.create') }}" class="button button-green">Add Book</a>
                    </div>

                    <div>
                        <a href="{{ route('dashboard') }}" class="button button-cyan margin-y">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
