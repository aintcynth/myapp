<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Course;
use App\Models\AssessmentCenter;
use App\Models\User;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'birthdate',
        'address',
        'course',
        'status',
        'remarks',
        'user_id',
        'course_id',
        'assessment_center_id',
        'assigned_to',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courseItem()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function assessmentCenter()
    {
        return $this->belongsTo(AssessmentCenter::class);
    }

    public function assignedStaff()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
