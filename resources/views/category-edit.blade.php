<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">

            <div style="background-color: #1a1f2e; border: 1px solid #2d3343; border-radius: 12px; padding: 28px 32px;">

                {{-- Header with back arrow --}}
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 28px;">
                    <a href="{{ route('category.index') }}" style="color: #9ca3af; text-decoration: none; display: flex;">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <span style="color: #ffffff; font-size: 18px; font-weight: 700;">Edit Category</span>
                </div>

                <form method="POST" action="{{ route('category.update', $kategori->id) }}">
                    @csrf
                    @method('PUT')

                    {{-- Category Input --}}
                    <div style="margin-bottom: 28px;">
                        <label for="nama_kategori" style="display: block; font-size: 13px; font-weight: 500; color: #9ca3af; margin-bottom: 8px;">Category</label>
                        <input 
                            type="text" 
                            name="nama_kategori" 
                            id="nama_kategori"
                            value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                            style="width: 100%; background-color: #252b3b; color: #ffffff; border: 1px solid #363d4e; border-radius: 8px; padding: 10px 14px; font-size: 14px; outline: none; box-sizing: border-box;"
                            onfocus="this.style.borderColor='#524be0'; this.style.boxShadow='0 0 0 2px rgba(82,75,224,0.3)'"
                            onblur="this.style.borderColor='#363d4e'; this.style.boxShadow='none'"
                        >

                        @error('nama_kategori')
                            <p style="color: #f87171; font-size: 13px; margin-top: 8px;">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px;">
                        <a href="{{ route('category.index') }}" 
                           style="padding: 8px 20px; border-radius: 8px; font-size: 13px; font-weight: 500; color: #d1d5db; background-color: #252b3b; border: 1px solid #363d4e; text-decoration: none;">
                            Cancel
                        </a>
                        <button type="submit" 
                                style="padding: 8px 20px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #ffffff; background-color: #524be0; border: none; cursor: pointer;">
                            Update Category
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
