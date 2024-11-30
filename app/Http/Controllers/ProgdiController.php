<?php

namespace App\Http\Controllers;

use App\Models\Progdi;
use Illuminate\Http\Request;

class ProgdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progdi = Progdi::orderBy('id_progdi', 'asc')->paginate(5);
        return view('progdi.index', compact('progdi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('progdi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi' => 'required',
        ]);
        Progdi::create($request->post());
        return redirect()->route('progdi.index')->with(
            'success',
            'Data Program Studi Berhasil
            disimpan.',
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Progdi $progdi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Progdi $progdi)
    {
        return view('progdi.edit', compact('progdi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Progdi $progdi)
    {
        $request->validate([
            'nm_fakultas' => 'required',
            'nm_progdi' => 'required',
        ]);
        $progdi->fill($request->post())->save();
        return redirect()->route('progdi.index')->with(
            'success',
            'Data Program Studi berhasil di
            updated',
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Progdi $progdi)
    {
        $progdi->delete();
        return redirect()->route('progdi.index')->with(
            'success',
            'Data Program Studi berhasil di deleted',
        );
    }
}
