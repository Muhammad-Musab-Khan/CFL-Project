@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Player List</h1>
    <a href="{{ route('admin.players.create') }}" class="btn btn-primary">Add Player</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Position</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->category->name ?? 'No Category' }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->price }}</td>
                <td>
                    @if ($player->image_url)
                        <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}" width="50" height="50">
                    @else
                        <img src="https://via.placeholder.com/50" alt="No Image" width="50" height="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.players.edit', $player->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this player?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $players->links() }}
    </div>
</div>
@endsection
