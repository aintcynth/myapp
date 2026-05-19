<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
    ];

    public function admissions()
    {
        return $this->hasMany(Admission::class);
    }
}
