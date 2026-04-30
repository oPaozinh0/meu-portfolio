import Alpine from 'alpinejs';

/* =========================================================================
   ATTRION — global Alpine state + cursor
   ========================================================================= */

const VALID_THEMES = ['dark', 'dark-slate', 'dark-forest', 'dark-warm', 'light', 'light-warm'];

const THEME_LABELS = {
  'dark':        'Noir',
  'dark-slate':  'Slate',
  'dark-forest': 'Forest',
  'dark-warm':   'Warm',
  'light':       'Light',
  'light-warm':  'Linen',
};

const THEME_PREVIEWS = [
  { id: 'dark',        name: 'Noir',   bg: '#080808', sb: '#111111', accent: 'rgba(0,229,204,.8)'   },
  { id: 'dark-slate',  name: 'Slate',  bg: '#06080e', sb: '#0d1520', accent: 'rgba(126,184,247,.8)' },
  { id: 'dark-forest', name: 'Forest', bg: '#050e07', sb: '#0c1a0e', accent: 'rgba(111,207,151,.8)' },
  { id: 'dark-warm',   name: 'Warm',   bg: '#0e0a06', sb: '#1a1008', accent: 'rgba(242,153,74,.8)'  },
  { id: 'light',       name: 'Light',  bg: '#f4f3ef', sb: '#e8e6e0', accent: 'rgba(0,184,162,.85)'  },
  { id: 'light-warm',  name: 'Linen',  bg: '#faf7f2', sb: '#f0ece4', accent: 'rgba(200,107,58,.85)' },
];

function applyCursorDefault(theme) {
  window._cursorDefault = theme.startsWith('light')
    ? 'rgba(0,0,0,.2)'
    : 'rgba(240,237,230,.3)';
  const cr = document.getElementById('cr');
  if (cr) cr.style.borderColor = window._cursorDefault;
}

Alpine.store('attrion', {
  themeOpen: false,
  mobileMenu: false,
  openTheme() { this.themeOpen = true; },
  closeTheme() { this.themeOpen = false; },
  toggleMobileMenu() { this.mobileMenu = !this.mobileMenu; },
  closeMobileMenu() { this.mobileMenu = false; },
});

Alpine.data('appState', () => ({
  theme: 'dark',
  themes: THEME_PREVIEWS,
  themeLabels: THEME_LABELS,

  initTheme() {
    const stored = localStorage.getItem('attrion-theme');
    let t;
    if (VALID_THEMES.includes(stored)) {
      t = stored;
    } else {
      t = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches
        ? 'light'
        : 'dark';
    }
    this.theme = t;
    document.documentElement.setAttribute('data-theme', t);
    applyCursorDefault(t);
  },

  setTheme(t) {
    if (!VALID_THEMES.includes(t)) return;
    this.theme = t;
    document.documentElement.setAttribute('data-theme', t);
    localStorage.setItem('attrion-theme', t);
    applyCursorDefault(t);
    if (typeof window.buildCharts === 'function') {
      setTimeout(window.buildCharts, 0);
    }
  },

  themeName() {
    return this.themeLabels[this.theme] ?? 'Noir';
  },
}));

/* ── Cursor (desktop only) ────────────────────────────────────────────── */

function initCursor() {
  const cd = document.getElementById('cd');
  const cr = document.getElementById('cr');
  if (!cd || !cr) return;

  let mx = 0, my = 0, rx = 0, ry = 0;

  window.addEventListener('mousemove', (e) => {
    mx = e.clientX;
    my = e.clientY;
    cd.style.left = mx + 'px';
    cd.style.top  = my + 'px';
  });

  (function loop() {
    rx += (mx - rx) * 0.12;
    ry += (my - ry) * 0.12;
    cr.style.left = rx + 'px';
    cr.style.top  = ry + 'px';
    requestAnimationFrame(loop);
  })();

  const expand = () => {
    cr.style.width = '48px';
    cr.style.height = '48px';
    cr.style.borderColor = 'rgba(33,212,253,.4)';
  };
  const restore = () => {
    cr.style.width = '32px';
    cr.style.height = '32px';
    cr.style.borderColor = window._cursorDefault || 'rgba(240,237,230,.3)';
  };

  document.addEventListener('mouseover', (e) => {
    if (e.target.closest('a, button, input, select, textarea, [data-cursor-hover]')) {
      expand();
    }
  });
  document.addEventListener('mouseout', (e) => {
    if (e.target.closest('a, button, input, select, textarea, [data-cursor-hover]')) {
      restore();
    }
  });
}

document.addEventListener('DOMContentLoaded', initCursor);

window.Alpine = Alpine;
Alpine.start();
