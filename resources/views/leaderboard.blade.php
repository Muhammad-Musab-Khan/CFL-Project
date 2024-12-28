@extends('layouts.web')
@section('content')


<style>
        /* Custom Styles for the Leaderboard Page */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Make the body take full height */
        }

        .container {
            flex: 1; /* Make the container grow to fill available space */
        }

        footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .leaderboard table {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Styles for smaller images */
        .card-img-top {
            max-width: 150px; /* Adjust to desired width */
            height: auto; /* Maintain aspect ratio */
            margin: 0 auto; /* Center the image */
        }
    </style>    





    <!-- Leaderboard Section -->
    <section class="leaderboard py-5">
        <div class="container">
            <h2 class="text-center mb-4">Leaderboard</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Player Name</th>
                        <th scope="col">Score</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ahsan Ali</td>
                        <td>1500</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Adam Raza</td>
                        <td>1450</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Javed Akhtar</td>
                        <td>1400</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Ayan Maqsood</td>
                        <td>1350</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Murtaza Iqbal</td>
                        <td>1300</td>
                    </tr>
                    <!-- Add more players as needed -->
                </tbody>
            </table>

            <!-- Additional Features Section -->
            <div class="text-center mt-5">
                <h3>Featured Players</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="https://www.shutterstock.com/image-photo/closeup-photo-young-confident-attractive-260nw-2188997483.jpg" class="card-img-top" alt="Player 1">
                            <div class="card-body">
                                <h5 class="card-title">Player 1</h5>
                                <p class="card-text">Top performer this season with exceptional scores.</p>
                                <a href="#" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="https://d38b044pevnwc9.cloudfront.net/cutout-nuxt/home/9-change.jpg" class="card-img-top" alt="Player 2">
                            <div class="card-body">
                                <h5 class="card-title">Player 2</h5>
                                <p class="card-text">Consistent scorer with a great strategy.</p>
                                <a href="#" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="https://www.shutterstock.com/image-photo/portrait-attractive-young-asian-woman-260nw-2411114955.jpg" class="card-img-top" alt="Player 3">
                            <div class="card-body">
                                <h5 class="card-title">Player 3</h5>
                                <p class="card-text">Rising star with impressive performances.</p>
                                <a href="#" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

   

    @endsection

