import './bootstrap';

// Importa a biblioteca AOS e seu CSS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Inicializa a biblioteca
AOS.init({
    duration: 800,
    once: true,
});

// Função para obter valor de um objeto por string (ex: 'experience.role_1')
function getObjectValue(obj, path) {
    if (!path) return undefined;
    return path.split('.').reduce((acc, part) => acc && acc[part], obj);
}

// --- LÓGICA DO SELETOR DE IDIOMA ---
const languageToggleBtn = document.getElementById('language-toggle');
const langIcon = document.getElementById('lang-icon');
const mainContent = document.querySelector('main'); // Seleciona o conteúdo principal para a animação

const applyTranslations = (lang) => {
    // 1. Inicia a animação de fade-out
    mainContent.style.transition = 'opacity 0.2s ease-in-out';
    mainContent.style.opacity = '0';

    // 2. Espera a animação terminar para trocar o texto
    setTimeout(() => {
        document.querySelectorAll('[data-translate]').forEach(el => {
            const key = el.getAttribute('data-translate');
            const translation = getObjectValue(window.translations[lang], key);
            if (translation) {
                el.innerText = translation;
            }
        });

        // 3. Atualiza o ícone e o atributo lang
        langIcon.innerText = lang === 'en' ? 'EN' : 'PT';
        document.documentElement.lang = lang;

        // 4. Inicia a animação de fade-in
        mainContent.style.opacity = '1';
    }, 200); // O tempo deve ser igual à duração da transição
};

languageToggleBtn.addEventListener('click', () => {
    const currentLang = document.documentElement.lang;
    const newLang = currentLang === 'en' ? 'pt-br' : 'en';
    
    localStorage.setItem('language', newLang);
    applyTranslations(newLang);
});


// --- LÓGICA DO SELETOR DE TEMA (Inalterada) ---
const themeToggleBtn = document.getElementById('theme-toggle');
const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

const applyTheme = (isDark) => {
    document.documentElement.classList.toggle('dark', isDark);
    themeToggleLightIcon.classList.toggle('hidden', isDark);
    themeToggleDarkIcon.classList.toggle('hidden', !isDark);
};

// Carrega o estado inicial do tema
const isDarkMode = localStorage.getItem('color-theme') === 'dark' ||
                   (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches);
applyTheme(isDarkMode);

themeToggleBtn.addEventListener('click', () => {
    const isDark = document.documentElement.classList.toggle('dark');
    localStorage.setItem('color-theme', isDark ? 'dark' : 'light');
    applyTheme(isDark);
});


// --- INICIALIZAÇÃO DA PÁGINA ---
document.addEventListener('DOMContentLoaded', () => {
    // Carrega o idioma salvo ou define 'pt-br' como padrão
    const savedLang = localStorage.getItem('language') || 'pt-br';
    applyTranslations(savedLang);
});