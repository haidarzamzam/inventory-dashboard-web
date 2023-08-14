<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-8">
                        <h3 class="font-semibold text-l text-gray-800">
                            Daftar Transaksi
                        </h3>
                        <select id="filter" class="form-select px-3 rounded mt-1">
                            <option value="sell" selected>Penjualan</option>
                            <option value="buy">Pembelian</option>
                        </select>
                    </div>

                    <table id="transactionTable" class="table-auto w-full border-separate border-spacing-y-4">
                        <thead>
                            <tr class="text-left">
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Pelanggan</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="font-semibold text-l text-gray-800 mb-8">
                    Daftar Barang
                </h3>

                <table id="productTable" class="table-auto w-full border-separate border-spacing-y-4">
                    <thead>
                        <tr class="text-left">
                            <th>Nama Barang</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    const BASE_URL = '/api/report'
    getTransaction('sell');

    $('#filter').on('change', function({ target }) {
        const transactionType = target.value;
        getTransaction(transactionType);
    });

    function getTransaction(transactionType) {
        $('#transactionTable').DataTable({
            ajax: `${BASE_URL}/transaction/${transactionType}`,
            columns: [
                { data: 'trans_no' },
                { data: 'trans_date' },
                { data: 'customer' },
            ],
            columnDefs: [
                {
                    targets: 1,
                    data: 'trans_date',
                    render: function(data) {
                        return new Date(data).toLocaleDateString('id-ID', {
                            day: '2-digit', month: 'short', year: 'numeric'
                        });
                    }
                }
            ],
            destroy: true
        });
    }

    $('#productTable').DataTable({
        ajax: `${BASE_URL}/product`,
        columns: [
            { data: 'product_name' },
            { data: 'stock' },
        ],
    });
</script>
