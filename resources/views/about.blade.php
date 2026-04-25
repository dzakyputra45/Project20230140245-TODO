<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: #1a1f2e; border: 1px solid #2d3343; border-radius: 12px; padding: 28px 32px;">
                
                {{-- Header --}}
                <div style="margin-bottom: 24px;">
                    <h3 style="color: #ffffff; font-size: 20px; font-weight: 700; margin: 0;">Biodata Mahasiswa</h3>
                    <p style="color: #9ca3af; font-size: 13px; margin-top: 4px;">Informasi profil mahasiswa</p>
                </div>

                {{-- Detail Rows --}}
                <div style="border: 1px solid #2d3343; border-radius: 8px; overflow: hidden;">

                    {{-- Nama --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0; font-weight: 500;">Nama</span>
                        <span style="color: #ffffff; font-size: 14px; font-weight: 600;">Dzaky Putra Pratama</span>
                    </div>

                    {{-- NIM --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px; border-bottom: 1px solid #2d3343;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0; font-weight: 500;">NIM</span>
                        <span style="color: #ffffff; font-size: 14px;">20230140245</span>
                    </div>

                    {{-- Hobi --}}
                    <div style="display: flex; align-items: center; padding: 18px 24px;">
                        <span style="color: #9ca3af; font-size: 14px; width: 160px; flex-shrink: 0; font-weight: 500;">Hobi</span>
                        <span style="color: #ffffff; font-size: 14px;">Renang</span>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>