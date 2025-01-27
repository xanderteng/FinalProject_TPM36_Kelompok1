<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    function getRegister(){
        return view('register');
    }

    function register(Request $request){
        $request->validate([
            'team_name' => 'required',
            'password' => [
                'required',
                'min:8', 
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^\w]/',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'min:8', 
                'regex:/[A-Z]/',
                'regex:/[a-z]/',
                'regex:/[0-9]/',
                'regex:/[^\w]/',
            ],
            'leader_name' => 'required',
            'leader_email' => ['required', 'unique:users'],
            'leader_whatsapp' => ['required', 'unique:users'],
            'leader_line' => ['required', 'unique:users'],
            'leader_github' => 'required',
            'leader_birth_place' => 'required',
            'leader_birth_date' => [
            'required',
            'date',
            'before:' . Carbon::now()->subYears(17)->toDateString()
            ],
            'leader_cv' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'binusian' => 'required|boolean',
            'leader_card' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ],[
            "team_name.required" => "Team name is required",
            "password.required" => "Password is required",
            "password.min" => "Password must be 8 characters long",
            "password.regex" => "Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.",
            'password.confirmed' => 'Password confirmation does not match.',
            "leader_name.required" => "Leader Full Name is required",
            "leader_email.required" => "Email is required",
            "leader_email.unique" => "Email is already registered",
            "leader_whatsapp.required" => "Whatsapp number is required",
            "leader_whatsapp.unique" => "Whatsapp number is already registered",
            "leader_line.required" => "Line ID is required",
            "leader_line.unique" => "Line ID is already registered",
            "leader_github.required" => "Github/Gitlab ID is required",
            "leader_birth_place.required" => "Birth Place is required",
            "leader_birth_date.required" => "Birth Date is required",
            'leader_birth_date.before' => 'You must be at least 17 years old to register.',
            "leader_cv.required" => "The CV is required",
            "leader_cv.mimes" => "The CV must be a file of type: pdf, jpg, jpeg, png.",
            "leader_cv.max" => "The CV must be less than 2MB",
            "leader_card.required" => "ID Card is required",
            "leader_card.mimes" => "ID Card must be a file of type: pdf, jpg, jpeg, png.",
            "leader_card.max" => "ID Card must be less than 2MB",
        ]);

        $now = now()->format('Y-m-d_H.i.s');

        $leaderCvFile = $request->file('leader_cv');
        $leaderCvFilename = $now . '_' . $leaderCvFile->getClientOriginalName();
        $leaderCvFile->storeAs('public/leader_cv', $leaderCvFilename);

        $leaderCardFile = $request->file('leader_card');
        $leaderCardFilename = $now . '_' . $leaderCardFile->getClientOriginalName();
        $leaderCardFile->storeAs('public/leader_card', $leaderCardFilename);

        User::create([
            'team_name' => $request -> team_name,
            'password' => bcrypt($request->password),
            'leader_name' => $request -> leader_name,
            'leader_email'  => $request -> leader_email,
            'leader_whatsapp'  => $request -> leader_whatsapp,
            'leader_line'  => $request -> leader_line,
            'leader_github' => $request -> leader_github,
            'leader_birth_place' => $request -> leader_birth_place,
            'leader_birth_date' => $request -> leader_birth_date,
            'leader_cv' => $leaderCvFilename,
            'binusian' => $request->input('binusian'),
            'leader_card' => $leaderCardFilename
        ]);

        return redirect('/')->with('success', 'Team registered successfully!');
    }

    function getLogin(){
        return view('login');
    }

    function login(Request $request){
        $request->validate([
            'team_name' => 'required',
            'password' => 'required'
        ]);

        $credentials = ([
            'team_name' => $request -> team_name,
            'password' => $request -> password
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Cookie::queue('team_name', Auth::user()->team_name);
            Log::info(Auth::user()->team_name.' is login.');
            return redirect('/');
        }
        return back()->withErrors([
            'team_name' => 'The provided credentials do not match our records.'
        ])->onlyInput('team_name');
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::expire('team_name');
        return redirect('/');
    }
}
