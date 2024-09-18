<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Admin Klaim Asuransi')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/layout/style.css') }}" />
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <a href="/dashboardadmin">
                        <img src="{{ asset('images/dashboard/Logo.png') }}" alt="logo">
                    </a>
                    <a href="/dashboardadmin">
                        <h2>Insura</h2>
                    </a>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="/dashboardadmin">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="/dashboardadmin/profile">
                    <span class="material-symbols-outlined">
                        person_outline
                    </span>
                    <h3>Admin</h3>
                </a>
                <a href="/dashboardadmin/klaim">
                    <span class="material-symbols-outlined">
                        receipt_long
                    </span>
                    <h3>Klaim</h3>
                </a>
                <a href="/dashboardadmin/laporan">
                    <span class="material-symbols-outlined">
                        insights
                    </span>
                    <h3>Laporan</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        settings
                    </span>
                    <h3>Pengaturan</h3>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        help
                    </span>
                    <h3>Bantuan</h3>
                </a>
                <a href="/logout">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <h3>LogOut</h3>
                </a>
            </div>
        </aside>
        <!-- End Sidebar -->

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>