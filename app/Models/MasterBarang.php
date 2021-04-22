<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = "master_barang";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_jual',
        'harga_beli',
        'stok',
        'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function detail_penjualan()
    {
        return $this->hasMany('App\Models\DetailPenjualan');
    }
}
