<section class="py-20 bg-slate-50 dark:bg-zinc-800">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-zinc-800 dark:text-zinc-100" data-translate="experience_title">Experiência</h2>

        <div class="relative">
            <div class="absolute left-4 top-0 h-full w-0.5 bg-zinc-200 dark:bg-zinc-700"></div>

            @foreach ($experiences as $exp)
                <div class="relative pl-12 mb-12" data-aos="fade-up">
                    <div class="absolute left-4 top-1 -ml-1.5 h-3 w-3 rounded-full bg-amber-500"></div>

                    <div class="p-6 bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-700 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-100" data-translate="experience.{{ $exp['role'] }}">
                        </h3>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400 mb-1">
                            <span data-translate="experience.{{ $exp['period'] }}"></span> • <span data-translate="experience.{{ $exp['location'] }}"></span>
                        </p>
                        <p class="text-md font-semibold text-amber-600 dark:text-amber-400 mb-3">{{ $exp['company'] }}</p>

                        @if (!empty($exp['description']))
                            <ul class="list-disc list-inside space-y-1 text-zinc-600 dark:text-zinc-300">
                                @foreach ($exp['description'] as $desc)
                                    <li data-translate="experience.{{ $desc }}"></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>