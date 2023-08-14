<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerialNumberRequest;
use App\Models\Product;
use App\Models\SerialNumber;
use Illuminate\Http\Request;

class SerialNumberConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $product_id)
    {
        $product = Product::find($product_id);
        $serial = SerialNumber::select('id', 'serial_no', 'price', 'prod_date', 'warranty_start', 'warranty_duration', 'used_table')
            ->where('product_id', $product_id)
            ->paginate(10);

        return view('serial.index', [
            'product' => $product,
            'serial_numbers' => $serial,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $product = Product::find($id);

        return view('serial.create', [
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SerialNumberRequest $request)
    {
        $data = $request->validated();
        $data['used_table'] = 0;

        SerialNumber::create($data);

        return redirect()->route('serial.index', $data['product_id'])
            ->with('success', 'Nomor seri ' . $data['serial_no'] . ' berhasil ditambahkan!');
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
    public function destroy(string $id, SerialNumber $serial)
    {
        $num = $serial->serial_no;
        $serial->delete();

        return redirect()->back()->with('success', "Nomor serial $num berhasil dihapus!");
    }
}
