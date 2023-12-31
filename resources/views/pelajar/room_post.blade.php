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
        {{-- <div class="hidden space-x-4 bg-transparent md:bg-transparent w-full md:flex md:justify-between md:items-center md:w-auto" id="menu">
            <a class="flex items-center no-underline transform duration-200 hover:no-underline hover:opacity-80" href="{{ url('/') }}">
                <span class="self-center md:text-4xl text-3xl text-blue-1081E8 font-signika font-bold whitespace-nowrap transition-colors duration-300 transform">Quiz Play</span>
            </a>
            <ul class="pt-4 md:flex md:justify-between md:pt-0 text-base text-black font-semibold">
                <li>
                    <a class="xl:p-4 md:p-2 py-2 block no-underline opacity-50 duration-300 transform hover:opacity-100 hover:text-underline" href="{{ url('/') }}">Home</a>
                </li>
            </ul>
        </div> --}}
        <div class="flex md:flex-row space-x-2">
            @auth
            <h2 class="font-sans font-semibold text-center text-black text-lg">
                {{auth()->user()->username}}
            </h2>
            @endauth
        </div>
    </nav>

    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="py-2 w-full px-5 space-y-5 rounded-xl">     
                
                <div class="flex justify-center items-center">
                    <div class="w-auto bg-color-F4F2DE py-1.5 px-2 rounded-lg shadow">
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            {{ $name->room }}
                        </h2>
                    </div>
                </div>  
                
                <div class="py-2 w-full px-5 space-y-5 bg-color-F4F2DE rounded-xl">
                    
                <form class="font-roboto" method="POST" action="{{ url('/pelajar/room/'.$link->id.'/room_post') }}" onsubmit="return confirmSubmit()" enctype="multipart/form-data">    

                    @csrf
                    
                    @php $no=0; @endphp
                    @foreach ($quizzes as $row)
                    @php $no++; @endphp     
                                  
                    <input type="hidden" value="{{$row->id}}" name="id_quiz[]"> 
                    
                        <div class="overflow-hidden flex flex-col rounded-xl py-4 space-y-1">
                            <div class="font-sans text-black inline-flex space-x-1">
                                <p class="text-md">
                                    {{ $no }}.
                                </p>
                                <p class="text-lg">
                                    {!! $row->question !!} 
                                </p>
                            </div>
                            <img class="w-56 h-auto items-center justify-center" src="{{ asset ('quiz/'.$row->image) }}" alt="{{ $row->image }}">
                            
                            <div class="relative z-0 group">
    
                                <div class="flex items-center space-x-2">
                                    <input value="a" {{ old('answer') == "A" ?? "checked" }} name="answer[{{ $row->id }}]" type="radio" id="answer" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                    <label for="jawaban1" class="w-full text-md font-sans text-black">
                                        {{ $row->a }}
                                    </label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input value="b" {{ old('answer') == "B" ?? "checked" }} name="answer[{{ $row->id }}]" type="radio" id="answer" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                    <label for="jawaban2" class="w-full text-md font-sans text-black">
                                        {{ $row->b }}
                                    </label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input value="c" {{ old('answer') == "C" ?? "checked" }} name="answer[{{ $row->id }}]" type="radio" id="answer" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                    <label for="jawaban3" class="w-full text-md font-sans text-black">
                                        {{ $row->c }}
                                    </label>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <input value="d" {{ old('answer') == "D" ?? "checked" }} name="answer[{{ $row->id }}]" type="radio" id="answer" class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300">
                                    <label for="jawaban4" class="w-full text-md font-sans text-black">
                                        {{ $row->d }}
                                    </label>
                                </div>
                            </div>
    
                            @endforeach
                        
                        </div>
    
                        <button type="submit" class="group relative flex w-min justify-center rounded-md bg-green-400 px-3 py-2 text-base font-normal text-white hover:bg-white hover:text-green-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600 shadow shadow-green-600 hover:shadow-white">
                            Kirim
                        </button>
    
                    </form>

                </div>                
            </div>        
        </div>
    </section>

    {{ View::make('footer') }}

</body>

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