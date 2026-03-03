@extends('layout')

@section('content')
<div class="container my-5">

    <!-- HEADER -->
    <div class="mb-4">
        <h2 class="fw-bold">My Profile</h2>
        <p class="text-muted">
            Manage your personal information and account settings.
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm p-4">
        <div class="row align-items-center">

            <!-- PROFILE PHOTO -->
            <div class="col-md-4 text-center">

                <div class="avatar-wrapper">
                    <img
                        id="profilePreview"
                        src="{{ $donor->profile_photo
                                ? asset('storage/profile/'.$donor->profile_photo)
                                : asset('image/default-avatar.png') }}"
                        alt="Profile photo"
                        class="avatar-img">

                    <!-- HOVER OVERLAY -->
                    <div class="avatar-overlay"
                         onclick="document.getElementById('profilePhotoInput').click()">
                        Change photo
                    </div>
                </div>

                <form method="POST"
                      action="{{ route('account.photo.update') }}"
                      enctype="multipart/form-data"
                      class="mt-3">
                    @csrf

                    <input type="file"
                           name="profile_photo"
                           id="profilePhotoInput"
                           class="d-none"
                           accept="image/*"
                           onchange="previewImage(event)">

                </form>
            </div>

            <!-- PROFILE DETAILS -->
            <div class="col-md-8">

                <h5 class="fw-semibold mb-3">Account Details</h5>

                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="30%">Name</th>
                        <td>{{ $donor->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $donor->email }}</td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td>{{ $donor->age }}</td>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td>
                            <span class="badge bg-danger">
                                {{ $donor->blood_group }}
                            </span>
                        </td>
                    </tr>
                </table>

                <a href="{{ route('account.edit') }}"
                   class="btn btn-outline-danger mt-3">
                    Edit Profile
                </a>

            </div>

        </div>
    </div>

</div>

<!-- CLEAN, PROFESSIONAL STYLES -->
<style>
.avatar-wrapper {
    position: relative;
    width: 130px;
    height: 130px;
    margin: auto;
}

.avatar-img {
    width: 130px;
    height: 130px;
    object-fit: cover;
    border-radius: 50%;
    background: #f1f1f1;
}

/* subtle hover overlay */
.avatar-overlay {
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: rgba(0,0,0,0.55);
    color: #fff;
    font-size: 13px;
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    cursor: pointer;
    transition: opacity 0.25s ease;
}

.avatar-wrapper:hover .avatar-overlay {
    opacity: 1;
}
</style>
<a href="{{ route('dashboard') }}" class="btn btn-outline-danger mt-4">
        ← Back to Dashboard
    </a>
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('profilePreview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
