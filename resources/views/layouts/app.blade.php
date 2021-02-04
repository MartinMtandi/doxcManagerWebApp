<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Martin Mtandi">
    <meta name="description" content="Protecting the rights of communities and conserving the environment and natural resources">
    <meta name="keywords" content="ZELA, Environmental Law, Zimbabwe, Public documents, Tenders">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <title>Zimbabwe Environment Law Association</title>
    <style>
        .contain{
            max-width: 74%;
        }

        .wrapper{
            min-height: 78vh;
        }

        .logo{
            height: 40px !important;
        }
        .btn-outline{
            color: #81BD00;
            border-color: #81BD00;
        }
        .btn-outline:hover{
            background-color: #81BD00;
            color: #ffffff;
        }

        .btn-solid{
            background-color: #81BD00;
            color: #ffffff;
        }

        .btn-solid:hover{
            background-color: #b3df56;
        }

        .border-light:hover{
            border: 1px solid #81BD00;
        }

        @media only screen and (max-width: 600px) {
            .contain{
                 max-width: 100%;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    {{-- <header class="p-3 bg-white border border-b mb-6">
        <nav class="flex justify-between contain mx-auto">
            <ul class="flex items-center">
                <li class="p-2">
                    <a href="#"><img src={{asset('img/logo.png')}} alt="Logo" class="logo" /></a>
                </li>
            </ul>
            <ul class="flex items-center">
                @auth
                    <li class="p-2 hover:text-green-600">
                        <a href="{{route('dashboard')}}">{{__('Dashboard')}}</a>
                    </li>
                    <li class="p-2 hover:text-green-600">
                        <a href="{{route('document')}}">{{__('New Document')}}</a>
                    </li>
                    <li class="p-2 mr-5 hover:text-green-600">
                        <a href="{{route('register')}}">{{__('Create Account')}}</a>
                    </li>
                    <li class="p-2 border-l font-semibold">
                        <a href="{{route('register')}}">{{Auth()->user()->name}}</a>
                    </li>
                    <li class="p-2">
                        <form class="inline" action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="px-4 text-sm py-2 rounded bg-red-600 text-white hover:bg-red-500">{{__('LOGOUT')}}</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="p-2 hover:text-green-600">
                        <a href="{{route('home')}}">{{__('Home')}}</a>
                    </li>
                    <li class="p-2 hover:text-green-600">
                        <a href="{{route('about')}}">{{__('About Us')}}</a>
                    </li>
                    <li class="p-2 hover:text-green-600">
                        <a href="{{route('login')}}" class="px-4 py-2 rounded bg-gray-700 text-white hover:bg-gray-600">{{__('SIGN IN')}}</a>
                    </li>
                @endguest
            </ul>
        </nav>
    </header> --}}
    <div class="wrapper">
        @yield('content')
    </div>
    <footer class="py-6 bg-gray-100 border-t px-3 md:px-0">
        <div class="contain mx-auto">
            <div class="md:flex text-gray-700 justify-between text-center">
                <p>&#169;{{__('Copyright ')}}<script>document.write(new Date().getFullYear())</script>{{__(",")}} {{__('All rights reserved')}}</p>
                <p>Developed by <a class="text-indigo-600 hover:border-b hover:border-indigo-600" href="https://aldmut.com/" target="_blank">{{__('Aldmut Media')}}</a>
            </div>
        </div>
    </footer>
</body>
</html>
