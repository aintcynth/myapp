<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard landing page
    public function index()
    {
        $user = auth()->user();

        return view('dashboard.index', compact('user'));
    }

    // User dashboard
    public function userDashboard()
    {
        if (auth()->user()->role !== 'user') {
            abort(403);
        }

        $admission = Admission::where('user_id', auth()->id())
            ->orWhere('email', auth()->user()->email)
            ->latest()
            ->first();

        return view('dashboard.user', compact('admission'));
    }

    // Staff dashboard
    public function staffDashboard()
    {
        if (auth()->user()->role !== 'staff') {
            abort(403);
        }

        return view('dashboard.staff');
    }

    // Admin dashboard
    public function adminDashboard()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('dashboard.admin');
    }
}
