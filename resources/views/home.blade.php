<x-layout>
    <section class="max-w-[1200px] mx-auto px-4 pb-20">
        <h1 class="text-gray-900 dark:text-white text-4xl md:text-6xl font-black leading-tight tracking-tight mb-6">
            De Humano a <span class="text-primary">Eloquent</span>
        </h1>
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] gap-8 items-start">
            <div class="bg-white text-white dark:bg-[#1a2632] rounded-xl shadow-2xl border border-gray-200 dark:border-[#233648] overflow-hidden">
                <h1>Categorías</h1>

                {{-- @php
                    dd($categories->count())
                @endphp --}}
                @if( $categories->count() )
                <ul>
                    @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
                @endif

                {{-- <form class="p-8 space-y-8" method="post" action="#">
                    <input
                        type="text"
                        class="w-full rounded-xl border dark:border-[#324d67] dark:bg-[#0f1720] text-gray-800 dark:text-gray-100 text-sm p-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        id="prompt"
                        name="prompt"
                        placeholder="Ejemplo: Dame los usuarios con mas de 3 posts en los ultimos 30 dias, ordenados por cantidad de posts y limitados a 10 resultados.">

                    <textarea
                        class="mt-4 w-full min-h-[120px] rounded-xl border border-gray-200 dark:border-[#324d67] bg-white dark:bg-[#0f1720] text-gray-800 dark:text-gray-100 text-sm p-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                        id="migrations"
                        name="migrations"
                        placeholder="Schema::create('users', function (Blueprint $table) {...});"
                    ></textarea>

                    <button
                        class="w-full sm:w-auto flex min-w-[240px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-14 px-8 bg-primary text-white text-lg font-bold tracking-wide transition-all hover:bg-primary/90 hover:shadow-lg active:scale-[0.98]"
                        type="submit"
                    >
                        <span class="material-symbols-outlined mr-2">auto_awesome</span>
                        Generar consulta
                    </button>
                </form> --}}
            </div>
        </div>
    </section>
</x-layout>