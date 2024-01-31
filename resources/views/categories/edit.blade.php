@extends('layout.app')

@section('content')
    <h1>Edit Category</h1>

    <form action="{{ route('categories-update', ['categories' => $categories->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $categories->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection