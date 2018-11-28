<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategoris;
use App\Barangs;
use Alert;
class KategorisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategoris::all();
        return view('kategori.index',compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('kategori.create');
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
            'nama_kategori' => 'required',
            'slug' => '',
           
        ]);

        $kategoris = new Kategoris;
        $kategoris->nama_kategori = $request->nama_kategori;
        $kategoris->slug =str_slug($request->nama_kategori,'-');
        $kategoris->save();
        return redirect()->route('kategori.index');
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
        $kategoris = Kategoris::findOrFail($id);
        return view('kategori.edit',compact('kategoris'));
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
             'nama_kategori' => 'required',
             'slug' => '',

        ]);

        $kategoris = Kategoris::findOrFail($id);
        $kategoris->nama_kategori = $request->nama_kategori;
        $kategoris->slug =str_slug($request->nama_kategori,'-');
        $kategoris->save();
        return redirect()->route('kategori.index');
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

        $kategoris = Kategoris::findOrFail($id);
        $kategoris->delete();
        return redirect()->route('kategori.index');
    }
}