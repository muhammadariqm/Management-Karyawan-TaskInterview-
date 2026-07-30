<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;


class DashboardController extends Controller
{
    public function index()
{
    return view('dashboard.index', [
        'employeeCount' => Employee::count(),
        'userCount' => User::count(),
    ]);
}
}
