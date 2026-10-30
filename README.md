# Digital CV & Portfolio — Davi Oliveira

Personal portfolio and digital CV of **Davi Oliveira** — Junior Database Analyst at Solinftec, co-founder of Attrion, creator of Mediê, and Senior Full Stack Developer. Built as a server-rendered **Laravel 12** application with a custom design system ("Attrion"), full PT-BR/EN internationalization, multiple color themes, and embedded side utilities.

🔗 Live: [attrion.com.br](https://attrion.com.br) · 💼 [LinkedIn](https://www.linkedin.com/in/davio-vieira) · 🐙 [GitHub](https://github.com/oPaozinh0)

## ✨ Features

- **Server-rendered portfolio** — hero, about, projects, experience, education, languages, skills and contact sections, driven by Blade components.
- **Internationalization (PT-BR / EN)** — locale is persisted in the session and applied through the `SetLocale` middleware; switch via `/lang/{locale}`. All copy lives in `resources/lang/{pt-br,en}/portfolio.php`.
- **Theming** — multiple dark/light themes selected via a `data-theme` attribute, with an anti-flash inline script and preference stored in `localStorage`.
- **Scroll reveal & motion** — lightweight `IntersectionObserver`-based reveal (no external animation library), with `prefers-reduced-motion` support.
- **Downloadable CV** — the resume PDF is served from `public/cv-davi-oliveira-en.pdf` and linked from the hero.
- **URL shortener** — an embedded tool (`/s`) with real-time analytics, expiring links and access logs, plus an authenticated admin dashboard.
- **SEO** — dynamic meta tags, Schema.org JSON-LD (Person / WebSite / ProfilePage), Open Graph image and a dynamically generated `sitemap.xml`.

## 🛠️ Tech Stack

- **Backend:** PHP 8.2+, Laravel 12
- **Frontend:** Blade, Alpine.js, Tailwind CSS 3 (via PostCSS), custom `attrion.css` design system, Vite 6
- **Fonts / icons:** Montserrat + JetBrains Mono, devicon (CDN) for skill icons
- **Database:** SQLite (default) / MySQL / PostgreSQL
- **Tooling:** Composer, NPM, Laravel Pint, PHPUnit

## 📂 Content structure

Portfolio content is split across three places:

- `config/portfolio.php` — structured data for experiences, projects and education (companies, tags, links, translation-key references).
- `resources/lang/{pt-br,en}/portfolio.php` — all human-readable text (both languages, parallel keys).
- `app/View/Components/*.php` — component-level data such as the hero identity, skills list and contact details.

## 🔧 Local setup

```bash
git clone https://github.com/oPaozinh0/meu-portfolio.git
cd meu-portfolio

composer install
npm install

cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
```

Run the app (serves Laravel on port 8001 + Vite dev server concurrently):

```bash
composer dev
```

Or run each process separately:

```bash
php artisan serve   # terminal 1
npm run dev         # terminal 2
```

Then open the URL printed by `artisan serve`.

## 🧪 Tests & formatting

```bash
composer test          # config:clear + artisan test
./vendor/bin/pint      # code style
```

## 🚀 Deployment

Production runs from a multi-stage **Dockerfile** (nginx + php-fpm + supervisor). `docker/entrypoint.sh` boots the container: ensures the SQLite file exists, rebuilds config/route/view caches with runtime env, runs `migrate --force` and `storage:link`, then starts supervisord. A `HEALTHCHECK` hits `/up`. The image targets generic container platforms (Render, Fly, Railway).

## 📜 License

Licensed under the MIT License. See [LICENSE](LICENSE) for details.

---

Made with ❤️ by **Davi Oliveira**.
