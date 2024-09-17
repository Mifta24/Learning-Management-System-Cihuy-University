<x-app-layout>
    <div class="container mt-5">
        <h1 class="h3 mb-4">Your Exam Results</h1>

        @if($examResults->isEmpty())
            <div class="alert alert-warning" role="alert">
                You haven't completed any exams yet.
            </div>
        @else
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Exam Title</th>
                        <th>Date</th>
                        <th>Score</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($examResults as $index => $result)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $result->exam->title }}</td>
                            <td>{{ $result->created_at->format('d M, Y') }}</td>
                            <td>
                                <span class="badge {{ $result->score >= 50 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $result->score }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('exam.result', $result->exam->id) }}" class="btn btn-primary btn-sm">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
