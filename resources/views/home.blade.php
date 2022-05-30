@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center"> 
        <x-form :categories="$categories" :action="route('posts')" />
        <div class="w-8/12 sm:w-8/12 bg-white p-4 rounded-lg font-bold">
            <div class="w-auto">
                <form action="{{ route('filter') }}" method="post" class="flex flex-col justify-between items-center md:flex-row">
                    @csrf
                    <div class="flex justify-start w-full">
                        <select name="category" class="block w-full px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value="">Choose category ...</option>
                            @foreach ($categories as $category)
                                <x-category :category="$category" />
                            @endforeach
                        </select>
                        <select name="byPost" class="block
                        w-full
                        px-1
                        py-1
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding bg-no-repeat
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            <option value="">Sorted by ...</option>
                            <option value="top">Top post</option>
                            <option value="newest">Newest post</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit">
                            <span class="font-medium subpixel-antialiased underline hover:text-blue-700">Filter</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex flex-col w-full">
            @if ($posts->count())
            <div class="flex flex-col justify-center items-center">
                @foreach ($posts as $post)
                    <x-post :post="$post" :comments="$post->comments" />
                @endforeach
            </div>
            @else
                <div class="flex justify-center mt-3 ">
                    <div class="w-8/12 bg-white p-6 rounded-lg font-bold">
                        There are no posts
                    </div>
                </div>
            @endif
        </div>
        
    </div>






    <div class="flex flex-col justify-center items-center">
        <div class="mt-6">
            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-between"><span class="font-light text-gray-600">Jun 1,
                        2020</span><a href="#"
                        class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                </div>
                <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Build
                        Your New Idea with Laravel Freamwork.</a>
                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                        Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                        reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                </div>
                <div class="flex items-center justify-between mt-4"><a href="#"
                        class="text-blue-500 hover:underline">Read more</a>
                    <div><a href="#" class="flex items-center"><img
                                src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                            <h1 class="font-bold text-gray-700 hover:underline">Alex John</h1>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
@endsection