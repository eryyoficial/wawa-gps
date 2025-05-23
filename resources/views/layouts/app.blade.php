<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Geolocalização de Autocarros')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/images/logo1.png')}}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- Para estilos personalizados, se necessário --}}
    @yield('head') {{-- Seções para adicionar estilos ou scripts específicos no <head> --}}

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 0.375rem;
            margin-top: 0rem;
        }

        .dropdown-content a {
            color: #374151;
            /* text-gray-700 */
            padding: 0.75rem 1rem;
            text-decoration: none;
            display: block;
            font-size: 0.875rem;
            /* text-sm */
        }

        .dropdown-content a:hover {
            background-color: #e5e7eb;
            /* bg-gray-200 */
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-toggle {
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        .dropdown-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Estilos para o menu hambúrguer */
        .hamburger-menu {
            display: none; /* Oculto por padrão em telas maiores */
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }

        .hamburger-menu:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .bar {
            width: 25px;
            height: 3px;
            background-color: white;
            margin: 5px 0;
            transition: 0.4s;
            display: block;
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 75px; /* Ajuste conforme a altura da sua navbar */
            left: 0;
            width: 100%;
            background-color: #4f46e5; /* Cor do navbar */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 30;
            padding: 1rem;
        }

        .mobile-menu a {
            color: white;
            padding: 0.75rem 1rem;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .mobile-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .mobile-menu .dropdown {
            display: block;
            position: static;
        }

        .mobile-menu .dropdown-toggle {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .mobile-menu .dropdown-content {
            display: none;
            position: static;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: none;
            margin-top: 0;
            border-radius: 0;
            padding-left: 1rem;
        }

        .mobile-menu .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Media query para telas menores */
        @media (max-width: 768px) {
            .desktop-menu {
                display: none;
            }

            .hamburger-menu {
                display: block;
            }

            .mobile-menu.open {
                display: block;
            }
        }

        .open .bar:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .open .bar:nth-child(2) {
            opacity: 0;
        }

        .open .bar:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
    </style>
</head>

<body class="bg-gray-100 h-screen antialiased">

    <div class="min-h-screen bg-gray-100">
        <nav class="bg-indigo-700 py-4 shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <a href="{{ route('home') }}" class="text-white flex items-center gap-1">
                        <img src="{{asset('/assets/images/logo1.png')}}" alt="Logo Wawa GPS" width="30">
                        <span class="font-bold text-white text-xl">Wawa GPS</span>
                    </a>
                    <div class="flex items-center">
                        <div class="hamburger-menu" id="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                        <div class="desktop-menu space-x-4 ml-4">
                            <a href="{{ route('home') }}"
                                class="text-gray-200 hover:text-white transition duration-300">Página Inicial</a>
                            <a href="{{ route('mapa') }}"
                                class="text-gray-200 hover:text-white transition duration-300">Mapa</a>
                            <a href="{{ route('linhas.listar') }}"
                                class="text-gray-200 hover:text-white transition duration-300">Linhas</a>
                            <a href="{{ route('paragems.listar') }}"
                                class="text-gray-200 hover:text-white transition duration-300">Paragens</a>

                            @auth
                                <div class="dropdown">
                                    <div class="dropdown-toggle p-1 px-2">
                                        <a href="{{route('profile.show')}}"><i class='bx bx-user text-white text-2xl transition duration-300'></i> </a>
                                    </div>
                                    <div class="dropdown-content">
                                        <a href="{{ route('profile.show') }}">Perfil</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sair
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                    class="text-indigo-600 transition duration-300 bg-white py-2 px-4 rounded-lg hover:bg-indigo-600 hover:text-white">Login</a>

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="mobile-menu" id="mobileMenu">
            <a href="{{ route('home') }}">Página Inicial</a>
            <a href="{{ route('mapa') }}">Mapa</a>
            <a href="{{ route('linhas.listar') }}">Linhas</a>
            <a href="{{ route('paragems.listar') }}">Paragens</a>
            @auth
                <div class="dropdown">
                    <div class="dropdown-toggle">
                        Perfil
                        <i class='bx bx-chevron-down text-white'></i>
                    </div>
                    <div class="dropdown-content">
                        <a href="{{ route('profile.show') }}">Perfil</a>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('mobile-logout-form').submit();">
                            Sair
                        </a>
                        <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>

        <main>
            <div>
                @yield('content') {{-- O conteúdo específico de cada página será injetado aqui --}}
            </div>
        </main>

        @yield('secondary-content')

        <footer class="p-4 sm:p-6 bg-gray-800">
            <div class="mx-auto max-w-screen-xl">
                <div class="md:flex md:justify-between">
                    <div class="mb-6 md:mb-0">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <img src="{{asset('/assets/images/logo1.png')}}" alt="Logo Wawa GPS" width="30">
                            <span class="text-white font-bold uppercase text-xl">Wawa GPS</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold uppercase text-white">Sobre</h2>
                            <ul class="text-gray-400">
                                <li>
                                    <a href="#" class="hover:underline">A plataforma</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Nossa missão</a>
                                </li>
                                <li>
                                    <a href="{{ route('mapa') }}" class="hover:underline">Mapa</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold uppercase text-white">Links Úteis
                            </h2>
                            <ul class="text-gray-400">
                                <li>
                                    <a href="#" class="hover:underline">Termos e Condições</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Privacidade</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">FAQs</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold uppercase text-white">Contacto</h2>
                            <ul class="text-gray-400">
                                <li>
                                    <a href="tel:+244923099031" class="hover:underline">Telefone</a>
                                </li>
                                <li>
                                    <a href="mailto:suporte@wawagps.com" class="hover:underline">wawagps@gmail.com</a>
                                </li>
                                <li>
                                    <a href="#" class="hover:underline">Formulário de Contacto</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="my-6 sm:mx-auto border-gray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm sm:text-center text-gray-400">© {{ date('Y') }} <a
                            href="{{ route('home') }}"
                            class="hover:underline">{{ config('app.name', 'WAWA GPS') }}</a>. Todos os direitos
                        reservados.
                    </span>
                    {{-- Adicione aqui links para redes sociais, se desejar --}}
                    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                        <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');

        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            hamburger.classList.toggle('open');
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script> {{-- Para scripts JavaScript gerais --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @yield('scripts') {{-- Seções para adicionar scripts JavaScript específicos no final do <body> --}}
</body>

</html>