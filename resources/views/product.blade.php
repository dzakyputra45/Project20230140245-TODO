<h1>Halaman Product</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    @foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>

            <!-- 🔥 HANYA ADMIN (YANG PUNYA DATA) YANG LIHAT -->
            @can('update', $product)
                <a href="/product/{{ $product->id }}/edit">Edit</a>
                <a href="{{ $url }}"
    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition duration-150 shadow-sm">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Add {{ $name }}
</a>
            @endcan

            @can('delete', $product)
                <form action="/product/{{ $product->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            @endcan

        </td>
    </tr>
    @endforeach

</table>