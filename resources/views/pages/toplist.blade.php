@extends('layouts.main')
@section('content')
    <section class="w-full h-full flex flex-col justify-center items-center my-20">
        <div class="relative overflow-x-auto w-[80%]">
            <div class="mb-6 p-4 flex items-center bg-gray-50 border border-neutral-300 rounded-lg">
                <a href="{{ route('book.index') }}" class="mr-2">
                    <button class="px-2 border border-neutral-400 text-neutral-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <i class="fa-solid fa-caret-left"></i>
                    </button>
                </a>
                <h1>Top 10 Author</h1>
            </div>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5 border border-neutral-400 mb-2">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No.</th>
                        <th scope="col" class="px-6 py-3">Author name</th>
                        <th scope="col" class="px-6 py-3">Voter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $item)
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ $loop->iteration }}</th>
                            <th scope="col" class="px-6 py-3">{{ $item->name }}</th>
                            <th scope="col" class="px-6 py-3">{{ $item->ratings_count }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
