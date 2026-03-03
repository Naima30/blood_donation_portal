@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold text-danger">
            🩸 Types of Blood Donations
        </h2>
        <p class="text-muted mt-2">
            Different blood components help different patients.
            Understanding donation types allows you to make a greater lifesaving impact.
        </p>
    </div>

    <!-- QUICK FACTS BAR -->
    <div class="alert alert-light border shadow-sm mb-5">
        <div class="row text-center">
            <div class="col-md-3">
                <strong>⏱ Time</strong><br>
                10–90 minutes
            </div>
            <div class="col-md-3">
                <strong>🩺 Safety</strong><br>
                Medically supervised
            </div>
            <div class="col-md-3">
                <strong>🔁 Frequency</strong><br>
                2 weeks – 3 months
            </div>
            <div class="col-md-3">
                <strong>❤️ Impact</strong><br>
                Save multiple lives
            </div>
        </div>
    </div>

    <!-- DONATION TYPES -->
    <div class="row g-4">

        <!-- WHOLE BLOOD -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger">
                        🩸 Whole Blood Donation
                    </h5>

                    <p class="mt-2">
                        The most common and fastest donation type.
                        Blood is collected as-is and later separated into components.
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-danger">~10 minutes</span>
                        <span class="badge bg-secondary">Every 3 months</span>
                        <span class="badge bg-success">Emergency use</span>
                    </div>

                    <ul>
                        <li>Used for accidents, surgeries, childbirth</li>
                        <li>Ideal for first-time donors</li>
                        <li>Simple and quick process</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- PLATELETS -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger">
                        🧪 Platelet Donation
                    </h5>

                    <p class="mt-2">
                        Platelets are vital for patients with cancer,
                        blood disorders, and severe bleeding.
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-warning text-dark">45–90 minutes</span>
                        <span class="badge bg-secondary">Every 2 weeks</span>
                        <span class="badge bg-success">Cancer care</span>
                    </div>

                    <ul>
                        <li>Uses apheresis technology</li>
                        <li>Other blood components returned</li>
                        <li>High demand in hospitals</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- PLASMA -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger">
                        💧 Plasma Donation
                    </h5>

                    <p class="mt-2">
                        Plasma helps maintain blood pressure and
                        is critical for burn victims and liver patients.
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-info text-dark">Moderate time</span>
                        <span class="badge bg-secondary">As advised</span>
                        <span class="badge bg-success">Critical care</span>
                    </div>

                    <ul>
                        <li>Supports immune and clotting functions</li>
                        <li>Often used in ICUs</li>
                        <li>Returned cells reduce donor fatigue</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- DOUBLE RED CELL -->
        <div class="col-lg-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h5 class="fw-bold text-danger">
                        ❤️ Double Red Cell Donation
                    </h5>

                    <p class="mt-2">
                        Two units of red blood cells are collected
                        in one session for maximum impact.
                    </p>

                    <div class="mb-3">
                        <span class="badge bg-danger">Longer session</span>
                        <span class="badge bg-secondary">Extended recovery</span>
                        <span class="badge bg-success">Severe anemia</span>
                    </div>

                    <ul>
                        <li>Recommended for donors with high hemoglobin</li>
                        <li>Efficient for blood banks</li>
                        <li>Plasma and platelets returned</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <style>
        /* ===== Donation Type Cards ===== */
.card {
    position: relative;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}

/* subtle accent strip */
.card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    background: linear-gradient(
        to bottom,
        #dc3545,
        #b02a37
    );
    opacity: 0;
    transition: opacity 0.3s ease;
    border-radius: 4px 0 0 4px;
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0,0,0,0.12);
}

.card:hover::before {
    opacity: 1;
}

/* Title emphasis on hover */
.card:hover h5 {
    color: #b11226;
}

/* Badge interaction */
.card .badge {
    transition: transform 0.2s ease;
}
.card .mb-3 {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}


.card:hover .badge {
    transform: scale(1.05);
}

/* Quick facts bar refinement */
.alert.alert-light {
    border-left: 5px solid #dc3545;
}
/* Consistent spacing between badges */
.card .badge {
    margin-right: 6px;
    margin-bottom: 6px;
}

/* Prevent last badge from sticking to edge */
.card .badge:last-child {
    margin-right: 0;
}


/* CTA buttons */
.btn-danger {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}


.btn-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(220,53,69,0.35);
}
</style>

    <!-- GUIDANCE -->
    <div class="alert alert-info shadow-sm mt-5">
        <strong>🩺 Not sure which donation type suits you?</strong><br>
        Our medical professionals will guide you based on your
        health condition, blood type, and hospital requirements.
    </div>

    <!-- CTA -->
    <div class="text-center mt-4">
        <a href="{{ route('donations.schedule') }}" class="btn btn-danger px-4 me-2">
            Book a Donation Slot
        </a>
        <br><br>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger px-4">
            Back to Dashboard
        </a>
    </div>

</div>
@endsection
