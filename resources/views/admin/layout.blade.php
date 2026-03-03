<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel - Blood Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            background: #b11226;
            color: #fff;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 20px;
            text-align: center;
        }

        .sidebar a,
        .sidebar button {
            display: block;
            width: 100%;
            color: #fff;
            text-decoration: none;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 10px;
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar button:hover {
            background: rgba(255,255,255,0.15);
        }

        /* Main content */
        .main {
            flex: 1;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            margin: 0;
            font-size: 26px;
            color: #333;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #b11226;
            font-weight: 600;
            cursor: pointer;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .card h3 {
            margin: 0;
            font-size: 14px;
            color: #777;
        }

        .card p {
            font-size: 28px;
            margin: 10px 0 0;
            color: #b11226;
            font-weight: bold;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #fafafa;
            color: #555;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            color: #fff;
        }

        .active { background: #28a745; }
        .blocked { background: #dc3545; }
    </style>
</head>
<body>

<div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Blood Portal</h2>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users') }}">Users</a>
        <a href="{{ route('admin.appointments') }}">Appointments</a>
        <a href="{{ route('admin.emergencies') }}">Emergency Requests</a>

        <!-- LOGOUT (SweetAlert) -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="button"
                    data-confirm
                    data-title="Logout?"
                    data-text="You will be logged out of the admin panel."
                    data-confirm-text="Logout"
                    data-cancel-text="Stay logged in">
                Logout
            </button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="main">
        <div class="topbar">
            <h1>@yield('title')</h1>

            <!-- TOP LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="button"
                        class="logout-btn"
                        data-confirm
                        data-title="Logout?"
                        data-text="You will be logged out of the admin panel."
                        data-confirm-text="Logout">
                    Logout
                </button>
            </form>
        </div>

        @yield('content')
    </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('[data-confirm]').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const form = this.closest('form');

            Swal.fire({
                title: this.dataset.title || 'Are you sure?',
                text: this.dataset.text || 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#b11226',
                cancelButtonColor: '#6c757d',
                confirmButtonText: this.dataset.confirmText || 'Yes',
                cancelButtonText: this.dataset.cancelText || 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

});
</script>

{{-- GLOBAL SUCCESS ALERT --}}
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Success',
    text: "{{ session('success') }}",
    confirmButtonColor: '#b11226'
});
</script>
@endif

</body>
</html>
