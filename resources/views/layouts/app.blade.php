<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            background: #f8f9fa;
        }

        /* ================= NAVBAR ================= */

        .top-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 65px;
            z-index: 1050;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            top: 65px;
            left: 0;
            width: 260px;
            height: calc(100vh - 65px);
            overflow-y: auto;
            background: #fff;
            border-right: 1px solid #dee2e6;
        }

        .sidebar .list-group-item {
            border: none;
            padding: 15px 20px;
            font-weight: 500;
        }

        .sidebar .list-group-item:hover {
            background: #f1f3f5;
        }

        .sidebar .list-group-item.active {
            background: #0d6efd;
            color: white;
        }

        /* ================= CONTENT ================= */

        .content {
            margin-left: 260px;
            margin-top: 65px;
            height: calc(100vh - 65px);
            overflow-y: auto;
            padding: 30px;
        }

        .content::-webkit-scrollbar,
        .sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .content::-webkit-scrollbar-thumb,
        .sidebar::-webkit-scrollbar-thumb {
            background: #bdbdbd;
            border-radius: 10px;
        }
    </style>

</head>

<body>

    {{-- ================= NAVBAR ================= --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow top-navbar">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                Employee Management
            </a>

            <div class="ms-auto dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4 me-2"></i>
                    <span>{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-item-text fw-bold">
                        {{ Auth::user()->name }}
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button class="dropdown-item">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- ================= SIDEBAR ================= --}}

    <aside class="sidebar">
        <div class="list-group list-group-flush">
            <a href="{{ route('dashboard') }}"
                class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>

            <a href="{{ route('employees.index') }}"
                class="list-group-item list-group-item-action {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i>
                Data Karyawan
            </a>
        </div>
    </aside>

    {{-- ================= CONTENT ================= --}}

    <main class="content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
