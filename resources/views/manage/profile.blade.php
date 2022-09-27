@extends('manage.layout')

@section('title', 'Profile')

@section('navbar')
    <a class="px-4" href="{{ route('manage.index') }}">
        <div class="p-3"><i class="fa-solid fa-arrow-left"></i></div>
    </a>
@endsection

@section('content')
    <form action="{{ route('manage.profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="shadow-lg bg-white rounded-lg">
            <div class="px-8 py-8">
                <div class="text-4xl">Profile</div>
            </div>
            <div class="p-8">
                <div class="px-3 w-full mb-2">
                    <label class="text-slate-500">Logo <small class="text-red-500">*ขนาดแนะนำ 500 x 500
                            px</small></label>
                </div>
                <div class="flex flex-col sm:flex-row justify-around gap-4 items-center mb-10">
                    <div class="p-2 relative h-[230px] w-[230px] text-slate-500 rounded-full overflow-hidden group"
                        id="border"
                        style="background-image: linear-gradient(to right, {{ $data->border_c_1 }},{{ $data->border_c_2 }},{{ $data->border_c_3 }});">
                        <label class="absolute h-full w-full flex flex-col items-center justify-center z-10 -ml-2 -mt-3"
                            for="image"><i
                                class="fa-solid fa-camera group-hover:text-slate-800 text-7xl text-transparent"></i></label>
                        <input class="absolute top-0 left-0 w-full h-full hidden imageupload" type="file" name="image"
                            id="image" data-type="profile-preview">
                        <input type="hidden" name="old_image" value="{{ $data->image }}">
                        <img class="w-full z-0 group-hover:opacity-75 h-full rounded-full group-hover:blur-sm"
                            src="{{ asset($data->image) }}" alt="" id="profile-preview">
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="mb-3 flex items-center justify-end">
                            <label for="border_c_1" class="text-slate-500">Border Color Left</label>
                            <input class="bg-white rounded-lg w-[50px] h-[50px] ml-4 borderchange" type="color"
                                id="border_c_1" name="border_c_1" value="{{ $data->border_c_1 }}">
                        </div>
                        <div class="mb-3 flex items-center justify-end">
                            <label for="border_c_2" class="text-slate-500">Border Color Center</label>
                            <input class="bg-white rounded-lg w-[50px] h-[50px] ml-4 borderchange" type="color"
                                id="border_c_2" name="border_c_2" value="{{ $data->border_c_2 }}">
                        </div>
                        <div class="mb-3 flex items-center justify-end">
                            <label for="border_c_3" class="text-slate-500">Border Color Right</label>
                            <input class="bg-white rounded-lg w-[50px] h-[50px] ml-4 borderchange" type="color"
                                id="border_c_3" name="border_c_3" value="{{ $data->border_c_3 }}">
                        </div>
                    </div>
                </div>
                <div class="w-full -mb-2">
                    <label for="image_cover" class="text-slate-500">Cover Banner <small class="text-red-500">*ขนาดแนะนำ
                            1,500 x 500 px</small></label>
                </div>
                <div class="flex justify-center gap-4 p-2">
                    <div class="mb-10 relative h-[240px] w-full text-slate-500 rounded-lg overflow-hidden group">
                        <label class="absolute h-full w-full flex flex-col items-center justify-center z-10 -ml-2 -mt-3"
                            for="image_cover"><i
                                class="fa-solid fa-camera group-hover:text-slate-800 text-7xl text-transparent"></i></label>
                        <input class="absolute top-0 left-0 w-full h-full hidden imageupload" type="file"
                            name="image_cover" id="image_cover" data-type="cover-preview">
                        <input type="hidden" name="old_image_cover" value="{{ $data->image_cover }}">
                        <img class="absolute object-cover object-center w-full z-0 group-hover:opacity-75 group-hover:blur-sm h-full rounded-lg"
                            src="{{ asset($data->image_cover) }}" alt="" id="cover-preview">
                    </div>
                </div>
                <div class="w-full mb-3">
                    <label for="page_name" class="text-slate-500">Page Name</label>
                    <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="text" id="page_name"
                        name="page_name" placeholder="Page name" value="{{ $data->page_name }}">
                </div>
                {{-- <div class="w-full mb-3">
                    <label for="username" class="text-slate-500">Username</label>
                    <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="text" id="username"
                        name="username" placeholder="Page name" value="{{ $data->username }}">
                </div> --}}
                <div class="w-full mb-3">
                    <label for="email" class="text-slate-500">Email</label>
                    <input class="py-3 px-5 w-full bg-slate-300 rounded-lg cursor-default" type="text" id="email"
                        name="email" placeholder="E-mail" value="{{ $data->email }}" readonly>
                </div>
                <div class="w-full mb-3">
                    <label for="bio" class="text-slate-500">Bio</label>
                    <div class="relative">
                        <textarea class="py-3 px-5 w-full bg-slate-100 rounded-lg" name="bio" id="bio" rows="3"
                            maxlength="100">{{ $data->bio }}</textarea>
                        <div class="absolute top-0 right-0 p-2 text-slate-500 text-xs"> <span id="charcount">0</span>/100
                        </div>
                    </div>
                </div>
                <!-- <div class="w-full mb-3">
                                            <label for="password" class="text-slate-500">Password</label>
                                            <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="password" id="password" name="password" placeholder="Password">
                                        </div> -->
                <div class="w-full my-5">
                    <button type="submit" class="py-3 w-full bg-slate-800 rounded-lg text-white">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        (function() {
            document.getElementById('charcount').innerHTML = document.getElementById('bio').value.length;
        })();

        function textLength(value) {
            var maxLength = 99;
            if (value.length > maxLength) return false;
            return true;
        }

        document.getElementById('bio').onkeyup = function() {
            console.log(this.value.length)
            document.getElementById('charcount').innerHTML = this.value.length;
            if (!textLength(this.value)) {
                document.getElementById('bio').value = document.getElementById('bio').value.slice(0, -1);
            };
        }

        $(".imageupload").on('change', function() {
            var $this = $(this);
            const input = $this[0];
            const fileName = $this.val().split("\\").pop();
            // $this.siblings(".custom-file-label").addClass("selected").html(fileName);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#' + $this.data('type')).attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
        $(".borderchange").change(function() {
            let colorBorder1 = $('#border_c_1').val();
            let colorBorder2 = $('#border_c_2').val();
            let colorBorder3 = $('#border_c_3').val();
            console.log(colorBorder1);
            $("#border").css("background-image", "linear-gradient(to right," + colorBorder1 + "," + colorBorder2 +
                "," + colorBorder3 + ")");
        });
    </script>
@endsection
