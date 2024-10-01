<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => bcrypt('password'),
        ]);

        // Tạo Student
        return new Student([ 
            'user_id' => $user->id,
            'student_code' => $row['code'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'gender' => $row['gender'],
            'birthday' => $row['birthday'],
            'status' => $row['status'],
            'department_id' => $row['department'],
        ]);
    }
}
