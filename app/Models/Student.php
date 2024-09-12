<?php

namespace App\Models;

use App\Enums\Gender;
use App\Enums\Status;
use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    protected $fillabe = [
        'student_code',
        'gender',
        'birthday',
        'phone',
        'email',
        'address',
        'status',
        'user_id',
        'department_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject')->withPivot('score')->withTimestamps();
    }
}
