@extends('layout')

@section('content')

<style>
    .emergency-hero {
        background: linear-gradient(to right, #c0392b, #e74c3c);
        color: white;
        padding: 50px 30px;
        border-radius: 12px;
        margin-bottom: 30px;
        text-align: center;
    }

    .info-card {
        border-radius: 12px;
        transition: 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .highlight-box {
        background: #fff4f4;
        border-left: 5px solid #dc3545;
        padding: 15px 18px;
        border-radius: 8px;
        margin-top: 15px;
    }

    .cta-box {
        background: linear-gradient(to right, #b8323c, #dc3545);
        color: white;
        padding: 35px;
        border-radius: 12px;
        text-align: center;
        margin-top: 40px;
    }

    .cta-box .btn {
        background: white;
        color: #c0392b;
        font-weight: 600;
        padding: 12px 25px;
        border-radius: 30px;
    }

    .cta-box .btn:hover {
        background: #f8f9fa;
    }
</style>

<div class="container mt-4">

    <!-- HERO -->
    <div class="emergency-hero">
        <h2 class="fw-bold">🚨 Emergency Blood Assistance</h2>
        <p class="mt-2 fs-5">
            When every second matters, quick access to blood can save lives.
            Our system helps coordinate requests between hospitals and donors rapidly.
        </p>
    </div>

    <!-- HOW IT WORKS -->
    <div class="card p-4 shadow-sm info-card mb-4">
        <h5 class="fw-bold text-danger">How Emergency Requests Work</h5>

        <div class="highlight-box">
            <ul class="mb-0">
                <li>Submit an emergency blood request through the portal.</li>
                <li>Specify blood group, hospital, and urgency details.</li>
                <li>Nearby registered donors can be notified quickly.</li>
                <li>Faster coordination helps reduce treatment delays.</li>
            </ul>
        </div>
    </div>

    <!-- WHEN TO USE -->
    <div class="card p-4 shadow-sm info-card">
        <h5 class="fw-bold text-danger">When to Use Emergency Requests</h5>

        <p class="text-muted">
            Emergency blood requests should be made only in critical situations such as:
        </p>

        <div class="highlight-box">
            <ul class="mb-0">
                <li>Accidents and trauma cases</li>
                <li>Emergency or major surgeries</li>
                <li>Severe blood loss</li>
                <li>Critical patient conditions requiring immediate transfusion</li>
            </ul>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-box">
        <h4 class="fw-bold">Need Blood Urgently?</h4>
        <p class="mb-3">Submit a request now and notify donors immediately.</p>

        <a href="{{ url('/emergency/request') }}" class="btn">
            Request Blood Immediately
        </a>
    </div>

</div>

@endsection
