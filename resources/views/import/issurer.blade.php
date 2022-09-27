@extends('manage.layout')

@section('title', 'Field 3 (Issurer)')

@section('navbar')
    <a class="px-4" href="{{ route('import.index') }}">
        <div class="p-3"><i class="fa-solid fa-arrow-left"></i></div>
    </a>
@endsection

@section('content')
    <form action="{{ route('import.issurer') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="shadow-lg bg-white rounded-lg">
            <div class="px-8 py-8 mb-0">
                <div class="text-4xl">Field 3 (Issurer)</div>
            </div>
            <div class="p-8 py-0">
                <div class="w-full mb-3">
                    <div class="m-4">
                        <label class="inline-block mb-2 text-gray-500">File Upload <small
                                class="text-red-500">*(.xlsx)</small></label>
                        <div class="flex items-center justify-center w-full">
                            <label
                                class="flex flex-col w-full h-32 border-4 border-slate-300 border-dashed hover:bg-gray-100 hover:border-gray-300">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <i class="fa-solid fa-cloud-arrow-up text-slate-500"></i>
                                    <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600" id="filename">
                                        Attach a file</p>
                                </div>
                                <input type="file" id="file" name="file" class="opacity-0" />
                            </label>
                        </div>
                        <div class="w-full py-5">
                            <button type="submit" class="py-3 w-full bg-slate-800 rounded-lg text-white">Upload</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $('#file').change(function() {
            var file = $('#file')[0].files[0].name;
            $("#filename").text(file);
        });
    </script>
@endsection
