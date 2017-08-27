<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penjualan';
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'notrans','kdbarang','namabrg','jumlah','harga','profit'
    ];
}
