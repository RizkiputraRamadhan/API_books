@extends('layout.app')

@section('content')
    <h1>List Of Books</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('books-create') }}" class="btn btn-primary">+ Add Books</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tittle</th>
                <th>Description</th>
                <th>Image</th>
                <th>Release Year</th>
                <th>Price</th>
                <th>Total Page</th>
                <th>Thickness</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $books)
                <tr>
                    <td>{{ $books->id}}</td>
                    <td>{{ $books->title}}</td>
                    <td>{{ $books->description}}</td>
                    <td><img src="{{ $books->image_url}}" alt="{{ $books->title }}" width="50" height="auto"></td>
                    <td>{{ $books->release_year}}</td>
                    <td>{{ $books->price}}</td>
                    <td>{{ $books->total_page}}</td>
                    <td>{{ $books->thickness}}</td>
                    <td>{{ $books->category_id}}</td>
                    <td>
                        <a href="{{ route('books-edit', ['books' => $books->id]) }}"
                            class="btn btn-primary">Edit</a>
                        <form action="{{ route('books-delete', $books->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
