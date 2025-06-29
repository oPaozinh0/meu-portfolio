<div>
    <!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
</div><section class="py-20 bg-slate-50">
    <h2 class="text-4xl font-bold text-center mb-12">Experience</h2>
    <div class="max-w-3xl mx-auto">

        @foreach ($experiences as $exp)
            <div data-aos="fade-up" class="mb-8 p-8 border border-zinc-100 rounded-lg bg-white shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                <h3 class="text-xl font-bold">{{ $exp['role'] }}</h3>
                <p class="text-md font-semibold text-blue-700">{{ $exp['company'] }}</p>
                <p class="text-sm text-zinc-500 mb-3">{{ $exp['period'] }} • {{ $exp['location'] }}</p>
                <ul class="list-disc list-inside space-y-1 text-zinc-700">
                    @foreach ($exp['description'] as $desc)
                        <li>{{ $desc }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>
</section>