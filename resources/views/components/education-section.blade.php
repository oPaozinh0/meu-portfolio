<section class="py-20 border-t border-zinc-100 dark:border-zinc-800">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-16 text-zinc-800 dark:text-zinc-100" data-translate="education_title">Formação</h2>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($education as $edu)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" class="bg-white dark:bg-zinc-900 p-8 rounded-lg border border-zinc-200 dark:border-zinc-700 shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col">
                    <h3 class="text-xl font-bold text-zinc-900 dark:text-zinc-100 flex-grow">{{ $edu['institution'] }}</h3>
                    <p class="text-md text-zinc-700 dark:text-zinc-300 mt-2" data-translate="education.{{ $edu['degree'] }}"></p>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400 mt-1" data-translate="education.{{ $edu['period'] }}"></p>
                </div>
            @endforeach
        </div>
    </div>
</section>