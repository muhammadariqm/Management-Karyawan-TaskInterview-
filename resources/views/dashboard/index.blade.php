@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Dashboard</h2>
                <p class="text-muted mb-0">
                    Selamat datang, <strong>{{ Auth::user()->name }}</strong> 👋
                </p>
            </div>

            <div class="text-end">
                <small class="text-muted">
                    {{ now()->translatedFormat('l, d F Y') }}
                </small>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">

            <!-- Total Karyawan -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex align-items-center">

                        <div class="bg-primary text-white rounded-circle p-3 me-3">
                            <i class="bi bi-people-fill fs-2"></i>
                        </div>

                        <div>
                            <h6 class="text-muted mb-1">
                                Total Karyawan
                            </h6>

                            <h2 class="fw-bold mb-0">
                                {{ $employeeCount }}
                            </h2>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Total User -->
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body d-flex align-items-center">

                        <div class="bg-success text-white rounded-circle p-3 me-3">
                            <i class="bi bi-person-fill fs-2"></i>
                        </div>

                        <div>
                            <h6 class="text-muted mb-1">
                                Total User
                            </h6>

                            <h2 class="fw-bold mb-0">
                                {{ $userCount }}
                            </h2>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
