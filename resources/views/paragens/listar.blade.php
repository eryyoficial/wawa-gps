@extends('layouts.app')

@section('title', 'paragems de Autocarro')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-semibold text-indigo-700 mb-4">Paragens de Autocarro</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(count($paragems) > 0)
            <ul class="space-y-3">
                @foreach($paragems as $paragem)
                    <li class="bg-gray-100 rounded-md p-3 flex items-center justify-between">
                        <div>
                            <h3 class="font-semibold text-indigo-600">{{ $paragem->nome }}</h3>
                            <p class="text-gray-500 text-sm">Linha: {{ $paragem->linha->numero }} - {{ $paragem->linha->destino }}</p>
                            <p class="text-gray-500 text-sm">Localização: {{ $paragem->latitude }}, {{ $paragem->longitude }}</p>
                        </div>
                        {{-- Adicione botões/links conforme necessário --}}
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">Não existem paragems de autocarro registadas.</p>
        @endif

        <div class="mt-6 flex items-center justify-between w-full">
            <div class="flex gap-4">
                <a href="{{ route('linhas.listar') }}" class="text-indigo-500 hover:underline">Ver Linhas</a>
                <a href="{{ route('mapa') }}" class="text-indigo-500 hover:underline">Ir em Mapa</a>
            </div>
            <a href="{{ route('home') }}" class="text-indigo-500 hover:underline">Voltar à página inicial</a>
            {{--  <x-link-primary>
                Voltar à página inicial
            </x-link-primary>
            <x-link-primary>
                Ver Mapa
            </x-link-primary> --}}
        </div>
    </div>
@endsection