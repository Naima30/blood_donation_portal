@extends('layout')

@section('content')
<div class="container my-5">

    <!-- HEADER -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-8">
            <h2 class="fw-bold text-danger mb-2">
                Iron & Blood Donation
            </h2>
            <p class="text-muted">
                Iron is essential for healthy red blood cells. Maintaining proper
                iron levels helps donors stay energetic and eligible for regular
                blood donation.
            </p>
        </div>
        <div class="col-md-4 text-md-end text-muted">
            <small>Donor Health & Nutrition</small>
        </div>
    </div>

    <!-- HIGHLIGHT STRIP -->
    <div class="alert alert-danger bg-opacity-10 border-0 mb-5">
        <strong>Why this matters:</strong>
        Low iron can lead to fatigue and temporary deferral from donation.
        A balanced diet helps donors recover faster.
    </div>

    <!-- CONTENT GRID -->
    <div class="row g-4">

        <!-- WHY IRON -->
        <div class="col-lg-4">
            <div class="card h-100 awareness-card border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger mb-3">
                        Why Iron Is Important
                    </h5>
                    <p class="text-muted">
                        Iron enables hemoglobin to transport oxygen throughout
                        the body. Blood donation temporarily lowers iron levels,
                        which are naturally restored through diet.
                    </p>
                </div>
            </div>
        </div>

        <!-- FOODS -->
        <div class="col-lg-4">
            <div class="card h-100 awareness-card border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger mb-3">
                        Iron-Rich Foods
                    </h5>
                    <ul class="text-muted mb-0">
                        <li>Green leafy vegetables</li>
                        <li>Legumes and lentils</li>
                        <li>Dates, raisins, jaggery</li>
                        <li>Eggs, fish, lean meat</li>
                        <li>Iron-fortified cereals</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MAINTENANCE -->
        <div class="col-lg-4">
            <div class="card h-100 awareness-card border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger mb-3">
                        Maintaining Healthy Levels
                    </h5>
                    <ul class="text-muted mb-0">
                        <li>Include vitamin C with meals</li>
                        <li>Avoid tea/coffee immediately after eating</li>
                        <li>Use supplements only if advised</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <!-- VISUAL DIVIDER -->
    <hr class="my-5">

    <!-- CLINICAL NOTE -->
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-info border-0">
                <strong>Clinical Advisory:</strong><br>
                Donors with consistently low hemoglobin levels may be advised
                to temporarily postpone donation until iron levels improve.
            </div>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('donations.manage') }}" class="btn btn-danger px-4">
                Schedule Donation
            </a>
        </div>
    </div>

    <!-- BACK -->
    <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
            Back to Dashboard
        </a>
    </div>

</div>
@endsection
