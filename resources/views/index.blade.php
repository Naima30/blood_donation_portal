@extends('layout')

@section('content')

<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Every Drop Counts</h1>
        <p class="hero-subtitle">
            Your blood can bring hope to someone in need.
        </p>
        <a href="/register" class="hero-cta">Become a Donor</a>
    </div>
</div>

    </div>
</div>
<style>
    .hero-section {
    width:100%;
    height:520px;
    background:linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)),
               url('/image/landing-bg.png') center/cover no-repeat;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;
}

.hero-content {
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(4px);
    padding:30px 40px;
    border-radius:12px;
}

.hero-title {
    font-size:56px;
    font-weight:700;
}

.hero-subtitle {
    font-size:20px;
    margin-top:10px;
}

.hero-cta {
    margin-top:20px;
    padding:12px 28px;
    background:#dc3545;
    border-radius:30px;
    text-decoration:none;
    color:white;
    font-weight:600;
    display:inline-block;
}

.card {
    border:none;
    border-radius:14px;
    transition:all .3s;
}

.card:hover {
    transform:translateY(-6px);
    box-shadow:0 12px 30px rgba(0,0,0,0.15);
}

.navbar {
    padding-top: 5px !important;
    padding-bottom: 5px !important;
    min-height: 55px;
}
.navbar-nav .nav-link {
    font-size: 17px;   /* bigger text */
    font-weight: 500;
    padding: 6px 14px !important;
}

body {
    margin: 0;
    padding: 0;
}

.hero-title {
    font-size: 56px;
    font-weight: 700;
    letter-spacing: 1px;
}

.hero-subtitle {
    font-size: 20px;
    margin-top: 10px;
    opacity: 0.9;
}

.hero-cta {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 28px;
    background: #dc3545;
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.hero-cta:hover {
    background: #b02a37;
    transform: translateY(-2px);
}
.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}
.container {
    margin-top: 60px;
    margin-bottom: 60px;
}
h2.fw-bold {
    position: relative;
    display: inline-block;
}

h2.fw-bold::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background: #dc3545;
    margin: 8px auto 0;
    border-radius: 2px;
}
/* Doctor carousel container */
#doctorCarousel {
    position: relative;
    padding: 0 80px; /* space for arrows */
}

/* Style arrows only for doctor carousel */
#doctorCarousel .carousel-control-prev,
#doctorCarousel .carousel-control-next {
    width: 60px;
    height: 60px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.6);
    border-radius: 50%;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    opacity: 1;
}

/* Give space for arrows */
#doctorCarousel {
    position: relative;
    padding: 0 70px;
}

/* Arrow buttons */
#doctorCarousel .carousel-control-prev,
#doctorCarousel .carousel-control-next {
    width: 55px;
    height: 55px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.6);
    border-radius: 50%;
    opacity: 1;
}

/* Position arrows just outside card but still visible */
#doctorCarousel .carousel-control-prev {
    left: 10px;
}

#doctorCarousel .carousel-control-next {
    right: 10px;
}

/* Bright arrows */
#doctorCarousel .carousel-control-prev-icon,
#doctorCarousel .carousel-control-next-icon {
    filter: invert(1);
}

/* Hover effect */
#doctorCarousel .carousel-control-prev:hover,
#doctorCarousel .carousel-control-next:hover {
    background: rgba(220, 53, 69, 0.9);
}


.testimonial-wrapper .carousel-control-prev,
.testimonial-wrapper .carousel-control-next {
    width: 60px;
    height: 60px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.6);
    border-radius: 50%;
    opacity: 1;
}

/* Push buttons outside the card */
.testimonial-wrapper .carousel-control-prev {
    left: -70px;
}

.testimonial-wrapper .carousel-control-next {
    right: -70px;
}

/* Make arrows visible */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: invert(1);
}


</style>


