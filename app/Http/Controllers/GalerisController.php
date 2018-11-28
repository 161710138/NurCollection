<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeris;
use File;
use Alert;
class GalerisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris =Galeris::all();
        return view('galeri.index',compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galeris = Galeris::all();
        return view('galeri.create',compact('galeris'));
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
            'gambar' => '',
            'slug' => '',
           
        ]);

        $galeris = new Galeris;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/galeri/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $galeris->gambar = $filename;
        }    
            $galeris->slug =str_slug($request->nama_barang,'-');
            $galeris->save();
        return redirect()->route('galeri.index');
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
        $galeris = Galeris::findOrFail($id);
        return view('galeri.edit',compact('galeris'));
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
             'slug' => '',
            
        ]);

        $galeris = galeris::findOrFail($id);
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/galeri/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

        if ($galeris->gambar) {
        $old_gambar = $galeris->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/galeri'
        . DIRECTORY_SEPARATOR . $galeris->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $galeris->gambar = $filename;
        }
            $galeris->slug =str_slug($request->nama_barang,'-');
            $galeris->save();
        return redirect()->route('galeri.index');
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
        
        $galeris = Galeris::findOrFail($id);
        $galeris->delete();
        return redirect()->route('galeri.index');
    }
}