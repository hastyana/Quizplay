<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <title>Play Quiz</title>
</head>

<body class="bg-gradient-to-r bg-blue-2F308B">
    
    <nav id="navbar" class="flex flex-wrap items-center justify-between w-full space-x-4 py-4 px-5 md:px-10 text-lg text-black-1E1E1E bg-white-fafafa mt-0 z-10 top-0">
        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block text-black-1E1E1E shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>        
        <div class="hidden space-x-4 bg-transparent md:bg-transparent w-full md:flex md:justify-between md:items-center md:w-auto" id="menu">
            <a class="flex items-center no-underline transform duration-200 hover:no-underline hover:opacity-80" href="{{ url('/pelajar') }}">
                <span class="self-center md:text-4xl text-3xl text-blue-1081E8 font-signika font-bold whitespace-nowrap transition-colors duration-300 transform">Quiz Play</span>
            </a>
            <ul class="pt-4 md:flex md:justify-between md:pt-0 text-base text-black font-semibold">
                <li>
                    <a class="xl:p-4 md:p-2 py-2 block no-underline opacity-50 duration-300 transform hover:opacity-100 hover:text-underline" href="{{ url('/pelajar') }}">Home</a>
                </li>
            </ul>
        </div>
        <div class="flex md:flex-row space-x-2">
            @auth
            <h2 class="font-sans font-semibold text-center text-black text-lg">
                {{auth()->user()->username}}
            </h2>
            <a href="{{ url('logout') }}" class="group relative flex w-auto justify-center rounded-full bg-black duration-200 hover:bg-gray-400 text-blue-2F308B font-semibold text-sm px-2 py-1">
                Logout
            </a>
            @endauth
        </div>
    </nav>

    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="w-full py-0 px-5 space-y-5">
                <div class="flex justify-center items-center pb-5">
                    <div class="w-auto py-1.5 px-2">
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Selamat anda sudah menyelesaikan semua soal
                        </h2>
                    </div>
                </div>                     
                <!-- New Table -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto bg-color-F4F2DE px-2 py-2">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-black uppercase border-b border-gray-400">
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Soal</th>
                                    <th class="px-4 py-3">Jawaban</th>
                                    <th class="px-4 py-3">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white-fafafa divide-y divide-gray-400">

                                @php $no=0; @endphp
                                @foreach ($table as $row)
                                @php $no++; @endphp

                                <tr class="text-black">
                                    <td class="px-4 py-3 text-sm">
                                        {{ $no }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {!! $row->question !!} 
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->answer }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $row->desc }}
                                    </td>
                                </tr>
                                
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>       
        </div>
    </section>

    <section class="py-10 overflow-hidden h-screen">
        <div class="container mx-auto flex justify-center">
            <div class="pb-1 px-10 max-w-xl">
                <div class="space-y-2 rounded-md shadow-sm flex flex-col justify-center items-center">
                    <a href="{{ url('/pelajar/room/'.$done->id.'/standing') }}" class="px-4 py-2 text-lg text-blue-2F308B group relative flex w-auto justify-center rounded-lg hover:opacity-50 bg-blue-400">
                        Ranking
                    </a>
                    <a href="{{ url('/pelajar') }}" class="px-4 py-2 text-lg text-blue-2F308B group relative flex w-auto justify-center rounded-lg hover:opacity-50 bg-green-400">
                        Home
                    </a>
                </div>
            </div>            
        </div>
    </section>

    {{ View::make('footer') }}

</body>

{{-- confirmsubmit --}}
<script>
    function confirmSubmit () {
        var r = confirm ('Anda yakin kode yang dimasukkan sudah benar ?');
        if (r) {
            return true;
        } else {
            return false;
        }
    }
</script>
{{-- Mobile Menu --}}
<script type="text/javascript">
    const button = document.querySelector('#menu-button');
    const menu = document.querySelector('#menu');
    button.addEventListener('click', () => {
    menu.classList.toggle('hidden');
    });
</script>
{{-- Dropdown Menu --}}
<script type="text/javascript">
    const dropdown = document.querySelector('#dropdown-button');
    const dropmenu = document.querySelector('#dropdown-menu');
    dropdown.addEventListener('click', () => {
    dropmenu.classList.toggle('hidden');
    });
</script>

</html>