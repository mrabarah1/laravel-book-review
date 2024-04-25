@extends('layouts.app')


@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>

    <form method="GET" action="{{ route('books.index') }}" class="mb-4 flex items-center space-x-2">
        <input type="text" name="title" placeholder="Search by title" value="{{ request('title') }}" class="input h-10" />
        <button type="submit" class="btn h-10">Search</button>
        <a href="{{ route('books.index')}}" class="btn h-10">Clear</a>
    </form>

    <ul>
        @forelse ($books as $book)
            <li class="mb-4">
                <div class="text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <div
                    class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="{{route('books.show', $book)}}" class="book-title">{{ $book->title}}</a>
                        <span class="block text-slate-600"> by {{ $book->author}}</span>
                    </div>
                    <div>
                        <div class="text-sm font-medium text-slate-700">
                        {{ number_format($book->reviews_avg_rating, 1) }}
                        </div>
                        <div class="text-xs text-slate-500">
                            out of {{ $book->reviews_count }}{{ Str::plural('review', $book->reviews_count) }}
                        </div> 
                    </div>
                    </div>
                </div>
             </li>
        @empty
            <li class="mb-4">
                <div class="text-sm rounded-md bg-white py-10 px-4 text-center leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <p class="empty-text">No Books found</p>
                    <a href="{{ route('books.index')}}" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>
@endsection