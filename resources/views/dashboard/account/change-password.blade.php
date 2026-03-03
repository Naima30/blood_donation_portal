@extends('layout')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <!-- CARD -->
            <div class="card shadow-lg border-0 rounded-4">

                <!-- HEADER -->
                <div class="card-header bg-danger text-white rounded-top-4 py-4 text-center">
                    <h4 class="fw-bold mb-1">Change Password</h4>
                    <small class="opacity-75">
                        Keep your account secure to continue saving lives ❤️
                    </small>
                </div>

                <!-- BODY -->
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('account.password.update') }}" id="passwordForm">
                        @csrf

                        <!-- CURRENT PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Current Password
                            </label>
                            <input type="password"
                                   name="current_password"
                                   class="form-control form-control-lg"
                                   placeholder="Enter current password"
                                   required>
                        </div>

                        <!-- NEW PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                New Password
                            </label>
                            <input type="password"
                                   name="new_password"
                                   class="form-control form-control-lg"
                                   placeholder="Enter new password"
                                   required>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Confirm New Password
                            </label>
                            <input type="password"
                                   name="new_password_confirmation"
                                   class="form-control form-control-lg"
                                   placeholder="Re-enter new password"
                                   required>
                        </div>

                        <!-- BUTTONS -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger btn-lg fw-semibold">
                                Update Password
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

<!-- SWEETALERT CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SUCCESS ALERT -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Password Updated!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#dc3545'
    });
</script>
@endif

<!-- ERROR ALERT -->
@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Update Failed',
        text: "{{ $errors->first() }}",
        confirmButtonColor: '#dc3545'
    });
</script>
@endif
<a href="{{ route('dashboard') }}" class="btn btn-outline-danger mt-4">
        ← Back to Dashboard
    </a>
<!-- CONFIRM BEFORE SUBMIT -->
<script>
document.getElementById('passwordForm').addEventListener('submit', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'Confirm Password Change?',
        text: 'Are you sure you want to update your password?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, update',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            e.target.submit();
        }
    });
});
</script>
@endsection
