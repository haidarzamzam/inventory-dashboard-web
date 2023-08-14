<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Nomor Seri
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="pt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-400 border border-red-500 p-3 sm:rounded-lg">
                    <span class="text-white">Tambah nomor seri gagal, pastikan data sesuai!</span>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 px-48 text-gray-900">
                    <form action="{{ route('serial.store', $product_id) }}" method="post">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product_id }}">

                        <div class="mb-4">
                            <label for="serial_no">
                                Nomor Seri
                                <span class="text-xs text-gray-400">(6 digit)</span>
                            </label>
                            <input type="number" name="serial_no" id="serial_no" placeholder="Masukkan nomor seri"
                                class="form-input block w-full rounded mt-1 @error('serial_no') border border-red-500 @enderror"
                                value="{{ old('serial_no') }}" required>
                            
                            @error('serial_no')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="price">Harga</label>
                            <input type="number" name="price" id="price" placeholder="Masukkan harga"
                                class="form-input block w-full rounded mt-1 @error('price') border border-red-500 @enderror"
                                value="{{ old('price') }}" required>
                            
                            @error('price')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="prod_date">Tanggal Produksi</label>
                            <input type="date" name="prod_date" id="prod_date" placeholder="Masukkan nama merek"
                                class="form-input block w-full rounded mt-1 @error('prod_date') border border-red-500 @enderror"
                                value="{{ old('prod_date') }}" required>

                            @error('prod_date')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="warranty_start">Tanggal Mulai Garansi</label>
                            <input type="date" name="warranty_start" id="warranty_start" placeholder="Masukkan nomor model"
                                class="form-input block w-full rounded mt-1 @error('warranty_start') border border-red-500 @enderror"
                                value="{{ old('warranty_start') }}" required>

                            @error('warranty_start')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="warranty_duration">Durasi Garansi</label>
                            <input type="number" name="warranty_duration" id="warranty_duration" placeholder="Masukkan nomor model"
                            class="form-input block w-full rounded mt-1 @error('warranty_duration') border border-red-500 @enderror"
                                value="{{ old('warranty_duration') }}" required>

                            @error('warranty_duration')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="mt-8 flex gap-3">
                            <button type="submit" class="text-sm py-3 px-5 bg-blue-500 text-white rounded font-semibold">
                                Tambah
                            </button>
                            <a href="{{ route('serial.index', $product_id) }}"
                                class="text-sm py-3 px-7 bg-slate-400 text-white rounded font-semibold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
