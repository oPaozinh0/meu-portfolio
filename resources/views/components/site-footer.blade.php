{{-- Rodapé · contato --}}
<footer id="contact" class="footer">
    <div class="ph-label c" style="justify-content: center; margin-bottom: 1rem;">
        {{ __('portfolio.contact_title') }}
    </div>
    <h2 class="section-title" style="margin-bottom: 1.5rem;">{{ __('portfolio.footer_heading') }}</h2>

    <p class="footer-cta">{{ __('portfolio.footer_cta') }}</p>

    <div class="contact-grid"
         x-data="{
            email: @js($email),
            copied: false,
            copy() {
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(this.email).then(() => {
                        this.copied = true;
                        setTimeout(() => this.copied = false, 1800);
                    }).catch(() => window.location.href = 'mailto:' + this.email);
                } else {
                    window.location.href = 'mailto:' + this.email;
                }
            }
         }">
        <button type="button"
                class="contact-icon-link"
                @click="copy()"
                :title="copied ? @js(__('portfolio.copy_email_done')) : @js(__('portfolio.copy_email'))"
                :aria-label="copied ? @js(__('portfolio.copy_email_done')) : @js(__('portfolio.copy_email'))"
                style="background: transparent; cursor: none;">
            <span x-show="!copied"><x-icons.email /></span>
            <span x-show="copied" x-cloak style="font-family:'JetBrains Mono',monospace;font-size:11px;font-weight:700;color:var(--green);">✓</span>
        </button>
        <a href="https://wa.me/{{ $whatsappNumber }}"
           target="_blank"
           rel="noopener noreferrer"
           class="contact-icon-link whatsapp"
           title="WhatsApp"
           aria-label="Conversar no WhatsApp">
            <x-icons.whatsapp />
        </a>
    </div>

    <div style="margin-top: 1.5rem; display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap;">
        <a href="{{ route('shortlink.create') }}" class="form-link" style="font-size: 11px;">
            {{ __('portfolio.footer_shortener_link') }}
        </a>
        <a href="{{ route('now') }}" class="form-link" style="font-size: 11px;">
            → /now
        </a>
    </div>

    <div class="footer-meta">
        <div class="dots">
            <div class="dot dot-c"></div>
            <div class="dot dot-y"></div>
            <div class="dot dot-p"></div>
        </div>
        <span>© {{ $currentYear }} Davi Oliveira · {{ __('portfolio.footer_rights') }}</span>
    </div>
</footer>
