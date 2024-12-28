@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Enter category name (e.g., Batsmen, Bowlers)" required>
        </div>

        <!-- Category Type -->
        <div class="mb-3">
            <label for="type" class="form-label">Category Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="" disabled>Select Category Type</option>
                <option value="Player Role" {{ $category->type == 'Player Role' ? 'selected' : '' }}>Player Role</option>
                <option value="Team Type" {{ $category->type == 'Team Type' ? 'selected' : '' }}>Team Type</option>
                <!-- Add more category types as needed -->
            </select>
        </div>

        <!-- Optional Category Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter a description for the category (optional)">{{ $category->description }}</textarea>
        </div>

        <!-- Submit and Cancel Buttons -->
        <button type="submit" class="btn btn-primary">Update Category</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
