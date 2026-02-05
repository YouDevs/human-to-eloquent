<x-layout>

     {{-- Hero --}}
    <section class="max-w-[960px] mx-auto px-4 py-12 md:py-20 text-center">
        <div
            class="mb-6 inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 border border-primary/20 text-primary text-xs font-bold uppercase tracking-wider"
        >
            <span class="material-symbols-outlined text-sm">bolt</span>
            <span>Potenciado por IA</span>
        </div>
        <h1 class="text-gray-900 dark:text-white text-4xl md:text-6xl font-black leading-tight tracking-tight mb-6">
            De Humano a <span class="text-primary">Eloquent</span>
        </h1>
        <p class="text-gray-600 dark:text-gray-400 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">
            Convierte lenguaje natural a Laravel PHP en tiempo real
        </p>
    </section>

    {{-- Cols --}}
    <section class="max-w-[1200px] mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] gap-8 items-start">

            {{-- Col. Izquiera: Form --}}
            <div class="bg-white dark:bg-[#1a2632] rounded-xl shadow-2xl border border-gray-200 dark:border-[#233648] overflow-hidden">
                <form class="p-8 space-y-8" method="post" action="/">
                    @csrf
                    <div>
                        <div class="flex items-center justify-between gap-4 mb-4">
                            <h2 class="text-gray-900 dark:text-white text-xl font-bold">
                                Tu consulta en español
                            </h2>
                            <span
                                class="text-[11px] font-semibold uppercase tracking-wider text-primary bg-primary/10 border border-primary/20 px-2 py-1 rounded-full"
                            >
                                Listo para generar
                            </span>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">
                            Describe lo que necesitas y generaremos el codigo Eloquent o Query Builder, con explicacion y SQL.
                        </p>
                        <textarea
                            class="w-full min-h-[80px] rounded-xl border border-gray-200 dark:border-[#324d67] bg-gray-50/70 dark:bg-[#111a22]/60 text-gray-800 dark:text-gray-100 text-sm p-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            id="prompt"
                            name="prompt"
                            placeholder="Ejemplo: Dame los usuarios con mas de 3 posts en los ultimos 30 dias, ordenados por cantidad de posts y limitados a 10 resultados."
                        ></textarea>
                    </div>

                    <div class="rounded-xl border border-dashed border-gray-200 dark:border-[#324d67] bg-gray-50/60 dark:bg-[#111a22]/50 p-6">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <h3 class="text-gray-900 dark:text-white text-lg font-bold">Migraciones (opcional)</h3>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">
                                    Pega tus migraciones Laravel para generar consultas mas precisas. Si lo dejas vacio, se usara un schema estimado.
                                </p>
                            </div>
                            <span
                                class="text-[11px] font-semibold uppercase tracking-wider text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-[#233648] px-2 py-1 rounded-full"
                            >
                                Opcional
                            </span>
                        </div>
                        <textarea
                            class="mt-4 w-full min-h-[120px] rounded-xl border border-gray-200 dark:border-[#324d67] bg-white dark:bg-[#0f1720] text-gray-800 dark:text-gray-100 text-sm p-4 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                            id="migrations"
                            name="migrations"
                            placeholder="Schema::create('users', function (Blueprint $table) {...});"
                            value=""
                        ></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button
                            class="w-full sm:w-auto flex min-w-[240px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-14 px-8 bg-primary text-white text-lg font-bold tracking-wide transition-all hover:bg-primary/90 hover:shadow-lg active:scale-[0.98]"
                            type="submit"
                        >
                            <span class="material-symbols-outlined mr-2">auto_awesome</span>
                            Generar consulta
                        </button>
                    </div>
                </form>
            </div>

            {{-- Col. Derecha: Resultado --}}
            <div class="space-y-6">
                <div class="bg-[#131b24] rounded-xl border border-[#1f2a36] shadow-lg overflow-hidden flex flex-col">
                    <div class="p-6 border-b border-[#1f2a36] flex items-center justify-between bg-[#131b24]">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">code</span>
                            <h3 class="font-bold text-lg text-white">Resultado</h3>
                        </div>
                    </div>
                    <div class="p-6 bg-[#0f161e] flex-1 min-h-[300px] relative">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-primary/5 blur-3xl pointer-events-none"></div>
                        <pre class="code-block text-sm leading-relaxed overflow-x-auto text-white">{{ $response ?? '' }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>