<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategoris;
use App\Barangs;
use File;
use Alert;
class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs =Barangs::all();
        return view('barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangs = Barangs::all();
        $kategoris = Kategoris::all();
        return view('barang.create',compact('barangs', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Alert::success('Data Successfully Saved','Good Job!')->autoclose(1700);

        $this->validate($request,[
            'gambar' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required|min:2',
            'harga' => 'required',
            'id_kategoris' => 'required',
            'slug' => '',

           
        ]);

        $barangs = new Barangs;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/barang/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $barangs->gambar = $filename;
        }   
            $barangs->nama_barang = $request->nama_barang;   
            $barangs->deskripsi = $request->deskripsi;
            $barangs->harga = $request->harga;
            $barangs->slug =str_slug($request->nama_barang,'-');
            $barangs->id_kategoris = $request->id_kategoris;
            $barangs->save();
        return redirect()->route('barang.index');
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
        $barangs = Barangs::findOrFail($id);
        $kategoris = Kategoris::all();
        $selectedkategori = Barangs::findOrFail($barangs->id)->id_kategoris;
        return view('barang.edit',compact('barangs','kategoris','selectedkategori'));
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
            Alert::success('Data Successfully Changed','Good Job!')->autoclose(1700);

        $this->validate($request,[
             'gambar' => '',
             'nama_barang' => 'required',
             'deskripsi' => 'required',
             'harga' => 'required',
             'id_kategoris' => 'required',
             'slug' => '',

        ]);

        $barangs = Barangs::findOrFail($id);
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/barang/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

        if ($barangs->gambar) {
        $old_gambar = $barangs->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/barang'
        . DIRECTORY_SEPARATOR . $barangs->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $barangs->gambar = $filename;
        }
            $barangs->nama_barang = $request->nama_barang;
            $barangs->deskripsi = $request->deskripsi;
            $barangs->harga = $request->harga;
            $barangs->slug =str_slug($request->nama_barang,'-');
            $barangs->id_kategoris = $request->id_kategoris;
            $barangs->save();
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            Alert::success('Data Successfully Deleted','Good Job!')->autoclose(1700);
        
        $barangs = Barangs::findOrFail($id);
        $barangs->delete();
        return redirect()->route('barang.index');
    }
}