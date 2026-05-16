<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    // Public: Show admission form
    public function create()
    {
        return view('admission.create');
    }

    // Public: Store application
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:admissions,email',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'course' => 'nullable|string|max:255',
        ]);

        Admission::create($request->only([
            'full_name', 'email', 'phone', 'birthdate', 'address', 'course'
        ]));

        return redirect()->back()->with('success', 'Your admission application has been submitted successfully!');
    }

    // Admin/Staff: List all admissions
    public function index()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403);
        }

        $admissions = Admission::latest()->get();
        return view('admin.admissions', compact('admissions'));
    }

    // Admin/Staff: Update status and remarks
    public function updateStatus(Request $request, Admission $admission)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,approved,rejected',
            'remarks' => 'nullable|string',
        ]);

        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403);
        }

        $admission->update($request->only(['status', 'remarks']));

        return redirect()->back()->with('success', 'Admission status updated successfully!');
    }
}
