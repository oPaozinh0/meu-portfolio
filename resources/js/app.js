import './bootstrap';

// Importa a biblioteca AOS e seu CSS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inicializa a biblioteca
AOS.init({
    duration: 800, // Duração da animação em milissegundos
    once: true, // A animação acontece apenas uma vez
});

// --- LÓGICA DO SELETOR DE TEMA ---
const themeToggleBtn = document.getElementById('theme-toggle');
const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Função para aplicar o tema
function applyTheme(isDark) {
    if (isDark) {
        document.documentElement.classList.add('dark');
        themeToggleLightIcon.classList.add('hidden');
        themeToggleDarkIcon.classList.remove('hidden');
    } else {
        document.documentElement.classList.remove('dark');
        themeToggleDarkIcon.classList.add('hidden');
        themeToggleLightIcon.classList.remove('hidden');
    }
}

// Verifica o tema ao carregar a página
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    applyTheme(true);
} else {
    applyTheme(false);
}

// Adiciona o evento de clique no botão
themeToggleBtn.addEventListener('click', function() {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('color-theme', isDark ? 'dark' : 'light');
    applyTheme(isDark);
});