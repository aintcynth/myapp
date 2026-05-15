<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // User dashboard
    public function userDashboard()
    {
        return view('dashboard.user');
    }

    // Staff dashboard
    public function staffDashboard()
    {
        return view('dashboard.staff');
    }

    // Admin dashboard
    public function adminDashboard()
    {
        return view('dashboard.admin');
    }
}
