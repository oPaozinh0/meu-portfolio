<footer class="py-10 border-t border-zinc-100">
    <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4" data-translate="contact_title">Contato</h2>
        <div class="flex justify-center items-center space-x-8 mb-8">
            <a href="mailto:{{ $email }}" class="text-zinc-500 hover:text-amber-700 transition-colors duration-300" title="Email">
                <x-icons.email class="text-zinc-500 hover:text-amber-700 dark:hover:text-amber-500 transition-colors duration-300"/>
            </a>
        </div>
        <p class="text-sm text-zinc-500">
            &copy; {{ $currentYear }} Davi Oliveira. <span data-translate="footer_rights">Todos os direitos reservados.</span>
        </p>
    </div>
</footer>