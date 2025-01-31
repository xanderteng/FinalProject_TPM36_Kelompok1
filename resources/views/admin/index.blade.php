@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Registered Teams</h1>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Search and Sort Form -->
        <form method="GET" action="{{ route('admin.index') }}" class="mb-4">
            <div class="row">
                <!-- Search field -->
                <div class="col">
                    <input type="text" name="search" value="{{ old('search', $search) }}" class="form-control" placeholder="Search by team name">
                </div>
                <!-- Sort dropdown -->
                <div class="col">
                    <select name="sort" class="form-select">
                        <option value="name_asc" {{ $sort === 'name_asc' ? 'selected' : '' }}>Sort by Name (A-Z)</option>
                        <option value="name_desc" {{ $sort === 'name_desc' ? 'selected' : '' }}>Sort by Name (Z-A)</option>
                        <option value="date_newest" {{ $sort === 'date_newest' ? 'selected' : '' }}>Sort by Newest Registration</option>
                        <option value="date_oldest" {{ $sort === 'date_oldest' ? 'selected' : '' }}>Sort by Oldest Registration</option>
                    </select>
                </div>
                <!-- Search and sort button -->
                <div class="col">
                    <button type="submit" class="btn btn-primary">Search and Sort</button>
                </div>
            </div>
        </form>

        <!-- Teams List -->
        <table class="table">
            <thead>
                <tr>
                    <th>Team Name</th>
                    <th>Leader Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->leader_name }}</td>
                        <td>{{ $team->leader_email }}</td>
                        <td>
                            <a href="{{ route('admin.show', $team->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.destroy', $team->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links (if needed) -->
        {{ $teams->links() }}
    </div>
@endsection