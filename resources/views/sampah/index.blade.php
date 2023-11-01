<x-dash-lay>
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Form Grid
            </div>
            <div class="p-3">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-state">
                                Jenis Sampah
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="nama" name="nama">
                                @foreach ( $category as $s )
                                <option  value="{{ $s->id }}">{{ $s->nama }} / {{ $s->harga_kg }}</option>
                                @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1" for="grid-first-name">
                                Berat Sampah
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500" type="number" placeholder="KG" name="berat_kg" id="berat_kg">
                            <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                    </div>
                    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-dark-700 border-teal-500 hover:border-teal-dark text-sm border-4 text-white py-1 px-2 rounded"
                    type="button" name="submit" onclick="loadDoc()">
                        Input
                    </button>

                    <div id="hasil"></div>
            </div>
        </div>
    </div>

    <script>
    function loadDoc() {
    const xhttp = new XMLHttpRequest();
    const csrfToken = document.querySelector('meta[name="_token"]').getAttribute('content');
    xhttp.onload = function() {
        document.getElementById("demo").innerHTML = this.responseText;
        }
        const nama=document.getElementById("nama")
        const nama1=nama.value;
        const harga_kg=document.getElementById("berat_kg")
        const harga_kg1=harga_kg.value;
    xhttp.open("POST", "{{ route('hitung') }}?nama="+nama1+'&harga_kg='+harga_kg1, true);
    xhttp.setRequestHeader("X-CSRF-TOKEN", csrfToken);
    xhttp.send();
    xhttp.onload = function() {
    if (this.status === 200) {
        const response = JSON.parse(this.responseText);
        if (response.message === "succes") {
            const hasilElement = document.getElementById("hasil");
            hasilElement.innerHTML = "Harga: " + response.data;
        } else {
            console.error("Gagal mendapatkan data dari server.");
        }
    } else {
        console.error("Gagal mengakses server.");
    }
}
    }
    </script>

</x-dash-lay>
