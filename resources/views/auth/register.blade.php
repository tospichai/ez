<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Links
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="absolute h-full w-full flex flex-col items-center justify-center">
            <div class="w-[80%] max-w-[400px] flex items-center flex-col">
                <div class="text-6xl mb-8">
                    Links{}
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Username</b>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-gray-900 bg-slate-200 rounded-l-md font-bold">
                            link.co/
                        </span>
                        <input id="username" class="py-3 px-5 w-full bg-slate-100 rounded-none rounded-r-lg"
                            type="text" name="username" placeholder="username">
                    </div>
                    <div class="text-sm pt-1" id="checkusername" data-check="false">💡 you’ll get both openlink.co and
                        opl.to links for free
                    </div>
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Email</b>
                    <input id="email" class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="text" name="email"
                        placeholder="E-mail">
                    <div class="text-sm pt-1" id="checkemail" data-check="false"></div>

                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Phone number (optional)</b>
                    <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="number" name="mobile"
                        placeholder="Phone number">
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Password</b>
                    <input id="password" class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="password"
                        name="password" placeholder="Password">
                    <div class="text-sm pt-1" id="checkpassword" data-check="false"></div>
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Confirm password</b>
                    <input id="confirmpassword" class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="password"
                        name="confirmpassword" placeholder="Confirm password">
                    <div class="text-sm pt-1" id="checkconfirmpassword" data-check="false"></div>
                </div>
                <div class="px-3 w-full mb-1 mt-3 text-center">
                    <div class="text-xs">By continuing, you agree to our terms and conditions.</div>
                </div>
                <div class="px-3 w-full mb-5">
                    <button id="signup" type="submit"
                        class="py-3 px-5 w-full bg-slate-800 rounded-lg text-white disabled:bg-slate-300" disabled>Sign
                        up</button>
                </div>
                <div class="mb-2">Already signed up? <a href="{{ route('login') }}"><span
                            class="font-bold underline">Log
                            in</span></a></div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('js/register.js')}}"></script>
</body>
</html>
