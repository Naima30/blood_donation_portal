<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DonationController extends Controller
{
    private function checkLogin()
{
    if (!session()->has('donor_id')) {
        redirect('/login')->send();
    }
}

public function manage()
{
    $this->checkLogin();

    $appointments = DB::table('appointments')
        ->where('donor_id', session('donor_id'))
        ->get();

    return view('dashboard.donations.manage', compact('appointments'));
}

public function showSchedule()
{
    $this->checkLogin();
    return view('dashboard.donations.schedule');
}


    // RESCHEDULE APPOINTMENT
    public function reschedule(Request $request, $id)
{
    $this->checkLogin();

    DB::table('appointments')
        ->where('id', $id)
        ->where('donor_id', session('donor_id'))
        ->update([
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'updated_at' => now(),
        ]);

    return redirect('/dashboard/manage')
        ->with('success', 'Appointment rescheduled successfully!');
}


    // CANCEL APPOINTMENT
    public function cancel($id)
    {
        DB::table('appointments')
            ->where('id', $id)
            ->where('donor_id', Session::get('donor_id'))
            ->delete();

        return back()->with('success', 'Appointment cancelled successfully!');
    }
public function storeSchedule(Request $request)
{
    $this->checkLogin();

    DB::table('appointments')->insert([
        'donor_id' => session::get('donor_id'),
        'appointment_date' => $request->appointment_date,
        'appointment_time' => $request->appointment_time,
        'center' => $request->center,
        'notes' => $request->notes,
        'status' => 'scheduled',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('/dashboard/manage')
        ->with('success', 'Appointment scheduled successfully!');
}

}
