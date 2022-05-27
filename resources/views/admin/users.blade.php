@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">
  <div class="flex justify-center w-full bg-blue-800 p-5 rounded-lg mt-2 mb-6 font-bold text-white">
    Users management
  </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-md font-semibold tracking-wide text-left text-white bg-blue-800 border-b border-white font-mono">
              <th class="px-4 py-3">#ID</th>
              <th class="px-4 py-3">Full name</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Phone</th>
              <th class="px-4 py-3">Created at</th>
              <th class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white font-mono">
            @foreach ($users as $user)
                @if (!($user->is_admin))
                    <tr class="text-gray-700">
                    <td class="px-4 py-3 border">
                        <div class="flex items-center text-sm">
                        <div>
                            <p class="font-semibold text-black">{{$user->id}}</p>
                        </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-xs font-semibold border w-">{{$user->name}}</td>
                    <td class="px-4 py-3 text-xs border w-1/4">
                        <span class="px-2 py-1 font-semibold">{{$user->email}}</span>
                    </td>
                    <td class="px-4 py-3 text-xs border">{{$user->phone}}</td>
                    <td class="px-4 py-3 text-xs border">{{$user->created_at}}</td>
                    <td class="px-4 py-3 text-xs border">
                      <div class="flex justify-center items-center">
                        <form action="{{ route('admin.user.destroy', $user) }}" method="post" class="mx-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 font-bold text-gray-100 bg-red-600 rounded hover:bg-red-500 hover:cursor-pointer">
                                Delete
                            </button>
                        </form>
                        <a href="{{ route('admin.posts', $user) }}" class="mx-2">
                            <span class="px-2 py-1 font-bold text-gray-100 bg-blue-600 rounded hover:bg-blue-500 hover:cursor-pointer">
                                Show
                            </span>
                        </a>
                    </div>
                         
                    </td>
                    </tr>
                @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection