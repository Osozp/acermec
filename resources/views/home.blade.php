<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate-SAScomida</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-dvh bg-gray-200">
    <div class="flex flex-col items-center justify-center h-full gap-4">
        <h1 class="text-3xl font-bold text-blue-900">Bienvenido a SAScomida</h1>
        <p class="text-lg text-blue-900">Por favor, inicia sesión para continuar.</p>
        <a href="{{ route('login') }}"
            class="px-4 py-2 text-white bg-blue-900 rounded hover:bg-blue-800">Iniciar Sesión</a>
    </div>
</body>

<body class="text-blue-900 bg-gray-200">
    <section class="w-full bg-teal-300 h-10 py-2 px-6 ">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div>1</div>
            <div>2</div>
            <div class="flex gap-2 font-bold pointer">
                <p>Whatsapp</p>
                <a href="#">670-35-677</a>
            </div>
        </div>
    </section>
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-6xl mx-auto h-16 flex items-center justify-between">
            <div class="text-2xl font-black tracking-tighter">BigPymes</div>
            <nav class="hidden md:flex space-x-8 font-medium text-slate-600">
                <a href="#" class="hover:text-teal-600">Servicios</a>
                <a href="#" class="hover:text-teal-600">Metodología</a>
                <a href="#" class="hover:text-teal-600">Blog</a>
            </nav>
            <a href="{{ route('login') }}"
                class="text-white px-6 py-2.5 rounded-full font-bold bg-blue-900 hover:text-blue-900 hover:bg-teal-300 transition">
                Login
            </a>
        </div>
    </header>
    <section class="bg-white ">
        <div class="grid max-w-6xl  py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Payments tool for software companies</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">From
                    checkout to global sales tax compliance, companies around the world use Flowbite to simplify their
                    payment stack.</p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Speak to Sales
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
            </div>
        </div>
    </section>
</body>

</html>
