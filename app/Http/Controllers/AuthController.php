<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class AuthController extends Controller
{
    /* =========================================================
     | REGISTER
     ========================================================= */

public function showRegister()
{
    // 🔴 TEMPORARILY REMOVE SESSION CHECK
    return view('register');
}



    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'age' => 'required|integer|min:18',
            'blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        ]);

        // USERS TABLE
        $userId = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // DONORS TABLE
        $request->validate([
    'name' => 'required',
    'age' => 'required',
    'blood_group' => 'required',
    'email' => 'required|email',
    'password' => 'required',
    'phone' => 'required',
    'location' => 'required',
    'latitude' => 'required',
    'longitude' => 'required',
]);
        DB::table('donors')->insert([
    'user_id' => $userId,
    'age' => $request->age,
    'blood_group' => $request->blood_group,
    'phone' => $request->phone,
    'location' => $request->location,
    'latitude' => $request->latitude,
    'longitude' => $request->longitude,
    'created_at' => now(),
    'updated_at' => now(),
]);

        Session::flush();

        return redirect()->route('login')
            ->with('success', 'Registration successful! Please login.');
    }

    /* =========================================================
     | LOGIN
     ========================================================= */

public function showLogin()
{
    // 🔴 TEMPORARILY REMOVE SESSION CHECK
    return view('login');
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = DB::table('users')
        ->where('email', $request->email)
        ->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid email or password');
    }

    // Common session
    session([
        'user_id'   => $user->id,
        'user_name' => $user->name,
        'user_role' => $user->role,
    ]);

    /* =========================
       ADMIN LOGIN
    ========================== */
    if ($user->role === 'admin') {
        return redirect('/admin/dashboard');
    }

    /* =========================
       DONOR LOGIN
    ========================== */
    $donor = DB::table('donors')
        ->where('user_id', $user->id)
        ->first();

    if (!$donor) {
    $donorId = DB::table('donors')->insertGetId([
        'user_id' => $user->id,
        'age' => null,
        'blood_group' => null, // ✅ FIX
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    session(['donor_id' => $donorId]);

    return redirect()->route('account.edit')
        ->with('error', 'Please complete your donor profile.');
}


    session(['donor_id' => $donor->id]);

    return redirect()->route('dashboard');
}



    /* =========================================================
     | DASHBOARD
     ========================================================= */

    public function dashboard()
    {
        if (!Session::has('user_id') || Session::get('user_role') !== 'donor') {
            return redirect('/login');
        }

        $donor = DB::table('donors')
            ->join('users', 'users.id', '=', 'donors.user_id')
            ->select('users.name', 'users.email', 'donors.*')
            ->where('donors.user_id', Session::get('user_id'))
            ->first();

        return view('dashboard.index', compact('donor'));
    }

    /* =========================================================
     | LOGOUT
     ========================================================= */

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }

    /* =========================================================
     | EMERGENCY REQUEST
     ========================================================= */

    public function showEmergencyForm()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        return view('emergency.emergency');
    }

    public function submitEmergencyForm(Request $request)
    {
        $request->validate([
            'patient_name' => 'required',
            'blood_group' => 'required',
            'hospital' => 'required',
            'contact' => 'required',
        ]);

        DB::table('emergency_requests')->insert([
            'patient_name' => $request->patient_name,
            'blood_group' => $request->blood_group,
            'hospital' => $request->hospital,
            'contact' => $request->contact,
            'details' => $request->details,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Emergency request submitted successfully.');
    }

    /* =========================================================
     | PROFILE
     ========================================================= */

    public function profile()
    {
        if (!Session::has('user_id')) {
            return redirect('/login');
        }

        $donor = DB::table('donors')
            ->join('users', 'users.id', '=', 'donors.user_id')
            ->where('users.id', Session::get('user_id'))
            ->first();

        return view('dashboard.account.profile', compact('donor'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
    'name' => 'required|string|max:100',
    'age' => 'required|integer|min:18',
    'blood_group' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
]);

        DB::table('users')
            ->where('id', Session::get('user_id'))
            ->update(['name' => $request->name]);

        DB::table('donors')
            ->where('user_id', Session::get('user_id'))
            ->update([
                'age' => $request->age,
                'blood_group' => $request->blood_group,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Profile updated successfully!');
    }

    /* =========================================================
     | PASSWORD
     ========================================================= */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = DB::table('users')
            ->where('id', Session::get('user_id'))
            ->first();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect current password']);
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'password' => Hash::make($request->new_password),
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Password updated successfully!');
    }

    /* =========================================================
     | DONOR CARD
     ========================================================= */

    public function donorCard()
    {
$donor = DB::table('donors')
    ->join('users', 'users.id', '=', 'donors.user_id')
    ->select(
        'users.name',
        'users.email',
        'donors.blood_group', // ✅ FIXED
        'donors.age',
        'donors.id as donor_id'
    )
    ->where('users.id', Session::get('user_id'))
    ->first();

return view('dashboard.donations.donor-card', compact('donor'));


    }

    public function downloadDonorCard()
    {
        $donor = DB::table('donors')
            ->join('users', 'users.id', '=', 'donors.user_id')
            ->where('users.id', Session::get('user_id'))
            ->first();

        $pdf = Pdf::loadView('dashboard.donations.donor-card-pdf', compact('donor'));
        return $pdf->download('donor-card.pdf');
    }

public function history()
{
    if (!Session::has('donor_id')) {
        return redirect()->route('login');
    }

    $history = DB::table('appointments')
        ->where('donor_id', Session::get('donor_id')) // ✅ CORRECT
        ->orderBy('appointment_date', 'desc')
        ->get();

    return view('dashboard.donations.history', compact('history'));
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
public function updateProfilePhoto(Request $request)
{
    if (!Session::has('user_id')) {
        return redirect()->route('login');
    }

    $request->validate([
        'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $file = $request->file('profile_photo');
    $filename = time() . '_' . $file->getClientOriginalName();

    // Store image
    $file->storeAs('public/profile', $filename);

    // Update donor table
    DB::table('donors')
        ->where('user_id', Session::get('user_id'))
        ->update([
            'profile_photo' => $filename,
            'updated_at' => now(),
        ]);

    return back()->with('success', 'Profile photo updated successfully!');
}

}