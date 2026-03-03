<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
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
