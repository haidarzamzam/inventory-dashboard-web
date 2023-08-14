<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

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
}
