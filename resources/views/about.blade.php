<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-2xl font-bold mb-4">Biodata Mahasiswa</h3>

                <table class="table-auto w-full border">
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Nama</td>
                        <td class="border px-4 py-2">Dzaky Putra Pratama</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">NIM</td>
                        <td class="border px-4 py-2">20230140245</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Hobi</td>
                        <td class="border px-4 py-2">Renang</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>