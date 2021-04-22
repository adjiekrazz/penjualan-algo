<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = "konsumen";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_konsumen',
        'alamat',
    ];

    public function penjualan()
    {
        return $this->hasMany('App\Models\Penjualan');
    }
}
