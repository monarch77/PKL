<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Admin Klaim Asuransi')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="{{ asset('css/layout/style.css') }}" />
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <a href="/dashboarduser">
                        <img src="{{ asset('images/dashboard/Logo.png') }}" alt="logo">
                    </a>
                    <a href="/dashboarduser">
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
                <a href="/dashboarduser">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="/dashboarduser/ajukanklaim">
                    <span class="material-symbols-outlined">
                        post_add
                    </span>
                    <h3>Ajukan Klaim</h3>
                </a>
                <a href="/dashboarduser/klaim">
                    <span class="material-symbols-outlined">
                        receipt_long
                    </span>
                    <h3>Klaim Saya</h3>
                </a>
                <a href="#">
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
        
        <!-- End Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Zeta</b></p>
                        <small class="text-muted">User</small>
                    </div>
                    <div class="profile-photo">
                        <img src="{{ asset('images/dashboard/profile.jpeg') }}" alt="Foto Profil">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->
        </div>
        <script src="{{ asset('js/dashboard/index.js') }}"></script>
    </div>
</body>

</html>
