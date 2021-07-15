<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LevelSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'Data Jabatan';
        $levels = Level::with('sameLevel')->get();
        // dd($levels->sameLevel);
        return view('setting.levels.index', compact('levels', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::get();
        // Alert::success('Yay :D', 'Berhasil mengupdate Level');
        // dd($level);
        return view('setting.levels.create')->with(compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LevelRequest $request)
    {
        Level::create($request->validated());
        Alert::success('Yay :D', 'Berhasil menyimpan Level');
        return redirect(route('admin.setting.level.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        $level = $level->get()->where('id', $level->id)->first();
        $levels = Level::get();
        // Alert::success('Yay :D', 'Berhasil mengupdate Level');
        // dd($level);
        return view('setting.levels.edit')->with(compact('level', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(LevelRequest $request, Level $level)
    {
        // dd($request->all());
        $level->update($request->validated());
        Alert::success('Yay :D', 'Berhasil mengupdate Level');
        return redirect(route('admin.setting.level.edit', ['level' => $level]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        Alert::success('Yay :D', 'Berhasil menghapus Level');
        return redirect(route('admin.setting.level.index'));
    }
}
