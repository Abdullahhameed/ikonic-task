@extends('layouts.frontend-app')
@section('content')
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <div class="w-full my-2 font-bold leading-tight text-gray-800 flex flex-row justify-between">
                <h2 class="order-first text-3xl">Create Feedback</h2>
                <a href="{{ url()->previous() }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 text-1xl">Back</a>
            </div>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="w-full">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('save-feedback') }}" method="POST"
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-5/6">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 @error('title') text-red-700 dark:text-red-500 @enderror" for="title">
                            Title
                        </label>
                        <input
                            class="shadow is-invalid appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror"
                            id="title" name="title" type="text" aria-describedby="filled_error_help"
                            placeholder="Title">
                        @error('title')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 @error('category') text-red-700 dark:text-red-500 @enderror" for="category">
                            Category
                        </label>
                        <input
                            class="shadow is-invalid appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror"
                            id="category" name="category" type="text" aria-describedby="filled_error_help_category"
                            placeholder="Category">
                            @error('category')
                                <p id="filled_error_help_category" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2 @error('description') text-red-700 dark:text-red-500 @enderror" for="description">
                            Description
                        </label>
                        <textarea class="ckeditor form-control @error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400 @enderror" aria-describedby="filled_error_help" name="description"></textarea>
                        @error('description')
                            <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Create
                        </button>
                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2020 Acme Corp. All rights reserved.
                </p>
            </div>
        </div>
    </section>
@endsection
