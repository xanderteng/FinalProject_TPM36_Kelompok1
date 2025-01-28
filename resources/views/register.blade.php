<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
    </style>
</head>
<body>
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="step active" id="step1">

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

            <button type="button" onclick="nextStep()">Next</button>
        </div>

        
        <div class="step" id="step2">

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

            <label for="member_1">Member 1 Name</label>
            <input id="member_1" type="text" name="member_1" value="{{ old('member_1') }}"><br>
            @error('member_1')
            <p style="color: red;">{{ $message }}</p>
            @enderror

            <label for="member_1_email">Member 1 Email</label>
            <input id="member_1_email" type="email" name="member_1_email" value="{{ old('member_1_email') }}"><br>
            @error('member_1_email')
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
                <input type="radio" name="binusian" id="binusian_yes" value="0" {{ old('binusian') == 0 ? 'checked' : '' }} onclick="toggleCardUpload()">
                <label for="binusian_no">Non-Binusian</label>
                <input type="radio" name="binusian" id="binusian_no" value="1" {{ old('binusian') == 1 ? 'checked' : '' }} onclick="toggleCardUpload()">
            </div>

            <label for="leader_card" id="leader_card_label">Upload ID Card</label><br>
            <input id="leader_card" type="file" name="leader_card" accept=".pdf, .jpg, .jpeg, .png"><br>
            @error('leader_card')
            <p style="color: red;">{{ $message }}</p>
            @enderror

            <button type="submit">Register</button>
        </div>

        <script>
            function nextStep() {
                document.getElementById('step1').classList.remove('active');
                document.getElementById('step2').classList.add('active');
            }

            function toggleCardUpload() {
                const binusianYes = document.getElementById('binusian_yes');
                const leaderCardLabel = document.getElementById('leader_card_label');
                
                if (binusianYes.checked) {
                    leaderCardLabel.textContent = 'Upload Flazz Card'; 
                } else {
                    leaderCardLabel.textContent = 'Upload ID Card';
                }
            }

            window.onload = function() {
                toggleCardUpload();
            };
        </script>

    </form>
</body>
</html>
