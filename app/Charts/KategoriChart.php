<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class KategoriChart extends BaseChart
{
    function get_labels()
    {
        $labels = [];
        $query = Kategori::get();
        foreach ($query as $q):
            array_push($labels, $q->nama_kategori);
        endforeach;

        return $labels;
    }

    function get_data()
    {
        $kategori = [];
        $data = DB::table('master_barang')
                ->selectRaw('count(*) as total')
                ->groupBy('kategori_id')
                ->get();
        
        foreach ($data as $k):
            array_push($kategori, $k->total);
        endforeach;
                  
        return $kategori;
    }
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {   
        return Chartisan::build()
            ->labels($this->get_labels())
            ->dataset('Pie', $this->get_data());
    }
}