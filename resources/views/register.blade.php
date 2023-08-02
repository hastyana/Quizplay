<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset ('img/logo.png') }}">
    <title>Register | Quiz Play</title>
</head>

<body class="bg-gradient-to-r bg-blue-2F308B">
    
    <section class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-max">

            @include('errors.message')
        
            <div class="grid grid-cols-1 md:grid-cols-2 justify-center items-center gap-2">
                <div>
                    <img src={{asset('img/illus2.png')}} alt="ilustrasi" class="h-auto w-auto">
                </div>
                <div>    
                    <h2 class="py-5 text-center text-3xl font-roboto font-bold tracking-tight text-gray-400">
                        Register
                    </h2>                  
                    <form class="py-5 space-y-6" action="{{ url('/register') }}" method="POST" onsubmit="return confirmSubmit()" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="remember" value="true">
                        <div class="space-y-2 rounded-md shadow-sm">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input value="{{ old('name') }}" id="name" name="name" type="text" required class="relative block w-full rounded-md border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Name">
                            </div>
                            <div>
                                <label for="username" class="sr-only">Username</label>
                                <input value="{{ old('username') }}" id="username" name="username" type="text" required class="relative block w-full rounded-md border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Username">
                            </div>
                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input value="{{ old('email') }}" id="email" name="email" type="email" required class="relative block w-full rounded-md border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Email">
                            </div>
                            <div>
                                <p class="font-normal py-2 text-sm md:text-start text-red-500">
                                    *The password field must be at least 8 characters
                                </p>
                                <label for="password" class="sr-only">Password</label>
                                <input value="{{ old('password') }}" id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full rounded-md border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Password">
                            </div>
                            <div>
                                <p class="font-normal py-2 text-sm md:text-start text-red-500">
                                    *The re-password must match with password
                                </p>
                                <label for="password_confirmation" class="sr-only">Re-password</label>
                                <input value="{{ old('password_confirmation') }}" id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required class="relative block w-full rounded-md border-0 py-1.5 text-black-1E1E1E placeholder:text-black placeholder:opacity-50 sm:text-sm sm:leading-6 px-3 bg-gray-300" placeholder="Re-password">
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="group relative flex w-full justify-center rounded-md bg-green-400 px-3 py-2 text-sm font-semibold text-white hover:text-black hover:bg-gray-300 duration-200 shadow shadow-green-200 hover:shadow-gray-300">
                                Register
                            </button>
                        </div>
                    </form>
                    <div>
                        <p class="text-center text-base tracking-tight text-black">
                            Sudah memiliki akun
                            <a href="{{ url('/') }}" class="text-base text-orange-400 hover:opacity-50 duration-200">
                                login sekarang
                            </a>          
                        </p>
                    </div>
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

</html>