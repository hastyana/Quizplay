<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
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
            <a href="{{ url('logout') }}" class="group relative flex w-auto justify-center rounded-full bg-black duration-200 hover:bg-gray-400 text-blue-2F308B font-semibold text-sm px-2 py-1">
                Logout
            </a>
            @endauth
        </div>
    </nav>

    <section class="py-10 overflow-hidden">
        <div class="container mx-auto flex justify-center">
            <div class="py-0 w-full px-5 space-y-5">                   
                <!-- Form -->
                <div class="w-full overflow-hidden rounded-lg shadow-xs py-5">
                            
                    @include('errors.message')

                    <form class="py-5 font-roboto px-5 bg-color-F4F2DE rounded-xl space-y-2" method="POST" action="{{ url('guru/room/'.$link->id.'/quiz_add') }}" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                        
                        @csrf
                        
                        <h2 class="md:text-2xl text-lg font-sans font-semibold text-center text-black">
                            Input Soal Quiz
                        </h2>
                        <div>
                            <p class="font-normal py-2 md:text-start text-black">
                                Soal
                            </p>
                            <label for="question" class="sr-only">Soal</label>
                            <textarea id="question" name="question" type="text" required class="ckeditor relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white"> {{ old('question') }} </textarea>
                        </div>
                        <p class="font-normal py-2 md:text-start text-black text-xs">
                            *Cara Input Option Soal Pilihan Ganda : <br>
                            A. Jawaban &nbsp;      C. Jawaban <br>
                            B. Jawaban &nbsp;      D. Jawaban <br><br>
                            *Cara Pengisian Soal True or False : <br>
                            true <br>
                            false <br>
                            untuk input opsi C dan D tidak usah diisi 
                        </p>
                        <div>
                            <label for="a" class="sr-only">A</label>
                            <input value="{{ old('a') }}" id="a" name="a" type="text" class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="A">
                        </div>
                        <div>
                            <label for="b" class="sr-only">B</label>
                            <input value="{{ old('b') }}" id="b" name="b" type="text" class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="B">
                        </div>
                        <div>
                            <label for="c" class="sr-only">C</label>
                            <input value="{{ old('c') }}" id="c" name="c" type="text" class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="C">
                        </div>
                        <div>
                            <label for="d" class="sr-only">D</label>
                            <input value="{{ old('d') }}" id="d" name="d" type="text" class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="D">
                        </div>
                        <div>
                            <p class="font-normal py-2 md:text-start text-black text-xs">
                                *isi kunci jawaban dengan opsi, misal : a/b/c/d
                            </p>
                            <label for="key" class="sr-only">Kunci Jawaban</label>
                            <input value="{{ old('key') }}" id="key" name="key" type="text" required class="relative block w-full rounded-lg border-0 py-1.5 text-black placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-white" placeholder="Kunci Jawaban">
                        </div>
                        <div>
                            <p class="font-normal text-xs py-2 md:text-start text-red-600">
                                *opsional tidak harus dengan gambar
                            </p>
                            <input class="block w-full text-sm text-gray-600 bg-white rounded-lg cursor-pointer focus:outline-none py-1 px-1" id="image" name="image" type="file">
                            <p class="font-normal text-xs py-2 md:text-start text-red-600">
                                *upload dengan format .jpg, .jpeg, .png, .gif, dan .svg <br>
                                *max file size 2MB
                            </p>
                        </div>
                        <button type="submit" class="group relative flex w-auto justify-center rounded-lg bg-green-400 px-3 py-2 text-sm font-normal text-color-F4F2DE hover:opacity-50 duration-200">
                            Submit
                        </button>
                    </form>
                </div>
                <div class="flex justify-end items-center">
                    <a href="{{ url ('guru/room', $link->id) }}" type="button" class="group relative flex w-auto justify-center rounded-md bg-orange-400 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-400 shadow shadow-gray-400 duration-200">
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
{{-- Textarea Editor --}}
<script>
    CKEDITOR.replace( 'editor' );
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