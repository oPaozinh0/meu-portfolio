@extends('layouts.app')

@section('title', 'Login - Sketchy')

@section('content')
<section class="min-h-screen flex flex-col items-center justify-center px-4">

    <div class="w-full mx-auto" style="max-width: 450px;">

        <wired-card elevation="4" class="block bg-white dark:bg-zinc-900 h-full w-full">

            <div class="p-8">
                <h2 class="text-3xl font-bold text-center mb-8 font-['Patrick_Hand'] text-zinc-800 dark:text-zinc-100">
                    Acesso Restrito
                </h2>

                <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-6">
                    @csrf

                    <div>
                        <label class="block mb-2 ml-1 font-['Patrick_Hand'] text-lg font-bold text-zinc-700 dark:text-zinc-300">Email</label>
                        <input type="email" name="email"
                               class="w-full px-4 py-3 bg-slate-50 dark:bg-zinc-800 border-2 border-zinc-300 dark:border-zinc-600 rounded-lg font-['Patrick_Hand'] text-lg focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200 transition-all"
                               style="border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px;"
                               placeholder="seu@email.com"
                               required autofocus>
                    </div>

                    <div>
                        <label class="block mb-2 ml-1 font-['Patrick_Hand'] text-lg font-bold text-zinc-700 dark:text-zinc-300">Senha</label>
                        <input type="password" name="password"
                               class="w-full px-4 py-3 bg-slate-50 dark:bg-zinc-800 border-2 border-zinc-300 dark:border-zinc-600 rounded-lg font-['Patrick_Hand'] text-lg focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-200 transition-all"
                               style="border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px;"
                               placeholder="••••••••"
                               required>
                    </div>

                    @if ($errors->any())
                        <div class="p-3 bg-red-100 border border-red-200 rounded text-red-600 text-sm font-['Patrick_Hand'] text-center" style="border-radius: 255px 15px 225px 15px / 15px 225px 15px 255px;">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <div class="mt-2 text-center">
                        <wired-button elevation="3" class="w-full bg-amber-500 text-white font-bold text-xl" onclick="this.closest('form').submit()">
                            ENTRAR
                        </wired-button>
                    </div>
                </form>
            </div>
        </wired-card>

        <div class="text-center mt-6">
            <a href="/" class="font-['Patrick_Hand'] text-zinc-500 hover:text-amber-600 hover:underline decoration-wavy">
                ← Voltar para o site
            </a>
        </div>

    </div>
</section>
@endsection
