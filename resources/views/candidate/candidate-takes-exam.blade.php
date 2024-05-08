<x-app-layout>
    <div class="w-full max-w-lg mx-auto mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('candidates.exam_store', $examId->id) }}">
            @csrf
            <div class="mb-4">
                <h2 class="block text-gray-700 text-xl font-bold mb-2">
                    {{ $examId->title }}
                </h2>
            </div>

            @foreach ($examId->examQuestions as $examQuestion)
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="answers[{{ $examQuestion->question_id }}]">
                        {{ $examQuestion->question->question_text }}
                    </label>

                    @foreach (json_decode($examQuestion->question->options) as $index => $option)
                        <div class="mt-2">
                            <label class="inline-flex items-center">
                                <input type="radio" class="form-radio" name="answers[{{ $examQuestion->question_id }}]" value="{{ $index }}">
                                <span class="ml-2">{{ $option }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="flex items-center justify-between">
{{--                @if (Auth::user()->role == 'candidate')--}}
{{--                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">--}}
{{--                        Submit Answers--}}
{{--                    </button>  --}}
{{--                @endif--}}

                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit Answers
                    </button>

                    <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-4">Go Back</a>
            </div>
        </form>
    </div>
</x-app-layout>
