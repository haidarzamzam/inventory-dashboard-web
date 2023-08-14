<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Transaksi
            </h2>
            <a href="{{ route('detail.create', $transaction_id) }}">
                <button type="button" class="text-sm p-3 bg-blue-500 text-white rounded font-semibold">
                    Tambah Transaksi
                </button>
            </a>
        </div>
    </x-slot>

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
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full border-separate border-spacing-y-4">
                        <thead>
                            <tr class="text-left">
                                <th>ID Transaksi</th>
                                <th>Barang</th>
                                <th>Nomor Seri</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->trans_no }}</td>
                                    <td>{{ $transaction->product_name }}</td>
                                    <td>{{ $transaction->serial_no }}</td>
                                    <td>
                                        Rp{{ number_format($transaction->price, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        Rp{{ number_format($transaction->discount, 0, ',', '.') }}
                                    </td>
                                    <td>Edit Hapus</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
