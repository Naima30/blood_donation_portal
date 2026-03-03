@extends('admin.layout')

@section('title', 'Manage Appointments')

@section('content')

<table>
    <thead>
        <tr>
            <th>Donor</th>
            <th>Email</th>
            <th>Date</th>
            <th>Time</th>
            <th>Center</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
    @foreach($appointments as $a)
        <tr>
            <td>{{ $a->name }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->appointment_date }}</td>
            <td>{{ $a->appointment_time ?? '-' }}</td>
            <td>{{ $a->center }}</td>
            <td>
                <span class="badge {{ $a->status === 'approved' ? 'active' : 'blocked' }}">
                    {{ ucfirst($a->status) }}
                </span>
                <td>
@if($a->status === 'scheduled')
    <form method="POST"
          action="{{ route('admin.appointment.complete', $a->id) }}"
          class="d-inline">
        @csrf
        @method('PATCH')

        <button type="button"
                class="btn btn-sm btn-success"
                data-confirm
                data-title="Mark as Completed?"
                data-text="Confirm that this donation was successfully completed."
                data-confirm-text="Yes, completed">
            Completed?
        </button>
    </form>
@endif

</td>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
