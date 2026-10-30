@extends('layouts.app')

@section('title', 'My Reading List')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-800">My Reading List</h1>
        <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
            + Add book
        </a>
    </div>

    @if($books->isEmpty())
        <div class="bg-white border border-slate-200 rounded-lg p-8 text-center text-slate-500">
            <p class="text-lg">No books yet</p>
        </div>
    @else
        <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach($books as $book)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $book->title }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $book->author }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                @if($book->status === 'to-read')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">To read</span>
                                @elseif($book->status === 'reading')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Reading</span>
                                @elseif($book->status === 'finished')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">Finished</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">{{ $book->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
