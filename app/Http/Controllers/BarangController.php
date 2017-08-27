<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
	public function index(){
    	$data = Barang::get();
    	return view('barang')
    	->with('data',$data);
    }

    public function create()
    {
        return view('inputbarang');
    }

    public function store() {
        // dd(request()->all());
        $data = Barang::create([
            'kdbarang' => request()->kdbarang,
            'namabrg' => request()->namabrg,
            'harga' => request()->harga,
            'hargabeli' => request()->hargabeli,
            'jumlah' => request()->jumlah,
        ]);

        return redirect()->route('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();

         return redirect()->route('barang');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::findOrFail($id);
        return view('barangedit')
        ->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'kdbarang' => 'required',
            'namabrg' => 'required',
            'harga' => 'required',
            'hargabeli' => 'required',
            'jumlah' => 'required',
            ]);
        $data = Barang::findOrFail($request->id)
            ->update([
                'kdbarang' => $request->kdbarang,
                'namabrg' => $request->namabrg,
                'harga' => $request->harga,
                'hargabeli' => $request->hargabeli,
                'jumlah' => $request->jumlah,
                ]);

             return redirect()->route('barang');
    }
}
