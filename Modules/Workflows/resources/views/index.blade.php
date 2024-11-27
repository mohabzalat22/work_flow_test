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
                      
                    <form action="{{route('workflows.store')}}" method="post" class="max-w-sm mx-auto">
                        @method('post')
                        @csrf
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select name="course"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Choose a Course</option>

                            @foreach ($courses as $c)
                                <option value="US">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        <ul class="bg-gray-200 p-2 rounded m-2">
                            @foreach ($workflows as $w)
                            <li class="w-full my-1 text-lg bg-white p-1 rounded">
                                    {{$w->order}} -
                                    <span class="ms-2 capitalize">
                                        {{$w->name}}
                                    </span>
                                </li> 
                            @endforeach
                        </ul>
            
                        @if (auth()->check() && auth()->user()->isAdmin())
                        <a href="{{route('start')}}" type="submit" class="focus:outline-none block text-center w-full my-2 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            Start working
                        </a>
                        @endif
                    </form>
  
                    {{-- main end --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
