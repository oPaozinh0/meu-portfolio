<section id="skills" class="py-20 border-t border-zinc-100 dark:border-zinc-800 bg-slate-50 dark:bg-zinc-800">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-zinc-800 dark:text-zinc-100" data-translate="skills_title">Principais Habilidades</h2>

        <div class="flex flex-wrap justify-center items-stretch gap-8">
            @foreach ($skillCategories as $category => $skills)
                <div class="w-full md:w-[45%] lg:basis-[31%] bg-white dark:bg-zinc-700 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-center mb-6 text-amber-600 dark:text-amber-500" data-translate="skills_category_{{ strtolower(str_replace(' & ', '_', $category)) }}">
                        {{ $category }}
                    </h3>

                    <div class="flex flex-wrap justify-center items-center gap-3">
                        @foreach ($skills as $skill)
                            <wired-card elevation="1" class="h-12 flex items-center justify-center bg-white hover:bg-amber-50 transition-colors">
                                <div class="flex items-center gap-3 px-3 py-2">
                                    @if (str_starts_with($skill['icon'], 'devicon-'))
                                        <i class="{{ $skill['icon'] }} text-2xl text-zinc-700"></i>
                                    @elseif (str_starts_with($skill['icon'], 'fa-'))
                                        <i class="{{ $skill['icon'] }} text-xl text-zinc-700"></i>
                                    @else
                                        <x-dynamic-component :component="$skill['icon']" class="w-5 h-5 text-zinc-700"/>
                                    @endif
                                    <span class="whitespace-nowrap font-bold text-zinc-700">{{ $skill['name'] }}</span>
                                </div>
                            </wired-card>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
