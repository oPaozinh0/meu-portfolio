<!DOCTYPE html>
<html lang="en">
<head>
    {{-- ... seu head continua o mesmo ... --}}
    <title>Davi Oliveira - Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-zinc-900 font-sans"> {{-- Adicione a classe 'font-sans' --}}

    <main>
        <x-hero-section />
        <x-experience-section />
        <x-education-section />
        <x-skills-section />
        <x-site-footer />
    </main>

</body>
</html>