<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function getTransactionByType(string $type)
    {
        $data = Transaction::select('trans_no', 'trans_date', 'customer')
            ->where('trans_type', $type)
            ->get();
        
        return ['data' => $data];
    }

    public function getProduct()
    {
        $data = Product::getReport();

        return ['data' => $data];
    }
}
