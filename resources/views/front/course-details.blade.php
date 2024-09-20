<x-app-layout>


    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Course Details</h1>
                        <p class="mb-0">Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint
                            voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores.
                            Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Course Details</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Courses Course Details Section -->
    <section id="courses-course-details" class="courses-course-details section">

        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <img src="assets/img/course-details.jpg" class="img-fluid" alt="">
                    <h3>{{ $course->name }}</h3>
                    <p>
                        Qui et explicabo voluptatem et ab qui vero et voluptas. Sint voluptates temporibus quam autem.
                        Atque nostrum voluptatum laudantium a doloremque enim et ut dicta. Nostrum ducimus est iure
                        minima totam doloribus nisi ullam deserunt. Corporis aut officiis sit nihil est. Labore aut
                        sapiente aperiam.
                        Qui voluptas qui vero ipsum ea voluptatem. Omnis et est. Voluptatem officia voluptatem adipisci
                        et iusto provident doloremque consequatur. Quia et porro est. Et qui corrupti laudantium ipsa.
                        Eum quasi saepe aperiam qui delectus quaerat in. Vitae mollitia ipsa quam. Ipsa aut qui numquam
                        eum iste est dolorum. Rem voluptas ut sit ut.
                    </p>
                </div>
                <div class="col-lg-4">

                    <div class="course-info d-flex justify-content-between align-items-center">
                        <h5>Trainer</h5>
                        <p><a href="#">{{ $course->lecturer->name }}</a></p>
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

    </section><!-- /Courses Course Details Section -->

    <!-- Tabs Section -->
    <section id="tabs" class="tabs section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        @forelse ($course->exams as $exam)
                            <li class="nav-item">
                                <a class="nav-link active show" data-bs-toggle="tab"
                                    href="#{{ $exam->title }}">{{ $exam->title }}</a>
                            </li>
                        @empty
                            <li>
                                <p>No Exams Found</p>
                            </li>
                        @endforelse

                    </ul>
                </div>
                <div class="col-lg-9 mt-4 mt-lg-0">
                    <div class="tab-content">
                        @forelse ($course->exams as $exam)
                            <div class="tab-pane active show" id="{{ $exam->title }}">
                                <div class="row">
                                    <div class="col-lg-8 details order-2 order-lg-1">
                                        <h3>{{ $exam->title }}</h3>
                                        <p class="fst-italic">Start Time: {{ $exam->start_time }} | End Time:
                                            {{ $exam->end_time }}</p>
                                        <p>{{ $exam->description }}</p>

                                        @if (Auth::user()->hasRole('student'))
                                            @php
                                                // Cek apakah student sudah memiliki hasil ujian dari exam tersebut
                                                $examResult = Auth::user()
                                                    ->results()
                                                    ->where('exam_id', $exam->id)
                                                    ->first();
                                                // Cek waktu sekarang
                                                $now = now();
                                            @endphp

                                            {{-- Jika student belum memiliki hasil ujian --}}
                                            @if (!$examResult)
                                                {{-- Cek apakah waktu sekarang lebih besar dari waktu mulai dan kurang dari waktu berakhir --}}
                                                @if ($exam->start_time <= $now && $exam->end_time >= $now)
                                                    <a href="{{ route('exam.start', $exam->id) }}"
                                                        class="btn btn-primary">Start Exam</a>
                                                @else
                                                    <button class="btn btn-secondary" disabled>Exam Not
                                                        Available</button>
                                                @endif
                                            @else
                                                <p class="bg-info">You have already completed this exam.</p>
                                            @endif
                                        @endif

                                    </div>
                                    <div class="col-lg-4 text-center order-1 order-lg-2">
                                        <img src="assets/img/tabs/tab-1.png" alt="" class="img-fluid">
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
