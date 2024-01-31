@extends('layout.app')

@section('content')
    <h1>Add Books</h1>

    <form action="{{ route('books-store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>
       <div class="form-group">
            <label for="image_url">Image Url</label>
            <input type="text" name="image_url" id="image_url" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="release_year">Release Year</label>
            <input type="number" name="release_year" id="release_year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_page">Total Page</label>
            <input type="text" name="total_page" id="total_page" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="thickness">Thickness</label>
            <input type="text" name="thickness" id="thickness" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <input type="text" name="category_id" id="category_id" class="form-control" required>
        </div> 
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection