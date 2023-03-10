<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Testik || Login</title>
</head>
<body>
    <div class=" mt-9 md:mt-0 flex flex-col md:flex-row h-screen bg-gray-200">
        <div class="bg-white w-full md:w-1/3 flex justify-center items-center">
            <div class="w-4/5">
                <img src="{{ asset('img/TestikLogo.jpg') }}" alt="Logo" class="mb-8 mx-auto">
                <form method="POST" action="{{ route('auth') }}">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="focus:outline-none border-2 w-full p-2 rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electronico..">

                        @error('email')
                            <span class="text-red-500 text-sm mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="sr-only">{{ __('Password') }}</label>
                        <input id="password" type="password" class="focus:outline-none border-2 w-full p-2 rounded-lg @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña...">

                        @error('password')
                            <span class="text-red-500 text-sm mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded font-medium hover:bg-yellow-600">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-500 hover:text-gray-700" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden md:flex bg-cover bg-center w-full h-screen md:h-auto md:w-2/3">
            <img src="{{asset('img/loginbackground.jpg')}}" alt="img_background_login" class="w-full h-full object-cover">
        </div>
    </div>
</body>
</html>
