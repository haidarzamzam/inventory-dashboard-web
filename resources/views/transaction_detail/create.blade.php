<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Transaksi
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="pt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-400 border border-red-500 p-3 sm:rounded-lg">
                    <span class="text-white">Tambah transaksi gagal, pastikan data sesuai!</span>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 px-48 text-gray-900">
                    <form action="{{ route('detail.store', $transaction_id) }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label for="product_id">Barang</label>
                            <select name="product_id" id="product_id" class="form-select px-3 rounded block w-full mt-1">
                                <option value="">-- Pilih barang --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('product_id')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="serial_no">Nomor seri</label>
                            <select name="serial_no" id="serial_no" class="form-select px-3 rounded block w-full mt-1" disabled>
                                <option value="">-- Pilih nomor seri --</option>
                            </select>

                            @error('serial_no')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price">Harga</label>
                            <input type="number" name="price" id="price" placeholder="Masukkan harga"
                                value="{{ old('price') }}" required
                                class="form-input block w-full rounded mt-1 @error('price') border border-red-500 @enderror">
                            
                            @error('price')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="discount">Diskon</label>
                            <input type="number" name="discount" id="discount" placeholder="Masukkan harga"
                                value="{{ old('discount') }}" required
                                class="form-input block w-full rounded mt-1 @error('discount') border border-red-500 @enderror">
                            
                            @error('discount')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-8 flex gap-3">
                            <button type="submit" class="text-sm py-3 px-5 bg-blue-500 text-white rounded font-semibold">
                                Tambah
                            </button>
                            <a href="{{ route('detail.index', $transaction_id) }}" class="text-sm py-3 px-7 bg-slate-400 text-white rounded font-semibold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="{{ asset('js/code.jquery.com_jquery-3.7.0.min.js') }}"></script>
<script>
    const prdId = "{{ old('product_id') }}";

    if (prdId) {
        getSerialNumber(prdId);
    }

    $('#product_id').on('change', function(elmt) {
        const productId = elmt.target.value;
        getSerialNumber(productId);        
    });

    function getSerialNumber(productId) {
        $.ajax(`/api/serial/${productId}`)
            .then(serial => {
                $('#serial_no :not(:first-child)').remove();

                let serialOption = '';

                serial.forEach(item => {
                    serialOption += `<option value="${item}">${item}</option>`;
                });

                $('#serial_no').append(serialOption);
                $('#serial_no').removeAttr('disabled');
            })
            .catch(err => console.error(err));
    }
</script>
