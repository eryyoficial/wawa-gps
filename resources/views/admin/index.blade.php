@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <style>
            /* Estilos adicionais para uma melhor organização */
            .sidebar {
                width: 250px;
                flex-shrink: 0;
                border-right: 1px solid #e5e7eb; /* Tailwind's border-gray-200 */
                dark: border-gray-700;
            }

            .main-content {
                flex-grow: 1;
                padding: 20px;
            }

            /* Estilos para a transição suave do conteúdo */
            #render-body {
                opacity: 1;
                transition: opacity 0.3s ease-in-out;
            }

            #render-body.loading {
                opacity: 0.5;
            }
        </style>
    </head>

    <div class="bg-gray-100 dark:bg-gray-900 text-gray-600">

        <div class="flex flex-col min-h-screen">
            <nav
                class="bg-white border-b border-gray-200 px-4 py-2.5 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
                <div class="flex flex-wrap justify-between items-center">
                    <div class="flex justify-start items-center"><button data-drawer-target="drawer-navigation" data-drawer-toggle="drawer-navigation"
                            aria-controls="drawer-navigation"
                            class="p-2 mr-2 text-gray-600 rounded-lg cursor-pointer md:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a11 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg aria-hidden="true" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Toggle sidebar</span>
                        </button>
                        <a href="#" class="flex items-center justify-between mr-4">
                            <img src="https://flowbite.s3.amazonaws.com/logo.svg" class="mr-3 h-8" alt="Logo" />
                            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Meu
                                Website</span>
                        </a>
                    </div>
                    <div class="flex items-center lg:order-2">
                        <button type="button"
                            class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png"
                                alt="user photo">
                        </button>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm font-semibold text-gray-900 dark:text-white">Nome do
                                    Usuário</span>
                                <span
                                    class="block text-sm text-gray-500 truncate dark:text-gray-400">email@exemplo.com</span>
                            </div>
                            <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Perfil</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Configurações</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <aside id="drawer-navigation"
                class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Sidebar">
                <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="/dashboard/visao-geral"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                data-target="visao-geral">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A1 1 0 0114.172 4l-4 4V2.252z"></path>
                                </svg>
                                <span class="ml-3">Visão Geral</span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/usuarios"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                data-target="usuarios">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-3">Usuários</span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/produtos"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                data-target="produtos">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-3">Produtos</span>
                            </a>
                        </li>
                        <li>
                            <a href="/dashboard/relatorios"
                                class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                                data-target="relatorios">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 000-2H9z"></path>
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 00-1 1v3a1 1 0 001 1h2a1 1 0 001-1V10a1 1 0 00-1-1H7zm3 4a1 1 0 00-1 1v1a1 1 0 001 1h2a1 1 0 001-1v-1a1 1 0 00-1-1h-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-3">Relatórios</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="p-4 sm:ml-64 mt-20">
                <div id="render-body" class="main-content">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Bem-vindo ao Dashboard!
                        </h2>
                        <p class="text-gray-700 dark:text-gray-300">Selecione um item no menu lateral para ver o
                            conteúdo.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const sidebarLinks = document.querySelectorAll('#drawer-navigation a[data-target]');
                const renderBody = document.getElementById('render-body');

                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        const target = this.getAttribute('data-target');
                        const url = this.getAttribute('href'); // Pega o URL do link

                        // Adiciona uma classe de loading para indicar que o conteúdo está sendo carregado
                        renderBody.classList.add('loading');

                        // Faz a requisição AJAX para obter o conteúdo da nova view
                        fetch(url)
                            .then(response => response.text())
                            .then(data => {
                                // Remove a classe de loading e atualiza o conteúdo do render-body
                                renderBody.classList.remove('loading');
                                renderBody.innerHTML = data;
                                // Opcional: Re-inicializar quaisquer scripts ou componentes da nova view aqui
                            })
                            .catch(error => {
                                renderBody.classList.remove('loading');
                                renderBody.innerHTML =
                                    '<div class="text-red-500">Erro ao carregar o conteúdo.</div>';
                                console.error('Erro ao carregar a view:', error);
                            });

                        // Fecha o sidebar em dispositivos móveis após a seleção
                        const drawerElement = document.getElementById('drawer-navigation');
                        const drawer = new flowbite.Drawer(drawerElement);
                        if (window.innerWidth < 768 && drawer.isVisible()) {
                            drawer.hide();
                        }
                    });
                });

                // Carrega o conteúdo da Visão Geral por padrão ao carregar a página
                const initialLink = document.querySelector('#drawer-navigation a[data-target="visao-geral"]');
                if (initialLink) {
                    initialLink.click();
                }
            });
        </script>

    </div>
@endsection