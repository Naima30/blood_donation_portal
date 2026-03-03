@extends('admin.layout')

@section('title', 'Manage Users')

@section('content')

@if(session('success'))
    <div class="card" style="margin-bottom:20px;">
        <p style="color:green; font-weight:600;">
            {{ session('success') }}
        </p>
    </div>
@endif

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Blood Group</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->age ?? '-' }}</td>
            <td>{{ $user->blood_group ?? '-' }}</td>
            <td>
                @if($user->is_active)
                    <span class="badge active">Active</span>
                @else
                    <span class="badge blocked">Blocked</span>
                @endif
            </td>
            <td>
                <form method="POST"
                      action="{{ route('admin.users.toggle', $user->id) }}">
                    @csrf
                    <button type="submit"
                            style="
                                padding:6px 12px;
                                border:none;
                                border-radius:6px;
                                cursor:pointer;
                                background:#b11226;
                                color:white;
                            ">
                        {{ $user->is_active ? 'Block' : 'Unblock' }}
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
