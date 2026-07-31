@extends('layouts.app') @section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold"> Dashboard </h2>
                <p class="text-muted"> Selamat datang, <strong>{{ Auth::user()->name }}</strong> 👋 </p>
            </div>
            <div>
                <span class="text-muted">
                    {{ now()->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Total Karyawan</small>
                                <h2>{{ $employeeCount }}</h2>
                            </div>
                            <div class="icon-circle bg-primary">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Total User</small>
                                <h2>{{ $userCount }}</h2>
                            </div>
                            <div class="icon-circle bg-success">
                                <i class="bi bi-person-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Total Jabatan</small>
                                <h2>{{ $positionCount }}</h2>
                            </div>
                            <div class="icon-circle bg-warning">
                                <i class="bi bi-briefcase-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card stat-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Hari Ini</small>
                                <h6>{{ now()->format('d M') }}</h6>
                            </div>
                            <div class="icon-circle bg-danger">
                                <i class="bi bi-calendar-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5 class="mb-3"> Quick Action </h5>
                <a href="{{ route('employees.create') }}" class="btn btn-primary rounded-pill">
                    <i class="bi bi-plus-circle"></i> Tambah Karyawan </a>
                <a href="#" class="btn btn-success rounded-pill">
                    <i class="bi bi-person-fill"></i> Kelola User </a>
                <a href="#" class="btn btn-danger rounded-pill">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF </a>
            </div>
        </div>
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5> Statistik Jabatan </h5>
                <canvas id="positionChart"></canvas>
            </div>
        </div>
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <h5> Karyawan Terbaru </h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>No HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestEmployees as $employee)
                            <tr>
                                <td>{{ $employee->nik }}</td>
                                <td>{{ $employee->nama_lengkap }}</td>
                                <td>{{ $employee->jabatan }}</td>
                                <td>{{ $employee->no_telepon }}</td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary btn-sm">
                                        Detail </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('positionChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($chart as $item)
                        "{{ $item->jabatan }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah Karyawan',
                    data: [
                        @foreach ($chart as $item)
                            {{ $item->total }},
                        @endforeach
                    ],
                    backgroundColor: [
                        '#2563eb',
                        '#16a34a',
                        '#f59e0b',
                        '#ef4444',
                        '#8b5cf6',
                        '#06b6d4'
                    ],
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
