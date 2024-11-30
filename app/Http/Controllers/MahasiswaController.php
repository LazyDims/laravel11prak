<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Progdi;
use App\Models\Pribadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = DB::table('pribadis')
        ->select('pribadis.id_pribadi', 'pribadis.nama_mahasiswa', 'mahasiswas.id_pri',
        'mahasiswas.id_pro', 'mahasiswas.nim','progdis.nm_fakultas', 'progdis.nm_progdi',
        'mahasiswas.id_mhs')
        ->leftJoin('mahasiswas', 'pribadis.id_pribadi', '=', 'mahasiswas.id_pri')
        ->leftJoin('progdis', 'mahasiswas.id_pro', '=', 'progdis.id_progdi')
        ->orderBy('pribadis.id_pribadi', 'asc')->paginate(10);

        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function daftar($id_pribadi)
    {
        $pribadi = DB::table('pribadis')->where('id_pribadi', $id_pribadi)->get();
        $progdi = Progdi::all();

        return view('mahasiswa/daftar', ['pribadi' => $pribadi], ['progdi' => $progdi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('mahasiswas')->insert([
            'nim' => $request->nim,
            'id_pri' => $request->id_pribadi,
            'id_pro' => $request->id_progdi,
        ]);
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa Baru Berhasil Disimpan');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $pribadi = DB::table('pribadis')
            ->leftJoin('mahasiswas', 'pribadis.id_pribadi', '=', 'mahasiswas.id_pri')
            ->select('pribadis.id_pribadi', 'pribadis.nik', 'pribadis.tempat_lahir', 'pribadis.tanggal_lahir', 'pribadis.nama_mahasiswa', 'mahasiswas.nim')
            ->where('pribadis.nama_mahasiswa', 'like', value: '%' . $keyword . '%')
            ->get();
        return view('mahasiswa.search', compact('pribadi'))->with('i', (request()->input('page', default: 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
