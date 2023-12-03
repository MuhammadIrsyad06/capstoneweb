<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        $sekolah = Profile::first();
        $profile = Profile::orderByRaw('created_at DESC')->paginate(1);
        return view('profile.index', compact('profile', 'sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Profile::first();
        return view('profile.create', compact('sekolah'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile();
        $profile->nama   = $request->input('nama');
        $profile->jumlah_rombel   = $request->input('jumlah_rombel');
        $profile->jumlah_siswa   = $request->input('jumlah_siswa');
        $profile->jumlah_guru   = $request->input('jumlah_guru');
        $profile->jumlah_tendik   = $request->input('jumlah_tendik');
        $profile->deskripsi   = $request->input('deskripsi');
        $filegambar                  = $request->file('gambar');
        $filegambarName   = 'GP-' . $filegambar->getClientOriginalName();
        $filegambar->move('gambar_profile/', $filegambarName);
        $profile->gambar  = $filegambarName;
        $filelogo                  = $request->file('logo');
        $filelogoName   = 'LP-' . $filelogo->getClientOriginalName();
        $filelogo->move('logo_madrasah/', $filelogoName);
        $profile->logo  = $filelogoName;
        $profile->save();
        return redirect()->route('profile.index')->with("success", "Data berhasil disimpan");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = Profile::first();
        $profile = Profile::find($id);
        return view('profile.edit', compact('profile','sekolah'));
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
        $profile = Profile::findorfail($id);
        $profile->update($request->all());

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('gambar_profile/', 'GP-' . $request->file('gambar')->getClientOriginalName());
            $profile->gambar = 'GP-' . $request->file('gambar')->getClientOriginalName();
            $profile->save();
        }
        if ($request->hasFile('logo')) {
            $request->file('logo')->move('logo_madrasah/', 'LP-' . $request->file('logo')->getClientOriginalName());
            $profile->logo = 'LP-' . $request->file('logo')->getClientOriginalName();
            $profile->save();
        }
        return redirect('profile')->with('success', 'Edit data sukses');
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
    }
}
