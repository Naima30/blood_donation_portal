@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold text-danger mb-1">Manage Appointments</h2>
        <p class="text-muted mb-0">
            View, reschedule, or cancel your blood donation slots
        </p>
    </div>

    {{-- INFO NOTE --}}
    <div class="alert alert-light border shadow-sm mb-4">
        <strong>ℹ Appointment Information</strong><br>
        You may reschedule or cancel appointments up to <b>24 hours</b> before the scheduled time.
        Completed appointments are kept for your records.
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- EMPTY STATE --}}
    @if($appointments->isEmpty())
        <div class="card shadow-sm border-0">
            <div class="card-body text-center text-muted py-5">
                <h5>No appointments scheduled</h5>
                <p class="mb-0">You currently don’t have any upcoming donations.</p>
            </div>
        </div>
    @else

        {{-- APPOINTMENT CARDS --}}
        @foreach($appointments as $appt)
            <div class="card shadow-sm border-0 mb-3 appointment-card">
                <div class="card-body d-flex justify-content-between align-items-start">

                    <!-- DATE -->
                    <div class="appointment-date text-center me-4">
                        <div class="fw-bold fs-4">
                            {{ \Carbon\Carbon::parse($appt->appointment_date)->format('d') }}
                        </div>
                        <div class="text-uppercase small text-muted">
                            {{ \Carbon\Carbon::parse($appt->appointment_date)->format('M Y') }}
                        </div>
                    </div>

                    <!-- DETAILS -->
                    <div class="flex-grow-1">
                        <div class="fw-semibold mb-1">
                            ⏰ {{ $appt->appointment_time }}
                        </div>

                        <div class="text-muted small mb-2">
                            📍 {{ $appt->center ?? '—' }}
                        </div>

                        @if($appt->status === 'scheduled')
                            <span class="badge bg-success">✓ Scheduled</span>
                        @elseif($appt->status === 'completed')
                            <span class="badge bg-secondary">✓ Completed</span>
                        @else
                            <span class="badge bg-danger">{{ ucfirst($appt->status) }}</span>
                        @endif
                    </div>

                    <!-- ACTIONS -->
                    <div class="action-buttons ms-4 text-end">
                        <button class="btn btn-outline-warning btn-sm w-100 mb-2"
                                data-bs-toggle="modal"
                                data-bs-target="#rescheduleModal{{ $appt->id }}"
                                {{ $appt->status === 'completed' ? 'disabled' : '' }}>
                            ✏️ Reschedule
                        </button>

                        <form method="POST"
                              action="{{ route('appointment.cancel', $appt->id) }}"
                              class="cancel-form">
                            @csrf
                            <button type="button"
                                    class="btn btn-outline-danger btn-sm w-100 btn-cancel"
                                    {{ $appt->status === 'completed' ? 'disabled' : '' }}>
                                ✖ Cancel
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            <!-- RESCHEDULE MODAL -->
            <div class="modal fade" id="rescheduleModal{{ $appt->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <form method="POST"
                              action="{{ route('appointment.reschedule', $appt->id) }}">
                            @csrf

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold text-danger">
                                    Reschedule Appointment
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                <label class="form-label fw-semibold">New Date</label>
                                <input type="date"
                                       name="appointment_date"
                                       class="form-control mb-3"
                                       value="{{ $appt->appointment_date }}"
                                       required>

                                <label class="form-label fw-semibold">New Time Slot</label>
                                <select name="appointment_time"
                                        class="form-select"
                                        required>
                                    @php
                                        $slots = [
                                            '09:00 AM – 10:00 AM',
                                            '10:00 AM – 11:00 AM',
                                            '11:00 AM – 12:00 PM',
                                            '02:00 PM – 03:00 PM',
                                            '03:00 PM – 04:00 PM',
                                        ];
                                    @endphp

                                    @foreach($slots as $slot)
                                        <option value="{{ $slot }}"
                                            {{ $appt->appointment_time === $slot ? 'selected' : '' }}>
                                            {{ $slot }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-danger px-4">
                                    Save Changes
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    @endif
<style>
    /* Appointment cards */
.appointment-card {
    transition: box-shadow 0.2s ease, transform 0.2s ease;
}

.appointment-card:hover {
    box-shadow: 0 12px 28px rgba(0,0,0,0.08);
    transform: translateY(-2px);
}

/* Date block */
.appointment-date {
    min-width: 70px;
    line-height: 1.2;
}

/* Action buttons column */
.action-buttons {
    min-width: 140px;
}

.action-buttons .btn {
    font-weight: 600;
}

/* Disabled state clarity */
button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
    <!-- BACK BUTTON -->
    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger w-100">
            ← Back to Dashboard
        </a>
    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-cancel').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.cancel-form');

            Swal.fire({
                title: 'Cancel Appointment?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, cancel it',
                cancelButtonText: 'Keep appointment'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endpush
