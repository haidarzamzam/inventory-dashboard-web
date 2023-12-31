<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Transaksi #{{ $trans_no }}
            </h2>
            @if (auth()->user()->hasPermissionTo('crud transaction'))
                <a href="{{ route('detail.create', $transaction_id) }}">
                    <button type="button" class="text-sm p-3 bg-blue-500 text-white rounded font-semibold">
                        Tambah Transaksi
                    </button>
                </a>
            @endif
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
                                <th>Barang</th>
                                <th>Nomor Seri</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                @if (auth()->user()->hasPermissionTo('crud transaction'))
                                    <th>Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $detail)
                                <tr>
                                    <td>{{ $detail->product_name }}</td>
                                    <td>{{ $detail->serial_no }}</td>
                                    <td>
                                        Rp{{ number_format($detail->price, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        Rp{{ number_format($detail->discount, 0, ',', '.') }}
                                    </td>
                                    @if (auth()->user()->hasPermissionTo('crud transaction'))
                                        <td>
                                            <a href="{{ route('detail.edit', ['transaction_id' => $transaction_id, 'detail' => $detail->id]) }}"
                                                class="pr-2 text-green-500 font-semibold">
                                                Edit
                                            </a>
                                            <form action="{{ route('detail.destroy', ['transaction_id' => $transaction_id, 'detail' => $detail->id]) }}"
                                                method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-bold text-red-500">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
