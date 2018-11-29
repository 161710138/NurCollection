<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeris;
use App\Barangs;
use App\Artikels;

class FrontendController extends Controller
{
    

    public function front()
    {
        $front = Galeris::all();
        $barangs = Barangs::all();
    	return view('layouts.front', compact('front','barangs'));
    }
    
    public function blog()
    {
    	$blog = Artikels::all();
    	return view('frontend.blog', compact('blog'));
    }
    
    public function singleblog()
    {
    	$singleblog = Artikels::all();
    	return view('frontend.singleblog', compact('singleblog'));
    }

    public function shop()
    {
    	$shop = Barangs::all();
    	return view('frontend.shop', compact('shop'));
    }

    public function about ()
    {
        $about = Galeris::all();
        return view('frontend.about', compact('about'));
    }

    
    public function detailproduk ()
    {
        $detailproduk = Barangs::all();
        return view('frontend.detailproduk', compact('detailproduk'));
    }
    
     
    public function kontak ()
    {
        $kontak = Barangs::all();
        return view('frontend.kontak', compact('kontak'));
    }
    
    
    
    
}