<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Exports\StudentsExport;
use App\Http\Requests\ImportStudentRequest;
use App\Http\Requests\ScoreRequest;
use App\Http\Requests\Students\StudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Imports\StudentsImport;
use App\Repositories\Repository\DepartmentRepository;
use App\Repositories\Repository\StudentRepository;
use App\Repositories\Repository\SubjectRepository;
use App\Repositories\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $studentRepository;
    protected $departmentRepository;
    protected $subjectRepository;
    protected $userRepository;

    public function __construct(StudentRepository $studentRepository, DepartmentRepository $departmentRepository, UserRepository $userRepository, SubjectRepository $subjectRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->departmentRepository = $departmentRepository;
        $this->userRepository = $userRepository;
        $this->subjectRepository = $subjectRepository;
    }

    public function index(Request $request)
    {

        // dd($request->all());
        $perPage = $request->input('perPage', 100);
        $perPage = in_array($perPage, [100, 1000, 3000]) ? $perPage : 100;

        $students = $this->studentRepository->getAllStudent($perPage, $request->all());
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
        $user = $this->userRepository->findOrFail($student->user_id);
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'student_code' => $student->student_code,
            'birthday' => $student->birthday,
            'phone' => $student->phone,
            'address' => $student->address,
            'status' => $student->status,
            'image' => $student->image,
            'department_id' => $student->department_id,
            'gender' => $student->gender
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $stuRequest, string $id)
    {
        try {
            $this->studentRepository->updateStudent($id, $stuRequest->all());
            session()->flash('success', 'Student updated successfully!');
            return response()->json([
                'redirect_url' => route('students.index')
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update student!'], 500);
            throw $e;
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

    public function detail($id)
    {
        $student = $this->studentRepository->findOrFail($id);
        $studentSubjects = $student->subjects()->get();
        $subjects = $this->subjectRepository->all($page = 5);
        return view('students.profile', compact('student', 'studentSubjects', 'subjects'));
    }

    public function showRegisterSubject()
    {
        $subjects = $this->subjectRepository->getSubject(10);
        $student = $this->studentRepository->findOrFail(Auth::user()->student->id);
        return view("students.registerSubject", compact("subjects", "student"));
    }

    public function registerSubject($id)
    {
        $this->studentRepository->registerSubject($id);
        return redirect()->route("students.registerSubject")->with("success", "Register subject successfully!");
    }

    public function registerMoreSubject(Request $request)
    {
        $this->studentRepository->registerSubject($request->input("moreSubjectsCheckbox"));
        session()->flash("success", "Register subject successfully!");
        return response()->json([
            'redirect_url' => route('students.registerSubject'),
        ]);
    }

    public function unRegisterSubject($id)
    {
        $this->studentRepository->unRegisterSubject($id);
        return redirect()->route("students.registerSubject")->with("success", "Unregister subject successfully!");
    }

    public function updateScore(ScoreRequest $scoreRequest, $id)
    {
        $this->studentRepository->updateScore($id, $scoreRequest->all());
        return redirect()->route("students.profile", $id)->with("success", "Update score by subject successfully!");
    }

    public function export()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function import(ImportStudentRequest $importRequest)
    {
        Excel::import(new StudentsImport, $importRequest->all());

        return back()->with('success', 'Import thành công!');
    }
    public function scoreTable(){
        $students = $this->studentRepository->getAll();
        $subjects = $this->subjectRepository->getAll();
        return view("students.scoreTable", compact("subjects","students"));
    }
}
