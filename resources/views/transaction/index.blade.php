<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transaksi
            </h2>

            @if (auth()->user()->hasPermissionTo('crud transaction'))
            <a href="{{ route('transaction.create') }}">
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
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                                <th>Tipe</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->trans_no }}</td>
                                    <td>
                                        {{ date_format(date_create($transaction->trans_date), 'd M Y') }}
                                    </td>
                                    <td>{{ $transaction->customer }}</td>
                                    <td>
                                        {{ $transaction->trans_type == 'sell' ? 'penjualan' : 'pembelian' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('detail.index', $transaction->id) }}" class="pr-2 font-semibold text-gray-400">
                                            Detail
                                        </a>
                                        
                                        @if (auth()->user()->hasPermissionTo('crud transaction'))
                                            <a href="{{ route('transaction.edit', $transaction->id) }}" class="pr-2 text-green-500 font-semibold">
                                                Edit
                                            </a>
                                            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-bold text-red-500">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
