@extends('layout')

@section('content')
<div class="container mt-5" style="max-width: 500px;">

    <h2 class="text-center fw-bold mb-4">Donor Registration</h2>

    <div class="card shadow-sm p-4">
        <form method="POST" action="/register">
            @csrf

            <!-- Full Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Age -->
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number"
                       name="age"
                       class="form-control"
                       min="18"
                       required>
                <small class="text-muted">Minimum age to donate is 18</small>
            </div>

            <!-- Blood Group -->
            <div class="mb-3">
                <label class="form-label">Blood Group</label>
                <select name="blood_group" class="form-select" required>
                    <option value="">Select Blood Group</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                    <option>O+</option>
                    <option>O-</option>
                </select>
            </div>
<div class="mb-3">
    <label class="form-label">Phone Number</label>
    <input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Location (Area / City)</label>
    <input type="text" name="location" class="form-control" placeholder="Enter your area or city" required>
</div>

<!-- Hidden GPS fields -->
<input type="hidden" name="latitude" id="donor_lat">
<input type="hidden" name="longitude" id="donor_lng">

<script>
navigator.geolocation.getCurrentPosition(function(position) {
    document.getElementById('donor_lat').value = position.coords.latitude;
    document.getElementById('donor_lng').value = position.coords.longitude;
});
</script>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-danger w-100">
                Register
            </button>
        </form>

        <p class="text-center mt-3">
            Already registered?
            <a href="/login" class="text-danger fw-bold">Login</a>
        </p>
    </div>
</div>
@endsection
