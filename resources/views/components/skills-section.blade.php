<section class="py-20 border-t border-zinc-100 dark:border-zinc-800 bg-slate-50 dark:bg-zinc-800">
    <div class="max-w-3xl mx-auto text-center px-4">
        <h2 class="text-4xl font-bold mb-12 text-zinc-800 dark:text-zinc-100">Main Skills</h2>
        <div class="flex flex-wrap justify-center gap-3">
            @foreach ($skills as $skill)
                <span data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}" class="bg-white dark:bg-zinc-700 border border-zinc-200 dark:border-zinc-600 text-zinc-700 dark:text-zinc-200 text-base font-medium px-5 py-2 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                    {{ $skill }}
                </span>
            @endforeach
        </div>
    </div>
</section>