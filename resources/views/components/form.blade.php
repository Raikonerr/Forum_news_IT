@props(['categories' => $categories, 'action' => $action])

    <form action="{{$action}}" method="post" class="w-full flex flex-col justify-center items-center my-4">
        @csrf
          <div class=" bg-white rounded-md px-6 py-10 w-8/12 mx-auto">
            <h1 class="text-center text-2xl font-bold text-gray-500 mb-10">ADD POST</h1>
            <div class="space-y-4">
              <div>
                <label for="title" class="text-lx font-serif">Categories:</label>
                <select name="category_id" class="ml-2 outline-none py-1 px-2 text-md border-2 rounded-md">
                    <option value=""><span class="text-blue-800">Choose category ...</span> </option>
                        @foreach ($categories as $category)
                            <x-category :category="$category" />
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-red-500 mb-3 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
            </div>
            <div>
                <label for="description" class="block mb-2 text-lg font-serif">Description:</label>
                <textarea id="description" placeholder="Describe everything about this post here" name="body" class="w-full font-serif  p-4 text-gray-600 bg-indigo-50 outline-none rounded-md  description sec p-3 rounded-lg h-50 border"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
              <button type="submit" class="px-6 py-2 mx-auto block rounded-md text-lg font-semibold text-indigo-100 bg-indigo-600  ">ADD POST</button>
            </div>
          </div>
    </form>