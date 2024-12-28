@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Add Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name (e.g., Batsmen, Bowlers)" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Category Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="" disabled selected>Select Category Type</option>
                <option value="Player Role">Player Role</option>
                <option value="Team Type">Team Type</option>
                <!-- Add more category types as needed -->
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter a description for the category (optional)"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
