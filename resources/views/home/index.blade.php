@extends('manage.layout')
@section('title', 'Home')
@section('navbar')
    <a class="px-4" href="#">
    </a>
@endsection
@section('content')
    <form action="{{ route('import.issurer') }}" method="post" enctype="multipart/form-data"> @csrf
        <div class="shadow-lg bg-white rounded-lg">
            <div class="px-3 py-2 mb-0">
                <div class="flex justify-between items-center">
                    <div class="text-4xl px-4">EasyClickLPHPP</div>
                    <div class="">
                        <div class="p-3 px-4">
                            <div class="dropdown inline-block relative">
                                <button
                                    class="bg-slate-800 text-white font-semibold py-2 px-8 rounded inline-flex items-center">
                                    <span class="mr-1">Account</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu absolute hidden text-white pt-1 w-full">
                                    <li class="relative z-50"><a
                                            class="rounded-t bg-slate-800 hover:bg-slate-600 py-2 px-4 whitespace-no-wrap flex justify-between items-center"
                                            href="{{ route('import.index') }}">import <i
                                                class="fa-solid fa-file-import"></i></a>
                                    </li>
                                    <li class="relative z-50"><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="rounded-b bg-slate-800 hover:bg-slate-600 py-2 px-4 whitespace-no-wrap flex justify-between items-center">
                                            Logout <i class="fa-solid fa-right-from-bracket"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 pt-1">
                <div class="w-full mb-3">
                    <div class="flex flex-col gap-1">
                        <div class="flex gap-3 border text-lg p-3 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Project</div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <select class="w-full border rounded-lg p-2 appearance-none" id="project" disabled>
                                    @foreach ($project as $row)
                                        <option value="{{ $row->init }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                        <div class="flex gap-3 border text-lg p-3 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Issurer</div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <select class="w-full border rounded-lg p-2" id="issurer">
                                    @foreach ($issurer as $row)
                                        <option value="{{ $row->init }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-[30px] cursor-pointer" onclick="popup('issurer')"> <i
                                    class="fa-solid fa-gear"></i> </div>
                        </div>
                        <div class="flex gap-3 border text-lg p-3 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Package</div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <select class="w-full border rounded-lg p-2" id="rev">
                                    <option value="P1">Package 1 Civil</option>
                                    <option value="P2">Package 2 Hydro Mechanic</option>
                                    <option value="P3">Package 3 Electro Mechanic</option>
                                    <option value="P4">Package 4 Transmission Line</option>
                                    <option value="P5">Package 5 xxxxx</option>
                                </select>
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                        <div class="flex gap-3 border text-lg p-3 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Document Type</div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <select class="w-full border rounded-lg p-2" id="type">
                                    @foreach ($type as $row)
                                        <option value="{{ $row->init }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-[30px] cursor-pointer" onclick="popup('type')"> <i class="fa-solid fa-gear"></i>
                            </div>
                        </div>
                        <div class="flex gap-3 border text-lg p-3 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Work Type/Structure</div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <select class="w-full border rounded-lg p-2" id="work">
                                    @foreach ($work as $row)
                                        <option value="{{ $row->init }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-[30px] cursor-pointer" onclick="popup('work')"> <i class="fa-solid fa-gear"></i>
                            </div>
                        </div>
                        <div class="flex gap-3 border text-lg p-3 items-center justify-center">
                            <div class="font-bold flex flex-col w-[180px]">
                                <div class="font-bold">Consecutive Number</div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="rounded-lg relative"> <input class="p-2 w-full" type="hidden" id="con"
                                    maxlength="5">
                                <div id="layout-keyboard"
                                    class="absolute bg-slate-200 w-[200px] rounded-lg shadow-lg border-2 border-gray-800 hidden z-50"
                                    style="bottom: -160px; left:60px">
                                    <div class="p-4 w-full">
                                        <div class="grid grid-cols-3 gap-4 items-center text-center">
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                1</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                2</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                3</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                4</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                5</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                6</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                7</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                8</div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                9</div>
                                            <div></div>
                                            <div
                                                class="p-2 bg-slate-800 text-white rounded-full cursor-pointer number-insert">
                                                0</div>
                                            <div
                                                class="p-2 bg-red-500 text-white rounded-full cursor-pointer number-clear text-xs">
                                                Clear
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-[30px] relative p">
                                <div class="cursor-pointer" id="keyboard"> <i class="fa-solid fa-keyboard"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-lg bg-white rounded-lg mt-2">
            <div class="p-8">
                <div class="w-full mb-3">
                    <div class="flex gap-3 text-center font-bold justify-between">
                        <div class="flex flex-col gap-3">
                            <div>Project</div>
                            <div class="text-3xl relative">
                                <div class="after:content-['-'] after:absolute after:-right-[21px]"></div>
                                <div id="r1"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div>
                                Package
                            </div>
                            <div class="text-3xl relative">
                                <div class="after:content-['-'] after:absolute after:-right-[21px]"></div>
                                <div id="r6"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div>
                                Work Type/Structure
                            </div>
                            <div class="text-3xl relative">
                                <div class="after:content-['-'] after:absolute after:-right-[21px]"></div>
                                <div id="r4"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div>
                                Document Type
                            </div>
                            <div class="text-3xl relative">
                                <div class="after:content-['-'] after:absolute after:-right-[21px]"></div>
                                <div id="r2"></div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div>
                                Issurer
                            </div>
                            <div class="text-3xl relative">
                                <div class="after:content-['-'] after:absolute after:-right-[21px]"></div>
                                <div id="r3"></div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <div>
                                Consecutive Number
                            </div>
                            <div class="text-3xl" id="r5"></div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-10">
                    <div id="result" class="hidden">
                        <span id="c1"></span>-
                        <span id="c6"></span>-
                        <span id="c4"></span>-
                        <span id="c2"></span>-
                        <span id="c3"></span>-
                        <span id="c5"></span>

                    </div>
                    <div class="relative w-full"> <button type="button" id="button"
                            class="p-2 bg-slate-800 text-white rounded-lg cursor-pointer focus:ring focus:bg-green-700 w-full">
                            Copy to clipboard
                        </button>
                        <div id="copy-success"
                            class="hidden absolute top-[50%] right-9 text-xs p-1 px-3 text-white bg-green-500 rounded-full translate-x-[-50%] translate-y-[-50%]">
                            Copied</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-lg bg-white rounded-lg">
            <div class="p-4 pt-1 mb-1 mt-2">
                <div class="w-full mb-3">
                    <div class="flex flex-col">
                        <div class="flex gap-3 text-lg p-1 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Type <span class="text-red-500">*</span></div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <input id="typeoption" class="w-full font-bold rounded-lg p-2" type="text" disabled>
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                        <div class="flex gap-3 text-lg p-1 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Discipline <span class="text-red-500">*</span></div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <input id="disciplineoption" class="w-full font-bold rounded-lg p-2 text-slate-500"
                                    value="Pending" type="text" disabled style="color:#ffb100;">
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                        <div class="flex gap-3 text-lg p-1 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Package <span class="text-red-500">*</span></div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <input id="packageoption" class="w-full font-bold rounded-lg p-2" type="text"
                                    disabled>
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                        <div class="flex gap-3 text-lg p-1 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Facility <span class="text-red-500">*</span></div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <input id="facilityoption" class="w-full font-bold rounded-lg p-2" type="text"
                                    disabled>
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                        <div class="flex gap-3 text-lg p-1 items-center">
                            <div class="font-bold flex flex-col w-[250px]">
                                <div class="font-bold">Category <span class="text-red-500">*</span></div>
                                <div class="text-slate-500 text-xs"></div>
                            </div>
                            <div class="w-full">
                                <input id="categoryoption" class="w-full font-bold rounded-lg p-2 text-slate-500"
                                    value="Pending" type="text" disabled style="color:#ffb100;">
                            </div>
                            <div class="w-[30px]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="flex justify-between items-center pt-1">
            <div class="flex flex-col items-center">
                <div class="p-4 bg-white rounded-lg shadow-lg font-bold">Today {{ $daily }}</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="p-4 bg-white rounded-lg shadow-lg font-bold">Total {{ number_format($all) }}</div>
            </div>
        </div>
    </form>
    <div id="popup" class="transition-all duration-300 opacity-0 invisible">
        <form id="setting" action="{{ route('setting') }}" method="post" enctype="multipart/form-data"> @csrf
            <div class="overflow-y-auto overflow-x-hidden fixed inset-0 w-full flex justify-center items-center">
                <div class="bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 flex justify-center items-center"
                    onclick="hidePopup()">
                </div>
                <div class="relative bg-white rounded-none sm:rounded-lg z-50 shadow-lg max-w-3xl overflow-hidden w-full">
                    <div class="w-full p-4 max-h-[90vh] overflow-y-auto ">
                        <div class="text-3xl my-5" id="nametable"></div>
                        <div id="showdata"></div>
                    </div>
                    <div class="absolute top-0 right-0 cursor-pointer" onclick="hidePopup()">
                        <div class="w-[32px] h-[32px] rounded-full m-2 p-3 py-1 bg-slate-100"><i
                                class="fa-solid fa-xmark my-[4px]"></i></div>
                    </div>
                    <input id="table" type="hidden" name="table">
                    <div class="absolute bottom-0 right-0 cursor-pointer"> <button type="submit"
                            class="rounded-lg m-4 p-5 py-1 bg-slate-800 text-white"> Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).mouseup(function(e) {
            var container = $("#layout-keyboard");
            var keyboard = $("#keyboard");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if (!keyboard.is(e.target) && keyboard.has(e.target).length === 0) {
                    container.fadeOut();
                }
            }
        });
        const url = window.location.origin;

        function popup(event) {
            $('#showdata').html('');
            $('#table').val(event);
            $.ajax({
                type: 'GET',
                url: url + '/data?search=' + event,
                success: function(data) {
                    data.data.forEach((row) => {
                        let checked = ''
                        if (row.is_selected) {
                            checked = 'checked';
                        }
                        $('#nametable').html(data.name);
                        $('#showdata').append(`<div class="flex items-center mb-4"> <input ` + checked +
                            ` id="checkbox` + row.id + `" type="checkbox" name="issurercheck[]"
 value="` + row.id + `"
 class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300  dark:ring-offset-gray-800 focus:ring-2 "> <label for="checkbox` +
                            row.id + `"
 class="ml-2 text-sm font-medium text-gray-900 ">` + row.name + `</label> </div>`);
                    })
                    document.getElementById("popup").classList.remove("opacity-0");
                    document.getElementById("popup").classList.remove("invisible");
                    document.getElementById("popup").classList.add("opacity-100");
                },
                error: function() {
                    console.log(data);
                }
            });
        }

        function hidePopup(event) {
            document.getElementById("popup").classList.remove("opacity-100");
            document.getElementById("popup").classList.add("opacity-0");
            document.getElementById("popup").classList.add("invisible");
        }
    </script>
    <script>
        $('#project').change(function() {
            var data = $(this).val();
            $("#r1").html(data);
            $("#c1").html(data);
        });
        $('#type').change(function() {
            var data = $(this).val();
            $("#typeoption").val($(this).find('option:selected').text());
            $("#r2").html(data);
            $("#c2").html(data);
        });
        $('#issurer').change(function() {
            var data = $(this).val();
            $("#r3").html(data);
            $("#c3").html(data);
        });
        $('#work').change(function() {
            var data = $(this).val();
            $("#facilityoption").val($(this).find('option:selected').text());
            $("#r4").html(data);
            $("#c4").html(data);
        });
        $('#con').change(function() {
            var data = $(this).val();
            $("#r5").html(data);
            $("#c5").html(data);
        });
        $('#rev').change(function() {
            var data = $(this).val();
            $("#packageoption").val($(this).find('option:selected').text());
            $("#r6").html(data);
            $("#c6").html(data);
        });
        $("#r1").html($('#project').val());
        $("#r2").html($('#type').val());
        $("#typeoption").val($('#type').find('option:selected').text());
        $("#r3").html($('#issurer').val());
        $("#r4").html($('#work').val());
        $("#facilityoption").val($('#work').find('option:selected').text());
        $("#r5").html($('#con').val());
        $("#r6").html($('#rev').val());
        $("#packageoption").val($('#rev').find('option:selected').text());
        $("#c1").html($('#project').val());
        $("#c2").html($('#type').val());
        $("#c3").html($('#issurer').val());
        $("#c4").html($('#work').val());
        $("#c5").html($('#con').val());
        $("#c6").html($('#rev').val());
        $("#keyboard").click(function() {
            $("#layout-keyboard").fadeToggle()
        });
        $(".number-insert").click(function() {
            if ($("#con").val().length < 5) {
                $("#con").val($("#con").val() + $(this).html().replace(/\s/g, ''));
                $("#r5").html($("#con").val());
                $("#c5").html($("#con").val());
            }
        });
        $(".number-clear").click(function() {
            $("#con").val('');
            $("#r5").html('');
            $("#c5").html('');
        });
        $("#button").click(function() {
            $("#copy-success").fadeIn(500);
            $("#copy-success").delay(500).fadeOut(500);
            var text = document.getElementById("result").innerText.replace(/\s/g, '');
            if (window.clipboardData && window.clipboardData
                .setData
                ) { // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
                return window.clipboardData.setData("Text", text);
            } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
                var textarea = document.createElement("textarea");
                textarea.textContent = text;
                textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    return document.execCommand("copy"); // Security exception may be thrown by some browsers.
                } catch (ex) {
                    console.warn("Copy to clipboard failed.", ex);
                    return prompt("Copy to clipboard: Ctrl+C, Enter", text);
                } finally {
                    document.body.removeChild(textarea);
                }
            }
        });
    </script>
@endsection
