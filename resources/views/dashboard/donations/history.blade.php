@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold text-danger mb-1">Donation History</h2>
        <p class="text-muted mb-0">
            A record of your completed blood donations and the lives you’ve helped save.
        </p>
    </div>

    <div class="card shadow-sm border-0 p-4">

        @php
            $completed = $history->where('status', 'completed');
        @endphp

        {{-- EMPTY STATE --}}
        @if($completed->isEmpty())
            <div class="alert alert-info mb-0">
                You don’t have any completed donations yet.
                Once you successfully donate blood, your history will appear here.
            </div>
        @else

            <!-- DONATION HISTORY LIST -->
            @foreach($completed as $appt)
                <div class="history-item d-flex align-items-start justify-content-between">

                    <!-- DATE BLOCK -->
                    <div class="history-date text-center me-4">
                        <div class="day">
                            {{ \Carbon\Carbon::parse($appt->appointment_date)->format('d') }}
                        </div>
                        <div class="month">
                            {{ \Carbon\Carbon::parse($appt->appointment_date)->format('M Y') }}
                        </div>
                    </div>

                    <!-- DETAILS -->
                    <div class="flex-grow-1">
                        <div class="fw-semibold mb-1">
                            ⏰ {{ $appt->appointment_time }}
                        </div>

                        <div class="text-muted mb-2">
                            🏥 {{ $appt->center }}
                        </div>

                        <span class="badge bg-success">
                            ✓ Completed
                        </span>
                    </div>

                </div>
                <hr>
            @endforeach

            <!-- THANK YOU / IMPACT CARD -->
            <div class="impact-box mt-4">
                🙏 <strong>Thank you for being a donor.</strong><br>
                Each completed donation can save up to <b>three lives</b>.
                Your contribution makes a real difference.
            </div>

        @endif

    </div>

    <!-- BACK -->
    <a href="{{ route('dashboard') }}" class="btn btn-outline-danger mt-4">
        ← Back to Dashboard
    </a>

</div>
@endsection
