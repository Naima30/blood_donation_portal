<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Portal</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

<style>

/* GLOBAL */
body {
    margin:0;
    background:#f8f9fb;
    font-family: 'Segoe UI', Tahoma, sans-serif;
}

/* NAVBAR */
.navbar {
    padding:8px 0;
    box-shadow:0 2px 8px rgba(0,0,0,0.08);
}

.navbar-brand {
    font-size:22px;
    font-weight:700;
}

.navbar-nav .nav-link {
    font-size:17px;
    font-weight:500;
    margin-left:10px;
}

.navbar-nav .nav-link:hover {
    color:#ffe5e5 !important;
}

/* FOOTER */
footer {
    width:100%;
    background:linear-gradient(135deg,#b91c1c,#dc3545);
    color:white;
}

footer a {
    color:white;
    text-decoration:none;
}

footer a:hover {
    text-decoration:underline;
}

/* PARALLAX */
.parallax-container{
  position: fixed;
  top:0;
  left:0;
  width:100%;
  height:100%;
  overflow:hidden;
  z-index:-1;
}

.parallax-item{
  position:absolute;
}

.art{
  width:100%;
  height:100%;
  background-size:contain;
  background-repeat:no-repeat;
}
.logo-img {
    height: 60px;
    width: auto;
}

</style>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('[data-confirm]').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b91c1c',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, proceed'
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });

});
</script>

@stack('scripts')

<body>

<div id="parallaxContainer" class="parallax-container"></div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        
        <!-- Logo + Brand Name -->
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="/">
    <img src="{{ asset('image/logo.png') }}" 
     alt="BloodConnect Logo" 
     class="logo-img me-2">
    BloodConnect
</a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- PAGE CONTENT -->
@yield('content')

<!-- FOOTER -->
<footer class="mt-5 pt-5 pb-3">
    <div class="container">

        <div class="row">
            <div class="col-md-3 mb-4">
                <h6 class="footer-title">GET IN TOUCH</h6>
                <p>Connecting donors with those in urgent need.</p>
                <p>📍 Kochi, Kerala, India</p>
                <p>📧 blooddonatehelp@gmail.com</p>
                <p>📞 +91 98765 43210</p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="footer-title">QUICK LINKS</h6>
                <p><a href="/">Home</a></p>
                <p><a href="/about">About</a></p>
                <p><a href="/services">Services</a></p>
                <p><a href="/contact">Contact</a></p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="footer-title">POPULAR LINKS</h6>
                <p><a href="/register">Become a Donor</a></p>
                <p><a href="/emergency-info">Emergency Info</a></p>
                <p><a href="/donor-health">Donor Health</a></p>
            </div>

            <div class="col-md-3 mb-4">
                <h6 class="footer-title">NEWSLETTER</h6>

                <form method="POST" action="{{ route('newsletter.subscribe') }}">
                    @csrf
                    <input type="email" name="email" class="form-control mb-2" placeholder="Your Email Address" required>
                    <button type="submit" class="btn btn-light w-100 text-danger fw-bold">Sign Up</button>
                </form>

                @if(session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mt-3">{{ $errors->first() }}</div>
                @endif
            </div>
        </div>

        <hr class="text-light">

        <div class="text-center">
            <p class="mb-0">© Blood Donation Portal | Every drop counts 🩸</p>
        </div>
    </div>
</footer>

<script src="{{ asset('js/parallax.js') }}"></script>

</body>
</html>
