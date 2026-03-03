@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">
            Community Impact of Blood Donation
        </h2>
        <p class="text-muted mt-2">
            Blood donation is more than a medical procedure —
            it is a collective effort that strengthens healthcare systems,
            supports communities, and saves lives every day.
        </p>
    </div>

    <!-- IMPACT GRID -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="impact-card">
                <div class="impact-icon">🌍</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Saving Lives Together
                </h5>
                <p class="text-muted mb-0">
                    A single blood donation can save up to <strong>three lives</strong>.
                    From accident victims to surgical patients, donated blood
                    provides critical support when it matters most.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="impact-card">
                <div class="impact-icon">🤝</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Strengthening Community Bonds
                </h5>
                <p class="text-muted mb-0">
                    Blood donation drives unite individuals from diverse backgrounds
                    for a shared humanitarian cause, fostering compassion,
                    trust, and social responsibility.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="impact-card">
                <div class="impact-icon">🏥</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Supporting Healthcare Systems
                </h5>
                <p class="text-muted mb-0">
                    Hospitals depend on voluntary donors to meet daily blood
                    requirements. Regular donations reduce shortages and
                    enable healthcare providers to respond effectively.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="impact-card">
                <div class="impact-icon">✨</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Inspiring Future Donors
                </h5>
                <p class="text-muted mb-0">
                    When one person donates blood, it encourages friends,
                    family, and colleagues to do the same — creating a
                    ripple effect that benefits society as a whole.
                </p>
            </div>
        </div>

    </div>

    <!-- EXTENDED IMPACT NOTE -->
    <div class="alert alert-light border shadow-sm mt-5">
        <strong>Community Insight:</strong><br>
        Voluntary blood donation is a cornerstone of a resilient healthcare system.
        Communities with regular donors are better prepared for emergencies,
        disasters, and long-term medical needs.
    </div>

    <!-- CTA -->
    <div class="d-flex justify-content-between align-items-center gap-3 mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
            ← Back to Dashboard
        </a>

        <a href="{{ route('donations.manage') }}" class="btn btn-danger px-4">
            Become a Donor
        </a>
    </div>

</div>

<!-- PAGE-SPECIFIC STYLES -->
<style>
.impact-card {
    position: relative;
    background: #ffffff;
    border-radius: 16px;
    padding: 28px;
    height: 100%;
    border: 1px solid #e5e7eb;
    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
    overflow: hidden;
}

/* subtle ripple glow */
.impact-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(
        circle at top left,
        rgba(220,53,69,0.15),
        transparent 60%
    );
    opacity: 0;
    transition: opacity 0.35s ease;
}

.impact-card:hover::after {
    opacity: 1;
}

.impact-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 38px rgba(0,0,0,0.18);
}

/* icon */
.impact-icon {
    font-size: 28px;
    margin-bottom: 12px;
    opacity: 0.75;
    transition: transform 0.35s ease, opacity 0.35s ease;
}

.impact-card:hover .impact-icon {
    transform: scale(1.15);
    opacity: 1;
}
</style>

@endsection
