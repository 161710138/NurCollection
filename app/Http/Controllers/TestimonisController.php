<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonis;
use File;
use Alert;
class TestimonisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonis = Testimonis::all();
        return view('testimoni.index',compact('testimonis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $testimonis = Testimonis::all();
        return view('testimoni.create',compact('testimonis'));
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
            'nama' => 'required',
            'gambar' => '',
            'testimoni' => 'required',
            'slug' => '',
           
        ]);

        $testimonis = new Testimonis;
        $testimonis->nama = $request->nama;
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/testimoni/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $testimonis->gambar = $filename;
        }    
            $testimonis->testimoni = $request->testimoni;
            $testimonis->slug =str_slug($request->nama,'-');
            $testimonis->save();
        return redirect()->route('testimoni.index');
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
        $testimonis = Testimonis::findOrFail($id);
        return view('testimoni.edit',compact('testimonis'));
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
             'nama' => 'required',
             'gambar' => '',
             'testimoni' => 'required',
             'slug' => '',
            
        ]);

        $testimonis = Testimonis::findOrFail($id);
        $testimonis->nama = $request->nama;            
        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $destinationPath = public_path(). '/assets/img/testimoni/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

        if ($testimonis->gambar) {
        $old_gambar = $testimonis->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/testimoni'
        . DIRECTORY_SEPARATOR . $testimonis->gambar;
            try {
            File::delete($filepath);
            } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
            }
        }
        $testimonis->gambar = $filename;
        }
            $testimonis->testimoni = $request->testimoni;
            $testimonis->slug =str_slug($request->nama,'-');
            $testimonis->save();
        return redirect()->route('testimoni.index');
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

        $testimonis = Testimonis::findOrFail($id);
        $testimonis->delete();
        return redirect()->route('testimoni.index');
    }
}