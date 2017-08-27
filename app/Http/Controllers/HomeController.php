<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;
use App\Penjualan;

class HomeController extends Controller
{
    public function index(){
    	$data = Barang::get();
    	return view('home')
    	->with('data',$data);
    }

    public function store() {

       //dd(request()->all());

        //var_dump($idvalue);
        $item_length = count(request()->harga);
        for($i=0;$i<$item_length;$i++){
        	$data = Penjualan::create([
        	'notrans' => "1122",
        	'kdbarang' => request()->kdbarang[$i],
        	'namabrg' =>request()->namabrg[$i],
        	'kuantitas' =>request()->qty[$i],
        	'harga' => request()->jumlah[$i],
        	'profit' =>request()->profit[$i],
        	]);
    	}

  //     	$penjualan = new Transaksi();
		// $penjualan->notrans = "1112";
		// $penjualan->total = "1112";
		// $penjualan->profit ="12212"; 

		// $penjualan->save();
	
			// $data = Transaksi::create([
   //          'notrans' => "1021",
   //          'total' => "1000",
   //          'profit' => "1000",
   //      ]);

        // $data2 = Penjualan::create([
        // 	'notrans' => request()->notrans,
        // 	'kdbarang' => request()->kdbarang,
        // 	'namabrg' =>request()->namabrg,
        // 	'jumlah' =>request()->jumlah,
        // 	'harga' =>request()->harga,
        // 	'profit' =>request()->profit,
        // 	]);
       // return redirect()->route('home');
    }
}
