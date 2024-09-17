<x-app-layout>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

        <div class="container">
            <h2 data-aos="fade-up" data-aos-delay="100">Learning Today,<br>Leading Tomorrow</h2>
            <p data-aos="fade-up" data-aos-delay="200">We are a team of learning management systems</p>
            <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="/login" class="btn-get-started">Get Started</a>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Cihuy University</h3>
                    <p class="fst-italic">
                        Welcome to Cihuy University, your trusted partner in the world of online education. Our platform
                        is designed to provide a dynamic and interactive learning experience, tailored for both students
                        and educators. At Cihuy University, we believe in the power of education to unlock potential and
                        transform lives
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span>User-friendly features.</span></li>
                        <li><i class="bi bi-check-circle"></i> <span> Seamless access.</span></li>

                    </ul>
                    <p class="fst-italic">
                        we are committed to fostering an engaging and inclusive learning environment. Whether you're
                        advancing your career, exploring new skills, or teaching the next generation, Cihuy University
                        is here to support your journey every step of the way.

                        Join us in embracing the future of learning!
                    </p>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">

                <!-- Students Count -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $studentCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Students</p>
                    </div>
                </div><!-- End Stats Item -->

                <!-- Courses Count -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ count($courses) }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Courses</p>
                    </div>
                </div><!-- End Stats Item -->

                <!-- Exams Count -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $examsCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Exams</p>
                    </div>
                </div><!-- End Stats Item -->

                <!-- Lecturers Count -->
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $teacherCount }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>Lecturers</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>
        </div>
    </section><!-- /Counts Section -->


    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="why-box">
                        <h3>Why should we use LMS?</h3>
                        <p>

                            LMS allows students to learn anytime and anywhere without limitations, making it easier for
                            teachers to manage and distribute materials online. With features like online discussions
                            and assignments, communication between teachers and students becomes seamless. The content
                            can be tailored to meet the needs and abilities of each student, while teachers can monitor
                            their progress in real-time. Additionally, LMS helps reduce operational costs by providing
                            digital learning materials, making it suitable for both small and large educational
                            institutions. Overall, LMS offers a flexible, efficient, and well-organized learning
                            solution.
                        </p>
                        <div class="text-center">
                            <a href="#" class="more-btn"><span>Learn More</span> <i
                                    class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div><!-- End Why Box -->

                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-xl-4">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-clipboard-data"></i>
                                <h4>Flexible Access to Learning</h4>
                                <p>LMS allows students to access learning materials anytime and anywhere. This is
                                    especially helpful for those who have busy schedules or live far away from
                                    educational institutions. With an LMS, the learning process becomes unlimited in
                                    space and time.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-gem"></i>
                                <h4>Ease of Use</h4>
                                <p>
                                    The intuitive and user-friendly interface makes it easy for anyone to adapt quickly.
                                    Students, lecturers, and administrators can all manage learning easily without the
                                    need for high technical skills.</p>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-inboxes"></i>
                                <h4>Reliable Security System</h4>
                                <p>
                                    We prioritize data security and user privacy. Our system is equipped with advanced
                                    protection to keep personal information and learning activities safe.</p>
                            </div>
                        </div><!-- End Icon Box -->

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Why Us Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="features-item">
                        <i class="bi bi-eye" style="color: #ffbb2c;"></i>
                        <h3><a href="" class="stretched-link">Lorem Ipsum</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="features-item">
                        <i class="bi bi-infinity" style="color: #5578ff;"></i>
                        <h3><a href="" class="stretched-link">Dolor Sitema</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="features-item">
                        <i class="bi bi-mortarboard" style="color: #e80368;"></i>
                        <h3><a href="" class="stretched-link">Sed perspiciatis</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="features-item">
                        <i class="bi bi-nut" style="color: #e361ff;"></i>
                        <h3><a href="" class="stretched-link">Magni Dolores</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="features-item">
                        <i class="bi bi-shuffle" style="color: #47aeff;"></i>
                        <h3><a href="" class="stretched-link">Nemo Enim</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="features-item">
                        <i class="bi bi-star" style="color: #ffa76e;"></i>
                        <h3><a href="" class="stretched-link">Eiusmod Tempor</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
                    <div class="features-item">
                        <i class="bi bi-x-diamond" style="color: #11dbcf;"></i>
                        <h3><a href="" class="stretched-link">Midela Teren</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
                    <div class="features-item">
                        <i class="bi bi-camera-video" style="color: #4233ff;"></i>
                        <h3><a href="" class="stretched-link">Pira Neve</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
                    <div class="features-item">
                        <i class="bi bi-command" style="color: #b2904f;"></i>
                        <h3><a href="" class="stretched-link">Dirada Pack</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
                    <div class="features-item">
                        <i class="bi bi-dribbble" style="color: #b20969;"></i>
                        <h3><a href="" class="stretched-link">Moton Ideal</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
                    <div class="features-item">
                        <i class="bi bi-activity" style="color: #ff5828;"></i>
                        <h3><a href="" class="stretched-link">Verdo Park</a></h3>
                    </div>
                </div><!-- End Feature Item -->

                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
                    <div class="features-item">
                        <i class="bi bi-brightness-high" style="color: #29cc61;"></i>
                        <h3><a href="" class="stretched-link">Flavor Nivelanda</a></h3>
                    </div>
                </div><!-- End Feature Item -->

            </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Courses</h2>
            <p>Popular Courses</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                @forelse ($courses as $course)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                        data-aos-delay="100">
                        <div class="course-item">
                            <img src="{{ asset('storage/' . $course->cover) }}" class="img-fluid" width="500px"
                                height="300px" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <p class="category">{{ $course->category->name }}</p>
                                    <p class="price">Time: $169</p>
                                </div>

                                <h3><a href="#">{{ $course->name }}</a></h3>
                                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id
                                    facere quia quae dolores dolorem tempore.</p>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <img src="assets/img/trainers/trainer-1-2.jpg" class="img-fluid"
                                            alt="">
                                        <a href="" class="trainer-link">{{ $course->lecturer->name }}</a>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bi bi-person user-icon"></i>&nbsp;{{ $course->students->count() }}
                                        &nbsp;&nbsp;
                                        <i class="bi bi-book user-icon"></i>&nbsp;{{ $course->exams()->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                @empty
                @endforelse


            </div>

        </div>

    </section><!-- /Courses Section -->

    <!-- Trainers Index Section -->
    <section id="trainers-index" class="section trainers-index">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Mulyono Widodo</h4>
                            <span>Rector</span>
                            <p>
                                I am a rector of Cihuy University with 8 years of experience as a
                                leader.
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Sarah Jhinson</h4>
                            <span>Vice Rector</span>
                            <p>
                                I am a deputy rector of Cihuy University with 5 years of experience as a
                                Mr. Mulyono's Mistress.
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>William Anderson</h4>
                            <span>Head of Faculty</span>
                            <p>
                                I am a faculty head of cihuy university with 5 years of experience
                                as a licker of Mr. Mulyono.
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

            </div>

        </div>

    </section><!-- /Trainers Index Section -->

</x-app-layout>
