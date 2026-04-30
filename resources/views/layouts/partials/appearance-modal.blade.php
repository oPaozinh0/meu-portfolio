{{-- Modal de aparência (theme switcher) — controlado por appState() Alpine --}}
<div x-cloak
     x-show="$store.attrion.themeOpen"
     @keydown.escape.window="$store.attrion.themeOpen = false"
     @click="$store.attrion.themeOpen = false"
     class="appearance-modal">

  <div @click.stop
       style="background: var(--bg2); border: 1px solid var(--border); width: min(600px, 100%); max-height: 90vh; overflow-y: auto;">

    {{-- Cabeçalho --}}
    <div style="display: flex; align-items: center; justify-content: space-between; padding: 24px 28px 0;">
      <span style="font-size: 16px; font-weight: 900; letter-spacing: -.01em; color: var(--fg);">Aparência</span>
      <button @click="$store.attrion.themeOpen = false"
              class="tb-btn-ghost"
              style="width: 28px; height: 28px; padding: 0; display: flex; align-items: center; justify-content: center; font-size: 16px;"
              aria-label="Fechar">×</button>
    </div>

    {{-- Body --}}
    <div style="padding: 20px 28px 28px;">
      <p style="font-size: 10px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase; color: var(--fg); margin-bottom: 4px;">
        Tema da interface
      </p>
      <p style="font-size: 11px; color: var(--muted); margin-bottom: 20px; line-height: 1.5;">
        Personalize a aparência do seu workspace.
      </p>

      <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
        <template x-for="t in themes" :key="t.id">
          <button type="button"
                  class="theme-card"
                  :class="theme === t.id ? 'on' : ''"
                  @click="setTheme(t.id)">
            <div class="theme-card-preview" :style="`background: ${t.bg};`">
              <div class="theme-card-sb" :style="`background: ${t.sb};`"></div>
              <div class="theme-card-accent" :style="`background: ${t.accent};`"></div>
            </div>
            <div class="theme-card-name" x-text="t.name"></div>
          </button>
        </template>
      </div>
    </div>

    {{-- Footer --}}
    <div style="padding: 0 28px 24px; display: flex; justify-content: flex-end;">
      <button @click="$store.attrion.themeOpen = false" class="tb-btn-ghost">Fechar</button>
    </div>
  </div>
</div>
