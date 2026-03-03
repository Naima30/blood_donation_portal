@extends('layout')

@section('content')

<style>
    .page-hero {
        background: linear-gradient(to right, #c0392b, #e74c3c);
        color: white;
        padding: 40px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 30px;
    }

    .btn-main {
        background-color: #E74C3C;
        color: white;
        border: none;
        padding: 10px 18px;
        font-weight: 500;
        border-radius: 6px;
        transition: 0.2s ease-in-out;
    }

    .btn-main:hover {
        background-color: #cf3f31;
        color: white;
    }

    .offer-card {
        transition: 0.3s ease;
        border-radius: 10px;
    }

    .offer-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .feature-box {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
    }
</style>

<!-- HERO -->
<div class="page-hero">
    <h2 class="fw-bold">What We Offer</h2>
    <p class="mt-2">
        Our platform connects donors, hospitals, and patients to make blood donation faster and more accessible.
    </p>
</div>

<!-- MAIN SERVICES -->
<div class="row">

  <div class="col-md-6">
    <div class="card p-4 mb-4 shadow-sm offer-card">
        <h4>🩸 Become a Donor</h4>
        <p>
            Register as a voluntary donor and help save lives. 
            Your single donation can help multiple patients in need.
        </p>
        <a href="/register" class="btn btn-main mt-2">Register</a>
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="card p-4 mb-4 shadow-sm offer-card">
        <h4>📍 Find Blood Banks</h4>
        <p>
            Quickly locate hospitals and blood banks near your location 
            with verified contact details.
        </p>
        <a href="/blood-banks" class="btn btn-main mt-2">View Locations</a>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-4 mb-4 shadow-sm offer-card">
        <h4>🚨 Emergency Help</h4>
        <p>
            During critical situations, request blood and notify donors 
            instantly in your area.
        </p>
        <a href="/emergency-info" class="btn btn-main mt-2">Emergency Info</a>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card p-4 mb-4 shadow-sm offer-card">
        <h4>📊 Donor Health</h4>
        <p>
            Check eligibility guidelines, donation intervals, 
            and health recommendations for safe donation.
        </p>
        <a href="/donor-health" class="btn btn-main mt-2">Learn More</a>
    </div>
  </div>

</div>

<!-- WHY CHOOSE US -->
<div class="mt-5">
    <h3 class="fw-bold text-center mb-4">Why Choose Our Platform?</h3>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="feature-box">
                <h5>⚡ Fast Response</h5>
                <p>We help connect donors and recipients quickly during emergencies.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box">
                <h5>✔ Verified Data</h5>
                <p>Donor and hospital information is verified for reliability.</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-box">
                <h5>❤️ Community Driven</h5>
                <p>Built to support communities and encourage voluntary donation.</p>
            </div>
        </div>

    </div>
</div>

@endsection
