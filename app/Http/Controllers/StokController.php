<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class StokController extends Controller
{
    public function index(){
    	$data = Barang::get();
    	return view('stokbarang')
    	->with('data',$data);
    }
}
