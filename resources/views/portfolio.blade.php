<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Davi Oliveira - Portfolio</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><style>@media(prefers-color-scheme:dark){rect{fill:%23dd6b20}}</style><rect width='100' height='100' rx='15' fill='%23F5770A'/><text x='50' y='55' font-size='50' text-anchor='middle' font-family='Inter,sans-serif' font-weight='700' fill='white'>DO</text></svg>">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-zinc-900 text-zinc-800 dark:text-zinc-200 font-sans transition-colors duration-300">
    <x-theme-switcher />

    <main>
        <x-hero-section />
        <x-experience-section />
        <x-education-section />
        <x-skills-section />
        <x-site-footer />
    </main>

</body>
</html>