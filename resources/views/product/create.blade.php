<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">

            <div style="background-color: #1a1f2e; border: 1px solid #2d3343; border-radius: 12px; padding: 28px 32px;">

                {{-- Header with back arrow --}}
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 4px;">
                    <a href="{{ route('product') }}" style="color: #9ca3af; text-decoration: none; display: flex;">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <span style="color: #ffffff; font-size: 18px; font-weight: 700; font-style: italic;">Add Product</span>
                </div>
                <p style="color: #9ca3af; font-size: 13px; margin-bottom: 24px; padding-left: 30px;">Fill in the details to add a new product</p>

                <form method="POST" action="/product">
                    @csrf

                    {{-- Nama Produk --}}
                    <div style="margin-bottom: 20px;">
                        <label for="nama_produk" style="display: block; font-size: 13px; font-weight: 500; color: #d1d5db; margin-bottom: 8px;">Nama Produk</label>
                        <input 
                            type="text" 
                            name="nama_produk" 
                            id="nama_produk"
                            value="{{ old('nama_produk') }}"
                            placeholder="e.g. Wireless Headphones"
                            style="width: 100%; background-color: #252b3b !important; color: #ffffff !important; border: 1px solid #363d4e !important; border-radius: 8px; padding: 10px 14px; font-size: 14px; outline: none; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#524be0'; this.style.boxShadow='0 0 0 2px rgba(82,75,224,0.3)'"
                            onblur="this.style.borderColor='#363d4e'; this.style.boxShadow='none'"
                        >
                        @error('nama_produk')
                            <p style="color: #f87171; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kategori --}}
                    <div style="margin-bottom: 20px;">
                        <label for="kategori_id" style="display: block; font-size: 13px; font-weight: 500; color: #d1d5db; margin-bottom: 8px;">Kategori</label>
                        <select 
                            name="kategori_id" 
                            id="kategori_id"
                            style="width: 100%; background-color: #252b3b !important; color: #ffffff !important; border: 1px solid #363d4e !important; border-radius: 8px; padding: 10px 14px; font-size: 14px; outline: none; box-sizing: border-box; appearance: auto; -webkit-appearance: auto;"
                            onfocus="this.style.borderColor='#524be0'; this.style.boxShadow='0 0 0 2px rgba(82,75,224,0.3)'"
                            onblur="this.style.borderColor='#363d4e'; this.style.boxShadow='none'"
                        >
                            <option value="" style="background-color: #252b3b; color: #9ca3af;">-- Pilih Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" style="background-color: #252b3b; color: #ffffff;" {{ old('kategori_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <p style="color: #f87171; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Quantity & Price side by side --}}
                    <div style="display: flex; gap: 16px; margin-bottom: 28px;">
                        <div style="flex: 1;">
                            <label for="stok" style="display: block; font-size: 13px; font-weight: 500; color: #d1d5db; margin-bottom: 8px;">Quantity</label>
                            <input 
                                type="number" 
                                name="stok" 
                                id="stok"
                                value="{{ old('stok', 0) }}"
                                placeholder="0"
                                style="width: 100%; background-color: #252b3b !important; color: #ffffff !important; border: 1px solid #363d4e !important; border-radius: 8px; padding: 10px 14px; font-size: 14px; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#524be0'; this.style.boxShadow='0 0 0 2px rgba(82,75,224,0.3)'"
                                onblur="this.style.borderColor='#363d4e'; this.style.boxShadow='none'"
                            >
                            @error('stok')
                                <p style="color: #f87171; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div style="flex: 1;">
                            <label for="harga" style="display: block; font-size: 13px; font-weight: 500; color: #d1d5db; margin-bottom: 8px;">Price (Rp)</label>
                            <input 
                                type="number" 
                                name="harga" 
                                id="harga"
                                value="{{ old('harga', 0) }}"
                                placeholder="0"
                                style="width: 100%; background-color: #252b3b !important; color: #ffffff !important; border: 1px solid #363d4e !important; border-radius: 8px; padding: 10px 14px; font-size: 14px; outline: none; box-sizing: border-box;"
                                onfocus="this.style.borderColor='#524be0'; this.style.boxShadow='0 0 0 2px rgba(82,75,224,0.3)'"
                                onblur="this.style.borderColor='#363d4e'; this.style.boxShadow='none'"
                            >
                            @error('harga')
                                <p style="color: #f87171; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Hidden user_id (auto-set to current user) --}}
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    {{-- Buttons --}}
                    <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px;">
                        <a href="{{ route('product') }}" 
                           style="padding: 8px 20px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #d1d5db; background-color: #252b3b; border: 1px solid #363d4e; text-decoration: none;">
                            Cancel
                        </a>
                        <button type="submit" 
                                style="padding: 8px 20px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #ffffff; background-color: #524be0; border: none; cursor: pointer;">
                            Save Product
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>