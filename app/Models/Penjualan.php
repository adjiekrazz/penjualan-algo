<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = "penjualan";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanggal_penjualan',
        'konsumen_id',
    ];

    public function konsumen()
    {
        return $this->belongsTo('App\Models\Konsumen');
    }

    public function detail_penjualan()
    {
        return $this->hasMany('App\Models\DetailPenjualan');
    }
}
