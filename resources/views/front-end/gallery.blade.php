@include('front-end.layouts.header')


<!-- Page Header End -->
        <div class="container-fluid py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Gallery</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->

<!-- Gallery Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        
        <!-- Section Heading -->
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
            <h1 class="mb-3">Our Gallery</h1>
            <p>
                Explore memorable moments from our classrooms, cultural programs, 
                fun activities, celebrations, and student achievements.
            </p>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4">

            <!-- Photo Item -->

           @foreach($galleries as $gallery)

                <div class="col-lg-4 col-md-6 wow fadeInUp"
                    data-wow-delay="{{ $loop->iteration * 0.2 }}s">

                    <div class="gallery-item position-relative overflow-hidden rounded">

                        {{-- IMAGE --}}
                        @if($gallery->type == 'image')

                            <img src="{{ asset($gallery->file) }}"
                                class="img-fluid w-100"
                                style="height:300px; object-fit:cover;"
                                alt="">

                            <div class="gallery-overlay">

                                <a href="{{ asset($gallery->file) }}"
                                class="btn btn-primary rounded-pill px-4">

                                    View Photo

                                </a>

                            </div>

                        {{-- VIDEO --}}
                        @elseif($gallery->type == 'video')

                            <div class="position-relative">

                                <video class="img-fluid w-100"
                                    style="height:300px; object-fit:cover;"
                                    muted
                                    playsinline>

                                    <source src="{{ asset($gallery->file) }}" type="video/mp4">

                                </video>

                                {{-- PLAY BUTTON --}}
                                <div class="video-icon">

                                    <a href="{{ asset($gallery->file) }}"
                                    target="_blank"
                                    class="btn btn-primary btn-lg rounded-circle">

                                        <i class="fa fa-play"></i>

                                    </a>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>

            @endforeach
            

            <!-- Video Item -->
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="gallery-item position-relative overflow-hidden rounded">
                    <img src="{{ asset('img/gallery-2.jpg') }}" class="img-fluid w-100" alt="">

                    <div class="video-icon">

                        <a href="https://www.instagram.com/p/DWbi7xfgSB7/?__d=undefined" 
                            target="_blank"
                            class="btn btn-primary btn-lg rounded-circle">
                                <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- Photo Item -->
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="gallery-item position-relative overflow-hidden rounded">
                    <img src="img/gallery-3.jpg" class="img-fluid w-100" alt="">

                    <div class="gallery-overlay">
                        <a href="{{ asset('img/gallery-3.jpg') }}" class="btn btn-primary rounded-pill px-4">
                            View Photo
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- Video Item -->
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="gallery-item position-relative overflow-hidden rounded">
                    <img src="{{ asset('img/gallery-4.jpg') }}" class="img-fluid w-100" alt="">

                    <div class="video-icon">
                        <a href="https://www.instagram.com/reels/DMZcaPrTit4/" 
                            target="_blank"
                            class="btn btn-primary btn-lg rounded-circle">
                                <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- Photo Item -->
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="gallery-item position-relative overflow-hidden rounded">
                    <img src="{{ asset('img/gallery-5.jpg') }}" class="img-fluid w-100" alt="">

                    <div class="gallery-overlay">
                        <a href="img/gallery-5.jpg" class="btn btn-primary rounded-pill px-4">
                            View Photo
                        </a>
                    </div>
                </div>
            </div> -->

            <!-- Photo Item -->
            <!-- <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="gallery-item position-relative overflow-hidden rounded">
                    <img src="{{ asset('img/gallery-6.jpg') }}" class="img-fluid w-100" alt="">

                    <div class="gallery-overlay">
                        <a href="img/gallery-6.jpg" class="btn btn-primary rounded-pill px-4">
                            View Photo
                        </a>
                    </div>
                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- Gallery End -->


<style>
.gallery-item {
    border-radius: 15px;
    cursor: pointer;
}

.gallery-item img {
    height: 280px;
    object-fit: cover;
    transition: 0.5s;
    border-radius: 15px;
}

.gallery-item:hover img {
    transform: scale(1.08);
}

.gallery-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.45);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: 0.5s;
    border-radius: 15px;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.video-icon {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.video-icon .btn {
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}
</style>


        <!-- Footer Start -->
              @include('front-end.layouts.footer')
