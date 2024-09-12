<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StudentRequest;
use App\Models\Student;
use App\Repositories\Repository\DepartmentRepository;
use App\Repositories\Repository\StudentRepository;
use App\Repositories\Repository\UserRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $studentRepository;
    protected $departmentRepository;
    protected $userRepository;

    public function __construct(StudentRepository $studentRepository, DepartmentRepository $departmentRepository, UserRepository $userRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->departmentRepository = $departmentRepository;
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {

        // dd($request->all());
        $students = $this->studentRepository->getAllStudent( 5, $request->all());
        $departments = $this->departmentRepository->getDepartments();
        return view('students.index', compact('students', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->departmentRepository->getDepartments();
        return view('students.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $this->studentRepository->createStudent($request->all());
        return redirect()->route('students.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = $this->studentRepository->findOrFail($id);
        $user = $this -> userRepository->findOrFail($student->user_id);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'student_code' => $student->student_code,
            'phone' => $student->phone,
            'address' => $student->address,
            'birthday' => $student->birthday,
            'image' => $student->image,
            'department_id' => $student->department_id,
            'gender' => $student->gender
        ]);
        dd($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        try {
            $this->studentRepository->update($id, $request->all());
            session()->flash('success', 'Student updated successfully!');
            return response()->json([
                'redirect_url' => route('students.index')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update student!'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->studentRepository->delete($id);
        return back()->with('success', 'Đã xóa thành công.');
    }
}
