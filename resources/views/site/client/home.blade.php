@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <section class="py-12 flex items-center justify-center text-gray-900">
        <div class="mx-auto max-w-[43rem]">
            <div class="text-center">
                <div
                    class="border border-indigo-600 w-64 mx-auto rounded-full flex justify-center items-center mb-2 bg-white ">
                    <span id="clock" class="font-inter font-medium text-gray-900 py-2 text-center text-xl tracking-wide">
                        15:30:55
                    </span>
                </div>

                <h1 class="mt-3 text-[3rem] font-bold leading-[4rem] tracking-tight text-black" id="saudacao">
                    <div class="col align-self-start" id="saudacao"></div>
                </h1>
                <p class="mt-3 text-lg leading-relaxed text-indigo-600/9">
                    <?php
                    $frases = ['A coragem não é a ausência de medo, mas a conquista dele.', 'O fracasso é a oportunidade de começar de novo, com mais inteligência.', 'A vida é curta para se preocupar com coisas que não importam. - Mark Twain', 'Não existe um caminho para a felicidade. A felicidade é o caminho.', 'Você não fracassa até desistir. - George Herbert', 'Não há obstáculo que possa resistir a uma mente determinada. - Napoleon Hill', 'Se você acredita, você pode alcançar. - Jack Nicklaus', 'A vida começa fora da sua zona de conforto. - Neale Donald Walsch', 'O sucesso é a soma de pequenos esforços repetidos dia após dia. - Robert Collier', 'Se você quer ser bem sucedido, precisa desenvolver uma paixão por seu trabalho. - Steve Jobs', 'A maior barreira para o sucesso é a falta de confiança em si mesmo. - Socrates', 'Não há nada de impossível para alguém que tem a coragem de tentar. - Nick Vujicic', 'Não importa o quão lentamente você vá, desde que não pare. - Confúcio.', ''];

                    $hoje = date('z');
                    $frase_do_dia = $frases[$hoje % count($frases)];

                    echo "$frase_do_dia";
                    ?>
                </p>
            </div>

            <div class="mt-6 flex items-center justify-center gap-4">
                <a href="{{ route('site.document') }}"
                    class="transform rounded-md bg-indigo-600/95 px-5 py-3 font-medium text-white transition-colors hover:bg-sky-200 hover:text-slate-900 ">
                    Documentos
                </a>
                <a href="{{ route('site.phone') }}"
                    class="transform rounded-md border border-slate-200 px-5 py-3 font-medium text-slate-800 hover:text-slate-900 transition-colors bg-sky-300 hover:bg-slate-50">
                    Ramais
                </a>
            </div>
        </div>
    </section>
    <div class="max-w-4xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Aniversariantes do Mês -->
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-300">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Aniversariantes do Mês</h2>
            <div class="space-y-3">
                @foreach ($users as $user)
                    <div class="flex justify-between items-center border-b border-gray-300 pb-2 mb-2 hover:bg-neutral-100">
                        <span class="truncate">{{ $user->name }}</span>
                        <span class="bg-indigo-600/95 text-white text-sm px-3 py-1 rounded-full">
                            {{ \Carbon\Carbon::parse($user->date_birthday)->format('d/m') }}
                        </span>
                    </div>
                @endforeach


            </div>
        </div>

        <!-- Links -->
        <div class="bg-white shadow-md rounded-lg p-6 border border-gray-300">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Links</h2>
            <div class="space-y-3">
                @foreach ($links as $link)
                    <a href="{{ $link->url }}" target="_blank"
                        class="block bg-indigo-100 text-indigo-900 text-center py-2 rounded-md transition duration-200 hover:bg-indigo-200">{{ $link->name }}</a>
                @endforeach
            </div>
        </div>

    </div>

    <script>
        function updateGreeting() {
            var now = new Date();
            var hours = now.getHours();
            var greeting;
            if (hours < 12) {
                greeting = "Bom dia! ☀️";
            } else if (hours < 18) {
                greeting = "Boa tarde! 🌅";
            } else {
                greeting = "Boa noite! 🌚";
            }
            document.getElementById("saudacao").innerHTML = greeting;
        }
        updateGreeting()
        setInterval(updateGreeting, 1000);

        function updateClock() {
            const clockElement = document.getElementById('clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000); // Atualiza a cada segundo
        updateClock(); // Atualiza imediatamente quando a página carrega
    </script>


@endsection
