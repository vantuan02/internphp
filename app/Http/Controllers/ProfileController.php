<?php

namespace App\Http\Controllers;

use App\Repositories\Repository\StudentRepository;
use App\Repositories\Repository\SubjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $studentRepository;
    protected $subjectRepository;

    public function __construct(StudentRepository $studentRepository, SubjectRepository $subjectRepository)
    {
        $this->studentRepository=$studentRepository;
        $this->subjectRepository=$subjectRepository;        
    }

    public function index($id){
        $student = $this->studentRepository->findOrFail($id);
        $studentSubjects = $student->subjects()->get();
        $subjects = $this->subjectRepository->all($page = 5);
        return view('students.profile', compact('student', 'studentSubjects', 'subjects'));
    }

    public function showRegisterSubjects()
    {
        $subjects = $this->subjectRepository->getSubjects(10);
        $student = $this->studentRepository->findOrFail(Auth::user()->student->id);
        return view("students.registerSubject", compact("subjects", "student"));
    }

    public function registerSubjects($id)
    {
        $this->studentRepository->registerSubjects($id);
        return redirect()->route("students.registerSubject")->with("success", "Register subject successfully!");
    }

    public function registerMoreSubjects(Request $request)
    {
        $this->studentRepository->registerSubjects($request->input("moreSubjectsCheckbox"));
        session()->flash("success", "Register subject successfully!");
        return response()->json([
            'redirect_url' => route('students.registerSubject'),
        ]);
    }

    public function unRegisterSubjects($id)
    {
        $this->studentRepository->unRegisterSubjects($id);
        return redirect()->route("students.registerSubject")->with("success", "Unregister subject successfully!");
    }

    public function updateScore(Request $request, $id)
    {
        $this->studentRepository->updateScore($id, $request->all());
        return redirect()->route("students.profile", $id)->with("success", "Update score by subject successfully!");
    }
}
