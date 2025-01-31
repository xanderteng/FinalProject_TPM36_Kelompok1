<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPM 36 Hackathon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('landing') }}">HACKATHON</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
            <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}">HOME</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}">PRIZE</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}">MENTOR & JURY</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}">ABOUT</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}">FAQ</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('landing') }}">TIMELINE</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" href="{{ Auth::check() ? route('dashboard', Auth::id()) : route('getLogin') }}">DASHBOARD</a>
            </li>
            
        </ul>

        @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">LOGOUT</button>
            </form>
        @else
                    <a class="btn btn-primary" href="{{ route('login') }}" role="button">LOGIN</a>
        @endif

        </div>
    </div>
    </nav>
    
    <div class="contactUs container mt-5">
        <h2>Contact Us!</h2>
        <form action="{{ route('sendEmail') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Email</button>
        </form>
    </div>
</body>
</html>