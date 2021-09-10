<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use Illuminate\Http\Request;
use App\DataTables\LevelDataTable;
use App\Http\Requests\LevelRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LevelSettingController extends Controller
{
    public function index(LevelDataTable $dataTable)
    {
        $title = 'Data Jabatan';
        $icon = 'bi-award';
        $table_view = "setting.levels.index";
        return $dataTable->render('setting.index', compact('title', 'icon', 'table_view'));
    }

    public function create()
    {
        $levels = Level::get();

        return view('setting.levels.create')->with(compact('levels'));
    }

    public function store(LevelRequest $request)
    {
        Level::create($request->validated());

        Alert::success('Yay :D', 'Berhasil menyimpan Level');
        return redirect(route('admin.setting.level.index'));
    }

    public function show(Level $level, $id)
    {
    }

    public function edit(Level $level)
    {
        $levels = Level::get();
        return view('setting.levels.edit')->with(compact('level', 'levels'));
    }

    public function update(LevelRequest $request, Level $level)
    {
        $level->update($request->validated());

        Alert::success('Yay :D', 'Berhasil mengupdate Level');
        return redirect(route('admin.setting.level.edit', ['level' => $level]));
    }

    public function destroy(Level $level)
    {
        $level->delete();

        Alert::success('Yay :D', 'Berhasil menghapus Level');
        return redirect(route('admin.setting.level.index'));
    }
}
