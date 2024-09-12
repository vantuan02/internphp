<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subjects\SubjectRequest;
use App\Repositories\Repository\DepartmentRepository;
use App\Repositories\Repository\SubjectRepository;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $subjectRepository;
    protected $departmentRepository;
    
    public function __construct(SubjectRepository $subjectRepository, DepartmentRepository $departmentRepository)
    {
        $this->subjectRepository = $subjectRepository;
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        $departments = $this->departmentRepository->getDepartments();
        $subjects = $this->subjectRepository->all($page = 5);
        return view('subjects.index', compact('subjects','departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->departmentRepository->getDepartments();
        return view('subjects.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectRequest $request)
    {
        $this->subjectRepository->create($request->all());
        return  redirect()->route('subjects.index')->with('success', 'Đã tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = $this->departmentRepository->getDepartments();
        $subjects = $this->subjectRepository->first($id);
        return view('subjects.edit', compact('subjects', 'id', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectRequest $request, string $id)
    {
        $subjects = $this->subjectRepository->update($id, $request->all());
        return redirect()->route('subjects.index', compact('request','subjects','id'))->with('success', 'Đã sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->subjectRepository->delete($id);
        return back()->with('success', 'Đã xóa thành công.');
    }
}
