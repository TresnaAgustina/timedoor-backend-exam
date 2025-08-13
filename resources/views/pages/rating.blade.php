@extends('layouts.main')

@section('content')
<section class="w-full h-full flex flex-col justify-center items-center my-20">
    <h1 class="text-3xl font-bold mb-8">Insert Rating</h1>

    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <form action="{{ route('book.rating.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="author_id" class="block text-sm font-medium text-gray-700">Book Author :</label>
                <select name="author_id" id="author_id" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">-- Select author --</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="book_id" class="block text-sm font-medium text-gray-700">Book Name :</label>
                <select name="book_id" id="book_id" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required disabled>
                    <option value="">-- Select author first --</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating :</label>
                <select name="rating" id="rating" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">-- Select rating --</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
</section>

<script>
    document.getElementById('author_id').addEventListener('change', function() {
        const authorId = this.value;
        const bookSelect = document.getElementById('book_id');

        // disable and set to empty the book dropdown when author doesn't exist
        bookSelect.innerHTML = '<option value="">-- Loading... --</option>';
        bookSelect.disabled = true;

        if (authorId) {
            // fetch data from api
            fetch(`/api/authors/${authorId}/books`)
                .then(response => response.json())
                .then(books => {
                    bookSelect.innerHTML = '<option value="">-- Select book --</option>';
                    // use data from api for option
                    books.forEach(book => {
                        const option = document.createElement('option');
                        option.value = book.id;
                        option.textContent = book.title;
                        bookSelect.appendChild(option);
                    });
                    bookSelect.disabled = false; // enable book dropdown again
                })
                .catch(error => {
                    console.error('Error fetching books:', error);
                    bookSelect.innerHTML = '<option value="">-- Failed fetch data --</option>';
                });
        } else {
            bookSelect.innerHTML = '<option value="">-- Select author first --</option>';
        }
    });
</script>
@endsection
