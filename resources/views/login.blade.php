<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <label for="">Team Name</label>
        <input type="text" name="team_name">

        <label for="">Password</label>
        <input type="password" name = "password">

        <button type="submit">Sign In</button>
        
        @if ($errors->any())
            <div style="color: red;">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
            </div>
        @endif
    </form>
    <br>
    <a class="btn btn-primary" href="{{ route('register') }}" role="button">CREATE ACCOUNT</a>

</body>
</html>