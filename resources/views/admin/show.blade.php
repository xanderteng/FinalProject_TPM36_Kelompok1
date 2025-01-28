<!-- resources/views/admin/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Team Details</h1>
        <table class="table">
            <tr>
                <th>Team Name</th>
                <td>{{ $team->team_name }}</td>
            </tr>
            <tr>
                <th>Leader Name</th>
                <td>{{ $team->leader_name }}</td>
            </tr>
            <tr>
                <th>Leader Email</th>
                <td>{{ $team->leader_email }}</td>
            </tr>
            <tr>
                <th>Leader WhatsApp</th>
                <td>{{ $team->leader_whatsapp }}</td>
            </tr>
            <tr>
                <th>Leader GitHub</th>
                <td>{{ $team->leader_github }}</td>
            </tr>
            <tr>
                <th>Team Members</th>
                <td>{{ $team->member_1 }}, {{ $team->member_2 }}, {{ $team->member_3 }}</td>
            </tr>
        </table>

        <a href="{{ route('admin.edit', $team->id) }}" class="btn btn-warning">Edit Team</a>
    </div>
@endsection
