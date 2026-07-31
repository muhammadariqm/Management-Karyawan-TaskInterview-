<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $employeeCount = Employee::count();

        $userCount = User::count();

        $positionCount = Employee::distinct('jabatan')->count('jabatan');

        $latestEmployees = Employee::latest()->take(5)->get();

        $chart = Employee::select(
                'jabatan',
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('jabatan')
            ->get();

        return view('dashboard.index', compact(
            'employeeCount',
            'userCount',
            'positionCount',
            'latestEmployees',
            'chart'
        ));
    }
}
