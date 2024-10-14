@extends('layouts.admin')

@section('title', 'Painéis SAFTEC')

@section('content')

    <div class="flex justify-center items-center">
        <div class="text-center max-w-6xl mx-10">
            <h1 class="my-3 text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">
                Painéis de Power BI e Códigos
            </h1>
        </div>
    </div>
    <div class="container flex mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
            @foreach ($painels as $painel)
                <div class="flex flex-col justify-center items-center bg-gray-100">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-lg w-full">
                        <img src="{{ Storage::url($painel->img) }}" alt="{{ $painel->name }}" class="w-full h-36 object-cover">
                        <div class="p-4">
                            <div class="flex flex-col items-center space-y-4">
                                <h2 class="text-2xl font-semibold text-gray-800">{{ $painel->name }}</h2>
                                <a href="{{ $painel->url }}"
                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Ver detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>


    </div>

@endsection
