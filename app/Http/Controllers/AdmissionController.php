<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use Illuminate\Http\Request;

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

    // Admin: List all admissions
    public function index()
    {
        $admissions = Admission::latest()->get();
        return view('admin.admissions', compact('admissions'));
    }

    // Admin: Update status and remarks
    public function updateStatus(Request $request, Admission $admission)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,approved,rejected',
            'remarks' => 'nullable|string',
        ]);

        $admission->update($request->only(['status', 'remarks']));

        return redirect()->back()->with('success', 'Admission status updated successfully!');
    }
}
