<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <title>Dashboard Guru | Play Quiz</title>
</head>

<body class="bg-gradient-to-r bg-blue-2F308B">
    
    <nav id="navbar" class="flex flex-wrap items-center justify-between w-full space-x-4 py-4 px-5 md:px-10 text-lg text-black-1E1E1E bg-white-fafafa mt-0 z-10 top-0">
        <svg xmlns="http://www.w3.org/2000/svg" id="menu-button" class="h-6 w-6 cursor-pointer md:hidden block text-black-1E1E1E shadow-lg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>        
        <div class="hidden space-x-4 bg-transparent md:bg-transparent w-full md:flex md:justify-between md:items-center md:w-auto" id="menu">
            <a class="flex items-center no-underline transform duration-200 hover:no-underline hover:opacity-80" href="{{ url('/') }}">
                <span class="self-center md:text-4xl text-3xl text-blue-1081E8 font-signika font-bold whitespace-nowrap transition-colors duration-300 transform">Quiz Play</span>
            </a>
            <ul class="pt-4 md:flex md:justify-between md:pt-0 text-base text-black font-semibold">
                <li>
                    <a class="xl:p-4 md:p-2 py-2 block no-underline opacity-50 duration-300 transform hover:opacity-100 hover:text-underline" href="{{ url('/') }}">Home</a>
                </li>
            </ul>
        </div>
        <div class="flex md:flex-row space-x-2">
            @auth
            <h2 class="font-sans font-semibold text-center text-black text-lg">
                {{auth()->user()->username}}
            </h2>
            <a href="{{ url('logout') }}" class="group relative flex w-auto justify-center rounded-full bg-orange-400 duration-200 hover:bg-gray-400 text-black font-semibold text-sm px-2 py-1">
                Logout
            </a>
            @endauth
        </div>
    </nav>

    <section class="py-20 overflow-hidden h-screen">
        <div class="container mx-auto flex justify-center">
            <div class="py-0 w-full px-5 space-y-5">                   
                <!-- Form -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs py-5">
                            
                    @include('errors.message')

                    <form class="py-5 font-roboto px-5 bg-purple-1F4B9D rounded-xl space-y-2" method="POST" action="{{ url('/guru/room_add') }}" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                        
                        @csrf
                        
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-white">
                            Input Room
                        </h2>
                        <div>
                            <label for="room" class="sr-only">Room Name</label>
                            <input value="{{ old('room') }}" id="room" name="room" type="text" required class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="Room Name">
                        </div>
                        <div>
                            <label for="code" class="sr-only">Room Code</label>
                            <input value="{{ old('code') }}" id="code" name="code" type="password" autocomplete="current-password" required class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="Room Code">
                        </div>
                        <button type="submit" class="group relative flex w-auto justify-center rounded-lg bg-white px-3 py-2 text-sm font-normal text-black hover:opacity-50 duration-200">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="flex justify-end items-center">
                    <a href="{{ url('/guru') }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
                        < <span class="px-2"> | </span> Back
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
        var r = confirm ('lanjutkan penyimpanan data ?');
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