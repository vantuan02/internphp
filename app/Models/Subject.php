<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'name',
        'description',
        'department_id'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_subject')->withPivot('score')->withTimestamps();
    }
    
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}
