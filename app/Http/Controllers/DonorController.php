<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function downloadPdf($id)
    {
        $donor = Donor::findOrFail($id);

        $pdf = Pdf::loadView('pdf.donor_card', compact('donor'));

        return $pdf->download('donor_card.pdf');
    }

public function store(Request $request)
{
    $request->validate([
    'name' => 'required',
    'blood_group' => 'required',
    'phone' => 'required',
    'location' => 'required',
    'latitude' => 'required',
    'longitude' => 'required',
]);

    Donor::create([
        'name' => $request->name,
        'blood_group' => $request->blood_group,
        'phone' => $request->phone,
        'location' => $request->location,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);

    return redirect()->back()->with('success', 'Donor registered successfully!');
}
}
