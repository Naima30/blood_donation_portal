@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">
            🩸 Blood Donation Process
        </h2>
        <p class="text-muted mt-2">
            Blood donation is a simple, safe, and medically supervised process.
            Knowing what to expect can help you feel comfortable and confident.
        </p>
    </div>

    <!-- PROCESS TIMELINE -->
    <div class="process-timeline">

        <!-- STEP 1 -->
        <div class="process-step">
            <div class="step-icon">📝</div>
            <div class="step-content">
                <h5 class="fw-bold text-danger">Step 1: Registration</h5>
                <p>
                    Provide basic details such as name, age, contact number,
                    and identification. This ensures accurate records and donor safety.
                </p>
                <span class="badge bg-light text-dark">~5 minutes</span>
            </div>
        </div>

        <!-- STEP 2 -->
        <div class="process-step">
            <div class="step-icon">🩺</div>
            <div class="step-content">
                <h5 class="fw-bold text-danger">Step 2: Health Screening</h5>
                <p>
                    Medical staff perform a quick health check including
                    hemoglobin level, blood pressure, pulse, and temperature.
                </p>
                <span class="badge bg-light text-dark">~10 minutes</span>
            </div>
        </div>

        <!-- STEP 3 -->
        <div class="process-step">
            <div class="step-icon">🩸</div>
            <div class="step-content">
                <h5 class="fw-bold text-danger">Step 3: Blood Donation</h5>
                <p>
                    Blood is collected using sterile, single-use equipment
                    while you are comfortably seated.
                </p>
                <span class="badge bg-light text-dark">~10 minutes</span>
            </div>
        </div>

        <!-- STEP 4 -->
        <div class="process-step">
            <div class="step-icon">🥤</div>
            <div class="step-content">
                <h5 class="fw-bold text-danger">Step 4: Rest & Refreshments</h5>
                <p>
                    Rest for a short period and enjoy refreshments to
                    help your body recover smoothly.
                </p>
                <span class="badge bg-light text-dark">~10 minutes</span>
            </div>
        </div>

    </div>

    <!-- SUMMARY -->
    <div class="alert alert-info shadow-sm mt-5">
        ⏱️ <strong>Total time:</strong> Approximately 30–45 minutes.<br>
        ❤️ Your donation can save up to three lives.
    </div>

    <!-- CTA -->
    <div class="text-center mt-4">
        <a href="{{ route('donations.manage') }}" class="btn btn-danger px-4 me-2">
            Book a Donation Slot
        </a>
        <br><br>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger px-4">
            Back to Dashboard
        </a>
    </div>

</div>

<!-- STYLES -->
<style>
.process-timeline {
    display: flex;
    flex-direction: column;
    gap: 25px;
}

.process-step {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    background: #fff;
    border-radius: 14px;
    padding: 20px;
    border: 1px solid #eee;
    box-shadow: 0 5px 15px rgba(0,0,0,0.04);
}

.step-icon {
    font-size: 32px;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #fff5f5;
    display: flex;
    align-items: center;
    justify-content: center;
}

.step-content p {
    margin-bottom: 8px;
    color: #555;
}

@media (max-width: 576px) {
    .process-step {
        flex-direction: column;
        align-items: flex-start;
    }
}
</style>

@endsection
