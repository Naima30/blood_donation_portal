@extends('layout')

@section('content')

<style>
    .about-hero {
        background: linear-gradient(to right, #b8323c, #d64550);
        color: white;
        padding: 80px 30px;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 40px;
    }

    .about-hero h1 {
        font-size: 42px;
        font-weight: 700;
    }

    .about-section {
        background: #ffffff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }

    .value-box {
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        text-align: center;
        transition: 0.3s;
    }

    .value-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    }

    .impact-box {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
    }

    .cta-box {
        background: linear-gradient(to right, #c0392b, #e74c3c);
        color: white;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
        margin-top: 40px;
    }

    .cta-box a {
        background: white;
        color: #c0392b;
        padding: 10px 22px;
        border-radius: 30px;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<!-- HERO -->
<div class="about-hero">
    <h1>About Our Mission</h1>
    <p class="mt-3 fs-5">
        Every drop of blood donated is a second chance at life.  
        Our platform connects donors, hospitals, and patients to ensure help reaches those who need it most.
    </p>
</div>

<!-- WHO WE ARE -->
<div class="about-section">
    <h3 class="fw-bold mb-3">Who We Are</h3>
    <p style="font-size:17px;">
        We are a community-driven blood donation network focused on making donation simple, safe, and accessible.  
        Our system helps people locate donors, find blood banks, and respond quickly to emergencies.
    </p>

    <p style="font-size:17px;">
        Every day, hospitals require blood for surgeries, trauma care, and chronic illnesses.  
        By connecting donors and recipients efficiently, we help reduce delays and save lives.
    </p>
</div>

<!-- CORE VALUES -->
<div class="about-section">
    <h3 class="fw-bold mb-4 text-center">Our Core Values</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="value-box">
                <h5>⏱ Quick Response</h5>
                <p>We aim to connect donors and patients as fast as possible during emergencies.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="value-box">
                <h5>🫶 Compassion</h5>
                <p>Every donation is an act of kindness that can save multiple lives.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="value-box">
                <h5>🔍 Transparency</h5>
                <p>Verified donors and reliable information you can trust.</p>
            </div>
        </div>
    </div>
</div>

<!-- IMPACT SECTION -->
<div class="about-section">
    <h3 class="fw-bold mb-4 text-center">Why Blood Donation Matters</h3>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="impact-box">
                <h2 class="fw-bold text-danger">1</h2>
                <p>Donation can save up to three lives.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="impact-box">
                <h2 class="fw-bold text-danger">24/7</h2>
                <p>Blood is needed every hour of every day.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="impact-box">
                <h2 class="fw-bold text-danger">100%</h2>
                <p>Safe, sterile and medically supervised donation.</p>
            </div>
        </div>
    </div>
</div>

<!-- PROCESS -->
<div class="about-section">
    <h3 class="fw-bold mb-4 text-center">How Donation Works</h3>

    <div class="row text-center">
        <div class="col-md-3">
            <h5>1️⃣ Register</h5>
            <p>Create your donor profile.</p>
        </div>

        <div class="col-md-3">
            <h5>2️⃣ Get Matched</h5>
            <p>We notify nearby donors.</p>
        </div>

        <div class="col-md-3">
            <h5>3️⃣ Donate</h5>
            <p>Safe and supervised donation.</p>
        </div>

        <div class="col-md-3">
            <h5>4️⃣ Save Lives</h5>
            <p>Your contribution makes a difference.</p>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="cta-box">
    <h3 class="fw-bold">Become a Lifesaver Today</h3>
    <p class="mt-2">Join our donor community and help someone in need.</p>
    <a href="/register">Register as Donor</a>
</div>

@endsection
