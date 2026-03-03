@extends('layout')

@section('content')
<div class="container my-5">

    <!-- DASHBOARD HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">Donor Dashboard</h2>
        <p class="text-muted">
            Access your donation activities, manage appointments, and explore
            verified blood donation resources.
        </p>
    </div>

    <!-- MAIN DASHBOARD GRID -->
    <div class="row g-4">

        <!-- MANAGE DONATIONS -->
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="card-title">My Donations</div>
                <ul class="dashboard-links">
                    <li><a href="{{ route('donations.schedule') }}">📅 Schedule Appointment</a></li>
                    <li><a href="{{ route('donations.manage') }}">🛠 Manage Appointments</a></li>
                    <li><a href="{{ route('dashboard.history') }}">📜 Donation History</a></li>
                    <li><a href="{{ route('donations.card') }}">💳 Digital Donor Card</a></li>
                </ul>
            </div>
        </div>

        <!-- HOW TO DONATE -->
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="card-title">How to Donate</div>
                <ul class="dashboard-links">
                    <li><a href="{{ route('guide.drives') }}">📍 Find a Blood Drive</a></li>
                    <li><a href="{{ route('guide.eligibility') }}">✅ Eligibility Requirements</a></li>
                    <li><a href="{{ route('guide.types') }}">🩸 Types of Donations</a></li>
                    <li><a href="{{ route('guide.concerns') }}">❓ Common Concerns</a></li>
                </ul>
            </div>
        </div>

        <!-- DONATION PROCESS -->
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="card-title">Donation Process</div>
                <ul class="dashboard-links">
                    <li><a href="{{ route('process.overview') }}">🔄 Process Overview</a></li>
                    <li><a href="{{ route('process.before') }}">⏱ Before / During / After</a></li>
                    <li><a href="{{ route('process.first') }}">🆕 First-Time Donors</a></li>
                    <li><a href="{{ route('process.iron') }}">🧪 Iron & Blood Donation</a></li>
                </ul>
            </div>
        </div>

        <!-- BENEFITS -->
        <div class="col-md-6 col-lg-3">
            <div class="dashboard-card">
                <div class="card-title">Benefits & Impact</div>
                <ul class="dashboard-links">
                    <li><a href="{{ route('benefits.health') }}">❤️ Health Benefits</a></li>
                    <li><a href="{{ route('benefits.supply') }}">🩸 Diverse Blood Supply</a></li>
                    <li><a href="{{ route('benefits.impact') }}">🌍 Community Impact</a></li>
                </ul>
            </div>
        </div>

    </div>

    <!-- ACCOUNT SETTINGS -->
    <div class="dashboard-card mt-5">
        <div class="card-title">Account Settings</div>

        <div class="row g-3 mt-2">
            <div class="col-md-4">
                <a href="{{ route('account.profile') }}"
                   class="btn btn-outline-danger w-100">
                    View Profile
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('account.password') }}"
                   class="btn btn-outline-danger w-100">
                    Change Password
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('logout') }}"
                   class="btn btn-danger w-100">
                    Logout
                </a>
            </div>
        </div>
    </div>

</div>

<!-- DASHBOARD STYLES -->
<style>
.dashboard-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 22px;
    border: 1px solid #e5e7eb;
    height: 100%;
    transition: 
        transform 0.25s ease,
        box-shadow 0.25s ease,
        border-color 0.25s ease;
}

/* Hover – professional, subtle */
.dashboard-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 28px rgba(0,0,0,0.12);
    border-color: #dc3545;
}

/* Card title */
.card-title {
    font-weight: 700;
    font-size: 16px;
    color: #dc3545;
    margin-bottom: 12px;
}

/* Links */
.dashboard-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.dashboard-links a {
    display: block;
    padding: 6px 0;
    font-weight: 500;
    color: #dc3545;
    text-decoration: none;
    transition: color 0.2s ease, padding-left 0.2s ease;
}

.dashboard-links a:hover {
    color: #851823;
    padding-left: 4px;
    text-decoration: none;
}
</style>
@endsection
