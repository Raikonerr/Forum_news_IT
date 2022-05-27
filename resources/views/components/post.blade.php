@props(['post' => $post, 'comments' => $comments])

 


    <div class="mt-6 w-8/12">
        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between"><span class="font-light text-gray-600">{{ $post->created_at->diffForHumans() }}</span>
                @can('delete', $post)
                <div class="flex justify-end items-center">
                    <form action="{{ route('posts.destroy', $post) }}" method="post" class="mx-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 font-bold text-gray-100 bg-red-600 rounded hover:bg-red-500 hover:cursor-pointer">
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('posts.show', $post) }}" class="mx-2">
                        @csrf
                        @method('DELETE')
                        <span class="px-2 py-1 font-bold text-gray-100 bg-blue-600 rounded hover:bg-blue-500 hover:cursor-pointer">
                            Edit
                        </span>
                    </a>
                </div>
                @endcan
            </div>
            <div class="mt-2"><a href="#" class="text-xl font-bold text-gray-700 hover:underline">{{ $post->category->title }}</a>
                <p class="mt-2 text-gray-600">{{ $post->body }}</p>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div class="flex justify-start">
                    <form action="{{ route('likes.store', $post) }}" method="post">
                        @csrf
                        <button class="flex items-center">
                            {{ $post->likes->count() }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                            </svg> 
                        </button>
                    </form>
    
                    {{-- unlike --}}
                    <form action="{{ route('unlike.store', $post) }}" method="post">
                        @csrf
                        <button class="flex items-center ">
                            {{ $post->unLikes->count() }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" class="bg-red-600" />
                              </svg>
                        </button>
                    </form>
                </div>
                <div>
                    <a href="#" class="flex items-center"><img
                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                        <h1 class="font-bold text-gray-700 hover:underline">{{ $post->user->name }}</h1>
                    </a>
                </div>
            </div>
            <div class="mt-4 border border-grey w-full border-1 rounded p-2 relative focus:border-red">
                <form action="{{ route('comments') }}" method="post" class="flex justify-center w-full items-center">
                    @csrf
                    <input name="comment" type="text" class="px-2 text-grey-dark font-light w-full text-sm font-medium" placeholder="Type your commnet...">
                    @error('comment')
                        <div class="text-red-500 mb-3 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="rounded-full bg-indigo-500 ml-3 px-4 py-2 text-white mt-4 w-auto" name="post_id" value="{{$post->id}}">
                        Comment
                    </button>
                </form>
            </div>
            <div class="overflow-y-scroll max-h-80 mt-3">
                @foreach ($comments as $item)
                    <div class="flex flex-col items-start justify-start my-1 mx-4">
                             <div class="text-xs my-3 font-bold">
                                <span>{{ $item->user->name }}</span>
                            </div>
                            <div class="bg-gray-100 rounded-full px-10 py-3 mb-2">
                                <span class="text-sm w-auto">{{ $item->body }}</span>
                            </div>
                            <span class="flex justify-start items-center">
                                <span class="text-xs text-gray-700 px-2 justify-center">
                                    {{ $item->created_at->diffForHumans() }}
                                </span>
                                @can('delete', $item)
                                    <form action="{{ route('comments.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="">
                                            <span class="text-xs text-gray-700 px-2 justify-center underline">
                                                delete
                                            </span>
                                        </button>
                                    </form>
                                @endcan
                            </span>
                    </div>
                @endforeach
            </div>
        </div>

        
    </div>