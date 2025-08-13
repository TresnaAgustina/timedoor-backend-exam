@extends('layouts.main')
@section('content')
    @if (session('error') || session('success') || $errors->any())
        <div class="z-999 relative mt-10 mb-5">
            @if (session('error'))
                <div class="w-full flex justify-end me-10">
                    <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="w-full flex justify-end me-10">
                    <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-green-500 bg-white rounded-lg shadow-sm dark:text-green-500 dark:bg-green-100" role="alert">
                        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-600 dark:text-green-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-gray-500 dark:bg-green-200 dark:hover:bg-green-200" data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            @foreach ($errors->all() as $error)
                <div class="w-full flex justify-end me-10">
                    <div id="toast-danger" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                            </svg>
                            <span class="sr-only">Error icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">{{ $error }}</div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <section class="w-full h-full flex flex-col justify-center items-center my-20">
        <div class="relative overflow-x-auto w-[80%]">
            <div class="mb-6 p-4 flex justify-between items-center bg-gray-50 border border-neutral-300 rounded-lg">
                <form action="{{ route('book.index') }}" method="GET" class="flex flex-col sm:flex-row sm:items-end sm:gap-4">
                    <div class="flex flex-col mb-4 sm:mb-0">
                        <label for="show" class="mb-1 text-sm font-medium text-gray-700">Show item:</label>
                        <select name="item" id="item" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @for ($i = 10; $i <= 100; $i += 10)
                                <option value="{{ $i }}" {{ request('item') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="flex flex-col mb-4 sm:mb-0">
                        <label for="search" class="mb-1 text-sm font-medium text-gray-700">Search book:</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Masukkan judul atau nama..." class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Filter
                        </button>
                    </div>
                </form>

                <div class="flex items-end gap-4">
                    <a href="{{ route('author.toplist') }}" class="cursor-pointer">
                        <button class="px-5 py-2 border border-neutral-400 text-neutral-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Top 10 Author
                        </button>
                    </a>
                    <a href="{{ route('book.rating.index') }}" class="cursor-pointer">
                        <button class="px-5 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Insert Rating
                        </button>
                    </a>
                </div>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5 border border-neutral-400 mb-2">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Book Title</th>
                        <th scope="col" class="px-6 py-3">Category Name</th>
                        <th scope="col" class="px-6 py-3">Author Name</th>
                        <th scope="col" class="px-6 py-3">Average Rating</th>
                        <th scope="col" class="px-6 py-3">Voter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr class="text-neutral-600">
                            <th class="px-6 py-4" scope="row">
                                {{ $books->firstItem() + $loop->index }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->categories->pluck('name')->implode(', ') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->author->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($item->ratings_avg_rating, 2) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->ratings_count }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $books->appends(request()->query())->links() }}
        </div>
    </section>
@endsection
