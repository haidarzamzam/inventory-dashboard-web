<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Barang
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="pt-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red-400 border border-red-500 p-3 sm:rounded-lg">
                    <span class="text-white">Tambah produk gagal, pastikan data sesuai!</span>
                </div>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-12 px-48 text-gray-900">
                    <form action="{{ route('product.store') }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="product_name" id="name" placeholder="Masukkan nama produk"
                                value="{{ old('product_name') }}" required
                                class="form-input block w-full rounded mt-1 @error('product_name') border border-red-500 @enderror">
                            
                            @error('product_name')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="brand">Merek</label>
                            <input type="text" name="brand" id="brand" placeholder="Masukkan nama merek"
                                value="{{ old('brand') }}" required
                                class="form-input block w-full rounded mt-1 @error('brand') border border-red-500 @enderror">

                            @error('brand')
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
                            <label for="model_no">Nomor Model</label>
                            <input type="number" name="model_no" id="model_no" placeholder="Masukkan nomor model"
                                value="{{ old('model_no') }}" required
                                class="form-input block w-full rounded mt-1 @error('model_no') border border-red-500 @enderror">

                            @error('model_no')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="mt-8 flex gap-3">
                            <button type="submit" class="text-sm py-3 px-5 bg-blue-500 text-white rounded font-semibold">
                                Tambah
                            </button>
                            <a href="{{ route('product.index') }}" class="text-sm py-3 px-7 bg-slate-400 text-white rounded font-semibold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
