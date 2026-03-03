@extends('layout')

@section('content')

<style>
    .contact-hero {
        background: linear-gradient(to right, #c0392b, #e74c3c);
        color: white;
        padding: 40px;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 30px;
    }

    .contact-card {
        border-radius: 12px;
        padding: 25px;
        background: white;
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transition: 0.25s ease;
    }

    .contact-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 30px rgba(0,0,0,0.12);
    }

    .submit-btn {
        background: linear-gradient(to right, #dc3545, #c0392b);
        border: none;
        font-weight: 600;
        padding: 10px;
        border-radius: 8px;
        color: white;
    }

    .submit-btn:hover {
        background: linear-gradient(to right, #c0392b, #a93226);
    }

    .emergency-box {
        background: #fff4f4;
        border-left: 5px solid #dc3545;
        padding: 15px;
        border-radius: 8px;
        margin-top: 25px;
    }
    .section-title {
    color: #dc3545;
    font-weight: 700;
    margin-bottom: 15px;
}

.contact-text {
    font-size: 16px;
    color: #444;
    line-height: 1.6;
    margin-bottom: 20px;
}

.info-block {
    margin-bottom: 15px;
}

.info-block h6 {
    font-weight: 600;
    color: #333;
    margin-bottom: 3px;
}

.info-block p {
    margin: 0;
    color: #555;
}

.emergency-box {
    background: #fdf1f1;
    border-left: 5px solid #dc3545;
    padding: 15px;
    border-radius: 8px;
    margin-top: 20px;
    line-height: 1.6;
}

.helpline-number {
    font-weight: 700;
    font-size: 18px;
    color: #c0392b;
}

</style>

<div class="container my-5">

    <!-- HERO -->
    <div class="contact-hero">
        <h2 class="fw-bold">Contact Us</h2>
        <p class="mb-0">
            Have questions, need help, or want to organize a blood drive?  
            Our team is here to assist you.
        </p>
    </div>

    <div class="row g-4">

        <!-- Contact Details -->
        <div class="contact-card">

    <h4 class="section-title">Our Office</h4>

    <p class="contact-text">
        Blood Donation Organization<br>
        MG Road, Kochi, Kerala – 682016
    </p>

    <div class="info-block">
        <h6>Phone</h6>
        <p>+91 98765 43210</p>
    </div>

    <div class="info-block">
        <h6>Email</h6>
        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=blooddonatehelp@gmail.com" target="_blank">
    blooddonatehelp@gmail.com
</a>

    </div>

    <div class="info-block">
        <h6>Working Hours</h6>
        <p>Monday – Saturday<br>9:00 AM to 6:00 PM</p>
    </div>

    <div class="emergency-box">
        <strong>Emergency Helpline</strong><br>
        For urgent blood requests, call our 24/7 helpline:<br>
        <span class="helpline-number">+91 90000 00000</span>
    </div>

</div>


        <!-- Contact Form -->
        <div class="col-md-7">
            <div class="contact-card">
                <h5 class="fw-bold text-danger mb-3">Send Us a Message</h5>

                <form id="contactForm">

                    <div class="mb-3">
                        <label class="fw-semibold">Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Email Address</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label class="fw-semibold">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Type your message here..."></textarea>
                    </div>

                    <button type="submit" class="btn submit-btn w-100">
    Send Message
</button>

                </form>
            </div>
        </div>

    </div>

</div>
<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    let name = document.getElementById('name').value.trim();
    let email = document.getElementById('email').value.trim();
    let message = document.getElementById('message').value.trim();

    // Validation
    if (name === "" || email === "" || message === "") {
        Swal.fire({
            icon: 'error',
            title: 'Incomplete Form',
            text: 'Please enter all details correctly before sending.',
            confirmButtonColor: '#dc3545'
        });
        return;
    }

    // Success alert
    Swal.fire({
        icon: 'success',
        title: 'Message Sent!',
        text: 'Thank you for contacting us. We will get back to you shortly.',
        confirmButtonColor: '#dc3545'
    });

    // Reset form
    document.getElementById('contactForm').reset();
});
</script>

@endsection
