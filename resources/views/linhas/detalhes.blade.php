@extends('layouts.app')

@section('title', 'Detalhes da Linha')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-indigo-700">Linha {{ $linha->numero }}</h1>
                <p class="text-gray-600 mt-1">Destino: <span class="font-semibold">{{ $linha->destino }}</span></p>
                <p class="text-gray-500 text-sm">ID: {{ $linha->id }}</p>
                {{-- Exibir outros detalhes da linha relevantes aqui --}}
            </div>
            <div class="space-x-2">
                {{-- <a href="#"
                    class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Adicionar aos Favoritos
                </a> --}}
                <a href="{{ route('mapa', ['linha' => $linha->id]) }}"
                    class="inline-flex items-center bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-3 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.995 1.995 0 01-2.828 0L6.343 16.657a9 9 0 1112.728 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Ver no Mapa
                </a>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Paragens da Linha:</h3>
            @if (count($linha->paragems) > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach ($linha->paragems->sortBy('ordem') as $paragem)
                        <li class="flex items-center justify-between bg-gray-100 rounded-lg mb-2 p-3">
                            <div class="">
                                <span class="font-semibold text-indigo-600">{{ $paragem->nome }}</span>
                                <p class="text-gray-500 text-sm">{{ $paragem->latitude }}, {{ $paragem->longitude }}</p>
                                {{-- Outros detalhes da paragem --}}
                            </div>
                            <div class="space-x-2">
                                <a href="{{ route('linhas.detalhes', $linha->id) }}"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md text-sm transition duration-300">
                                    Detalhes
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">Não existem paragens associadas a esta linha.</p>
            @endif
        </div>

        <div class="mt-8 border-t pt-6">
            <div class="flex items-center justify-between w-full">
                <a href="{{ route('linhas.listar') }}" class="text-indigo-500 hover:underline">Voltar à Lista de Linhas</a>
                <a href="{{ route('home') }}" class="text-indigo-500 hover:underline">Página Inicial</a>
            </div>
        </div>
    </div>
@endsection
