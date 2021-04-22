<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with(['detail_penjualan', 'konsumen'])->get();
        return view('dashboard', ['penjualan' => $penjualan]);
    }
}
