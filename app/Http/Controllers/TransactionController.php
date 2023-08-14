<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('transaction.index', [
            'transactions' => Transaction::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->validated();
        $data['trans_date'] = date('Y-m-d');

        Transaction::create($data);

        return redirect()->route('transaction.index')
            ->with('success', 'Transaksi ' . $data['trans_no'] . ' berhasil ditambahkan!');
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
        $transaction = Transaction::find($id);

        return view('transaction.edit', [
            'id' => $id,
            'transaction' => $transaction
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, string $id)
    {
        $transaction = Transaction::find($id);
        $data = $request->validated();
        $trans_no = $transaction->trans_no;

        $transaction->update($data);

        return redirect()->back()->with('success', "Transaksi #$trans_no berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);
        $trans_no = $transaction->trans_no;
        $transaction->delete();

        return redirect()->back()->with('success', "Transaksi #$trans_no berhasil dihapus!");
    }
}
