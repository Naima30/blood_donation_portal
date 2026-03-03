@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">
            Ensuring a Diverse Blood Supply
        </h2>
        <p class="text-muted mt-2">
            A stable and diverse blood supply is essential to meet the medical
            needs of patients across all blood groups and conditions.
        </p>
    </div>

    <!-- CONTENT GRID -->
    <div class="row g-4">

        <div class="col-md-6">
            <div class="diversity-card">
                <div class="diversity-icon">🩸</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Why Blood Diversity Matters
                </h5>
                <p class="text-muted mb-0">
                    Different patients require different blood types.
                    Rare blood groups are often difficult to source during
                    emergencies, making regular donations critical.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="diversity-card">
                <div class="diversity-icon">🧬</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Support for Specialized Treatments
                </h5>
                <p class="text-muted mb-0">
                    Cancer patients, newborns, trauma victims, and individuals
                    with chronic illnesses often require specific blood
                    components such as platelets or plasma.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="diversity-card">
                <div class="diversity-icon">🚑</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Emergency Preparedness
                </h5>
                <p class="text-muted mb-0">
                    Natural disasters and medical emergencies demand immediate
                    access to blood. A well-maintained inventory ensures
                    hospitals are always prepared.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="diversity-card">
                <div class="diversity-icon">🌍</div>
                <h5 class="fw-semibold text-danger mb-2">
                    Community Participation
                </h5>
                <p class="text-muted mb-0">
                    When individuals from all backgrounds donate regularly,
                    communities become self-reliant and better equipped to
                    handle healthcare challenges.
                </p>
            </div>
        </div>

    </div>

    <!-- CTA -->
    <div class="mt-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-danger">
            ← Back to Dashboard
        </a>
    </div>

</div>

<!-- PAGE-SPECIFIC STYLE -->
<style>
.diversity-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 26px;
    height: 100%;
    border: 1px solid #e6e6e6;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
    position: relative;
}

/* icon */
.diversity-icon {
    font-size: 26px;
    margin-bottom: 12px;
    opacity: 0.7;
    transition: opacity 0.3s ease;
}

/* hover effect */
.diversity-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 14px 30px rgba(0,0,0,0.15);
    border-color: #dc3545;
}

.diversity-card:hover .diversity-icon {
    opacity: 1;
}
</style>

@endsection
