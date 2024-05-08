<x-app-layout>
    <div class="w-96 mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-4">Question Bank</h1>

        @foreach ($questions as $question)
            <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                <h2 class="text-xl font-semibold">{{ $loop->iteration }}. {{ $question->question_text }}</h2>

                <ul class="list-disc list-inside mt-2 space-y-1">
                    @foreach (json_decode($question->options) as $index => $option)
                        <li class="pl-2">{{ chr(65 + $index) }}. {{ $option }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-4">Go Back</a>

        </div>
    </div>
</x-app-layout>
