<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Data Bagian';
        $departments = Department::with('upperDepartment')->get();
        // dd($departments->upperDepartment);

        return view('setting.departments.index', compact('departments', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'Edit Department';
        $departments = Department::get();
        // Alert::success('Yay :D', 'Berhasil mengupdate Level');
        // dd($level);
        return view('setting.departments.create')->with(compact('departments', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());
        Alert::success('Yay :D', 'Berhasil menyimpan Department');
        return redirect(route('admin.setting.department.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $page = 'Edit Department';
        $department = $department->get()->where('id', $department->id)->first();
        $departments = Department::get();
        // Alert::success('Yay :D', 'Berhasil mengupdate Level');
        // dd($level);
        return view('setting.departments.edit')->with(compact('department', 'departments', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        Alert::success('Yay :D', 'Berhasil mengupdate Department');
        return redirect(route('admin.setting.department.edit', ['department' => $department]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        Alert::success('Yay :D', 'Berhasil menghapus Department');
        return redirect(route('admin.setting.department.index'));
    }
}
