@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Tambah Data Karyawan</h2>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="">-- Pilih --</option>

                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                    Laki-Laki
                                </option>

                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="{{ old('tanggal_lahir') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">No Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control"
                                value="{{ old('tanggal_masuk') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Provinsi</label>
                            <select id="provinsi" name="provinsi_id" class="form-select" required>
                                <option value="">-- Pilih Provinsi --</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kabupaten/Kota</label>
                            <select id="kabupaten" name="kabupaten_id" class="form-select" required>
                                <option value="">-- Pilih Kabupaten --</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan_id" class="form-select" required>
                                <option value="">-- Pilih Kecamatan --</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Desa/Kelurahan</label>
                            <select id="desa" name="desa_id" class="form-select" required>
                                <option value="">-- Pilih Desa --</option>
                            </select>
                        </div>

                        {{-- Nama wilayah disimpan otomatis --}}
                        <input type="hidden" name="provinsi_nama" id="provinsi_nama">
                        <input type="hidden" name="kabupaten_nama" id="kabupaten_nama">
                        <input type="hidden" name="kecamatan_nama" id="kecamatan_nama">
                        <input type="hidden" name="desa_nama" id="desa_nama">

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat Lengkap</label>
                            <textarea name="alamat_detail" rows="4" class="form-control" required>{{ old('alamat_detail') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/wilayah.js') }}"></script>

@endsection
