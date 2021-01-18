@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="w-5/12 bg-white p-6 rounded-lg">
            @if(session('status'))
                <div class="bg-green-500 p-4 rounded mb-6 text-white flex items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    </div>
                    <div>
                        <span class="mx-2 font-semibold">Yay!</span>{{ session('status')}}
                    </div>
                </div>
            @endif
            <form action="{{route('document')}}" method="post" enctype="multipart/form-data" autocomplete="off" role="form">
                @csrf
                <div class="mb-4">
                    <label class="sr-only" for="title">{{_('Title')}}</label>
                    <input type="text" name="title" id="title" placeholder="Enter document title" class="bg-gray-100 border-2 p-4 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('title')}}"/>
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="sr-only" for="description">{{_('Description')}}</label>
                    <textarea name="description" id="description" cols="30" rows="6" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" placeholder="Enter a detailed brief of the document">{{old('description')}}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="h-54 bg-white mb-4">
                    <div class="max-w-md mx-auto rounded-lg overflow-hidden md:max-w-xl">
                        <div class="md:flex">
                            <div class="w-full">
                                <div class="relative border-dotted h-40 rounded-lg border-dashed border-2 border-blue-700 @error('document') border-red-500 @enderror  bg-gray-100 flex justify-center items-center">
                                    <div class="absolute">
                                        <div class="flex flex-col items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" viewBox="0 0 24 24" fill="none" stroke="#0066FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                            <span class="block text-gray-400 font-normal">Attach your document here</span>
                                        </div>
                                    </div> <input type="file" class="h-full w-full opacity-0" name="document">
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('document')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <button class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-3 rounded-lg font-medium w-full uppercase">{{_('Submit New Document')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