<!-- WHAT WE OFFER -->
<div class="container mb-5">
    <h2 class="text-center fw-bold mb-4">What We Offer</h2>
    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm text-center p-3">
                <h5 class="fw-bold">Become a Donor</h5>
                <p>Register and help save lives through blood donation.</p>
                <a href="/register" class="btn btn-danger">Register</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm text-center p-3">
                <h5 class="fw-bold">Find Blood Banks</h5>
                <p>Locate nearby hospitals and blood banks.</p>
                <a href="/blood-banks" class="btn btn-danger">View Locations</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm text-center p-3">
                <h5 class="fw-bold">Emergency Help</h5>
                <p>Request blood immediately in emergency cases.</p>
                <a href="/emergency" class="btn btn-danger">Emergency Info</a>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 shadow-sm text-center p-3">
                <h5 class="fw-bold">Donor Health</h5>
                <p>Check eligibility, compatibility and care tips.</p>
                <a href="/donor-health" class="btn btn-danger">Learn More</a>
            </div>
        </div>

    </div>
</div>

<!-- MEDICAL EXPERTS -->
<div class="container mb-5">
    <div class="text-center mb-4">
        <h6 class="text-danger">OUR MEDICAL EXPERTS</h6>
        <h2 class="fw-bold">Qualified Healthcare Professionals</h2>
    </div>

<div class="position-relative">
    <div id="doctorCarousel" class="carousel slide" data-bs-interval="false">


        <div class="carousel-inner">

           <div class="carousel-inner">

<!-- 1 -->
<div class="carousel-item active">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="{{ asset('image/doctor1.jpg') }}" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Dr. Brad Wilson</h4>
<p class="text-danger mb-1">Blood Transfusion Specialist</p>
<p>Expert in donor screening and blood safety protocols.</p>
</div>
</div>
</div>

<!-- 2 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="{{ asset('image/doctor2.jpg') }}" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Dr. Emily Carter</h4>
<p class="text-danger mb-1">Hematologist</p>
<p>Handles emergency matching and donor health monitoring.</p>
</div>
</div>
</div>

<!-- 3 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/men/45.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Dr. Aaron Blake</h4>
<p class="text-danger mb-1">Pathologist</p>
<p>Performs laboratory analysis and blood quality testing.</p>
</div>
</div>
</div>

<!-- 4 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/women/32.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Dr. Sophia Nguyen</h4>
<p class="text-danger mb-1">Transfusion Physician</p>
<p>Supervises transfusion procedures and donor eligibility.</p>
</div>
</div>
</div>

<!-- 5 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/men/21.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">James Turner</h4>
<p class="text-danger mb-1">Senior Lab Technician</p>
<p>Manages blood sample testing and storage preparation.</p>
</div>
</div>
</div>

<!-- 6 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/women/55.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Olivia Parker</h4>
<p class="text-danger mb-1">Phlebotomist</p>
<p>Specialist in safe and comfortable blood collection.</p>
</div>
</div>
</div>

<!-- 7 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/men/65.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Raj Kumar</h4>
<p class="text-danger mb-1">Blood Bank Supervisor</p>
<p>Oversees blood inventory and distribution.</p>
</div>
</div>
</div>

<!-- 8 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/women/62.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Rachel Adams</h4>
<p class="text-danger mb-1">Donor Care Nurse</p>
<p>Ensures donor comfort and post-donation monitoring.</p>
</div>
</div>
</div>

<!-- 9 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/men/72.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Victor Chen</h4>
<p class="text-danger mb-1">Lab Assistant</p>
<p>Supports testing, labeling and storage processes.</p>
</div>
</div>
</div>

<!-- 10 -->
<div class="carousel-item">
<div class="card shadow-sm p-4 d-flex flex-row align-items-center mx-auto" style="max-width:700px;">
<img src="https://randomuser.me/api/portraits/women/47.jpg" class="rounded me-4" width="150">
<div>
<h4 class="fw-bold">Anita Kapoor</h4>
<p class="text-danger mb-1">Donation Coordinator</p>
<p>Organizes donation drives and manages donor records.</p>
</div>
</div>
</div>

