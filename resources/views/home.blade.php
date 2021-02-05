@extends('layouts.app')
@section('content')
  <div class="contain mx-auto">
    @if($documents->count())
    <div class="md:grid md:grid-cols-12 gap-8">
        <div class="col-span-12 md:col-span-8 lg:col-span-9">
                @foreach ($documents as $document)
                    <div class="border rounded mb-10 border-light">
                        <div class="p-4">
                            <h1 class="text-xl font-medium text-gray-800">{{$document->title}}</h1>
                            <p class="my-3 text-gray-800">
                                {{$document->description}}
                            </p>
                            <div class="flex items-center">
                                <div class="text-indigo-700 flex items-center">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4F46E5" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg></p>
                                    <p class="ml-1">{{$document->downloads->count()}} {{Str::plural('Download', $document->downloads->count())}}</p>
                                </div>
                                <div class="text-indigo-700 ml-4 flex items-center">
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#4F46E5" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg></p>
                                    <p class="ml-1">{{$document->readings->count()}} {{Str::plural('Like', $document->readings->count())}}</p>
                                </div>
                            </div>
                            <div class="mt-2">
                                <p class="text-gray-600 text-sm flex items-center">
                                    @if($document->featured === '1')
                                        <span class="mr-2"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg></span>
                                    @endif
                                    Posted {{$document->created_at->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                        <div class="border-t p-4 bg-gray-100 flex items-center">
                            <form action="{{route('document.download', $document)}}" method="post" class="inline">
                                @csrf
                                <button class="flex items-center px-3 mr-3 py-1 rounded bg-gray-700 text-white hover:bg-gray-600">
                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg></p>
                                    <p class="ml-2">{{__('Download')}}</p>
                                </button>
                            </form>
                            <form action="{{route('document.read', $document)}}" method="post" class="inline">
                                @csrf
                                <button type="submit" class="flex items-center px-3 mr-3 py-1 rounded btn-solid">
                                    <p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg></p>
                                    <p class="ml-2 hidden md:block">{{__('Like Article')}}</p>
                                    <p class="ml-2 md:hidden">{{__('Like')}}</p>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{$documents->links()}}
        </div>
        <div class="col-span-12 md:col-span-4 lg:col-span-3 px-3 md:px-0">
            <div>
                <div class="mb-8">
                    @if($popular->count())
                    <h1 class="text-lg font-semibold" style="color: #81BD00">Most Popular</h1>
                        @foreach($popular as $post)
                            <div class="pb-5 border-b">
                                <p class="py-2 text-gray-700 hover:text-indigo-600 hover:underline cursor-text text-sm">{{$post->title}}</p>
                                <div>
                                    <form action="{{route('document.download', $post)}}" method="post" class="inline">
                                        @csrf
                                        <button type="submit" name="download" class="text-indigo-600 mt-2 md:mt-0 focus:outline-none px-3 py-1 rounded-full border border-indigo-600 mr-2 text-xs hover:text-white hover:bg-indigo-600">{{__('Download')}}</button>
                                    </form>
                                    <form action="{{route('document.read', $post)}}" method="post" class="inline">
                                        @csrf
                                        <button type="submit" name="preview"class="btn-outline focus:outline-none mt-2 md:mt-0 px-3 py-1 rounded-full border mr-2 text-xs">{{__('Like Article')}}</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if($promo)
                    <h1 class="text-lg font-semibold" style="color: #81BD00">Featured</h1>
                        @foreach ($promo as $promoItem)
                            <div class="pb-5 border-b">
                                <p class="py-2 text-gray-700 hover:text-indigo-600 hover:underline cursor-text text-sm">{{$promoItem->title}}</p>
                                <div>
                                    <form action="{{route('document.download', $promoItem)}}" method="post" class="inline">
                                        @csrf
                                        <button type="submit" name="download" class="text-indigo-600 focus:outline-none mt-2 md:mt-0 px-3 py-1 rounded-full border border-indigo-600 mr-2 text-xs hover:text-white hover:bg-indigo-600">{{__('Download')}}</button>
                                    </form>
                                    <form action="{{route('document.read', $promoItem)}}" method="post" class="inline">
                                        @csrf
                                        <button type="submit" name="preview"class="btn-outline focus:outline-none px-3 mt-2 md:mt-0 py-1 rounded-full border mr-2 text-xs">{{__('Like Article')}}</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
      </div>
      @else
      <div class="flex items-center" style="height: 70vh">
        <div class="w-full">
            <p class="text-gray-700 text-lg text-center">
                No Data Found
            </p>
        </div>
    </div>
    @endif
  </div>
@endsection

