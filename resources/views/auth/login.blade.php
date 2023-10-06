<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Planta Industrial García y Jaramillo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('ui/backend')}}/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{asset('ui/backend')}}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('ui/backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('ui/backend')}}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a class="auth-logo">
                                    <img src="{{asset('ui/backend')}}/assets/images/logoLogin.png" height="130" class="logo-dark mx-auto" alt="">
                                    <img src="{{asset('ui/backend')}}/assets/images/logo.png" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div>
    
    
                        <div class="p-2">
                                <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                                    @csrf
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="username" type="username" name="username" required="" placeholder="Username">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control" id="password" type="password" name="password" required="" placeholder="Contraseña">
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="remember_me" class="custom-control-input" name="remember" id="customCheck1">
                                            <label class="form-label ms-1" for="customCheck1">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1 ">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">{{ __('Log in') }}</button>
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-2">
                                    <div class="col-sm-12 mt-3">
                                        <a class="text-muted"><i class="mdi mdi-lock"></i>{{ __('Por su seguridad guarde su contraseña en un lugar seguro') }}</a>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('ui/backend')}}/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{asset('ui/backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('ui/backend')}}/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{asset('ui/backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{asset('ui/backend')}}/assets/libs/node-waves/waves.min.js"></script>

        <script src="{{asset('ui/backend')}}/assets/js/app.js"></script>

    </body>
</html>





{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="username" :value="__('Email')" />

                <x-input id="username" class="block mt-1 w-full" type="username" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
