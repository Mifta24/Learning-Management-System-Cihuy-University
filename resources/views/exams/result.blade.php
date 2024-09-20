<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h1 class="h3 text-center">{{ $result->exam->course->name    }} Result</h1>
                <h2 class="h4">{{ $result->exam->title }} Result</h2>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <p class="h5"><strong>Your Score: </strong> <span class="badge bg-success">{{ $result->score }}</span></p>
                </div>

                <h3 class="h5">Your Answers</h3>
                <ul class="list-group list-group-flush">
                    @foreach ($result->user->answers as $index => $answer)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{-- <span>Question {{ $index + 1 }}: {{ $answer->examQuestion->question }}</span> --}}
                        <span class="badge bg-info text-dark">{{'No '. $index.' . '.$answer->answer }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="card-footer text-center">
                {{-- <a href="{{ route('exams.index') }}" class="btn btn-secondary">Back to Exams</a> --}}
            </div>
        </div>
    </div>
</x-app-layout>
