<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = "detail_penjualan";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'master_barang_id',
        'penjualan_id',
        'jumlah',
        'harga_total'
    ];

    public function master_barang()
    {
        return $this->belongsTo('App\Models\MasterBarang');
    }

    public function penjualan()
    {
        return $this->belongsTo('App\Models\Penjualan');
    }
}
