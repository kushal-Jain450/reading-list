@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-slate-800">Add New Book</h1>
        <a href="{{ route('books.index') }}" class="text-sm font-medium text-slate-600 hover:text-slate-900 transition">
            &larr; Back to list
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-lg">
            <h2 class="text-sm font-semibold text-rose-800 mb-2">There were some problems with your input:</h2>
            <ul class="list-disc list-inside text-sm text-rose-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white border border-slate-200 rounded-lg shadow-sm p-6 sm:p-8">
        <form action="{{ route('books.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">
                    Title <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}" 
                    class="w-full px-3 py-2 border @error('title') border-rose-500 ring-1 ring-rose-500 @else border-slate-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    placeholder="e.g. To Kill a Mockingbird"
                >
                @error('title')
                    <p class="mt-1.5 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Author -->
            <div>
                <label for="author" class="block text-sm font-medium text-slate-700 mb-1">
                    Author <span class="text-rose-500">*</span>
                </label>
                <input 
                    type="text" 
                    name="author" 
                    id="author" 
                    value="{{ old('author') }}" 
                    class="w-full px-3 py-2 border @error('author') border-rose-500 ring-1 ring-rose-500 @else border-slate-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                    placeholder="e.g. Harper Lee"
                >
                @error('author')
                    <p class="mt-1.5 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-slate-700 mb-1">
                    Status <span class="text-rose-500">*</span>
                </label>
                <select 
                    name="status" 
                    id="status" 
                    class="w-full px-3 py-2 border @error('status') border-rose-500 ring-1 ring-rose-500 @else border-slate-300 @enderror rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                >
                    <option value="to-read" {{ old('status', 'to-read') === 'to-read' ? 'selected' : '' }}>To read</option>
                    <option value="reading" {{ old('status') === 'reading' ? 'selected' : '' }}>Reading</option>
                    <option value="finished" {{ old('status') === 'finished' ? 'selected' : '' }}>Finished</option>
                </select>
                @error('status')
                    <p class="mt-1.5 text-xs text-rose-600 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('books.index') }}" class="px-4 py-2 border border-slate-300 rounded-lg text-sm font-medium text-slate-700 hover:bg-slate-50 transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium shadow-sm transition">
                    Save Book
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
