<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanChart extends BaseChart
{

    function get_labels()
    {
        $labels = [];
        $i = 0;
        for ($i; $i < 3; $i++){
            $date = date('d-m-Y', strtotime("-".$i." day", strtotime(date('d-m-Y'))));
            
            array_push($labels, $date);
        }

        return $labels;
    }

    function get_data()
    {
        $sales = [];
        $i = 0;
        for ($i; $i < 3; $i++){
            $date = date('Y-m-d', strtotime("-".$i." day", strtotime(date('Y-m-d'))));
            $sale = DB::table('penjualan')
                ->selectRaw('count(*) as total')
                ->where('tanggal_penjualan', '=', $date)
                ->get();

            array_push($sales, $sale[0]->total);
        }

        return $sales;
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
            ->dataset('Penjualan', $this->get_data());
    }
}