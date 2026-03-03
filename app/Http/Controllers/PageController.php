<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterWelcomeMail;

class PageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }

    // Handle Contact Form Submission
    public function submitContact(Request $request)
    {
        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Message sent successfully!');
    }


public function subscribeNewsletter(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:newsletters,email'
    ]);

    // Store email in database
    DB::table('newsletters')->insert([
        'email' => $request->email,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Send welcome newsletter email
    Mail::to($request->email)
        ->send(new NewsletterWelcomeMail());

    return redirect()->back()->with('success', 'Signed up successfully! Check your email.');
}
}