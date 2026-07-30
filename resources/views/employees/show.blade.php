@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>Detail Data Karyawan</h2>

            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered">

                    <tr>
                        <th width="250">NIK</th>
                        <td>{{ $employee->nik }}</td>
                    </tr>

                    <tr>
                        <th>Nama Lengkap</th>
                        <td>{{ $employee->nama_lengkap }}</td>
                    </tr>

                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>
                            {{ $employee->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                        </td>
                    </tr>

                    <tr>
                        <th>Tempat Lahir</th>
                        <td>{{ $employee->tempat_lahir }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ $employee->tanggal_lahir }}</td>
                    </tr>

                    <tr>
                        <th>No Telepon</th>
                        <td>{{ $employee->no_telepon }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>

                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $employee->jabatan }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ $employee->tanggal_masuk }}</td>
                    </tr>

                    <tr>
                        <th>Provinsi</th>
                        <td>{{ $employee->provinsi_nama }}</td>
                    </tr>

                    <tr>
                        <th>Kabupaten/Kota</th>
                        <td>{{ $employee->kabupaten_nama }}</td>
                    </tr>

                    <tr>
                        <th>Kecamatan</th>
                        <td>{{ $employee->kecamatan_nama }}</td>
                    </tr>

                    <tr>
                        <th>Desa/Kelurahan</th>
                        <td>{{ $employee->desa_nama }}</td>
                    </tr>

                    <tr>
                        <th>Alamat Lengkap</th>
                        <td>{{ $employee->alamat_detail }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
@endsection
