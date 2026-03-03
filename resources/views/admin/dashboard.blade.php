@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')

<div style="display:flex; gap:30px; align-items:flex-start;">

    {{-- LEFT SIDE : MAIN DASHBOARD --}}
    <div style="flex:3;">

        <div class="cards">
            <div class="card">
                <h3>Total Users</h3>
                <p>{{ $totalUsers }}</p>
            </div>

            <div class="card">
                <h3>Total Donors</h3>
                <p>{{ $totalDonors }}</p>
            </div>

            <div class="card">
                <h3>Appointments</h3>
                <p>{{ $appointments }}</p>
            </div>

            <div class="card">
                <h3>Emergency Requests</h3>
                <p>{{ $emergencies ?? 0 }}</p>
            </div>
        </div>

<div class="quick-actions">
    <a href="{{ route('admin.users') }}" class="action-btn">
        Manage Users
    </a>

    <a href="{{ route('admin.appointments') }}" class="action-btn">
        Manage Appointments
    </a>
</div>
<style>
.quick-actions{
    display:flex;
    flex-direction:column;
    gap:12px;

    margin-top:15px;        /* space from heading */
    padding:10px 0;         /* breathing space */
}


.action-btn{
    display:block;
    width:220px;
    background:#dc3545;
    color:white;
    padding:10px 16px;
    border-radius:8px;
    text-decoration:none;
    font-weight:500;
    transition:0.2s;
}

.action-btn:hover{
    background:#bb2d3b;
}
</style>


    </div>

    {{-- RIGHT SIDE : EMERGENCY NOTIFICATIONS --}}
    <div style="flex:1;">

        <h3 style="margin-bottom:15px;">
            🔔 Emergency Alerts
            @if($newEmergencies > 0)
                <span style="
                    background:red;
                    color:white;
                    padding:4px 10px;
                    border-radius:20px;
                    font-size:12px;
                    margin-left:8px;
                ">
                    {{ $newEmergencies }} New
                </span>
            @endif
        </h3>

        @if($latestEmergencies->count() === 0)
            <p style="color:gray;">No emergency alerts</p>
        @endif

        @foreach($latestEmergencies as $e)
            <div class="emergency-alert-box">
                <strong style="color:#dc3545;">
                    Blood Required: {{ $e->blood_group }}
                </strong>

                <div style="font-size:14px; margin-top:6px;">
                    🏥 {{ $e->hospital }}
                </div>

                <div style="font-size:14px;">
                    📞 <a href="tel:{{ $e->contact }}">
                        {{ $e->contact }}
                    </a>
                </div>

                <div style="font-size:12px; color:gray; margin-top:4px;">
                    {{ \Carbon\Carbon::parse($e->created_at)->diffForHumans() }}
                </div>

                <a href="{{ route('admin.emergencies') }}"
                   style="display:block; margin-top:8px; font-size:13px;">
                    View details →
                </a>
            </div>
        @endforeach

    </div>

</div>

@endsection
