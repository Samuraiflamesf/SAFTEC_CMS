@extends('layouts.admin')

@section('title', 'Home')

@section('content')
    <main class="flex flex-1 w-full flex-col items-center justify-center text-center px-4 mt-12">

        <h1 class="mx-auto max-w-4xl font-display text-4xl font-bold tracking-normal text-slate-900 sm:text-4xl">
            Superintendência de Assistência Farmacêutica, Ciência e Tecnologia –
            <span class="relative whitespace-nowrap text-blue-400">
                <svg aria-hidden="true" viewBox="0 0 418 42" class="absolute top-2/3 left-0 h-[0.58em] w-full fill-blue-300/70"
                    preserveAspectRatio="none">
                    <path
                        d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z">
                    </path>
                </svg>
                <span class="relative">Saftec</span>
            </span>
        </h1>
        <dl class="mt-8 grid grid-cols-3 gap-0.5 overflow-hidden rounded-2xl text-center ">
            <div class="flex flex-col bg-slate-500 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">
                    Unidades</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">55</dd>
            </div>
            <div class="flex flex-col bg-slate-500 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">Nucleos e bases</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">28</dd>
            </div>

            <div class="flex flex-col bg-slate-500 p-8">
                <dt class="text-sm font-semibold leading-6 text-gray-300">unidades com sistema</dt>
                <dd class="order-first text-3xl font-semibold tracking-tight text-white">{{ $count }}</dd>
            </div>
        </dl>

        <div class="max-w-3xl mx-auto mt-4">
            <h1 class="text-2xl font-semibold mb-6">Links Mais Utilizados</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($links as $link)
                    <a href="{{ $link->url }}"
                        class="block bg-white p-4 rounded-lg shadow hover:bg-gray-50 transition duration-300">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $link->name }}</h2>
                    </a>
                @endforeach

            </div>
        </div>




    @endsection
