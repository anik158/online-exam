<x-app-layout>
    <div class="w-96 mx-auto">
        <form method="POST" action="{{ route('questions.store') }}">
            @csrf

            <!-- Question Text -->
            <div>
                <x-input-label for="question_text" :value="__('Question is')" />
                <x-text-input id="question_text" class="block mt-1 w-full" type="text" name="question_text" :value="old('question_text')" required autofocus />
                <x-input-error :messages="$errors->get('question_text')" class="mt-2" />
            </div>

            <!-- Options -->
            <div>
                @for ($i = 0; $i < 4; $i++)
                    <div>
                        <label for="options.{{ $i }}">Option {{ $i + 1 }}</label>
                        <input id="options.{{ $i }}" class="block mt-1 w-full" type="text" name="options[]" required />
                    </div>
                @endfor
            </div>


            <!-- Correct Answers -->
            <div class="mt-4">
                <x-input-label for="correct_answers" :value="__('Correct Answers')" />
                <x-text-input id="correct_answers" class="block mt-1 w-full" type="text" name="correct_answers" :value="old('correct_answers')" required />
                <x-input-error :messages="$errors->get('correct_answers')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('dashboard') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-4">Cancel</a>
                <x-primary-button class="ms-4">
                    {{ __('Add Question') }}
                </x-primary-button>
            </div>

        </form>
    </div>
</x-app-layout>
