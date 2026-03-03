<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        // No data required
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this
            ->subject('Welcome to Blood Donation Newsletter')
            ->html('
                <!DOCTYPE html>
                <html>
                <body style="font-family: Arial, sans-serif; background:#f4f4f4; padding:20px">
                    <div style="background:#ffffff; padding:25px; border-radius:8px">
                        <h2 style="color:#dc3545">Welcome to Our Newsletter ❤️</h2>
                        <p>Thank you for subscribing to the <strong>Blood Donation Portal Newsletter</strong>.</p>
                        <p>You will now receive:</p>
                        <ul>
                            <li>Blood donation awareness updates</li>
                            <li>Emergency blood alerts</li>
                            <li>Health tips for donors</li>
                            <li>Upcoming blood donation camps</li>
                        </ul>
                        <p style="margin-top:20px">Together, every drop counts.</p>
                        <p>Regards,<br><strong>Blood Donation Portal Team</strong></p>
                    </div>
                </body>
                </html>
            ');
    }
}
