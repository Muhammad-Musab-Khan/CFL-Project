@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Player</h2>
    <form action="{{ route('admin.players.update', $player->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Player Name -->
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $player->name) }}" required>
            @if($errors->has('name'))
                <div class="text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Category -->
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $player->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                <div class="text-danger">{{ $errors->first('category_id') }}</div>
            @endif
        </div>

        <!-- Position -->
        <div class="form-group mb-3">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $player->position) }}">
            @if($errors->has('position'))
                <div class="text-danger">{{ $errors->first('position') }}</div>
            @endif
        </div>

        <!-- Price -->
        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $player->price) }}" required>
            @if($errors->has('price'))
                <div class="text-danger">{{ $errors->first('price') }}</div>
            @endif
        </div>

        <!-- Image -->
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if ($player->image_url)
                <div class="mt-2">
                    <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}" class="img-thumbnail" width="150">
                </div>
            @endif
            @if($errors->has('image'))
                <div class="text-danger">{{ $errors->first('image') }}</div>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Player</button>
    </form>
</div>
@endsection
