@foreach($donors as $donor)

<div class="donor-item py-4 border-bottom">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h5 class="fw-bold mb-1">
                {{ optional($donor->user)->name ?? 'N/A' }}
            </h5>

            <span class="badge bg-danger">
                {{ $donor->blood_group }}
            </span>

            <p class="mb-1 mt-2">
                <strong>Phone:</strong> {{ $donor->phone }}
            </p>

            <p class="mb-0">
                <strong>Location:</strong> {{ $donor->location }}
            </p>
        </div>

        <div class="text-end">
            <div class="badge bg-success mb-2">
                {{ number_format($donor->distance, 5) }} km
            </div>

            <a href="tel:{{ $donor->phone }}" class="btn btn-success btn-sm">
                Call
            </a>
        </div>

    </div>

</div>

@endforeach