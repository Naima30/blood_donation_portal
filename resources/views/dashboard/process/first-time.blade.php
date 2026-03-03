@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-semibold text-danger">
            Information for First-Time Blood Donors
        </h2>
        <p class="text-muted mt-2">
            Donating blood for the first time is a meaningful decision.
            The process is medically supervised, safe, and designed to ensure
            donor comfort at every stage.
        </p>
    </div>

    <!-- CONTENT GRID -->
    <div class="row g-4">

        <!-- WHAT TO EXPECT -->
        <div class="col-lg-6">
            <div class="pro-card h-100">
                <h5 class="fw-semibold text-danger mb-3">
                    What to Expect
                </h5>
                <p class="mb-0 text-muted">
                    First-time donors are guided by trained medical professionals
                    throughout the donation process. Staff members will explain
                    each step clearly and are available to answer questions or
                    address concerns at any time.
                </p>
            </div>
        </div>

        <!-- COMMON EXPERIENCES -->
        <div class="col-lg-6">
            <div class="pro-card h-100">
                <h5 class="fw-semibold text-danger mb-3">
                    Common Experiences
                </h5>
                <ul class="list-unstyled mb-0 text-muted">
                    <li class="mb-2">• Mild nervousness before donation</li>
                    <li class="mb-2">• Brief discomfort during needle insertion</li>
                    <li class="mb-2">• A sense of satisfaction after donating</li>
                </ul>
            </div>
        </div>

        <!-- TIPS -->
        <div class="col-12">
            <div class="pro-card">
                <h5 class="fw-semibold text-danger mb-3">
                    Guidance for First-Time Donors
                </h5>

                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2">• Ask questions whenever unsure</li>
                            <li class="mb-2">• Maintain slow, steady breathing</li>
                            <li class="mb-2">• Follow staff instructions carefully</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2">• Consider bringing a companion if permitted</li>
                            <li class="mb-2">• Plan light activities after donation</li>
                            <li class="mb-2">• Stay hydrated and rest adequately</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- REASSURANCE -->
    <div class="alert alert-light border shadow-sm mt-5">
        <strong>Clinical Reassurance:</strong><br>
        First-time donors are closely monitored throughout the process.
        Your safety, comfort, and well-being are the highest priorities.
    </div>

    <!-- CTA -->
    <div class="d-flex justify-content-between align-items-center gap-3 mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
            Back to Dashboard
        </a>

        <a href="{{ route('donations.schedule') }}" class="btn btn-danger px-4">
            Schedule Your First Donation
        </a>
    </div>

</div>
@endsection
