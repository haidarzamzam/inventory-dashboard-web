<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart.index');
    }

    public function getLastOneMonthTransaction(string $type)
    {
        return Transaction::getLastOneMonth($type);
    }

    public function getDailyProfit()
    {
        $transaction = Transaction::getDailyTotal();

        $sell = array_filter($transaction, function($val) {
            return $val->trans_type == 'sell';
        }, ARRAY_FILTER_USE_BOTH);
        $buy = array_filter($transaction, function($val) {
            return $val->trans_type == 'buy';
        }, ARRAY_FILTER_USE_BOTH);
        
        $buy_by_date = [];

        foreach ($buy as $item) {
            $buy_by_date[$item->trans_date] = $item->total;
        }

        $profit = [];

        foreach ($sell as $item) {
            $total = $item->total - ($buy_by_date[$item->trans_date] ?? 0);
            $profit[$item->trans_date] = $total;
        }

        return $profit;
    }
}
