<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">
                <span class="text-gray-400">Master Barang ></span> 
                <span class="text-gray-800">{{ $product->product_name }}</span>
            </h2>
            <a href="{{ route('serial.create', $product->id) }}">
                <button type="button" class="text-sm p-3 bg-blue-500 text-white rounded font-semibold">
                    Tambah Nomor Seri
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
                                <th>Nomor Seri</th>
                                <th>Harga</th>
                                <th>Tgl Produksi</th>
                                <th>Tgl Garansi</th>
                                <th>Durasi Garansi</th>
                                <th>Used</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serial_numbers as $serial)
                                <tr>
                                    <td>{{ $serial->serial_no }}</td>
                                    <td>
                                        Rp{{ number_format($serial->price, 0, ',', '.') }}
                                    </td>
                                    <td>
                                        {{ date_format(date_create($serial->prod_date), 'd M Y') }}
                                    </td>
                                    <td>
                                        {{ date_format(date_create($serial->warranty_start), 'd M Y') }}
                                    </td>
                                    <td>{{ $serial->warranty_duration }}</td>
                                    <td>
                                        @if ($serial->used_table)
                                            <img src="{{ asset('icons/check.svg') }}" alt="used">
                                        @else
                                            <img src="{{ asset('icons/x.svg') }}" alt="unused">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('serial.edit', ['product_id' => $product->id, 'serial' => $serial->id]) }}"
                                            class="pr-2 text-green-500 font-semibold">
                                            Edit
                                        </a>
                                        <form action="serial/{{ $serial->id }}" method="post" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-bold text-red-500">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
