@extends('admin.layout')

@section('title', 'Emergency Requests')

@section('content')

<table>
    <thead>
        <tr>
            <th>Patient</th>
            <th>Blood Group</th>
            <th>Hospital</th>
            <th>Contact</th>
            <th>Details</th>
            <th>Requested At</th>
        </tr>
    </thead>

    <tbody>
    @forelse($emergencies as $e)
        <tr>
            <td>{{ $e->patient_name }}</td>
            <td>{{ $e->blood_group }}</td>
            <td>{{ $e->hospital }}</td>
            <td>{{ $e->contact }}</td>
            <td>{{ $e->details ?? '-' }}</td>
            <td>{{ $e->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="text-align:center; padding:20px;">
                No emergency requests found
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

@endsection
