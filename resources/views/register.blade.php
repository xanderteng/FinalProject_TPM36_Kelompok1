<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="team_name">Team Name</label>
        <input id="team_name" type="text" name="team_name" value="{{ old('team_name') }}"><br>
        @error('team_name')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="password">Password</label>
        <input id="password" type="password" name="password"><br>
        @error('password')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation"><br>
        @error('password_confirmation')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_name">Leader Full Name</label>
        <input id="leader_name" type="text" name="leader_name" value="{{ old('leader_name') }}"><br>
        @error('leader_name')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_email">Email</label>
        <input id="leader_email" type="email" name="leader_email" value="{{ old('leader_email') }}"><br>
        @error('leader_email')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_whatsapp">Whatsapp</label>
        <input id="leader_whatsapp" type="text" name="leader_whatsapp" value="{{ old('leader_whatsapp') }}"><br>
        @error('leader_whatsapp')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_line">Line ID</label>
        <input id="leader_line" type="text" name="leader_line" value="{{ old('leader_line') }}"><br>
        @error('leader_line')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_github">Github/Gitlab ID</label>
        <input id="leader_github" type="text" name="leader_github" value="{{ old('leader_github') }}"><br>
        @error('leader_github')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_birth_place">Birth Place</label>
        <input id="leader_birth_place" type="text" name="leader_birth_place" value="{{ old('leader_birth_place') }}"><br>
        @error('leader_birth_place')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_birth_date">Birth Date</label>
        <input id="leader_birth_date" type="date" name="leader_birth_date" value="{{ old('leader_birth_date') }}"><br>
        @error('leader_birth_date')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <label for="leader_cv">Upload CV</label><br>
        <input id="leader_cv" type="file" name="leader_cv" accept=".pdf, .jpg, .jpeg, .png"><br>
        @error('leader_cv')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <div class="binusian">
            <label for="binusian_yes">Binusian</label>
            <input type="radio" name="binusian" id="binusian_yes" value="0" {{ old('binusian') == 0 ? 'checked' : '' }}>
            <label for="binusian_no">Non-Binusian</label>
            <input type="radio" name="binusian" id="binusian_no" value="1" {{ old('binusian') == 1 ? 'checked' : '' }}>
        </div>

        <label for="leader_card">Upload ID Card</label><br>
        <input id="leader_card" type="file" name="leader_card" accept=".pdf, .jpg, .jpeg, .png"><br>
        @error('leader_card')
        <p style="color: red;">{{ $message }}</p>
        @enderror

        <button type="submit">Register</button>
    </form>
</body>
</html>
