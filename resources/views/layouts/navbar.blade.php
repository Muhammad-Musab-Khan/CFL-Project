  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Cricket Fantasy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/selection') }}">Team Selection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/leaderboard') }}">Leaderboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">Login form</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('register') }}">Register</a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
