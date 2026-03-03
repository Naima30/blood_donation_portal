@extends('layout')

@section('content')

<style>
    body {
        background: #f4f6f9;
    }

    .hero-section {
        text-align: center;
        margin-bottom: 40px;
    }

    .hero-section h2 {
        font-weight: 700;
        color: #dc3545;
    }

    .hero-section p {
        color: #6c757d;
    }

    .card-custom {
        border-radius: 18px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        border: none;
    }

    .form-control, .form-select {
        height: 48px;
        border-radius: 12px;
    }

    .submit-btn {
        height: 50px;
        border-radius: 14px;
        font-weight: 600;
        background: linear-gradient(135deg, #dc3545, #b02a37);
        border: none;
        transition: 0.3s ease;
        color: #fff;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(220,53,69,0.4);
    }

    .donor-card {
        border-radius: 16px;
        border-left: 6px solid #dc3545;
        box-shadow: 0 8px 25px rgba(0,0,0,0.05);
        background: #fff;
        transition: 0.3s ease;
    }

    .donor-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .distance-badge {
        font-size: 13px;
        font-weight: 600;
        padding: 6px 12px;
        border-radius: 20px;
    }

    .blood-badge {
        background: #dc3545;
        color: #fff;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
    }

    .call-btn {
        background: #198754;
        color: #fff;
        border-radius: 8px;
        padding: 6px 14px;
        font-size: 14px;
        text-decoration: none;
    }

    .call-btn:hover {
        background: #157347;
        color: #fff;
    }

    .empty-state {
        padding: 40px;
        text-align: center;
        background: #fff3f3;
        border-radius: 15px;
    }
    .donor-item:hover {
    background: #f8f9fa;
    transition: 0.2s ease;
}
</style>

<div class="container py-5">


    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- FORM -->
            <div class="card card-custom p-4 mb-5">
                <form method="POST" action="{{ route('emergency.request') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="fw-semibold">Patient Name</label>
                        <input type="text" name="patient_name"
                               value="{{ old('patient_name') }}"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Contact Number</label>
                        <input type="text" name="contact_number"
                               value="{{ old('contact_number') }}"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Required Blood Group</label>
                        <select name="blood_group" class="form-select" required>
                            <option value="">Select Blood Group</option>
                            @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $group)
                                <option value="{{ $group }}"
                                    {{ old('blood_group') == $group ? 'selected' : '' }}>
                                    {{ $group }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="fw-semibold">Hospital / Location</label>
                        <input type="text" name="location"
                               value="{{ old('location') }}"
                               class="form-control" required>
                    </div>

                    <button type="submit" class="btn submit-btn w-100">
                        Search Nearby Donors
                    </button>
                </form>
            </div>

            <!-- RESULTS -->
            @if(isset($donors))

                <div class="card card-custom p-4">

                    <h4 class="fw-bold mb-4">
                        Nearby Donors 
                    </h4>

                    @if($donors->isEmpty())

                        <div class="empty-state">
                            <h6 class="text-danger fw-bold">
                                No donors found within selected radius
                            </h6>
                            <p class="text-muted mb-0">
                                Please try another location or blood group.
                            </p>
                        </div>

                    @else

                        <!-- SINGLE LIST CONTAINER -->
<div id="donor-container">
    @include('emergency.partials.donors')
</div>
          

                        <div id="loading" class="text-center my-4" style="display:none;">
                            <span class="text-muted">Loading more donors...</span>
                        </div>

                    @endif

                </div>

            @endif

        </div>
    </div>
</div>

<script>
let page = 2;
let loading = false;

window.addEventListener('scroll', function () {

    if (loading) return;

    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 150) {

        loading = true;
        document.getElementById('loading').style.display = 'block';

        fetch("{{ route('emergency.loadMore') }}?page=" + page)
        .then(response => response.text())
        .then(data => {

            if (data.trim() === '') {
                document.getElementById('loading').innerHTML = "No more donors.";
                return;
            }

            document.getElementById('donor-container')
                .insertAdjacentHTML('beforeend', data);

            page++;
            loading = false;
            document.getElementById('loading').style.display = 'none';
        });
    }
});
</script>
@endsection