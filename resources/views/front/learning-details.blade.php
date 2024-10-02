<!-- Learning Material Detail Page -->

<x-app-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-success text-white">
                        <h2 class="h4 mb-0">{{ $material->title }}</h2>
                    </div>
                    <div class="card-body">
                        <p class="lead text-muted">{{ $material->description }}</p>

                        <!-- Display Video or Other Materials -->
                        @if ($material->video_path)
                            <div class="ratio ratio-16x9 mb-4">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $material->video_path }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                    allowfullscreen allowtransparency allow="autoplay"></iframe>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Video not available for this material.
                            </div>
                        @endif

                        <!-- Download Module Button -->
                        @if ($material->modul_path)
                            <div class="text-center mt-4">
                                <a href="{{ $material->modul_path }}" class="btn btn-lg btn-outline-primary" target="_blank">
                                    <i class="fas fa-file-download"></i> Download Module
                                </a>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Module not available for this material.
                            </div>
                        @endif

                    </div>
                    <div class="card-footer text-muted text-center">
                        <small>Last updated on {{ $material->updated_at->format('d M, Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
