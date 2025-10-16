<footer id="contact" class="py-10 border-t border-zinc-100 dark:border-zinc-800">
    <div class="max-w-3xl mx-auto text-center px-4">
        <h2 class="text-3xl font-bold mb-4" data-translate="contact_title">Contato</h2>

        <p class="text-lg text-zinc-600 dark:text-zinc-400 mb-8" data-translate="footer_cta">
            Ficou interessado no meu trabalho ou tem um projeto em mente? Vamos conversar!
        </p>

        <div class="flex justify-center items-center space-x-8 mb-8">
            <a href="mailto:{{ $email }}" class="text-zinc-500 hover:text-amber-700 transition-colors duration-300" title="Email">
                <x-icons.email/>
            </a>
            <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" class="text-zinc-500 hover:text-green-500 transition-colors duration-300" title="WhatsApp">
                <x-icons.whatsapp/>
            </a>
        </div>
        <div class="mb-8">
            <a href="{{ route('shortlink.create') }}" class="text-amber-600 dark:text-amber-400 hover:underline">Encurtador de Links</a>
        </div>
        <p class="text-sm text-zinc-500">
            &copy; {{ $currentYear }} Davi Oliveira. <span data-translate="footer_rights">Todos os direitos reservados.</span>
        </p>
    </div>
</footer>
