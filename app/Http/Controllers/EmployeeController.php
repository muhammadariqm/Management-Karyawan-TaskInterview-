<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
    
        $employees = Employee::when($request->search, function ($query) use ($request) {
    
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%')
                  ->orWhere('nik', 'like', '%' . $request->search . '%');
    
        })
        ->latest()
        ->paginate($perPage)
        ->withQueryString();
    
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:employees,nik',
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|max:20',
            'email' => 'nullable|email',
            'jabatan' => 'required',
            'tanggal_masuk' => 'required|date',

            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',

            'provinsi_nama' => 'required',
            'kabupaten_nama' => 'required',
            'kecamatan_nama' => 'required',
            'desa_nama' => 'required',

            'alamat_detail' => 'required',
        ]);

        Employee::create([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,

            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id,
            'desa_id' => $request->desa_id,

            'provinsi_nama' => $request->provinsi_nama,
            'kabupaten_nama' => $request->kabupaten_nama,
            'kecamatan_nama' => $request->kecamatan_nama,
            'desa_nama' => $request->desa_nama,

            'alamat_detail' => $request->alamat_detail,
        ]);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nik' => 'required|unique:employees,nik,' . $employee->id,
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required|max:20',
            'email' => 'nullable|email',
            'jabatan' => 'required',
            'tanggal_masuk' => 'required|date',

            'provinsi_id' => 'required',
            'kabupaten_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',

            'provinsi_nama' => 'required',
            'kabupaten_nama' => 'required',
            'kecamatan_nama' => 'required',
            'desa_nama' => 'required',

            'alamat_detail' => 'required',
        ]);

        $employee->update([
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'tanggal_masuk' => $request->tanggal_masuk,

            'provinsi_id' => $request->provinsi_id,
            'kabupaten_id' => $request->kabupaten_id,
            'kecamatan_id' => $request->kecamatan_id,
            'desa_id' => $request->desa_id,

            'provinsi_nama' => $request->provinsi_nama,
            'kabupaten_nama' => $request->kabupaten_nama,
            'kecamatan_nama' => $request->kecamatan_nama,
            'desa_nama' => $request->desa_nama,

            'alamat_detail' => $request->alamat_detail,
        ]);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'Data karyawan berhasil dihapus.');
    }
}