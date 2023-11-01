<x-dash-lay>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Full Table

                <a href="{{ route('tambah_sampah') }}" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition-colors">Tambah</a>
            </div>
            <div class="p-3">
                <table class="table-responsive w-full rounded">
                    <thead>
                      <tr>
                        <th class="border w-1/4 px-4 py-2">Jenis Sampah</th>
                        <th class="border w-1/6 px-4 py-2">Harga</th>
                        <th class="border w-1/5 px-4 py-2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $category as $c )
                        <tr>
                            <td class="border px-4 py-2">{{ $c->nama }}</td>
                            <td class="border px-4 py-2">{{ $c->harga_kg }}</td>
                            <td class="border px-4 py-2">
                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="{{ route('tambah_sampah', ['id'=>$c->id]) }}">
                                        <i class="fas fa-edit"></i></a>
                            <form action="{{ route('sampah-delete', $c->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <button class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" type="submit" >
                                        <i class="fas fa-trash"></i>
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-dash-lay>
