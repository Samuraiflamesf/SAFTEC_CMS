<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
    <!-- Links & Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100/95 min-h-screen flex flex-col">

    <nav class="bg-white border-gray-200 py-3 mb-0">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-3 mx-auto">
            <a href="{{ route('client.home') }}" class="flex items-center">
                <span class="self-center text-xl font-semibold ">SAFTEC</span>
            </a>
            <div class="flex items-center lg:order-2">
                <div class="hidden mt-2 mr-4 sm:inline-block">
                    <span></span>
                </div>

                <a href="/client"
                    class="text-white bg-indigo-600/95 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0">Login</a>
                <button data-collapse-toggle="mobile-menu-2" type="button"
                    class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="mobile-menu-2" aria-expanded="true">
                    <span class="sr-only">Abrir Menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="{{ route('client.home') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0">Página
                            Inicial</a>
                    </li>
                    <li>
                        <a href="{{ route('client.document') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 ">Documentos</a>
                    </li>
                    <li>
                        <a href="{{ route('client.phone') }}"
                            class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 ">Ramais</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="flex-grow mb-24 ">

        @yield('content')
    </div>

    <footer class="w-full bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <ul
                    class="text-lg flex items-center justify-center flex-col gap-7 md:flex-row md:gap-12 transition-all duration-500 py-4 mb-8 border-b border-gray-200">
                    <li>
                        <a href="{{ route('client.home') }}"
                            class="text-lg font-normal text-gray-800 transition-all duration-300 hover:text-indigo-600 focus-within:text-indigo-600 focus-within:outline-0">
                            Página Inicial
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.document') }}"
                            class="text-lg font-normal text-gray-800 transition-all duration-300 hover:text-indigo-600 focus-within:text-indigo-600 focus-within:outline-0">
                            Documentos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.phone') }}"
                            class="text-lg font-normal text-gray-800 transition-all duration-300 hover:text-indigo-600 focus-within:text-indigo-600 focus-within:outline-0">
                            Ramais
                        </a>
                    </li>
                </ul>
            </div>
            <span class="text-lg text-gray-500 text-center block pb-4">
                ©<a href="https://bernardonogueira8.netlify.app/">BernardoNogueira8</a>
                <script>
                    document.write(new Date().getFullYear());
                </script> - Todos os direitos reservados.
            </span>
        </div>
    </footer>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>

</html>
