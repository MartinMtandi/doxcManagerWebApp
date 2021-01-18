@extends('layouts.app')
@section('content')
  <div class="contain mx-auto">
    @if($documents->count())
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-9">
            @foreach ($documents as $document)
                <div class="border rounded mb-10">
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
                                Posted by {{$document->user->name}} {{$document->created_at->diffForHumans()}}
                            </p>
                        </div>
                    </div>
                    <div class="border-t p-4 bg-gray-100 flex items-center">
                        <form action="{{route('dashboard.document', $document)}}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="flex items-center px-3 mr-3 py-1 rounded bg-red-600 text-white hover:bg-red-500">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></p>
                                <p class="ml-2">{{__('Remove')}}</p>
                            </button>
                        </form>
                        @if($document->featured === '0')
                        <form action="{{route('dashboard.document', $document)}}" method="post" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center px-3 mr-3 py-1 rounded bg-green-600 text-white hover:bg-green-500">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg></p>
                                <p class="ml-2">{{__('Mark as Featured Article')}}</p>
                            </button>
                        </form>
                        @else
                        <form action="{{route('dashboard.document', $document)}}" method="post" class="inline">
                            @csrf
                            <button type="submit" class="flex items-center px-3 mr-3 py-1 rounded bg-gray-700 text-white hover:bg-gray-600">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path><line x1="4" y1="22" x2="4" y2="15"></line></svg></p>
                                <p class="ml-2">{{__('Un-Mark as Featured Article')}}</p>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            @endforeach
            {{$documents->links()}}
        </div>
        <div class="col-span-3">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 flex items-center rounded border">
                    <div class="bg-indigo-600 p-2 rounded-l border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download-cloud"><polyline points="8 17 12 21 16 17"></polyline><line x1="12" y1="12" x2="12" y2="21"></line><path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path></svg>
                    </div>
                    <div class="ml-3 p-2">
                        <p class="text-xl font-semibold text-gray-800">{{$count}}</p>
                        <h2>{{Str::plural('Download', $count)}}</h2>
                    </div>
                </div>
                <div class="col-span-12 flex items-center rounded-md border">
                    <div class="bg-green-600 p-2 rounded-l">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg>
                    </div>
                    <div class="ml-3 p-2">
                        <p class="text-xl font-semibold text-gray-800">{{$total}}</p>
                        <h2>{{Str::plural('Like', $total)}}</h2>
                    </div>
                </div>
            </div>
        </div>
      </div>
      @else
      <div class="flex items-center" style="height: 70vh">
            <div class="w-full">
                <p class="text-gray-700 text-lg text-center">No data found</p>
            </div>
        </div>
      @endif
  </div>
@endsection
