@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center">
        <x-form :categories="$categories" :action="route('posts')" />
    
        
        <div class="flex flex-col w-full">
            @if ($posts->count())
            <div class="flex justify-center mt-3 ">
                <div class="w-full sm:w-8/12 bg-white p-6 rounded-lg font-bold">
                    All Your Posts
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                @foreach ($posts as $post)
                    <x-post :post="$post" :comments="$post->comments" />
                @endforeach
            </div>
            @else
            <div class="flex justify-center mt-3 ">
                <div class="w-full sm:w-8/12 bg-white p-6 rounded-lg font-bold">
                    There are no posts
                </div>
            </div>
                
            @endif
        </div>
    </div>
@endsection