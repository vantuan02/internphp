<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::with('user', 'department')->select(
            'student_code', 
            'user_id', 
            'phone', 
            'address', 
            'gender', 
            'birthday', 
            'status', 
            'department_id'
        )->get()->map(function ($student) {
            return [
                'student_code' => $student->student_code,
                'name' => $student->user->name,
                'email' => $student->user->email,
                'phone' => $student->phone,
                'address' => $student->address,
                'gender' => $student->gender ? 'Male' : 'Female',
                'birthday' => $student->birthday,
                'status' => $student->status,
                'department' => $student->department_id,
            ];
        });   
    }

    public function headings(): array
    {
        return [
            'Student Code',
            'Name',
            'Email',
            'Phone',
            'Address',
            'Gender',
            'Birthday',
            'Status',
            'Department',
        ];
    }
}
