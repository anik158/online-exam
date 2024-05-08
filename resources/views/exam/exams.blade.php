<x-app-layout>
    <div class="flex flex-wrap justify-center mt-6">
        @foreach ($exams as $exam)
            <div class="w-64 h-72 bg-white shadow-md rounded p-4 m-4">
                <h2 class="text-xl font-bold mb-2">{{ $exam->title }}</h2>
                <p class="text-sm mb-2">Created by: {{ $exam->user->name }}</p>
                <p class="text-sm mb-2">Negative Marking: {{ $exam->negative_marking ? 'Yes' : 'No' }}</p>
                @php
                    $candidate_exam = $exam->candidateExams->where('user_id', auth()->user()->id)->first();
                @endphp
                @if($candidate_exam)
                    <p class="text-sm mb-2">Marks: {{ $candidate_exam->score }}</p>
                @else
                    <p class="text-sm mb-2">Marks: Not taken</p>
                @endif
                <a href="{{ route('candidates.takes-exam', $exam->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Take Exam</a>
            </div>
        @endforeach
    </div>
</x-app-layout>
