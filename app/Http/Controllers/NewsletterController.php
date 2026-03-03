<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterWelcomeMail;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    DB::table('newsletter_subscribers')->updateOrInsert(
        ['email' => $request->email],
        ['updated_at' => now()]
    );

    // Mail disabled / log mode is fine
    // Mail::to($request->email)->send(new NewsletterWelcomeMail());

    return back()->with(
        'success',
        'You are subscribed to our newsletter!'
    );
}

}
