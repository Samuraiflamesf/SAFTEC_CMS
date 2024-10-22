@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
    <div class="m-8">
        <div class="flex justify-center items-center">
            <div class="text-center max-w-6xl mx-10">
                <h1 class="my-3 text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">
                    Documentos de Gestão da Qualidade
                </h1>
            </div>
        </div>
        <div class="max-w-5xl mx-auto mt-10">
            <div class="text-2xl py-3 px-3 mb-4 mt-5 bg-white
         rounded shadow-md border-b-teal-400 border-b-4">
                Formulários BPA
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card 1 -->
                <div class="bg-white p-4 shadow-md rounded-md border hover:bg-neutral-100">
                    <h2 class="text-lg font-semibold">BPA FARMACÊUTICO</h2>
                    <p class="text-gray-500 mt-2">Data: 29/03/2023</p>
                </div>
                <!-- Card 2 -->
                <div class="bg-white p-4 shadow-md rounded-md border hover:bg-neutral-100">
                    <h2 class="text-lg font-semibold">BPA ASSISTENTE SOCIAL</h2>
                    <p class="text-gray-500 mt-2">Data: 29/03/2023</p>
                </div>
                <!-- Card 3 -->
                <div class="bg-white p-4 shadow-md rounded-md border hover:bg-neutral-100">
                    <h2 class="text-lg font-semibold">BPA CONSULTA OFTALMOLÓGICA</h2>
                    <p class="text-gray-500 mt-2">Data: 29/03/2023</p>
                </div>

            </div>

            <!-- Boletins Informativos -->
            <div class="text-2xl py-3 px-3 mb-4 mt-5 bg-white
         rounded shadow-md border-b-teal-400 border-b-4">
                Boletins Informativos emitidos
            </div>
            <div>
                <div class="mt-2 bg-yellow-100 text-yellow-800 p-4 rounded border-2" role="alert">
                    Nenhum arquivo PDF encontrado no banco de dados.
                </div>
            </div>
        </div>
    </div>
@endsection
