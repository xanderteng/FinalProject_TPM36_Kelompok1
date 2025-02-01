<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show all teams (for example)
    public function index(Request $request)
{
    if (Auth::user()->team_name !== 'Admin Team') {
        return redirect('/')->with('error', 'Unauthorized');
    }
    // Get search query and sort option from the request
    $search = $request->input('search');
    $sort = $request->input('sort', 'name_asc'); // Default sort by name (A-Z)

    // Build the query
    $query = User::query();

    // Search functionality
    if ($search) {
        $query->where('team_name', 'like', '%' . $search . '%');
    }

    // Sorting functionality
    if ($sort === 'name_asc') {
        $query->orderBy('team_name', 'asc');
    } elseif ($sort === 'name_desc') {
        $query->orderBy('team_name', 'desc');
    } elseif ($sort === 'date_newest') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'date_oldest') {
        $query->orderBy('created_at', 'asc');
    }

    // Get paginated teams
    $teams = $query->paginate(10);  // Adjust 10 per page as needed

    // Return the view with the teams, search term, and sort option
    return view('admin.index', compact('teams', 'search', 'sort'));
}


    // Show specific team details
    public function show($id)
    {
        // Check if the logged-in user is the "Admin"
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        return view('admin.show', compact('team'));
    }

    // Show the edit form for a specific team
    public function edit($id)
    {
        // Check if the logged-in user is the "Admin"
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        return view('admin.edit', compact('team'));
    }

    // Update the team information
    public function update(Request $request, $id)
    {
        // Check if the logged-in user is the "Admin"
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        $team->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Team updated successfully.');
    }

    // Delete a specific team
    public function destroy($id)
    {
        // Check if the logged-in user is the "Admin"
        if (Auth::user()->team_name !== 'Admin Team') {
            return redirect('/')->with('error', 'Unauthorized');
        }

        $team = User::findOrFail($id);
        $team->delete();
        return redirect()->route('admin.index')->with('success', 'Team deleted successfully.');
    }
}