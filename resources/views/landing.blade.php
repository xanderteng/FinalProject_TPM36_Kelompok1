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
        
        </ul>

        <a class="btn btn-primary" href="{{ route('login') }}" role="button">LOGIN</a>

        </div>
    </div>
    </nav>
    
</body>
</html>