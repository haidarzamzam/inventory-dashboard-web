<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionDetailRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $transaction_id)
    {
        $trans_no = Transaction::select('trans_no')->where('id', $transaction_id)->first();
        $transaction = TransactionDetail::getTransaction($transaction_id);

        return view('transaction_detail.index', [
            'transaction_id' => $transaction_id,
            'transactions'   => $transaction,
            'trans_no'       => $trans_no->trans_no ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $transaction_id)
    {
        $product = Product::all();

        return view('transaction_detail.create', [
            'transaction_id' => $transaction_id,
            'products'       => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionDetailRequest $request)
    {
        $data = $request->validated();

        TransactionDetail::create($data);

        return redirect()->route('detail.index', $data['transaction_id'])
            ->with('success', 'Detail transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, TransactionDetail $detail)
    {
        $detail->delete();

        return redirect()->back()->with('success', "Transaksi berhasil dihapus!");
    }
}
