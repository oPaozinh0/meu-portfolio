<section class="py-20 border-t border-zinc-100 bg-zinc-50">
    <h2 class="text-4xl font-bold text-center mb-12">Education</h2>
    <div class="max-w-3xl mx-auto">

        @foreach ($education as $edu)
            <div data-aos="fade-up" class="mb-8 p-8 border border-zinc-100 rounded-lg bg-white shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <h3 class="text-xl font-bold">{{ $edu['institution'] }}</h3>
                <p class="text-md text-zinc-700">{{ $edu['degree'] }}</p>
                <p class="text-sm text-zinc-500 mt-1">{{ $edu['period'] }} • {{ $edu['location'] }}</p>
            </div>
        @endforeach

    </div>
</section>