<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Grafik
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-l text-gray-800">
                        Penjualan 1 bulan terakhir
                    </h3>

                    <div>
                        <canvas id="sellChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-l text-gray-800">
                        Pembelian 1 bulan terakhir
                    </h3>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-l text-gray-800">
                        Profit harian
                    </h3>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const BASE_URL = '/api/chart/transaction';

    $.ajax(`${BASE_URL}/sell`)
        .then((transaction = []) => {
            let labels = [];
            let data = [];

            transaction.map(({ trans_date, trx }) => {
                labels.push(trans_date);
                data.push(trx);
            });

            const ctx = document.getElementById('sellChart');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [{
                        label: 'Penjualan',
                        data,
                        borderWidth: 2,
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        })
        .catch(err => console.error(err));
</script>
