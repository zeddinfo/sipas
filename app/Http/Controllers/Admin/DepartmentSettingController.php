<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentSettingController extends Controller
{
    public function index()
    {
        $page = 'Data Bagian';
        $departments = Department::with('upperDepartment')->get();

        return view('setting.departments.index', compact('departments', 'page'));
    }

    public function create()
    {
        $page = 'Edit Department';
        $departments = Department::get();

        return view('setting.departments.create')->with(compact('departments', 'page'));
    }

    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());

        Alert::success('Yay :D', 'Berhasil menyimpan Department');
        return redirect(route('admin.setting.department.index'));
    }

    public function show(Department $department)
    {
    }

    public function edit(Department $department)
    {
        $page = 'Edit Department';
        $department = $department->get()->where('id', $department->id)->first();
        $departments = Department::get();

        return view('setting.departments.edit')->with(compact('department', 'departments', 'page'));
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        Alert::success('Yay :D', 'Berhasil mengupdate Department');
        return redirect(route('admin.setting.department.edit', ['department' => $department]));
    }

    public function destroy(Department $department)
    {
        $department->delete();

        Alert::success('Yay :D', 'Berhasil menghapus Department');
        return redirect(route('admin.setting.department.index'));
    }
}
