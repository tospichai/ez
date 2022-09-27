@extends('manage.layout')

@section('title', 'Design')

@section('navbar')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $( function() {
      $( "#design" ).sortable();
    } );
    </script>
    <a href="">
    </a>
@endsection

@section('content')
    <div class="shadow-lg bg-white rounded-lg">
        <div class="px-8 py-8">
            <div class="text-4xl">Design</div>
        </div>
        <div class="p-8">
            <div class="flex flex-col sm:flex-row justify-between gap-4 items-center mb-6">
                <div class="flex items-center gap-4">
                    <div class="p-0.5 relative h-[60px] w-[60px] text-slate-500 rounded-full overflow-hidden shrink-0"
                        id="border"
                        style="background-image: linear-gradient(to right, {{ $data->border_c_1 }},{{ $data->border_c_2 }},{{ $data->border_c_3 }});">
                        <img class="w-full z-0 group-hover:opacity-75 h-full rounded-full" src="{{ asset($data->image) }}"
                            alt="" id="profile-preview">
                    </div>
                    <div class="flex flex-col">
                        <div class="font-bold">{{ $data->username }}</div>
                        <div class="text-slate-500 text-sm">{{ $data->bio }}</div>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <a class="py-2 px-4 w-full bg-slate-800 rounded-lg text-white" href="{{ route('manage.profile') }}">Edit
                        profile</a>
                </div>
            </div>
            <hr class="mb-6">
            <div id="design" class="flex flex-col divide-y">
                @foreach ($data->categorycomponent()->orderBy('ordinal')->get() as $key => $row)
                    <div class="flex justify-between p-4 items-center border-[1px] cursor-move @if($key == 0 ) border-b-0 @endif">
                        <div class="flex flex-col gpa-8">
                            <div class="px-2 font-bold">
                                {{ $row->title }}
                            </div>
                            <div class="px-2 text-xs text-slate-500">
                                {{ $row->component->category->name }} > 
                                {{ $row->component->name }}
                            </div>
                        </div>
                        <div class="flex justify-center gpa-8 items-center cursor-pointer">
                            <div class="px-2">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            <div class="px-2">
                                <i class="fa-solid fa-trash"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr class="mb-6">
            <a class="group" href="{{ route('manage.add') }}">
                <div
                    class="flex gap-4 border-dotted border-slate-800 border-2 rounded-lg items-center p-4 group-hover:bg-slate-100">
                    <div class="flex">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="flex flex-col">
                        <div class="font-bold">Add Block</div>
                        <div class="text-slate-500 text-sm">links, images, contact info</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
