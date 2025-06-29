<section class="py-20 border-t border-zinc-100">
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-8">Main Skills</h2>
        <div class="flex flex-wrap justify-center gap-2">

            @foreach ($skills as $skill)
                <span data-aos="fade-up" class="bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-2 rounded-full">
                    {{ $skill }}
                </span>
            @endforeach

        </div>
    </div>
</section>