</div>
 

        <!-- Previous Button -->
        <button class="carousel-control-prev" type="button"
                data-bs-target="#doctorCarousel" data-bs-slide="prev">
            <span class="fs-1 fw-bold text-dark">&lt;</span>
        </button>

        <!-- Next Button -->
        <button class="carousel-control-next" type="button"
                data-bs-target="#doctorCarousel" data-bs-slide="next">
            <span class="fs-1 fw-bold text-dark">&gt;</span>
        </button>

    </div>
</div>




<!-- TESTIMONIALS SLIDER -->
<div class="container mb-5">
    <div class="text-center mb-4">
        <h6 class="text-danger">TESTIMONIALS</h6>
        <h2 class="fw-bold">What Donors Say</h2>
    </div>

<div class="testimonial-wrapper position-relative">
    <div id="testimonialCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="4000">


        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">

            <!-- Testimonial 1 -->
            <div class="carousel-item active">
                <div class="card mx-auto shadow-sm p-5 text-center" style="max-width:700px;">
                    <img src="https://randomuser.me/api/portraits/men/75.jpg"
                             class="rounded-circle mb-3 mx-auto d-block"
                             style="width:90px;height:90px;object-fit:cover;"
                             alt="Donor photo">
                    <p class="fst-italic fs-5">
                        “The donation process was smooth and very well guided.”
                    </p>
                    <h5 class="mb-0">Brad Miller</h5>
                    <small class="text-danger">Regular Donor</small>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="carousel-item">
                <div class="card mx-auto shadow-sm p-5 text-center" style="max-width:700px;">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg"
                        class="rounded-circle mb-3 mx-auto d-block"
                        style="width:90px;height:90px;object-fit:cover;"
                        alt="Donor photo">
                    <p class="fst-italic fs-5">
                        “I felt completely safe and informed during the donation.”
                    </p>
                    <h5 class="mb-0">Emily Watson</h5>
                    <small class="text-danger">First-Time Donor</small>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="carousel-item">
                <div class="card mx-auto shadow-sm p-5 text-center" style="max-width:700px;">
                    <img src="https://randomuser.me/api/portraits/men/41.jpg"
                        class="rounded-circle mb-3 mx-auto d-block"
                        style="width:90px;height:90px;object-fit:cover;"
                        alt="Donor photo">
                    <p class="fst-italic fs-5">
                        “This portal helped us find donors during an emergency.”
                    </p>
                    <h5 class="mb-0">Daniel Brooks</h5>
                    <small class="text-danger">Emergency Requester</small>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button"
                data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button"
                data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- AWARENESS SECTION -->
<div class="container mb-5">
    <div class="text-center mb-4">
        <h6 class="text-danger">AWARENESS</h6>
        <h2 class="fw-bold">Blood Donation Insights</h2>
    </div>

    <div class="row g-4">

        <!-- WHO CAN DONATE -->
        <div class="col-md-4">
            <a href="https://www.google.com/search?q=who+can+donate+blood"
               target="_blank"
               class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm awareness-card">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b"
                         class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="fw-bold">Who Can Donate Blood?</h5>
                        <p>Learn eligibility guidelines for blood donation.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- WHY DONATION MATTERS -->
        <div class="col-md-4">
            <a href="https://www.google.com/search?q=why+blood+donation+is+important"
               target="_blank"
               class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm awareness-card">
                    <img src="https://images.unsplash.com/photo-1582750433449-648ed127bb54"
                         class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="fw-bold">Why Donation Matters</h5>
                        <p>Understand how blood donation saves lives.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- POST DONATION CARE -->
        <div class="col-md-4">
            <a href="https://www.google.com/search?q=After+blood+donation+care"
               target="_blank"
               class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm awareness-card">
                    <img src="https://images.unsplash.com/photo-1588776814546-1c1bbaaa59b3"
                         class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="fw-bold">Post Donation Care</h5>
                        <p>Tips to stay healthy after donating blood.</p>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>



@endsection
