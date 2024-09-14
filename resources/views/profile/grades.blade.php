<x-app-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Nilai Ujian Saya</h2>

        @if($scores->isEmpty())
            <div class="alert alert-warning">
                Kamu belum memiliki nilai ujian.
            </div>
        @else
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ujian</th>
                        <th>Tanggal</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentAnswers as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->question->exam->title }}</td>
                            <td>{{ $data->created_at->format('d M Y') }}</td>
                            <td>{{ $score }} / 100</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
