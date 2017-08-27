<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index(){
    	$data = Transaksi::get();
    	return view('transaksi')
    	->with('data',$data);
    }
    public function penjualan(){
    	$data = Transaksi::get();
    	return view('penjualan')
    	->with('data',$data);
    }
}
