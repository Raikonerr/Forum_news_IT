@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

   

    @if ($comments->count() > 0)
    <div class="flex justify-center w-full bg-blue-800 p-5 rounded-lg mt-2 mb-6 font-bold text-white">
      Comments management
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg mt-4">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-white bg-blue-800 border-b border-white font-mono">
              <th class="px-4 py-3">#ID</th>
              <th class="px-4 py-3">Post Id</th>
              <th class="px-4 py-3">Comment</th>
              <th class="px-4 py-3">Commented by</th>
              <th class="px-4 py-3">Created at</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white font-mono">
            @foreach ($comments as $comment)
                <tr class="text-gray-700">
                  <td class="px-4 py-3 border">
                    <div class="flex items-center text-sm">
                      <div>
                        <p class="font-semibold text-black">{{$comment->id}}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-xs font-semibold border w-">{{$comment->post->id}}</td>
                  <td class="px-4 py-3 text-xs border w-1/4">
                    <span class="px-2 py-1 font-semibold">{{$comment->body}}</span>
                  </td>
                  <td class="px-4 py-3 text-xs border">{{$comment->user->name}}</td>
                  <td class="px-4 py-3 text-xs border">{{$comment->created_at}}</td>
                  <td class="px-4 py-3 text-xs border">
                      <div class="flex justify-center">
                          
                          <form action="{{ route('admin.comment.destroy', $comment) }}" method="post" class="mx-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 font-bold text-gray-100 bg-red-600 rounded hover:bg-red-500 hover:cursor-pointer">
                                Delete
                            </button>
                        </form>
                       
                      </div> 
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @else
    <div class="flex justify-center w-full bg-white p-5 rounded-lg mt-2 mb-6 font-bold uppercase">
      THis post has no comments
    </div>
    @endif    
  </div>
@endsection