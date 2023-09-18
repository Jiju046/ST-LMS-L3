<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            View Book Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="container">

                        <p><strong>Title:</strong> {{ $book->title }}</p>
                        <p><strong>Available Days:</strong> {{ $book->available_days }}</p>
                        <a href="{{ route('books.index') }}" class="button button-green">Back to List</a>
                    </div>
</x-app-layout>
