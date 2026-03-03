@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-semibold text-danger">
            Blood Donation Care Guidelines
        </h2>
        <p class="text-muted mt-2">
            Following proper guidelines before, during, and after blood donation
            ensures donor safety, comfort, and optimal recovery.
        </p>
    </div>

    <!-- GUIDELINES -->
    <div class="row g-4">

        <!-- BEFORE -->
        <div class="col-lg-4">
            <div class="pro-card h-100">
                <h6 class="text-uppercase text-muted mb-2">
                    Step 1
                </h6>
                <h5 class="fw-semibold mb-3 text-danger">
                    Before Donation
                </h5>

                <ul class="list-unstyled mb-0">
                    <li class="mb-2">• Consume a healthy meal at least 2 hours prior</li>
                    <li class="mb-2">• Maintain adequate hydration</li>
                    <li class="mb-2">• Avoid alcohol and smoking for 24 hours</li>
                    <li class="mb-2">• Ensure sufficient sleep the previous night</li>
                    <li class="mb-2">• Wear loose, comfortable clothing</li>
                </ul>
            </div>
        </div>

        <!-- DURING -->
        <div class="col-lg-4">
            <div class="pro-card h-100">
                <h6 class="text-uppercase text-muted mb-2">
                    Step 2
                </h6>
                <h5 class="fw-semibold mb-3 text-danger">
                    During Donation
                </h5>

                <ul class="list-unstyled mb-0">
                    <li class="mb-2">• Remain calm and seated comfortably</li>
                    <li class="mb-2">• Follow instructions provided by medical staff</li>
                    <li class="mb-2">• Report any discomfort or dizziness immediately</li>
                    <li class="mb-2">• Avoid sudden arm or body movements</li>
                </ul>
            </div>
        </div>

        <!-- AFTER -->
        <div class="col-lg-4">
            <div class="pro-card h-100">
                <h6 class="text-uppercase text-muted mb-2">
                    Step 3
                </h6>
                <h5 class="fw-semibold mb-3 text-danger">
                    After Donation
                </h5>

                <ul class="list-unstyled mb-0">
                    <li class="mb-2">• Rest for at least 10–15 minutes</li>
                    <li class="mb-2">• Consume fluids and light refreshments</li>
                    <li class="mb-2">• Avoid strenuous physical activity for the day</li>
                    <li class="mb-2">• Keep the bandage in place for a minimum of 4 hours</li>
                    <li class="mb-2">• Seek medical assistance if symptoms persist</li>
                </ul>
            </div>
        </div>

    </div>

    <!-- CLINICAL NOTE -->
    <div class="alert alert-light border shadow-sm mt-5">
        <strong>Clinical Note:</strong><br>
        Adhering to these guidelines helps maintain donor well-being
        and ensures continued eligibility for future donations.
    </div>

    <!-- CTA -->
    <div class="d-flex justify-content-between align-items-center gap-3 mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
            Back to Dashboard
        </a>

        <a href="{{ route('donations.manage') }}" class="btn btn-danger px-4">
            Schedule Your First Donation
        </a>
    </div>

</div>
@endsection
