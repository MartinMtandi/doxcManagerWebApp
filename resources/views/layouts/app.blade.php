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

        #menu-toggle:checked + #menu {
            display: block;
        }

        @media only screen and (max-width: 600px) {
            .contain{
                 max-width: 100%;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-white">
        <div class="contain mx-auto">
            <div class="mx-3 md:mx-0 flex flex-wrap items-center mb-16 lg:py-0 py-2 ">
                <div class="flex-1 flex justify-between items-center hidden md:block">
                    <a href={{route('dashboard')}}><img src={{asset('img/logo.png')}} alt="Logo" class="logo" /></a>
                </div>
                <div class="flex-1 flex justify-between items-center block md:hidden">
                    <a href={{route('dashboard')}}><img src={{asset('img/tiny.png')}} alt="Logo" class="logo" /></a>
                </div>
               <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
              <input class="hidden" type="checkbox" id="menu-toggle" />

              <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
                @auth
                <nav>
                  <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{route('document')}}">{{__('New Document')}}</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{route('register')}}">{{__('Create Account')}}</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400 lg:mb-0 mb-2 font-semibold" href="#">{{Auth()->user()->name}}</a></li>
                  </ul>
                </nav>
                <form class="lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor" action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="px-4 text-sm py-2 rounded bg-red-600 text-white hover:bg-red-500">{{__('LOGOUT')}}</button>
                </form>
                @endauth
                @guest
                    <nav>
                        <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{route('home')}}">{{__('Home')}}</a></li>
                        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="{{route('about')}}">{{__('About Us')}}</a></li>
                        <li><a class="lg:p-4 text-sm px-4 py-2 my-2 rounded bg-gray-700 text-white hover:bg-gray-600" href="{{route('login')}}">{{__('SIGN IN')}}</a></li>
                        </ul>
                    </nav>
                @endguest
              </div>
            </div>
        </div>
    </header>
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
