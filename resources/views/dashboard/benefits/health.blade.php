@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">
            Health Benefits of Blood Donation
        </h2>
        <p class="text-muted mt-2">
            Blood donation not only saves lives but also contributes positively
            to both physical and mental well-being of donors.
        </p>
    </div>

    <!-- BENEFITS GRID -->
    <div class="row g-4">

        <!-- CARD 1 -->
        <div class="col-md-6">
            <div class="benefit-pro">
                <div class="benefit-icon">❤️</div>
                <h5 class="fw-semibold text-danger">
                    Improves Heart Health
                </h5>
                <p class="text-muted mb-0">
                    Regular blood donation helps regulate iron levels, reducing
                    the risk of cardiovascular diseases and supporting heart health.
                </p>
            </div>
        </div>

        <!-- CARD 2 -->
        <div class="col-md-6">
            <div class="benefit-pro">
                <div class="benefit-icon">🩸</div>
                <h5 class="fw-semibold text-danger">
                    Promotes Blood Cell Production
                </h5>
                <p class="text-muted mb-0">
                    Blood donation stimulates bone marrow to produce fresh
                    red blood cells, improving circulation and blood quality.
                </p>
            </div>
        </div>

        <!-- CARD 3 -->
        <div class="col-md-6">
            <div class="benefit-pro">
                <div class="benefit-icon">🧪</div>
                <h5 class="fw-semibold text-danger">
                    Free Health Screening
                </h5>
                <p class="text-muted mb-0">
                    Each donation includes health checks such as hemoglobin,
                    blood pressure, and infection screening.
                </p>
            </div>
        </div>

        <!-- CARD 4 -->
        <div class="col-md-6">
            <div class="benefit-pro">
                <div class="benefit-icon">😊</div>
                <h5 class="fw-semibold text-danger">
                    Supports Mental Well-Being
                </h5>
                <p class="text-muted mb-0">
                    Donating blood fosters social responsibility and creates
                    a strong sense of satisfaction and emotional well-being.
                </p>
            </div>
        </div>

    </div>

    <!-- CTA -->
    <div class="d-flex justify-content-between align-items-center gap-3 mt-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
            Back to Dashboard
        </a>

        <a href="{{ route('donations.manage') }}" class="btn btn-danger px-4">
            Schedule Donation
        </a>
    </div>

</div>

<!-- ENGAGING HOVER STYLE -->
<style>
.benefit-pro {
    position: relative;
    background: #ffffff;
    border-radius: 16px;
    padding: 28px;
    height: 100%;
    border: 1px solid #e5e7eb;
    overflow: hidden;
    transition: 
        transform 0.35s ease,
        box-shadow 0.35s ease,
        background 0.35s ease;
}

/* gradient glow */
.benefit-pro::before {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        135deg,
        rgba(220,53,69,0.12),
        rgba(220,53,69,0)
    );
    opacity: 0;
    transition: opacity 0.35s ease;
}

.benefit-pro:hover::before {
    opacity: 1;
}

.benefit-pro:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.18);
}

/* icon animation */
.benefit-icon {
    font-size: 28px;
    margin-bottom: 12px;
    opacity: 0.6;
    transform: translateY(6px);
    transition: all 0.35s ease;
}

.benefit-pro:hover .benefit-icon {
    opacity: 1;
    transform: translateY(0);
}

/* content shift */
.benefit-pro h5,
.benefit-pro p {
    position: relative;
    z-index: 1;
}
</style>

@endsection
