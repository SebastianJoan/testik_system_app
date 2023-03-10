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

    @if($errors->any())
        <div class="bg-red-500 text-white px-2 py-2 " role="alert">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
     @endif

    <div class=" mt-9 md:mt-0 flex flex-col md:flex-row h-screen bg-gray-200">
        <div class="bg-white w-full md:w-1/3 flex justify-center items-center">
            <div class="w-4/5">
                <img src="{{ asset('img/TestikLogo.jpg') }}" alt="Logo" class="mb-8 mx-auto">
                <form
                    action="{{route('store')}}"
                    method="POST"
                >
                @csrf
                 @method('POST')
                    <div class="mb-4">
                        <label class="sr-only">{{ __('Nombre') }}</label>
                        <input type="text" class="focus:outline-none border-2 w-full p-2 rounded-lg @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Nombre') }}">

                        @error('name')
                            <span class="text-red-500 text-sm mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="sr-only">{{ __('Correo Electronico') }}</label>
                        <input id="email" type="email" class="focus:outline-none border-2 w-full p-2 rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Correo Electronico') }}">

                        @error('email')
                            <span class="text-red-500 text-sm mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="sr-only">{{ __('Contraseña') }}</label>
                        <input type="password" class=" focus:outline-none border-2 w-full p-2 rounded-lg @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Contraseña') }}">

                        @error('password')
                            <span class="text-red-500 text-sm mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded font-medium hover:bg-yellow-600">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden md:flex bg-cover bg-center w-full h-screen md:h-auto md:w-2/3">
            <img src="{{asset('img/registerbackground.jpg')}}" alt="img_background_login" class="w-full h-full object-cover">
        </div>
    </div>
</body>
</html>
