@extends('layout')

@section('content')

@if($donor)

<div class="container py-4">

    <!-- MAIN ROW -->
    <div class="row justify-content-center">

        <!-- DONOR CARD -->
        <div class="col-lg-8 mb-4">
            <div class="donor-id-wrapper">
                <div class="donor-id-card">

                    <!-- HEADER -->
                    <div class="donor-card-header">
                        <div class="header-left">
                            🩸 Blood Donation Portal
                            <small>Official Donor Card</small>
                        </div>
                    </div>

                    <!-- MAIN CONTENT -->
                    <div class="donor-id-main">

                        <div class="top-row d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">OFFICIAL DONOR CARD</h4>
                            <span class="donor-no">
                                Donor No:
                                <strong>
                                    #DONOR{{ str_pad($donor->donor_id, 4, '0', STR_PAD_LEFT) }}
                                </strong>
                            </span>
                        </div>

                        <div class="details mt-3 row">

                            <div class="col-md-6 mb-2">
                                <span>Name</span><br>
                                {{ $donor->name }}
                            </div>

                            <div class="col-md-6 mb-2">
                                <span>Email</span><br>
                                {{ $donor->email }}
                            </div>

                            <div class="col-md-6 mb-2">
                                <span>Age</span><br>
                                {{ $donor->age }}
                            </div>

                            <div class="col-md-6 mb-2">
                                <span>Blood Group</span><br>
                                <strong class="blood-group">
                                    {{ $donor->blood_group ?: 'Not Provided' }}
                                </strong>
                            </div>

                        </div>

                        <div class="footer mt-3 d-flex justify-content-between">
                            <span>Every drop counts.</span>
                            <span class="verified text-success">
                                ✔ Verified Donor
                            </span>
                        </div>

                    </div>

                    <!-- RIGHT BARCODE -->
                    <div class="donor-id-code">
                        <div class="barcode">
                            {{ 'BDP' . str_pad($donor->donor_id, 6, '0', STR_PAD_LEFT) }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- INFO PANEL -->
        <div class="col-lg-8">
            <div class="info-panel shadow-sm p-4 bg-white rounded">

                <h5 class="fw-bold text-danger">How to Use This Card</h5>

                <ul class="text-muted">
                    <li>Carry this card during hospital visits</li>
                    <li>Show during emergency donation requests</li>
                    <li>Download PDF for offline access</li>
                </ul>

                <div class="alert alert-light mt-3">
                    This digital donor ID helps hospitals quickly
                    verify donor eligibility.
                </div>

                <!-- BUTTONS -->
                <div class="mt-3 d-flex gap-2 flex-wrap">

                    <a href="{{ route('donor.pdf', $donor->donor_id) }}"
                       class="btn btn-danger">
                       Download as PDF
                    </a>

                    <a href="{{ route('dashboard') }}"
                       class="btn btn-outline-danger">
                       ← Back to Dashboard
                    </a>

                </div>

            </div>
        </div>

    </div>
</div>

@else
<p class="text-danger text-center mt-4">No donor data found.</p>
@endif

@endsection
