<x-app-layout>


    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Our Lecturers</h1>
                        <p class="mb-0">Cihuy University is proud to have a diverse team of experienced and
                            knowledgeable lecturers. They are experts in their respective fields, dedicated to providing
                            the best learning experience for our students. Below is a list of some of the lecturers who
                            are a part of our academic community.</p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Lecturers</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- Trainers Section -->
    <section id="trainers" class="section trainers">

        <div class="container">

            <div class="row gy-5">
                @forelse ($lecturers as $lecturer)
                    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info text-center">
                            <h4>{{ $lecturer->name }}</h4>
                            <span>Lecturer</span>
                            <p>Aliquam iure quaerat voluptatem praesentium possimus unde laudantium vel dolorum
                                distinctio
                                dire flow</p>
                        </div>
                    </div><!-- End Team Member -->
                @empty
                @endforelse
            </div>

        </div>

    </section><!-- /Trainers Section -->
</x-app-layout>
