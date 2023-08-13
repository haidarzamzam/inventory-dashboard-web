<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Master Barang
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table-auto w-full border-separate border-spacing-y-4">
                        <thead>
                            <tr class="text-left">
                                <th>Nama Barang</th>
                                <th>Brand</th>
                                <th>Harga</th>
                                <th>Model</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>
                                        Rp{{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td>{{ $product->model_no }}</td>
                                    <td>
                                        Edit
                                        Delete
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
