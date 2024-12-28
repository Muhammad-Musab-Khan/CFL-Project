@extends('layouts.web')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .container {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    /* Pitch Styles */
    .pitch {
        background: linear-gradient(to bottom, #006400, #228B22);
        border-radius: 10px;
        width: 75%;
        padding: 20px;
        display: grid;
        grid-template-rows: repeat(6, auto);
        gap: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .position-row {
        display: flex;
        justify-content: center;
        gap: 20px;
    }

    .player-card {
        width: 80px;
        text-align: center;
        color: #fff;
        font-size: 0.85rem;
        font-weight: bold;
        background-color: #333;
        padding: 10px;
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: pointer;
    }

    .player-card img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 5px;
        border: 2px solid #fff;
    }

    .player-card:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.5);
    }

    .team-name {
        text-align: center;
        color: #fff;
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    /* Sidebar Styles */
    .sidebar {
        background: #fff;
        border-radius: 10px;
        width: 20%;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }

    .sidebar .search-bar input {
        border-radius: 20px;
        border: 1px solid #ddd;
        padding: 10px;
    }

    .sidebar h4 {
        color: #007bff;
        margin-bottom: 15px;
    }

    .sidebar .player-info {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
        background: #f9f9f9;
        transition: background 0.2s ease, transform 0.2s ease;
    }

    .sidebar .player-info:hover {
        background-color: #007bff;
        color: white;
        transform: scale(1.05);
    }

    .sidebar .player-info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>

<div class="container">
    <!-- Pitch Section -->
    <div class="pitch">
        <div class="team-name">My Fantasy Team</div>

        <!-- Wicketkeepers Section -->
        <div class="position-row">
            <h4 class="text-white text-center">Wicketkeepers</h4>
            @foreach ($wicketkeepers as $player)
                <div class="player-card">
                    <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}">
                    <div>{{ $player->name }}</div>
                </div>
            @endforeach
        </div>

        <!-- Batsmen Section -->
        <div class="position-row">
            <h4 class="text-white text-center">Batsmen</h4>
            @foreach ($batsmen as $player)
                <div class="player-card">
                    <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}">
                    <div>{{ $player->name }}</div>
                </div>
            @endforeach
        </div>

        <!-- All-Rounders Section -->
        <div class="position-row">
            <h4 class="text-white text-center">All-Rounders</h4>
            @foreach ($allRounders as $player)
                <div class="player-card">
                    <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}">
                    <div>{{ $player->name }}</div>
                </div>
            @endforeach
        </div>

        <!-- Bowlers Section -->
        <div class="position-row">
            <h4 class="text-white text-center">Bowlers</h4>
            @foreach ($bowlers as $player)
                <div class="player-card">
                    <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}">
                    <div>{{ $player->name }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="search-bar">
            <input type="text" id="search-bar" class="form-control" placeholder="Search players..." onkeyup="filterPlayers()">
        </div>
        <h4>Available Players</h4>
        @foreach ($availablePlayers as $player)
            <div class="player-info">
                <img src="{{ asset($player->image_url) }}" alt="{{ $player->name }}">
                <div>{{ $player->name }}</div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function filterPlayers() {
        const searchInput = document.getElementById('search-bar').value.toLowerCase();
        const playerCards = document.querySelectorAll('.sidebar .player-info');

        playerCards.forEach(card => {
            const playerName = card.querySelector('div').innerText.toLowerCase();
            card.style.display = playerName.includes(searchInput) ? 'block' : 'none';
        });
    }
</script>

@endsection
