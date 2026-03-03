@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-5">
        <h2 class="fw-bold text-danger">
            🩸 Blood Donation Eligibility
        </h2>
        <p class="text-muted mt-2">
            These guidelines help ensure the safety of both donors and recipients.
            Please review the eligibility criteria carefully before donating blood.
        </p>
    </div>

    <!-- BASIC ELIGIBILITY -->
    <div class="eligibility-card mb-4">
        <div class="section-title">Basic Eligibility Criteria</div>

        <ul class="list-group list-group-flush mt-3">
            <li class="list-group-item">
                <strong>Age</strong><br>
                Must be between <b>18–65 years</b>.
                First-time donors above 60 may require medical clearance.
            </li>

            <li class="list-group-item">
                <strong>Weight</strong><br>
                Minimum body weight of <b>50 kg</b>.
            </li>

            <li class="list-group-item">
                <strong>Hemoglobin Level</strong><br>
                At least <b>12.5 g/dL</b> for safe donation.
            </li>

            <li class="list-group-item">
                <strong>Pulse & Blood Pressure</strong><br>
                Must be within medically accepted limits at the time of donation.
            </li>
        </ul>
    </div>

    <!-- ELIGIBILITY CHECKER -->
    <div class="eligibility-card mt-5">
        <div class="section-title">🧪 Quick Eligibility Check</div>

        <p class="text-muted mt-3 mb-4">
            Answer a few questions to see if you are likely eligible to donate blood today.
        </p>

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label fw-semibold">Age</label>
                <input type="number" id="age" class="form-control" placeholder="e.g. 24">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Weight (kg)</label>
                <input type="number" id="weight" class="form-control" placeholder="e.g. 60">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold">Last Donation (months ago)</label>
                <input type="number" id="lastDonation" class="form-control" placeholder="e.g. 4">
            </div>
        </div>

        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" id="healthy">
            <label class="form-check-label">
                I feel healthy today (no fever, cold, infection)
            </label>
        </div>

        <button class="btn btn-danger mt-4 px-4" onclick="checkEligibility()">
            Check Eligibility
        </button>

        <!-- SweetAlert logic unchanged -->
        <script>
        function checkEligibility() {
            const age = parseInt(document.getElementById('age').value);
            const weight = parseInt(document.getElementById('weight').value);
            const lastDonation = parseInt(document.getElementById('lastDonation').value);
            const healthy = document.getElementById('healthy').checked;

            if (isNaN(age) || isNaN(weight) || isNaN(lastDonation)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Incomplete Information',
                    text: 'Please fill in all fields correctly before checking eligibility.',
                    confirmButtonColor: '#b11226'
                });
                return;
            }

            if (age < 18 || age > 65) {
                Swal.fire({
                    icon: 'error',
                    title: 'Not Eligible',
                    text: 'You do not meet the age requirement for blood donation.',
                    confirmButtonColor: '#b11226'
                });
                return;
            }

            if (weight < 50) {
                Swal.fire({
                    icon: 'error',
                    title: 'Not Eligible',
                    text: 'Minimum required weight is 50 kg to donate blood.',
                    confirmButtonColor: '#b11226'
                });
                return;
            }

            if (lastDonation < 3) {
                Swal.fire({
                    icon: 'error',
                    title: 'Not Eligible Yet',
                    text: 'Please wait at least 3 months between blood donations.',
                    confirmButtonColor: '#b11226'
                });
                return;
            }

            if (!healthy) {
                Swal.fire({
                    icon: 'error',
                    title: 'Health Check Failed',
                    text: 'You should be in good health on the day of donation.',
                    confirmButtonColor: '#b11226'
                });
                return;
            }

            Swal.fire({
                icon: 'success',
                title: 'You Are Eligible',
                html: `
                    <p class="mb-2">
                        You are likely <strong>eligible</strong> to donate blood today.
                    </p>
                    <small class="text-muted">
                        Final approval will be given by the medical staff at the donation center.
                    </small>
                `,
                confirmButtonColor: '#b11226'
            });
        }
        </script>
    </div>
<br>
    <!-- HEALTH CONDITIONS -->
    <div class="eligibility-card mb-4">
        <div class="section-title">Health & Medical Conditions</div>

        <ul class="mt-3 mb-0">
            <li>Donors should be in good general health and feeling well.</li>
            <li>No major surgery or hospitalization in the last 6 months.</li>
            <li>No active infections (fever, cold, cough, flu).</li>
            <li>Chronic illness patients should consult medical staff.</li>
            <li>Pregnant or recently delivered women should not donate.</li>
        </ul>
    </div>

    <!-- DONATION FREQUENCY -->
    <div class="eligibility-card mb-4">
        <div class="section-title">Donation Frequency Guidelines</div>

        <p class="mt-3">
            Adequate recovery time between donations is essential for donor safety:
        </p>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Donation Type</th>
                        <th>Minimum Interval</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Whole Blood</td>
                        <td>Once every 3 months</td>
                    </tr>
                    <tr>
                        <td>Platelets</td>
                        <td>Once every 2 weeks (medical advice required)</td>
                    </tr>
                    <tr>
                        <td>Plasma</td>
                        <td>As advised by the donation center</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- IMPORTANT NOTE -->
    <div class="alert alert-warning shadow-sm">
        <strong>⚠ Important Notice:</strong><br>
        Eligibility criteria may vary slightly depending on hospital policies.
        Final approval is always determined by the medical professional
        at the donation center.
    </div>

    <!-- BACK BUTTON -->
    <a href="{{ route('dashboard') }}" class="btn btn-outline-danger mt-4">
        ← Back to Dashboard
    </a>

</div>

<!-- PAGE UI STYLES -->
<style>
    .form-control {
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.15);
}

    .eligibility-card:hover .section-title {
    color: #b11226;
    border-bottom-color: #dc3545;
}

    .eligibility-card {
    transition: 
        transform 0.25s ease,
        box-shadow 0.25s ease,
        border-color 0.25s ease;
}

.eligibility-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 32px rgba(0,0,0,0.12);
    border-color: #dc3545;
}

.eligibility-card {
    background: #ffffff;
    border-radius: 14px;
    padding: 24px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}

.section-title {
    font-weight: 700;
    font-size: 16px;
    color: #dc3545;
    padding-bottom: 8px;
    border-bottom: 2px solid #f1f1f1;
}
.btn-danger {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.btn-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 14px rgba(220,53,69,0.35);
}
.eligibility-card:hover {
    background: linear-gradient(
        to right,
        rgba(220,53,69,0.03),
        #ffffff
    );
}


</style>

@endsection
