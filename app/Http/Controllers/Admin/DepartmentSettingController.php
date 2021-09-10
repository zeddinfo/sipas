<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\DepartmentDataTable;
use App\Http\Requests\DepartmentRequest;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentSettingController extends Controller
{
    public function index(DepartmentDataTable $dataTable)
    {
        $title = 'Data Departemen';
        $icon = 'bi-bookmark';
        $table_view = "setting.departments.index";
        return $dataTable->render('setting.index', compact('title', 'icon', 'table_view'));
    }

    public function create()
    {
        $departments = Department::get();

        return view('setting.departments.create')->with(compact('departments'));
    }

    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());

        Alert::success('Yay :D', 'Berhasil menyimpan Departemen');
        return redirect(route('admin.setting.department.index'));
    }

    public function show(Department $department)
    {
    }

    public function edit(Department $department)
    {
        $departments = Department::get();
        return view('setting.departments.edit')->with(compact('department', 'departments'));
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        Alert::success('Yay :D', 'Berhasil mengupdate Departemen');
        return redirect(route('admin.setting.department.edit', ['department' => $department]));
    }

    public function destroy(Department $department)
    {
        $department->delete();

        Alert::success('Yay :D', 'Berhasil menghapus Departemen');
        return redirect(route('admin.setting.department.index'));
    }
}
