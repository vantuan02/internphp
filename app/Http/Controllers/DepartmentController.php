<?php

namespace App\Http\Controllers;

use App\Http\Requests\Departments\DepartmentRequest;
use App\Repositories\Repository\DepartmentRepository;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        $departments = $this->departmentRepository->all($page = 5);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $this->departmentRepository->create($request->all());
        return redirect()->route('departments.index')->with('success', 'Đã tạo thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departments = $this->departmentRepository->first($id);
        return view('departments.edit', compact('departments', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request,  string $id)
    {
        $this->departmentRepository->update($id, $request->all());
        return redirect()->route('departments.index')->with('success', 'Đã sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->departmentRepository->delete($id);
        return back()->with('success', 'Đã xóa thành công.');
    }
}
