@extends('layout')

@section('content')

<style>
    .health-hero {
        background: linear-gradient(to right, #c0392b, #e74c3c);
        color: white;
        padding: 40px;
        border-radius: 12px;
        margin-bottom: 30px;
        text-align: center;
    }

    .info-card {
        border-radius: 12px;
        padding: 20px;
        background: white;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: 0.25s ease;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 14px 30px rgba(0,0,0,0.15);
    }

    .result-box {
        margin-top: 15px;
    }
</style>

<div class="container my-5">

    <!-- HERO -->
    <div class="health-hero">
        <h2 class="fw-bold">Donor Health Information</h2>
        <p class="mb-0">
            Maintaining good health ensures safe and effective blood donation.
            Check your eligibility and learn important donor guidelines below.
        </p>
    </div>

    <div class="row g-4">

        <!-- Eligibility Criteria -->
        <div class="col-md-4">
            <div class="info-card h-100">
                <h5 class="fw-bold text-danger">Eligibility Criteria</h5>
                <ul class="mt-3">
                    <li>Age between 18 and 65 years</li>
                    <li>Minimum weight of 50 kg</li>
                    <li>Good general health</li>
                    <li>No recent major surgeries</li>
                    <li>No infectious diseases</li>
                </ul>
            </div>
        </div>

        <!-- Eligibility Checker -->
        <div class="col-md-4">
            <div class="info-card h-100">
                <h5 class="fw-bold text-danger mb-3">Check Your Eligibility</h5>

                <div class="mb-3">
                    <label class="fw-semibold">Age</label>
                    <input type="number" id="age" class="form-control" placeholder="Enter your age">
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Weight (kg)</label>
                    <input type="number" id="weight" class="form-control" placeholder="Enter your weight">
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Health Conditions</label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="goodHealth">
                        <label class="form-check-label">I am in good general health</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="noSurgery">
                        <label class="form-check-label">No recent major surgeries</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="noInfection">
                        <label class="form-check-label">No infectious diseases</label>
                    </div>
                </div>

                <button type="button"
                        class="btn btn-danger w-100"
                        onclick="checkEligibility()">
                    Check Eligibility
                </button>

                <div id="result" class="result-box"></div>
            </div>
        </div>

        <!-- Blood Compatibility -->
        <div class="col-md-4">
            <div class="info-card h-100">
                <h5 class="fw-bold text-danger">Blood Group Compatibility</h5>
                <p class="mt-3">
                    Compatibility is important for safe transfusion:
                </p>
                <ul>
                    <li>O− is the universal donor</li>
                    <li>AB+ is the universal recipient</li>
                    <li>Same blood group is preferred</li>
                </ul>
            </div>
        </div>

        <!-- Post Donation Care -->
        <div class="col-md-4">
            <div class="info-card h-100">
                <h5 class="fw-bold text-danger">Post-Donation Care</h5>
                <ul class="mt-3">
                    <li>Drink plenty of fluids</li>
                    <li>Avoid heavy exercise for 24 hours</li>
                    <li>Eat iron-rich foods</li>
                    <li>Rest if you feel dizzy</li>
                </ul>
            </div>
        </div>

    </div>
</div>

<script>
function checkEligibility() {
    const age = document.getElementById('age').value;
    const weight = document.getElementById('weight').value;

    const goodHealth = document.getElementById('goodHealth').checked;
    const noSurgery = document.getElementById('noSurgery').checked;
    const noInfection = document.getElementById('noInfection').checked;

    let errors = [];

    if (!age || age < 18 || age > 65)
        errors.push("Age must be between 18 and 65 years.");

    if (!weight || weight < 50)
        errors.push("Weight must be at least 50 kg.");

    if (!goodHealth)
        errors.push("You must be in good general health.");

    if (!noSurgery)
        errors.push("Recent major surgery disqualifies donation.");

    if (!noInfection)
        errors.push("Infectious diseases disqualify donation.");

    const result = document.getElementById('result');

    if (errors.length === 0) {
        result.innerHTML = `
            <div class="alert alert-success mt-3">
                ✅ <strong>You are eligible to donate blood!</strong><br>
                Thank you for helping save lives ❤️
            </div>`;
    } else {
        result.innerHTML = `
            <div class="alert alert-danger mt-3">
                ❌ <strong>You are not eligible to donate.</strong>
                <ul class="mt-2">
                    ${errors.map(e => `<li>${e}</li>`).join('')}
                </ul>
            </div>`;
    }
}
</script>

@endsection
