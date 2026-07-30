@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Data Karyawan</h2>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control"
                                value="{{ old('nik', $employee->nik) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control"
                                value="{{ old('nama_lengkap', $employee->nama_lengkap) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Jenis Kelamin</label>

                            <select name="jenis_kelamin" class="form-select">

                                <option value="L"
                                    {{ old('jenis_kelamin', $employee->jenis_kelamin) == 'L' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>

                                <option value="P"
                                    {{ old('jenis_kelamin', $employee->jenis_kelamin) == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control"
                                value="{{ old('tempat_lahir', $employee->tempat_lahir) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control"
                                value="{{ old('no_telepon', $employee->no_telepon) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $employee->email) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control"
                                value="{{ old('jabatan', $employee->jabatan) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control"
                                value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Provinsi</label>
                            <select id="provinsi" name="provinsi_id" class="form-select">
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Kabupaten</label>
                            <select id="kabupaten" name="kabupaten_id" class="form-select">
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Kecamatan</label>
                            <select id="kecamatan" name="kecamatan_id" class="form-select">
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Desa</label>
                            <select id="desa" name="desa_id" class="form-select">
                            </select>
                        </div>

                        <input type="hidden" name="provinsi_nama" id="provinsi_nama"
                            value="{{ $employee->provinsi_nama }}">

                        <input type="hidden" name="kabupaten_nama" id="kabupaten_nama"
                            value="{{ $employee->kabupaten_nama }}">

                        <input type="hidden" name="kecamatan_nama" id="kecamatan_nama"
                            value="{{ $employee->kecamatan_nama }}">

                        <input type="hidden" name="desa_nama" id="desa_nama" value="{{ $employee->desa_nama }}">

                        <div class="col-md-12 mb-3">
                            <label>Alamat Lengkap</label>
                            <textarea class="form-control" rows="4" name="alamat_detail">{{ old('alamat_detail', $employee->alamat_detail) }}</textarea>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end">
                    <button class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        const selectedProvince = '{{ $employee->provinsi_id }}';
        const selectedRegency = '{{ $employee->kabupaten_id }}';
        const selectedDistrict = '{{ $employee->kecamatan_id }}';
        const selectedVillage = '{{ $employee->desa_id }}';
    </script>

    <script src="{{ asset('js/wilayah.js') }}"></script>

@endsection
