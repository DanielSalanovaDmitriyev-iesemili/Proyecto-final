<?php

namespace App\Http\Controllers;


use App\Models\Plataform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlataformController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        return view('layouts.plataforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $plataform = new Plataform ($this->validatePlataform());
        $plataform->save();
        return redirect()->route('plataforms.admin.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function show(Plataform $plataform)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function edit(Plataform $plataform)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        return view('layouts.plataforms.edit', compact('plataform'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plataform $plataform)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $plataform->update($this->validatePlataform());
        return redirect()->route("plataforms.admin.list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plataform  $plataform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plataform $plataform)
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $plataform->delete();
        return redirect()->route('plataforms.admin.list');
    }

    public function plataformList ()
    {
        if(Auth::user()->rol_id != 1) {
            return redirect()->route('games.index');
        }
        $plataforms = Plataform::paginate(20);
        return view('layouts.plataforms.list', compact('plataforms'));
    }
    public function validatePlataform()
    {
        return request()->validate([
            'name' => 'required|max:25',
        ]);
    }
}
