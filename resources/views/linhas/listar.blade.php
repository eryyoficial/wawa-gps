@extends('layouts.app')

@section('title', 'Linhas de Autocarro')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-semibold text-indigo-700 mb-4">Linhas de Autocarro</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (count($linhas) > 0)
            <ul class="space-y-3">
                @foreach ($linhas as $linha)
                    <li class="bg-gray-100 rounded-md p-3 flex items-center justify-between">
                        <div>
                            <h3 class="font-semibold text-indigo-600">{{ $linha->numero }} - {{ $linha->destino }}</h3>
                            <p class="text-gray-500 text-sm">Total de paragems: {{ count($linha->paragems) }}</p>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('linhas.detalhes', $linha->id) }}"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-md text-sm transition duration-300">
                                Detalhes
                            </a>
                            {{-- Adicione outros botões/links conforme necessário (editar, excluir, etc.) --}}
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">Não existem linhas de autocarro registadas.</p>
        @endif

        <div class="mt-6 flex items-center justify-between w-full">
            <div class="flex gap-4">
                <a href="{{ route('paragems.listar') }}" class="text-indigo-500 hover:underline">Ver Paragens</a>
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
