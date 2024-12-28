@extends('layouts.web')
@section('content')



    <!-- Hero Section -->
    <div class="hero-section">
        <h1>Welcome to the Cricket Fantasy League!</h1>
        <p class="lead">Join the excitement of fantasy cricket and manage your dream team.</p>
        <a href="selection.html" class="btn btn-primary">Get Started</a>
    </div>

    <!-- Features Section -->
    <div class="features">
        <div class="container">
            <h2 class="text-center">Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://storage.googleapis.com/a1aa/image/vwlJXSAS5rJaClAI5E1QKzvbb1EFzrUsfHhKKtMSRr5zjC3JA.jpg" class="card-img-top" alt="Feature 1">
                        <div class="card-body">
                            <h5 class="card-title">Real-Time Stats</h5>
                            <p class="card-text">Stay updated with live scores and player statistics.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://storage.googleapis.com/a1aa/image/qhq18PhUD17HJ1PxwgRYfYeJEmM83gRmi2IkZdS7arjMIFuTA.jpg" class="card-img-top" alt="Feature 2">
                        <div class="card-body">
                            <h5 class="card-title">Custom Teams</h5>
                            <p class="card-text">Build your own team with your favorite players.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://storage.googleapis.com/a1aa/image/E0UytOnllA6lKNHeICfxZtcntBnMOiLleV6yOmiSQIjXRKcnA.jpg" class="card-img-top" alt="Feature 3">
                        <div class="card-body">
                            <h5 class="card-title">Compete with Friends</h5>
                            <p class="card-text">Challenge your friends and see who scores the highest!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="how-it-works">
        <div class="container">
            <h2 class="text-center">How It Works</h2>
            <ol>
                <li>Create an account and log in.</li>
                <li>Select your favorite players to build your team.</li>
                <li>Compete against others and track your score!</li>
            </ol>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials">
        <div class="container">
            <h2 class="text-center">What Our Users Say</h2>
            <blockquote>
                <p>"This fantasy league is so engaging! I love managing my team!"</p>
                <footer>- Adeel Ansari</footer>
            </blockquote>
        </div>
    </div>

  

    @endsection

