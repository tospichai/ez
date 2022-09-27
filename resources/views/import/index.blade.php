@extends('manage.layout')

@section('title', 'Import Master')

@section('navbar')
    <a class="px-4" href="{{ route('index') }}">
        <div class="p-3"><i class="fa-solid fa-arrow-left"></i></div>
    </a>
@endsection

@section('content')
    <div class="shadow-lg bg-white rounded-lg">
        <div class="px-8 py-8 mb-0">
            <div class="text-4xl">Import Master</div>
        </div>
        <div class="p-8">
            <div class="w-full mb-3">
                <div class="flex flex-col gap-2">
                    <a href="{{ route('import.project') }}">
                        <div class="flex justify-between p-4 items-center border-[1px] cursor-pointer">
                            <div class="flex flex-col gpa-8">
                                <div class="px-2 font-bold">
                                    Field 1 (Project)
                                </div>
                                <div class="px-2 text-xs text-slate-500">
                                    upload
                                </div>
                            </div>
                            <div class="flex justify-center gpa-8 items-center cursor-pointer">
                                <i class="fa-solid fa-cloud-arrow-up text-slate-500"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('import.issurer') }}">
                        <div class="flex justify-between p-4 items-center border-[1px] cursor-pointer">
                            <div class="flex flex-col gpa-8">
                                <div class="px-2 font-bold">
                                    Field 2 (Issurer)
                                </div>
                                <div class="px-2 text-xs text-slate-500">
                                    upload
                                </div>
                            </div>
                            <div class="flex justify-center gpa-8 items-center cursor-pointer">
                                <i class="fa-solid fa-cloud-arrow-up text-slate-500"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('import.type') }}">
                        <div class="flex justify-between p-4 items-center border-[1px] cursor-pointer">
                            <div class="flex flex-col gpa-8">
                                <div class="px-2 font-bold">
                                    Field 3 (Document Type)
                                </div>
                                <div class="px-2 text-xs text-slate-500">
                                    upload
                                </div>
                            </div>
                            <div class="flex justify-center gpa-8 items-center cursor-pointer">
                                <i class="fa-solid fa-cloud-arrow-up text-slate-500"></i>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('import.work') }}">
                        <div class="flex justify-between p-4 items-center border-[1px] cursor-pointer">
                            <div class="flex flex-col gpa-8">
                                <div class="px-2 font-bold">
                                    Field 4 (Works Type-Structure)
                                </div>
                                <div class="px-2 text-xs text-slate-500">
                                    upload
                                </div>
                            </div>
                            <div class="flex justify-center gpa-8 items-center cursor-pointer">
                                <i class="fa-solid fa-cloud-arrow-up text-slate-500"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
