<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Transaksi
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="pt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-400 border border-red-500 p-3 sm:rounded-lg">
                    <span class="text-white">Edit transaksi gagal, pastikan data sesuai!</span>
                </div>
            </div>
        </div>
    @endif

    @if (session('success'))
        <div class="pt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-400 border border-green-500 p-3 sm:rounded-lg flex justify-between">
                    <span class="text-white">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 px-48 text-gray-900">
                    <form action="{{ route('transaction.update', $id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="trans_no">
                                Nomor Transaksi
                                <span class="text-xs text-gray-400">(4 digit)</span>
                            </label>
                            <input type="number" name="trans_no" id="trans_no" placeholder="Masukkan nomor transaksi"
                                class="form-input block w-full rounded mt-1 @error('trans_no') border border-red-500 @enderror"
                                value="{{ old('trans_no', $transaction->trans_no) }}" required>
                            
                            @error('trans_no')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="customer">Pelanggan</label>
                            <input type="text" name="customer" id="customer" placeholder="Masukkan nama pelanggan"
                                class="form-input block w-full rounded mt-1 @error('customer') border border-red-500 @enderror"
                                value="{{ old('customer', $transaction->customer) }}" maxlength="100" required>
                            
                            @error('customer')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="trans_type">Tipe Transaksi</label>
                            <select name="trans_type" id="trans_type" class="form-select px-3 rounded block w-full mt-1">
                                <option value="">-- Pilih Transaksi --</option>
                                <option value="sell" {{ old('trans_type', $transaction->trans_type) == 'sell' ? 'selected' : '' }}>
                                    Penjualan
                                </option>
                                <option value="buy" {{ old('trans_type', $transaction->trans_type) == 'buy' ? 'selected' : '' }}>
                                    Pembelian
                                </option>
                            </select>

                            @error('trans_type')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-8 flex gap-3">
                            <button type="submit" class="text-sm py-3 px-5 bg-blue-500 text-white rounded font-semibold">
                                Edit
                            </button>
                            <a href="{{ route('transaction.index') }}" class="text-sm py-3 px-5 bg-slate-400 text-white rounded font-semibold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
