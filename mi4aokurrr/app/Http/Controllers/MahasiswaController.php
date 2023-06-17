<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index') -> with('mahasiswas', $mahasiswas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::all();
        return view('mahasiswa.create') -> with ('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validasi = $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|file|image',
            'prodi_id' => 'required'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $validasi['npm'];
        $mahasiswa->nama = $validasi['nama'];
        $mahasiswa->tanggal = $validasi['tanggal'];
        $mahasiswa->prodi_id = $validasi['prodi_id'];

        // upload foto

        $ext = $request -> foto -> getClientOriginalExtension();
        $new_filename = $validasi['npm'] . '.' . $ext;
        $request -> foto -> storeAs('public', $new_filename);

        $mahasiswa -> foto = $new_filename;
        $mahasiswa -> save();
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/images', $fileName);
        
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->npm = $request->input('npm');
        // $mahasiswa->nama = $request->input('nama');
        // $mahasiswa->tanggal = $request->input('tanggal');
        // if($request->hasfile('foto'))
        // {
        //     $file = $request->file('foto');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('public/images/', $filename);
        //     $mahasiswa->foto = $filename;
        // }
        // $mahasiswa->prodi_id = $request-> input('prodi_id');
        // $mahasiswa->save();
        
        return redirect() -> route ('mahasiswa.index') -> with('success', 'Data berhasil disimpan' . $validasi['nama']);  
        
        
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
        $prodi = Prodi::orderBy('nama_prodi', 'ASC') -> get();
        return view('mahasiswa.edit')
        ->with('mahasiswa', $mahasiswa)
        ->with('prodi', $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $validasi = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|file|image',
            'prodi_id' => 'required'
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->npm = $validasi['npm'];
        $mahasiswa->nama = $validasi['nama'];
        $mahasiswa->tanggal = $validasi['tanggal'];
        $mahasiswa->prodi_id = $validasi['prodi_id'];

        // upload foto

        $ext = $request -> foto -> getClientOriginalExtension();
        $new_filename = $validasi['npm'] . '.' . $ext;
        $request -> foto -> storeAs('public', $new_filename);

        $validasi['foto']=$new_filename;

        Mahasiswa::where('id',$mahasiswa->id)->update($validasi);
        
        return redirect()
         -> route ('mahasiswa.index') -> with('success', 'Data berhasil disimpan' . $validasi['nama']);  

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
        $mahasiswa->delete();
        return back();
    }
}