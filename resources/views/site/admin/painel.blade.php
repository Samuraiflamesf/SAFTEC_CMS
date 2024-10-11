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

            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" /> <!-- Adjust size as needed -->
                <h2 class="text-lg font-semibold text-center">Medicamentos a Vencer</h2>
                <div class="flex-grow"></div> <!-- Spacer to push button down -->
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded w-100">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Controle de Aquisição</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Metas FESF</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Desempenho CEAF</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Sistema de Inventário</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Estoque SIGAF x SIMPAS</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Vistoria dos NRS e BRS</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4 flex flex-col items-center">
                <img src="path/to/image.png" alt="Icon" class="w-16 h-16 mb-2" />
                <h2 class="text-lg font-semibold text-center">Projeto Correios</h2>
                <div class="flex-grow"></div>
                <button class="flex items-center justify-center bg-green-500 text-white py-2 px-4 rounded">
                    Ver detalhes
                </button>
            </div>
        </div>


    </div>

@endsection
