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
                    <p class="text-xl">
                        Department
                        <span class="ms-2 font-bold text-lg">
                            {{
                                auth()->user()->department->name;
                            }}
                        </span>
                    </p>
                    
                    <div class="flex mt-2">
                        <a href="{{ route ('courses.create') }}" type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Create Course
                        </a>
                      
                        @if (auth()->user()->isAdmin())
                            <a href="{{ route('workflows.index') }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                Workflow
                            </a>
                        @endif
                        <a href="{{route('notification')}}" type="button" class="text-white ms-auto bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Notifications
                        </a>
                    </div>
                    {{-- main end --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
