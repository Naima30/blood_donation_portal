@extends('layout')

@section('content')
<div class="container my-5">

    <!-- PAGE HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold text-danger">
            📅 Schedule Donation Appointment
        </h2>
        <p class="text-muted">
            Choose a suitable date, time slot, and donation center to book your next blood donation.
        </p>
    </div>

    <!-- FORM CARD -->
    <div class="card border-0 shadow-sm schedule-card">
        <div class="card-header bg-light fw-semibold text-danger">
            Appointment Details
        </div>

        <div class="card-body p-4">
            <form id="appointmentForm"
                  method="POST"
                  action="{{ route('donations.schedule.store') }}">
                @csrf

                <!-- DATE + TIME -->
                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Preferred Donation Date
                        </label>
                        <input type="date"
                               name="appointment_date"
                               class="form-control"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Preferred Time Slot
                        </label>
                        <select name="appointment_time"
                                class="form-select"
                                required>
                            <option value="">Select Time</option>
                            <option>09:00 AM – 10:00 AM</option>
                            <option>10:00 AM – 11:00 AM</option>
                            <option>11:00 AM – 12:00 PM</option>
                            <option>02:00 PM – 03:00 PM</option>
                            <option>03:00 PM – 04:00 PM</option>
                        </select>
                    </div>
                </div>

                <!-- DONATION CENTER -->
                <div class="mt-4 position-relative">
                    <label class="form-label fw-semibold">
                        Donation Center / Hospital
                    </label>

                    <input type="text"
                           id="hospitalInput"
                           name="center"
                           class="form-control"
                           placeholder="Start typing hospital name..."
                           autocomplete="off"
                           required>

                    <ul id="hospitalDropdown"
                        class="list-group position-absolute w-100 shadow-sm"
                        style="z-index:1000; max-height:220px; overflow-y:auto; display:none;">
                    </ul>
                </div>

                <!-- NOTES -->
                <div class="mt-4">
                    <label class="form-label fw-semibold">
                        Additional Notes <span class="text-muted">(optional)</span>
                    </label>
                    <textarea name="notes"
                              rows="3"
                              class="form-control"
                              placeholder="Any medical notes or preferences"></textarea>
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-between align-items-center mt-5 gap-3">
                    <a href="{{ route('dashboard') }}"
                       class="btn btn-outline-danger">
                        ← Back to Dashboard
                    </a>

                    <button type="button"
                            id="confirmBtn"
                            class="btn btn-danger px-4">
                        Confirm Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- ================= HOSPITAL AUTOCOMPLETE ================= -->
<script>
const hospitals = [
    "Amrita Institute of Medical Sciences",
    "Aster Medcity",
    "Baby Memorial Hospital",
    "Cochin Hospital",
    "City Hospital Kochi",
    "Ernakulam General Hospital",
    "Government Medical College Kalamassery",
    "IMA Blood Bank Kochi",
    "Indira Gandhi Cooperative Hospital",
    "KIMS Al Shifa Hospital",
    "Lakeshore Hospital",
    "Lisie Hospital",
    "Medical Trust Hospital",
    "Mosc Medical College Hospital",
    "PVS Memorial Hospital",
    "Rajagiri Hospital Aluva",
    "Renai Medicity",
    "Samaritan Hospital",
    "Sanjivani Hospital",
    "Sree Sudheendra Medical Mission",
    "Sunrise Hospital",
    "Thrikkakara Cooperative Hospital",
    "Unity Hospital",
    "Welcare Hospital",
    "West Fort Hospital"
];

// Alphabetical order
hospitals.sort();

const input = document.getElementById("hospitalInput");
const dropdown = document.getElementById("hospitalDropdown");

input.addEventListener("keyup", function () {
    const value = this.value.toLowerCase();
    dropdown.innerHTML = "";

    let filtered = hospitals.filter(h =>
        h.toLowerCase().startsWith(value)
    );

    if (!value) filtered = hospitals;

    if (filtered.length === 0) {
        dropdown.style.display = "none";
        return;
    }

    filtered.forEach(hospital => {
        const li = document.createElement("li");
        li.className = "list-group-item list-group-item-action";
        li.textContent = hospital;

        li.onclick = () => {
            input.value = hospital;
            dropdown.style.display = "none";
        };

        dropdown.appendChild(li);
    });

    dropdown.style.display = "block";
});

document.addEventListener("click", function (e) {
    if (!input.contains(e.target)) {
        dropdown.style.display = "none";
    }
});
</script>

<!-- ================= SWEETALERT CONFIRM ================= -->
<script>
document.getElementById('confirmBtn').addEventListener('click', function () {
    Swal.fire({
        title: 'Confirm Appointment?',
        text: 'Please verify your selected date, time, and donation center.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, Confirm',
        cancelButtonText: 'Review Again'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Booking Appointment',
                text: 'Please wait while we confirm your slot...',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
            document.getElementById('appointmentForm').submit();
        }
    });
});
</script>

<!-- ================= PAGE STYLES ================= -->
<style>
.schedule-card {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.schedule-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 14px 30px rgba(0,0,0,0.08);
}

.form-control:focus,
.form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.15rem rgba(220,53,69,0.15);
}

#hospitalDropdown li {
    cursor: pointer;
}

#hospitalDropdown li:hover {
    background-color: #f8f9fa;
}
</style>
@endsection
