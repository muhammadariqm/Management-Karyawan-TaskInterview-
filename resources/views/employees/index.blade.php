@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Karyawan</h2>

        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Karyawan
        </a>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <form action="{{ route('employees.index') }}" method="GET" class="d-flex">

            <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama / NIK..."
                value="{{ request('search') }}">

            <button class="btn btn-primary me-3">
                Cari
            </button>

            <select name="per_page" class="form-select" style="width:120px" onchange="this.form.submit()">

                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 Baris</option>
                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20 Baris</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 Baris</option>
                <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 Baris</option>

            </select>

        </form>

    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No HP</th>
                        <th width="220">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($employees as $employee)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $employee->nik }}</td>

                            <td>{{ $employee->nama_lengkap }}</td>

                            <td>{{ $employee->jabatan }}</td>

                            <td>{{ $employee->no_telepon }}</td>

                            <td class="text-nowrap">
                                <div class="d-flex gap-1">

                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill me-1"></i> Detail
                                    </a>

                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash-fill me-1"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Data tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $employees->links() }}
    </div>

    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data?',
                    text: 'Data yang dihapus tidak dapat dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
