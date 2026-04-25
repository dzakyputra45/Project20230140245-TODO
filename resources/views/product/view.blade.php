<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Detail
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div style="background-color: #1a1f2e; border: 1px solid #2d3343; border-radius: 12px; padding: 28px 32px;">

                {{-- Header --}}
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 28px;">
                    <div style="display: flex; align-items: flex-start; gap: 12px;">
                        <a href="{{ route('product') }}" style="color: #9ca3af; text-decoration: none; display: flex; margin-top: 6px;">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </a>
                        <div>
                            <h3 style="color: #ffffff; font-size: 22px; font-weight: 700; margin: 0;">Product Detail</h3>
                            <p style="color: #9ca3af; font-size: 13px; margin-top: 4px;">Viewing product #{{ $product->id }}</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('product.edit', $product->id) }}" 
                           style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #facc15; background: transparent; border: 1px solid #facc15; text-decoration: none;">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin hapus produk ini?')"
                                    style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 600; color: #f87171; background: transparent; border: 1px solid #f87171; cursor: pointer;">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Detail Rows --}}
                <div style="border: 1px solid #2d3343; border-radius: 8px; overflow: hidden;">

                    {{-- Product Name --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0;">Product Name</span>
                        <span style="color: #ffffff; font-size: 14px; font-weight: 600;">{{ $product->nama_produk }}</span>
                    </div>

                    {{-- Quantity --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0;">Quantity</span>
                        <span style="display: inline-block; background-color: rgba(34,197,94,0.15); color: #4ade80; font-size: 13px; font-weight: 500; padding: 4px 12px; border-radius: 20px; border: 1px solid rgba(34,197,94,0.3);">
                            {{ $product->stok }} In Stock
                        </span>
                    </div>

                    {{-- Price --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0;">Price</span>
                        <span style="font-size: 14px;">
                            <span style="color: #4ade80; font-weight: 700;">Rp</span>
                            <span style="color: #ffffff; font-weight: 700;">  {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </span>
                    </div>

                    {{-- Owner --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0;">Owner</span>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            @php
                                $ownerName = $product->user->name ?? 'Unknown';
                                $initial = strtoupper(substr($ownerName, 0, 1));
                            @endphp
                            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #524be0; display: flex; align-items: center; justify-content: center; color: #ffffff; font-size: 13px; font-weight: 600;">
                                {{ $initial }}
                            </div>
                            <span style="color: #ffffff; font-size: 14px; font-weight: 500;">{{ $ownerName }}</span>
                        </div>
                    </div>

                    {{-- Created At --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0;">Created At</span>
                        <span style="color: #d1d5db; font-size: 14px;">{{ $product->created_at->format('d M Y, H:i') }}</span>
                    </div>

                    {{-- Updated At --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0;">Updated At</span>
                        <span style="color: #d1d5db; font-size: 14px;">{{ $product->updated_at->format('d M Y, H:i') }}</span>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>