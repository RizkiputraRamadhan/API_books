@extends('layout.app')

@section('content')
    <h1>Edit Books</h1>

    <form action="{{ route('books-update', ['books' => $books->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Tittle</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $books->title) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description', $books->description) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Image</label>
            <input type="text" name="image_url" class="form-control" value="{{ old('image_url', $books->image_url) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Release Year</label>
            <input type="text" name="release_year" class="form-control" value="{{ old('release_year', $books->release_year) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Pirce</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $books->price) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Total Page</label>
            <input type="text" name="total_page" class="form-control" value="{{ old('total_page', $books->total_page) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Thickness</label>
            <input type="text" name="thickness" class="form-control" value="{{ old('thickness', $books->thickness) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Category</label>
            <input type="text" name="category_id" class="form-control" value="{{ old('category_id', $books->category_id) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection