@extends('layouts.app')

@section('title', 'Bem-vindo')


@section('content')
    <div class="mx-auto p-4 md:py-10 bg-white sm:px-6 lg:px-8">
        <!-- Grid -->
        <div class="flex flex-col lg:flex-row gap-4 md:gap-8 items-center justify-center relative">
            <img src="{{ asset('/assets/images/city-location.jpg') }}" alt="City Location Gps" class="rounded-lg w-[400px] lg:w-300px max-w-[600px]"
                width="400px">
            <div class="flex flex-col items-center text-center md:px-8">
                <h1
                    class="text-3xl font-bold text-gray-800 mt-3 md:mt-0 sm:text-4xl lg:text-6xl lg:leading-tight md:px-12 md:mb-4">
                    Comece a sua jornada com o <span class="text-blue-600">Wawa GPS</span></h1>
                {{-- <p class="mt-3 max-w-[300px] text-lg text-gray-800">A primeira e única ferramenta de geolocalização de
                    transportes públicos no território nacional. Encontre o seu autocarro e veja a rota que está percorrendo à qualquer momento e em qualquer lugar. <br> <br> Facilitamos a sua busca pelos autocarros e
                    ajudamos-te a saber a localização exata de todos wawas da banda em tempo real.  <br>
                <span class="font-semibold">Melhor é impossível!</span> Agora já não precisas te preocupar, consulte o nosso <a href="{{route('mapa')}}" class="text-indigo-600 font-semibold hover:underline">Mapa</a> e já está!</p> --}}

                <p class="mt-3 text-lg text-gray-700 leading-relaxed">
                    Diga adeus ao stress e olá à conveniência com o
                    <span class="font-semibold">Wawa GPS</span>!
                    Seja o mestre da sua jornada, acompanhando cada movimento dos transportes públicos em Angola,
                    diretamente no seu dispositivo.
                    Visualize rotas, antecipe chegadas e planeie os seus dias com precisão inédita.


                    {{-- Imagine ter o poder de saber exatamente onde cada "wawa" se encontra, a qualquer hora e em qualquer
                    lugar do país.
                    Não perca mais tempo precioso em paragens incertas.
                    <span class="font-semibold">A sua tranquilidade é a nossa prioridade!</span>
                    Explore o nosso <a href="{{ route('mapa') }}" class="text-indigo-600 font-semibold hover:underline">Mapa
                        Interativo</a> agora e descubra uma nova forma de se movimentar pela cidade! --}}
                </p>

                @if (Auth::user())
                    <x-link-primary href="{{ asset('mapa') }}" class="w-full md:w-72 mt-4 md:mt-8">
                    Começar Agora
                </x-link-primary>
                @else
                    <x-link-primary href="{{ asset('login') }}" class="w-full md:w-72 mt-4 md:mt-8">
                    Começar Agora
                </x-link-primary>
                @endif
            </div>

        </div>
        <!-- End Grid -->
    </div>

    <div class="p-4 md:p-8">
        <div class="bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-semibold text-indigo-700 mb-6">Bem-vindo ao Wawa GPS</h1>
            <p class="text-gray-700 leading-relaxed mb-4">
                A sua plataforma para acompanhar a localização em tempo real dos autocarros na banda.
                Imagine ter o poder de saber exatamente onde cada "wawa" se encontra, a qualquer hora e em qualquer
                lugar do país.

            </p>


            <div class="mt-8 space-y-4">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-indigo-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.995 1.995 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <p class="text-gray-600">Acompanhamento em tempo real da localização dos autocarros.</p>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <p class="text-gray-600">Visualização detalhada das linhas e seus trajetos.</p>
                </div>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-gray-600">Consulta de horários de partida e chegada.</p>
                </div>
            </div>

            <p class="text-gray-700 leading-relaxed my-4">Não perca mais tempo precioso em paragens incertas. Explore o
                nosso <span class="font-semibold capitalize">mapa interativo</span></a> e descubra uma nova forma de se
                movimentar pela cidade!
            </p>

            <div class="mt-8">
                <x-link-primary href="{{ route('mapa') }}">
                    Ver Mapa
                </x-link-primary>
            </div>
        </div>
    </div>
@endsection

@section('secondary-content')

    <section class="bg-gradient-to-br from-indigo-50 to-white py-12 md:py-20">
        <div class="max-w-screen-xl mx-auto px-4 md:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:gap-16">
                <div class="flex flex-col justify-center order-2 md:order-1">
                    <h2 class="text-2xl font-bold text-gray-800 sm:text-3xl lg:text-4xl mb-4">
                        Planeie as Suas Viagens com Inteligência: Descubra os Melhores Horários e Rotas!
                    </h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        Chega de correrias e horários incertos! O Wawa GPS vai além da localização em tempo real.
                        Explore a nossa funcionalidade de planeamento de viagens e descubra as rotas mais eficientes,
                        os horários de partida e chegada ideais e as paragens mais convenientes para o seu destino.
                    </p>
                    <ul class="space-y-2 text-gray-600 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Consulte horários detalhados por linha e paragem.
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Encontre as paragens mais próximas do seu ponto de partida e destino.
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Descubra as rotas otimizadas para chegar ao seu destino da forma mais rápida e eficiente.
                        </li>
                    </ul>
                    <x-link-primary href="{{ route('linhas.listar') }}" class="w-full sm:w-auto">
                        Explore as Linhas e Horários
                    </x-link-primary>
                </div>
                <div class="order-1 md:order-2">
                    <img class="rounded-lg shadow-md" src="{{ asset('/assets/images/plan.jpg') }}"
                        alt="Planeamento de viagens no Wawa GPS">
                </div>
            </div>
        </div>
    </section>



    <div class="max-w-[85rem] px-4 lg:px-40 py-10 sm:px-6 lg:py-14 mx-auto">
        <div class="grid items-center lg:grid-cols-12 gap-6 lg:gap-12">
            <div class="lg:col-span-4">
                <div class="lg:pe-6 xl:pe-12">
                    <p class="text-6xl font-bold leading-10 text-blue-600">
                        {{ $totalUtilizadoresAtivos }}
                        <span
                            class="ms-1 inline-flex items-center gap-x-1 bg-gray-200 font-medium text-gray-800 text-xs leading-4 rounded-full py-0.5 px-2">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M9.05 8.75a.75.75 0 0 0-1.5 0V5.5a.75.75 0 0 0 1.5 0v3.25z" />
                                <path d="M7.5 12a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z" />
                            </svg>
                            {{ $percentagemUtilizadoresAtivosMesPassado > 0 ? '+' : '' }}{{ round($percentagemUtilizadoresAtivosMesPassado, 1) }}%
                            no último mês
                        </span>
                    </p>
                    <p class="mt-2 sm:mt-3 text-gray-500">utilizadores ativos a explorar a rede de transportes com Wawa
                        GPS.</p>
                </div>
            </div>
            <div
                class="lg:col-span-8 relative lg:before:absolute lg:before:top-0 lg:before:-start-12 lg:before:w-px lg:before:h-full lg:before:bg-gray-200 lg:">
                <div class="grid gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-3 sm:gap-8">
                    <div>
                        <p class="text-3xl font-semibold text-blue-600">{{ $totalLinhasRegistadas }}</p>
                        <p class="mt-1 text-gray-500">linhas de autocarro registadas na nossa plataforma.</p>
                    </div>
                    <div>
                        <p class="text-3xl font-semibold text-blue-600">{{ $totalParagensRegistadas }}</p>
                        <p class="mt-1 text-gray-500">paragens de autocarro mapeadas para facilitar a sua viagem.</p>
                    </div>
                    <div>
                        <p class="text-3xl font-semibold text-blue-600">{{ round($mediaAvaliacoesLinhas, 1) }} <span
                                class="text-sm text-gray-500">(média)</span></p>
                        <p class="mt-1 text-gray-500">avaliação média das linhas pelos nossos utilizadores.</p>
                    </div>
                    @if (isset($totalLocalizacoesTempoReal))
                        <div>
                            <p class="text-3xl font-semibold text-blue-600">{{ $totalLocalizacoesTempoReal }}+</p>
                            <p class="mt-1 text-gray-500">atualizações de localização em tempo real por dia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



    <section class="py-16 bg-indigo-50">
        <div class="max-w-screen-xl mx-auto px-4 md:px-8 flex flex-col lg:flex-row items-center gap-12">
            <div class="lg:w-1/2 text-center lg:text-left">
                <h2 class="text-3xl font-bold text-indigo-800 sm:text-4xl lg:text-5xl mb-6">
                    Acessibilidade Total: Informação Essencial na Ponta dos Seus Dedos!
                </h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    Com o Wawa GPS, a informação crucial sobre os transportes públicos de Angola está sempre acessível.
                    Seja através do nosso website intuitivo ou da nossa aplicação móvel otimizada, garantimos que você tenha
                    todas as ferramentas necessárias para se locomover com confiança, a qualquer hora e em qualquer lugar.
                </p>
                <div class="space-y-4 sm:space-y-0 sm:flex sm:gap-4">
                    <x-link-primary href="{{ asset('register') }}" class="w-full sm:w-auto">
                        Criar uma Conta
                    </x-link-primary>
                    <x-link-secondary href="#" class="w-full sm:w-auto">
                        Baixar a App (Em Breve)
                    </x-link-secondary>
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="relative rounded-lg shadow-xl overflow-hidden">
                    <img class="w-full h-auto object-cover" src="{{ asset('/assets/images/vect (3).jpg') }}"
                        alt="Website e App Wawa GPS em diferentes dispositivos">
                    <div class="absolute inset-0 bg-indigo-600 bg-opacity-20 backdrop-blur-sm"></div>
                </div>
            </div>
        </div>
    </section>


    <div class="bg-indigo-100 rounded-lg p-6">
        <h2 class="text-xl font-semibold text-indigo-700 mb-2">Novidades e Destaques</h2>
        <p class="text-gray-700 text-sm leading-relaxed">
            Fique por dentro das últimas atualizações da nossa plataforma, novas funcionalidades e informações importantes
            sobre os nossos serviços de autocarros.
        </p>
        <ul class="list-disc list-inside mt-2 text-gray-600 text-sm">
            <li>Melhorias na precisão da localização em tempo real.</li>
            <li>Adição de informações sobre atrasos e desvios de rota.</li>
            <li>Interface do mapa otimizada para dispositivos móveis.</li>
        </ul>
    </div>
@endsection
