<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    {{-- session --}}
                    @if (session('message'))
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                        {{ session('message') }}
                      </div>
                    @endif
                    {{-- main --}}
                      @if ($notification)           
                      <div class="bg-gray-200 p-2 my-2">
                          <span class="fw-bolder text-lg">file: </span>
                          <a target="_blank" href = "uploads/{{ $notification->data["file"]  }} " class="text-blue-500">{{ $notification->data["file"]}}</a>
                          <p> <span class="fw-bolder text-lg">comment:</span> {{ $notification->data["comment"] }}</p>
                          <p>order - {{ $notification->data["order"] }}</p>
                      </div>
                      @endif
                     
                      <form class="bg-blue-100 p-4 rounded"  action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">   
                        @csrf  
                        <input type="file" class="block" name="file">
                          <input type="number" name="order" value="{{(int) $notification->data["order"] }}" hidden>
                          <p class="mt-10">Comment</p>
                          <input name="comment" type="text" id="first_name" class="bg-gray-50 border my-6  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="write comment" required />
                          <button type="submit" class="focus:outline-none w-full my-1 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">AGREE</button>
                        </form>
                        <a href="{{ route ('decline', [ 'order' => $notification->data["order"]])}}" type="button" class="focus:outline-none block w-full my-2 text-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">DECLINE</a>

                    {{-- main end --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
