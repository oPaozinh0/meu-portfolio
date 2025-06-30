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
                            <div
                                data-aos="fade-up"
                                data-aos-delay="{{ $loop->parent->index * 100 + $loop->index * 50 }}"
                                class="group flex items-center justify-center gap-3 bg-slate-100 dark:bg-zinc-600 border border-transparent text-zinc-700 dark:text-zinc-200 text-sm font-medium px-3 py-2 h-12 rounded-lg transition-all duration-300 hover:bg-amber-500 dark:hover:bg-amber-500 hover:text-white"
                            >
                                @if (str_starts_with($skill['icon'], 'devicon-'))
                                    <i class="{{ $skill['icon'] }} text-2xl text-current transition-colors duration-300"></i>
                                
                                @elseif (str_starts_with($skill['icon'], 'fa-'))
                                    <i class="{{ $skill['icon'] }} text-xl text-current transition-colors duration-300"></i>
                                
                                @else
                                    <x-dynamic-component :component="$skill['icon']" class="w-5 h-5"/>
                                @endif
                                <span class="whitespace-nowrap">{{ $skill['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>