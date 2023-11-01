
<x-dash-lay>

    <main class="bg-white-300 flex-1 p-3 overflow-hidden">

    <div class="flex flex-col">
        <!-- Stats Row Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
            <div class="shadow-lg bg-red-500 border-l-8 hover:bg-red-600 border-redbg-red-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{ $categoryPlastik }}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Total Plastik
                    </a>
                </div>
            </div>

            <div class="shadow bg-blue-500 border-l-8 hover:bg-blue-600 border-blue-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{ $categoryKaca }}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Total Kaca
                    </a>
                </div>
            </div>

            <div class="shadow bg-yellow-500 border-l-8 hover:bg-yellow-600 border-yellow-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{ $categoryLogam }}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Total Logam
                    </a>
                </div>
            </div>

            <div class="shadow bg-green-500 border-l-8 hover:bg-green-600 border-green-600 mb-2 p-2 md:w-1/4 mx-2">
                <div class="p-4 flex flex-col">
                    <a href="#" class="no-underline text-white text-2xl">
                        {{ $categoryKertas }}
                    </a>
                    <a href="#" class="no-underline text-white text-lg">
                        Total Kertas
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

</x-dash-lay>

