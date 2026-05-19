<?php

namespace App\Http\Controllers;

use App\Models\AssessmentCenter;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function courses()
    {
        $courses = Course::orderBy('name')->get();
        return view('admin.courses', compact('courses'));
    }

    public function storeCourse(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:courses,name',
            'description' => 'nullable|string|max:1000',
        ]);

        Course::create($request->only('name', 'description'));

        return redirect()->back()->with('success', 'Course added successfully.');
    }

    public function centers()
    {
        $centers = AssessmentCenter::orderBy('name')->get();
        return view('admin.centers', compact('centers'));
    }

    public function storeCenter(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:assessment_centers,name',
            'location' => 'nullable|string|max:255',
        ]);

        AssessmentCenter::create($request->only('name', 'location'));

        return redirect()->back()->with('success', 'Assessment center added successfully.');
    }

    public function users()
    {
        $users = User::orderBy('name')->get();
        return view('admin.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,staff,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User account created successfully.');
    }
}
