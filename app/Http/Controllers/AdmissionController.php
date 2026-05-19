<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\AssessmentCenter;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    // Public: Show admission form
    public function create()
    {
        $courses = Course::orderBy('name')->get();
        return view('admission.create', compact('courses'));
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
            'course_id' => 'nullable|exists:courses,id',
            'course' => 'nullable|string|max:255',
        ]);

        $courseName = $request->course;
        if ($request->course_id) {
            $course = Course::find($request->course_id);
            $courseName = $course?->name;
        }

        Admission::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'course' => $courseName,
            'course_id' => $request->course_id,
            'user_id' => Auth::check() ? Auth::id() : null,
        ]);

        return redirect()->back()->with('success', 'Your admission application has been submitted successfully!');
    }

    // Admin/Staff: List all admissions
    public function index()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403);
        }

        $query = Admission::with(['courseItem', 'assessmentCenter', 'assignedStaff'])->latest();

        if (Auth::user()->role === 'staff') {
            $query->where('assigned_to', Auth::id());
        }

        $admissions = $query->get();
        $staffUsers = User::where('role', 'staff')->orderBy('name')->get();
        $centers = AssessmentCenter::orderBy('name')->get();

        return view('admin.admissions', compact('admissions', 'staffUsers', 'centers'));
    }

    // Admin/Staff: Update status and remarks
    public function updateStatus(Request $request, Admission $admission)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,approved,rejected',
            'remarks' => 'nullable|string',
            'assigned_to' => 'nullable|exists:users,id',
            'assessment_center_id' => 'nullable|exists:assessment_centers,id',
        ]);

        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403);
        }

        if (Auth::user()->role === 'staff' && $admission->assigned_to !== Auth::id()) {
            abort(403);
        }

        $updateData = $request->only(['status', 'remarks']);
        if (Auth::user()->role === 'admin') {
            $updateData['assigned_to'] = $request->assigned_to;
            $updateData['assessment_center_id'] = $request->assessment_center_id;
        }

        $admission->update($updateData);

        return redirect()->back()->with('success', 'Admission status updated successfully!');
    }
}
