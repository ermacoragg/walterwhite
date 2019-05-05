<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use \Datetime;

class StatisticsController extends Controller
{

    public function index()
    {
        $totalDonation = DB::table('donations')->select(DB::raw('sum(amount) as "sumAmount"'))->get();

        $curMonth = date('m');

        $totalDonationMonth = DB::table('donations')->select(DB::raw('sum(amount) as "sumAmount"'))
            ->whereMonth("created_at", $curMonth)
            ->get();

        $topThree = DB::table('donations')->select(DB::raw('"firstName" , "lastName", sum(amount) as "sumAmount"'))
            ->groupBy('firstName', 'lastName')
            ->orderBy('sumAmount', 'desc')
            ->limit(3)
            ->get();

        $days = DB::select("select generate_series(
           (select date_trunc('month', now()) - interval '1 month'), (now()),
           interval '1 day') as d order by d desc");

        $daysChart = "";
        $valChart = "";

        foreach ($days as $day) {

            $donateByDay = DB::select('select sum(amount) as "sumAmount" from "donations" 
                    where "created_at"::date = \'' . $day->d . '"\'::date');
            
            $date = new DateTime($day->d);

            $daysChart = "'" . $date->format('F j, Y') . "'," . $daysChart;
            $valChart = $donateByDay[0]->sumAmount . ',' . $valChart;
        }

        return view('statistics', [
            'totAmount' => $totalDonation->first()->sumAmount,
            'totAmountMonth' => $totalDonationMonth->first()->sumAmount,
            'topThree' => $topThree,
            'daysChart' => rtrim($daysChart,','),
            'valChart' => rtrim($valChart, ',')
        ]);
    }
}
