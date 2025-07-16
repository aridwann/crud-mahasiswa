<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Mahasiswa</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>

<body class="h-full bg-gray-900">
    <div class="min-h-full">
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8" x-data="{ open: false }">
                <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">CRUD</span>
                    Data
                    Mahasiswa
                </h1>
                <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
                    Untuk memenuhi tugas E-Learning Pertemuan 12 Mata Kuliah Web Programming 2
                </p>
                {{ $slot }}
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>
