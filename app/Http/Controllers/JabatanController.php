<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jab = Jabatan::all();
        return view('jabatan.index', ['jab' => $jab]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:jabatans'],

        ]);

        $jab = new Jabatan();
        $jab->name = $request->name;

        $jab->save();

        return redirect()->route('jabatan.index')
            ->with('success', 'Data berhasil dihapus!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $jab = Jabatan::findOrFail($id);
        return view('jabatan.show', compact('jab'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jab = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jab'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',

        ]);

        $jab = Jabatan::findOrFail($id);
        $jab->name = $request->name;

        $jab->save();

        return redirect()->route('jabatan.index')
            ->with('success', 'Data berhasil diedit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jab = Jabatan::findOrFail($id);
        $jab->delete();
        return redirect()->route('jabatan.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}
