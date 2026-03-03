@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <!-- CARD -->
            <div class="card shadow-lg border-0 rounded-4">
                
                <!-- HEADER -->
                <div class="card-header bg-danger text-white rounded-top-4 py-4 text-center">
                    <h4 class="fw-bold mb-1">Edit Donor Profile</h4>
                    <small class="opacity-75">
                        Keep your details updated to help save lives ❤️
                    </small>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('account.update') }}">
                        @csrf

                        <!-- FULL NAME -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Full Name
                            </label>
                            <input type="text" name="name"
                                   class="form-control form-control-lg"
                                   placeholder="Enter your full name"
                                   value="{{ $donor->name ?? '' }}" required>
                        </div>

                        <!-- AGE -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Age
                            </label>
                            <input type="number" name="age"
                                   class="form-control form-control-lg"
                                   placeholder="Enter your age"
                                   value="{{ $donor->age ?? '' }}" required>
                        </div>

                        <!-- BLOOD GROUP -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Blood Group
                            </label>
                            <select name="blood_group"
                                    class="form-select form-select-lg"
                                    required>
                                <option value="" disabled>Select blood group</option>
                                @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                                    <option value="{{ $bg }}"
                                        {{ ($donor->blood_group ?? '') == $bg ? 'selected' : '' }}>
                                        {{ $bg }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BUTTONS -->
                        <div class="d-grid gap-2">
                            <button class="btn btn-danger btn-lg fw-semibold">
                                Update Profile
                            </button>

                            <a href="{{ route('account.profile') }}"
                               class="btn btn-outline-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Profile Updated!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#dc3545'
    });
</script>
@endif

@endsection
