<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Product List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div style="background-color: #1a1f2e; border: 1px solid #2d3343; border-radius: 12px; padding: 28px 32px;">

                {{-- Header --}}
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <div>
                        <h3 style="color: #ffffff; font-size: 20px; font-weight: 700; margin: 0;">Product List</h3>
                        <p style="color: #9ca3af; font-size: 13px; margin-top: 4px;">Manage your products</p>
                    </div>
                    @can('manage-product')
                        <a href="/product/create" 
                           style="display: inline-flex; align-items: center; gap: 6px; background-color: #252b3b; border: 1px solid #363d4e; color: #ffffff; padding: 8px 18px; border-radius: 8px; font-size: 13px; font-weight: 500; text-decoration: none; transition: background-color 0.2s;"
                           onmouseover="this.style.backgroundColor='#524be0'; this.style.borderColor='#524be0'"
                           onmouseout="this.style.backgroundColor='#252b3b'; this.style.borderColor='#363d4e'">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
                            </svg>
                            Add Product
                        </a>
                    @endcan
                </div>

                {{-- Table --}}
                <div style="border: 1px solid #2d3343; border-radius: 8px; overflow: hidden;">
                    <table style="width: 100%; border-collapse: collapse; text-align: center;">
                        <thead>
                            <tr style="background-color: #252b3b; border-bottom: 1px solid #2d3343;">
                                <th style="padding: 14px 20px; font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; width: 60px;">ID</th>
                                <th style="padding: 14px 20px; font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em;">NAME</th>
                                <th style="padding: 14px 20px; font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em;">OWNER</th>
                                <th style="padding: 14px 20px; font-size: 11px; font-weight: 600; color: #9ca3af; text-transform: uppercase; letter-spacing: 0.05em; width: 120px;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr style="border-bottom: 1px solid #2d3343;" 
                                onmouseover="this.style.backgroundColor='#252b3b'" 
                                onmouseout="this.style.backgroundColor='transparent'">
                                <td style="padding: 14px 20px; font-size: 14px; color: #6b7280;">#{{ $product->id }}</td>
                                <td style="padding: 14px 20px; font-size: 14px; color: #ffffff; font-weight: 500;">{{ $product->nama_produk }}</td>
                                <td style="padding: 14px 20px; font-size: 14px; color: #d1d5db;">{{ $product->user->name ?? '-' }}</td>
                                <td style="padding: 14px 20px;">
                                    <div style="display: flex; align-items: center; justify-content: center; gap: 14px;">

                                        <a href="/product/{{ $product->id }}" 
                                               style="color: #9ca3af; transition: color 0.2s; display: flex;"
                                               onmouseover="this.style.color='#60a5fa'" 
                                               onmouseout="this.style.color='#9ca3af'"
                                               title="Edit">
                                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                        <form action="/product/{{ $product->id }}" method="POST" style="display: inline; margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        style="background: none; border: none; cursor: pointer; color: #9ca3af; padding: 2px; transition: color 0.2s; display: flex;"
                                                        onmouseover="this.style.color='#f87171'" 
                                                        onmouseout="this.style.color='#9ca3af'"
                                                        title="Delete"
                                                        onclick="return confirm('Yakin hapus produk ini?')">
                                                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" style="padding: 40px 20px; text-align: center; color: #6b7280; font-size: 14px;">Belum ada produk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>