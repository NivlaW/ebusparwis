<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ebus;
use App\Models\kamar;
use App\Models\jenis;

class ebusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function client(){
        $ebus = ebus::all();
        $jenis = jenis::all();
        return view('dashboard' , compact('ebus','jenis'));
    }
    public function index()
    {
        $ebus = ebus::all();
        $jenis = jenis::all();
        return view('admin.dashboard' , compact('ebus','jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'no' => 'required',
            'jenis' => 'required',
            'bed' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required'
        ]);
        
        $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('image/kamar'), $imageName);
        ebus::create([
            'no' => $request->no,
            'id_jenis' => $request->jenis,
            'bed' => $request->bed,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName,
            'status' => 0
        ]);
        return redirect('/admin/dashboard')->with('status', 'Data Berhasil Ditambahkan');
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
    public function edit(Ebus $ebus)
    {
        return view('/admin/edit', compact('ebus'));
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
        $request->validate([
            'no' => 'required',
            'jenis' => 'required',
            'bed' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $imageName = time(). '_' . $image->getClientOriginalName();
            $image->move(public_path('image/kamar'),$imageName);
        
            $image_path = "image/kamar" . $imageName;
        } else {
            $imageName = $request->gambarLama;
        }
        ebus::where('id', $id)->update([
            'no' => $request->no,
            'id_jenis' => $request->jenis,
            'bed' => $request->bed,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName
        ]);
        return redirect('/admin/dashboard')->with('status', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ebus::destroy($id);
        return redirect('/admin/dashboard')->with('status', 'Data Berhasil Dihapus');
    }
}
