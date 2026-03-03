<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
{
    $users = DB::table('users')
        ->leftJoin('donors', 'users.id', '=', 'donors.user_id')
        ->where('users.role', '!=', 'admin')   // 🔴 exclude admin
        ->select(
            'users.id',
            'users.name',
            'users.email',
            'users.is_active',
            'donors.age',
            'donors.blood_group'
        )
        ->get();

    return view('admin.users', compact('users'));
}


    public function toggleUserStatus($id)
{
    $user = DB::table('users')->where('id', $id)->first();

    DB::table('users')
        ->where('id', $id)
        ->update(['is_active' => !$user->is_active]);

    return back()->with('success', 'User status updated successfully.');
}

public function dashboard()
{
    $totalUsers = DB::table('users')->count();
    $totalDonors = DB::table('donors')->count();
    $appointments = DB::table('appointments')->count();
    $emergencies = DB::table('emergency_requests')->count();

    // ✅ ADD THIS LINE
    $newEmergencies = DB::table('emergency_requests')
        ->where('status', 'new')
        ->count();
        $latestEmergencies = DB::table('emergency_requests')
    ->orderBy('created_at', 'desc')
    ->limit(5)
    ->get();

return view('admin.dashboard', compact(
    'totalUsers',
    'totalDonors',
    'appointments',
    'emergencies',
    'newEmergencies',
    'latestEmergencies'
));

}



public function appointments()
{
    $appointments = DB::table('appointments')
        ->join('donors', 'donors.id', '=', 'appointments.donor_id')
        ->join('users', 'users.id', '=', 'donors.user_id')
        ->select(
            'appointments.id',
            'users.name',
            'users.email',
            'appointments.appointment_date',
            'appointments.appointment_time',
            'appointments.center',
            'appointments.status',
            'appointments.notes'
        )
        ->orderBy('appointments.appointment_date', 'desc')
        ->get();

    return view('admin.appointments', compact('appointments'));
}

public function emergencies()
{
    $emergencies = DB::table('emergency_requests')
        ->orderBy('created_at', 'desc')
        ->get();

    $totalEmergencies = $emergencies->count();

    return view(
        'admin.emergencies',
        compact('emergencies', 'totalEmergencies')
    );
}

public function markCompleted($id)
{
    DB::table('appointments')
        ->where('id', $id)
        ->update([
            'status' => 'completed',
            'updated_at' => now(),
        ]);

    return back()->with('success', 'Donation marked as completed.');
}


}

