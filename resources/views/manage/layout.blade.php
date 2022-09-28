<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | EasyClickLPHPP
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>

<body class="bg-slate-200">
    <div class="max-w-4xl mx-auto md:my-5">
        <div class="md:pb-6">
            <div class="flex justify-between items-center">
                @yield('navbar')
                <div class="p-3 px-4">
                    <div class="dropdown inline-block relative">
                        <button
                            class="bg-slate-800 text-white font-semibold py-2 px-8 rounded inline-flex items-center">
                            <span class="mr-1">Account</span>
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-white pt-1 w-full">
                            <li class=""><a
                                class="rounded-t bg-slate-800 hover:bg-slate-600 py-2 px-4 whitespace-no-wrap flex justify-between items-center"
                                href="{{ route('import.index') }}">import <i class="fa-solid fa-file-import"></i></a>
                        </li>
                            <li class=""><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="rounded-b bg-slate-800 hover:bg-slate-600 py-2 px-4 whitespace-no-wrap flex justify-between items-center">
                                    Logout <i class="fa-solid fa-right-from-bracket"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        @yield('content')
    </div>
</body>

</html>
