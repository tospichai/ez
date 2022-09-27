@extends('manage.layout')

@section('title', 'Add Block')

@section('navbar')
    <a href="{{ route('manage.index') }}">
        <div class="p-3"><i class="fa-solid fa-arrow-left"></i></div>
    </a>
@endsection

@section('content')
    <div class="shadow-lg bg-white rounded-lg">
        <div class="px-8 py-8">
            <div class="text-4xl">Add Block</div>
        </div>
        <div class="p-8">
            <div class="flex flex-col">
                @foreach ($category as $row)
                    <div class="text-lg py-2">
                        {{ $row->name }}
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($row->component()->orderBy('ordinal')->get() as $component)
                        <div class="w-full bg-slate-100 rounded-lg flex flex-col justify-center items-center py-2">
                            <img class="w-[56px]" src="{{asset($component->image)}}" alt="">
                            <div class="font-bold">{{ $component->name }}</div>
                            <div class="text-slate-500 text-sm">{{ $component->detail }}</div>
                        </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
