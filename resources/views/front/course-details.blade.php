<x-app-layout>

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading bg-success py-5 text-white">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold">Course Details</h1>
                        <p class="lead">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs bg-light py-2">
            <div class="container">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Course Details</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section py-5">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8">
                    <img src="{{ Storage::url($course->cover) }}" class="img-fluid rounded mb-4" alt="Course Image">
                    <h3 class="mb-3">{{ $course->name }}</h3>
                    <p class="text-muted">
                        Qui et explicabo voluptatem et ab qui vero et voluptas. Sint voluptates temporibus quam autem. Atque nostrum voluptatum laudantium a doloremque enim et ut dicta.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Trainer</h5>
                                <p><a href="#" class="text-primary">{{ $course->lecturer->name }}</a></p>
                            </div>
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Learning Materials</h5>
                                <p>{{ $course->learning()->count() }}</p>
                            </div>
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Exams</h5>
                                <p>{{ $course->exams()->count() }}</p>
                            </div>
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Available Students</h5>
                                <p>{{ $course->students()->count() }}</p>
                            </div>
                            <div class="course-info d-flex justify-content-between align-items-center">
                                <h5>Schedule</h5>
                                <p>5.00 pm - 7.00 pm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Courses Course Details Section -->

    <!-- Learning Materials Section -->
    <section id="learning-materials" class="learning-materials section py-5 bg-light">
        <div class="container" data-aos="fade-up">
            <h4 class="mb-4">Learning Materials</h4>
            <!-- List of Learning Materials -->
            <ul class="list-group">
                @foreach ($course->learning as $material)
                    <li class="list-group-item">
                        <a href="{{ route('learning.detail', $material->id) }}" class="text-decoration-none text-dark fw-bold">
                            {{ $material->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section><!-- /Learning Materials Section -->

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section py-5">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h4 class="mb-4">Exams</h4>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        @forelse ($course->exams as $exam)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                    href="#exam{{ $exam->id }}">{{ $exam->title }}</a>
                            </li>
                        @empty
                            <li class="nav-item">
                                <p>No Exams Found</p>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        @forelse ($course->exams as $exam)
                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="exam{{ $exam->id }}">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>{{ $exam->title }}</h3>
                                        <p class="fst-italic">Start Time: {{ $exam->start_time }} | End Time: {{ $exam->end_time }}</p>
                                        <p>{{ $exam->description }}</p>

                                        @if (Auth::user()->hasRole('student'))
                                            @php
                                                $examResult = Auth::user()
                                                    ->results()
                                                    ->where('exam_id', $exam->id)
                                                    ->first();
                                                $now = now();
                                            @endphp

                                            @if (!$examResult)
                                                @if ($exam->start_time <= $now && $exam->end_time >= $now)
                                                    <a href="{{ route('exam.start', $exam->id) }}" class="btn btn-primary">Start Exam</a>
                                                @else
                                                    <button class="btn btn-secondary" disabled>Exam Not Available</button>
                                                @endif
                                            @else
                                                <p class="bg-info p-2 text-center">You have already completed this exam.</p>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-1.png" alt="Exam Image" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No Exams Found</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Tabs Section -->

</x-app-layout>
