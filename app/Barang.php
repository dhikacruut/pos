<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
     protected $table = 'barang';
         /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'kdbarang','namabrg','harga','hargabeli','jumlah'
    ];

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
