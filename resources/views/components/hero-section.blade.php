<section class="min-h-screen flex flex-col items-center justify-center text-center px-4">
    <div class="max-w-3xl">
        <h1 class="text-6xl md:text-8xl font-bold tracking-tighter text-amber-800 dark:text-amber-300">
            {{ $name }}
        </h1>
        {{-- Texto a ser traduzido --}}
        <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 mt-6" data-translate="hero_title">
            Desenvolvedor Fullstack Sênior especializado na criação de aplicações web robustas e escaláveis com Laravel.
        </p>

        <div class="mt-8 flex justify-center items-center space-x-6">
            <wired-button elevation="2" onclick="window.open('{{ $linkedinUrl }}', '_blank')">
                <div class="flex items-center gap-2 p-1">
                    <x-icons.linkedin class="w-6 h-6"/>
                    <span>LinkedIn</span>
                </div>
            </wired-button>

            <wired-button elevation="2" onclick="window.open('{{ $githubUrl }}', '_blank')">
                <div class="flex items-center gap-2 p-1">
                    <x-icons.github class="w-6 h-6"/>
                    <span>GitHub</span>
                </div>
            </wired-button>
        </div>
    </div>
</section>
<div id="hero-scroll-indicator" class="absolute bottom-8 left-1/2 -translate-x-1/2">
    <a href="#about" class="text-amber-500">
        <x-icons.arrow-down class="w-8 h-8"/>
    </a>
</div>
