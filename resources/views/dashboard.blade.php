<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session()->has('success'))
                        {{session('success')}}
                    @endif
                </div>

                @if (Auth::user()->role == 'examiner')
                    <a href="{{ route('questions.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Question to Question Bank</a>
                    <a href="{{ route('questions.index') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4">Question Bank</a>
                    <a href="{{ route('exams.create') }}" class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded ml-4">Create Exam</a>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
