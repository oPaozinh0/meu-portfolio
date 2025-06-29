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
            <a href="{{ $linkedinUrl }}" target="_blank" rel="noopener noreferrer" class="text-zinc-500 hover:text-amber-700 dark:hover:text-amber-500 transition-colors duration-300" title="LinkedIn">
                <x-icons.linkedin class="text-zinc-500 hover:text-amber-700 dark:hover:text-amber-500 transition-colors duration-300"/>
            </a>
            <a href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer" class="text-zinc-500 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors duration-300" title="GitHub">
                <x-icons.github class="text-zinc-500 hover:text-amber-700 dark:hover:text-amber-500 transition-colors duration-300"/>
            </a>
        </div>
    </div>
</section>
<div id="hero-scroll-indicator" class="absolute bottom-8 left-1/2 -translate-x-1/2">
    <a href="#about" class="text-amber-500">
        <x-icons.arrow-down class="w-8 h-8"/>
    </a>
</div>