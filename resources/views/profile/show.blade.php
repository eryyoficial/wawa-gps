@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-semibold text-indigo-700 mb-6 uppercase">Meu Perfil</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 py-3 px-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('status'))
            <div class="bg-green-200 text-green-800 py-3 px-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <h3 class="mt-8 mb-2 text-gray-800 font-semibold text-xl">Informações Pessoais</h3>
        <div class="mb-4">
            <p class="text-gray-600">
                <span class="font-semibold">Nome:</span> {{ $user->name }}
            </p>
            <p class="text-gray-600">
                <span class="font-semibold">Email:</span> {{ $user->email }}
            </p>
            @if ($user->created_at)
                <p class="text-gray-600">
                    <span class="font-semibold">Membro desde:</span> {{ $user->created_at->format('d/m/Y') }}
                </p>
            @endif
            @if ($user->updated_at)
                <p class="text-gray-600">
                    <span class="font-semibold">Última atualização:</span> {{ $user->updated_at->format('d/m/Y H:i') }}
                </p>
            @endif
        </div>

        <div class="flex gap-2 items-center mt-4 mb-16">
            <x-link-primary href="{{ route('profile.edit') }}">
                Editar Perfil
            </x-link-primary>
            <x-link-secondary href="{{ route('profile.edit.password') }}">
                Alterar Senha
            </x-link-secondary>
        </div>
    </div>
@endsection
