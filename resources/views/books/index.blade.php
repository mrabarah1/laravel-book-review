@extends('layouts.app')


@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>

    <form action=""></form>

    <ul>
        @forelse ($books as $book)
            <li class="mb-4">
                <div class="text-sm rounded-md bg-white p-4 leading-6 text-slate-900 shadow-md shadow-black/5 ring-1 ring-slate-700/10">
                    <div
                    class="flex flex-wrap items-center justify-between">
                    <div class="w-full flex-grow sm:w-auto">
                        <a href="#" class="book-title">Book Title</a>
                        <span class="block text-slate-600">by Emeka Abarah</span>
                    </div>
                    <div>
                        <div class="text-sm font-medium text-slate-700">
                        3.5
                        </div>
                        <div class="text-xs text-slate-500">
                        out of 5 reviews
                        </div>
                    </div>
                    </div>
                </div>
             </li>
        @empty
            <li class="mb-4">
                <div class="empty-book-item">
                    <p class="empty-text">No Books found</p>
                    <a href="#" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>
@endsection