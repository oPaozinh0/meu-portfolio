# Fullstack Developer Digital CV - Davi Oliveira

![CV Preview](https://i.imgur.com/fvIQp4q.png)

## 🚀 About This Project

This is my personal CV, developed to showcase my skills and experience as a Fullstack Developer. The application was built with the **Laravel** framework on the backend and **Tailwind CSS** with **Vite** for the frontend, resulting in a modern, responsive, and high-performance page.

The site features a clean design, a theme switcher (light/dark), and multi-language support (Portuguese and English), all handled dynamically on the client-side with JavaScript.

### ✨ Features

- **Responsive Design:** Fully adaptive for desktops, tablets, and mobile devices.
- **Theme Switcher:** Toggle between light and dark modes, with the user's preference saved in their browser.
- **Multi-Language Support:** Content is available in both Portuguese and English, with a dynamic language switcher that doesn't require a page reload.
- **Subtle Animations:** Utilizes the `AOS` library for on-scroll animations that enhance the user experience.
- **SEO Optimized:** Dynamic meta tags for better search engine visibility and social media sharing.

### 🛠️ Technologies Used

This project was built with the following technologies:

- **Backend:**
    - PHP 8.2+
    - Laravel 12
- **Frontend:**
    - Tailwind CSS
    - Vite
    - JavaScript (ES6+)
    - AOS (Animate On Scroll)
- **Development Tools:**
    - Composer
    - NPM
    - Laravel Sail (Docker-based development environment)
    - Laravel Pint (Code formatter)

## 🔧 Installation and Setup

To run this project locally, follow the steps below:

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/oPaozinh0/meu-portfolio.git](https://github.com/oPaozinh0/meu-portfolio.git)
    cd meu-portfolio
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node.js dependencies:**
    ```bash
    npm install
    ```

4.  **Set up the environment:**
    - Copy the example environment file:
      ```bash
      cp .env.example .env
      ```
    - Generate the application key:
      ```bash
      php artisan key:generate
      ```

5.  **Run the development server:**
    - You can use Laravel Sail (requires Docker):
      ```bash
      # Start the containers
      ./vendor/bin/sail up -d

      # Compile assets with Vite
      ./vendor/bin/sail npm run dev
      ```
    - Or use the local PHP server and Vite separately:
      ```bash
      # In one terminal
      php artisan serve

      # In another terminal
      npm run dev
      ```

6.  **Access the application:**
    Open your browser and navigate to `http://localhost:8000`.

## 📜 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

---

Made with ❤️ by **Davi Oliveira**.

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Davi%20Oliveira-0A66C2?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/davio-vieira)
[![GitHub](https://img.shields.io/badge/GitHub-oPaozinh0-181717?style=for-the-badge&logo=github)](https://github.com/oPaozinh0)