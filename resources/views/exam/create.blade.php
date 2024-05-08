<x-app-layout>
    <div class="w-full max-w-lg mx-auto mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('exams.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Exam Title
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Exam Title" name="title">
            </div>
            <div class="mb-4 flex justify-start items-center">
                <label class="text-gray-700 text-sm font-bold" for="negative_marking">
                    Negative Marking (Checkbox)
                </label>
                <input class="shadow appearance-none border rounded w-4 h-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="negative_marking" type="checkbox" name="negative_marking">
            </div>

            <div class="mb-4 flex justify-start items-center">
                <label class="text-green-900 text-xl font-bold" for="negative_marking">
                    Select Questions from the Following for This Exam
                </label>

            </div>

            @foreach ($questions as $question)
                <div class="mb-4">
                    <div class="flex justify-start items-center">
                        <label class="text-gray-700 text-sm font-bold" for="questions[{{ $question->id }}]">
                            {{ $question->question_text }}
                        </label>
                        <input type="hidden" name="questions[{{ $question->id }}]" value="0">
                        <input class="shadow appearance-none border rounded w-4 h-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="questions[{{ $question->id }}]" type="checkbox" name="questions[{{ $question->id }}]" value="1">
                    </div>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mt-2" id="marks[{{ $question->id }}]" type="number" placeholder="Grade this question" name="marks[{{ $question->id }}]">
                </div>
            @endforeach
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Create Exam
                </button>
                <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-4">Go Back</a>
            </div>
        </form>
    </div>
</x-app-layout>
