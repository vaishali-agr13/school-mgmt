<!-- resources/views/welcome.blade.php (or home.blade.php) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Kingdom Inspired Theme</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Kids Kingdom Play School</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#rides">Rides</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="hero container">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">
              <img src="{{ asset('images/photo1.jpg') }}"
                        class="d-block w-100"
                        style="height:90vh; object-fit:cover; object-position:center 20%;">
             <div class="carousel-caption d-none d-md-block">
                    <h1>Welcome to Kids Kingdom School</h1>
                    <p>Happy learning starts here</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/photo2.avif') }}" class="d-block w-100" style="height:90vh; object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Modern Classroom Learning</h1>
                    <p>Smart education with fun activities</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/photo3.jpg') }}" class="d-block w-100" style="height:90vh; object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Outdoor Playground Fun</h1>
                    <p>Learning through play and joy</p>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{ asset('images/photo1.jpg') }}" class="d-block w-100" style="height:90vh; object-fit:cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Creative Activities Zone</h1>
                    <p>Art, craft and imagination growth</p>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>
</section>


<section class="gallery-section py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Gallery</h2>
            <p class="text-muted">Memories of fun, joy and learning moments</p>
        </div>

        <div class="row g-3">

            <div class="col-md-4 col-6">
                <div class="gallery-card">
                    <img src="{{ asset('images/photo4.jpg') }}">
                </div>
            </div>

            <div class="col-md-4 col-6">
                <div class="gallery-card">
                    <img src="{{ asset('images/photo5.jpg') }}">
                </div>
            </div>

            <div class="col-md-4 col-6">
                <div class="gallery-card">
                    <img src="{{ asset('images/photo6.jpg') }}">
                </div>
            </div>

            <div class="col-md-4 col-6">
                <div class="gallery-card">
                    <img src="{{ asset('images/photo7.jpg') }}">
                </div>
            </div>

            <div class="col-md-4 col-6">
                <div class="gallery-card">
                    <img src="{{ asset('images/photo8.webp') }}">
                </div>
            </div>

            <div class="col-md-4 col-6">
                <div class="gallery-card">
                    <img src="{{ asset('images/photo9.jpg') }}">
                </div>
            </div>

        </div>

    </div>
</section>

<section class="celebration-section py-5">
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="text-white">Celebrations at Kids Kingdom</h2>
            <p class="text-light">Moments of joy, festivals & fun activities</p>
        </div>

        <div id="celebrationCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner rounded-4 overflow-hidden">

                <div class="carousel-item active">
                    <img src="{{ asset('images/photo9.jpg') }}"
                         class="d-block w-100 celebration-img">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('images/photo10.jpg') }}"
                         class="d-block w-100 celebration-img">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('images/photo11.webp') }}"
                         class="d-block w-100 celebration-img">
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#celebrationCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#celebrationCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>
</section>

<section class="visitor-delight py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Parents’ & Kids’ Delight</h2>
            <p class="text-muted">Creating joyful learning experiences every day at Kids Kingdom Play School</p>
        </div>

        <div class="row g-4">

            <div class="col-md-3 col-6">
                <div class="delight-card">
                    <h2>500+</h2>
                    <p>Happy Students</p>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="delight-card">
                    <h2>50+</h2>
                    <p>Qualified Teachers</p>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="delight-card">
                    <h2>100%</h2>
                    <p>Safe Environment</p>
                </div>
            </div>

            <div class="col-md-3 col-6">
                <div class="delight-card">
                    <h2>10+</h2>
                    <p>Learning Activities</p>
                </div>
            </div>

        </div>
        <div class="row mt-5 about-row">

            <div class="col-md-6 about-img-box">
                <img src="{{ asset('images/photo7.avif') }}"
                    class="about-img">
            </div>

            <div class="col-md-6 about-text">
                <h3 class="fw-bold">A Place Where Kids Love to Learn</h3>
                <p class="text-muted">
                    At Kids Kingdom Play School, we focus on joyful learning, creativity and personality development.
                    Our environment is designed to make every child feel safe, happy and confident.
                </p>

                <ul class="list-unstyled">
                    <li>✔ Activity-based learning</li>
                    <li>✔ Play & learn environment</li>
                    <li>✔ Experienced teachers</li>
                    <li>✔ Safe and secure campus</li>
                </ul>
            </div>

        </div>

    </div>
</section>

<section class="visitors-delight py-5">
    <div class="container">

        <!-- Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <h2 class="section-title">VISITORS’ DELIGHT!</h2>
                <p class="text-muted mb-0">What parents say about Kids Kingdom Play School</p>
            </div>

            <div class="btn-group-custom">
                <a href="#" class="btn-outline">See All Reviews</a>
                <a href="#" class="btn-outline">Write A Review</a>
            </div>
        </div>

        <!-- Cards -->
        <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-md-4 d-flex">
                <div class="review-card">
                    <div class="avatar">
                        <img src="{{ asset('images/photo13.jpg') }}">
                    </div>

                    <h4>Neha Sharma</h4>

                    <p>
                        Kids Kingdom Play School is the best choice for my child.
                        Teachers are very caring and environment is very safe and joyful.
                    </p>

                    <div class="icons">
                        <span>f</span>
                        <span>▶</span>
                        <span>📷</span>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="review-card">
                    <div class="avatar">
                        <img src="{{ asset('images/photo14.jpg') }}">
                    </div>

                    <h4>Amit Verma</h4>

                    <p>
                        Amazing learning environment with fun activities.
                        Kids Kingdom focuses on overall child development.
                    </p>

                    <div class="icons">
                        <span>f</span>
                        <span>▶</span>
                        <span>📷</span>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="review-card">
                    <div class="avatar">
                        <img src="{{ asset('images/photo14.jpg') }}">
                    </div>

                    <h4>Priya Mehta</h4>

                    <p>
                        Very happy with the progress of my child.
                        Safe, clean and highly recommended school.
                    </p>

                    <div class="icons">
                        <span>f</span>
                        <span>▶</span>
                        <span>📷</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="attractions">
    <div class="container">
        <h2 class="section-title">ATTRACTIONS</h2>
        <p class="section-subtitle">
            Explore the joyful world of Kids Kingdom Play School where learning meets fun!
        </p>

        <div class="attraction-grid">

            <div class="card">
                <img src="{{ asset('images/photo15.jpg') }}" alt="Play Zone">
                <div class="card-content">
                    <h3>Indoor Play Zone</h3>
                    <p>Safe and colorful indoor play area designed for fun learning and physical activity.</p>
                </div>
            </div>

            <div class="card">
                <img src="{{ asset('images/photo16.jpg') }}" alt="Activity Room">
                <div class="card-content">
                    <h3>Activity Rooms</h3>
                    <p>Creative spaces for drawing, craft, storytelling and interactive learning sessions.</p>
                </div>
            </div>

            <div class="card">
                <img src="{{ asset('images/photo17.jpg') }}" alt="Outdoor Play">
                <div class="card-content">
                    <h3>Outdoor Play Area</h3>
                    <p>Open-air playground with swings, slides and adventure equipment for kids.</p>
                </div>
            </div>

            <div class="card">
                <img src="{{ asset('images/photo18.webp') }}" alt="Learning Zone">
                <div class="card-content">
                    <h3>Smart Learning Zone</h3>
                    <p>Interactive digital learning environment for early childhood development.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Contact -->
<section id="contact" class="container">
    <div class="section-title">
        <h2>Contact Us</h2>
    </div>

    <form>
        <div class="row">
            <div class="col-md-6 mb-3">
                <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-6 mb-3">
                <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-12 mb-3">
                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
            </div>
            <div class="col-md-12">
                <button class="btn btn-dark">Send Message</button>
            </div>
        </div>
    </form>
</section>

<!-- Footer -->
<footer>
    <p>© 2026 Kids Kingdom</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.querySelector('#heroCarousel');
        if (el) {
            new bootstrap.Carousel(el, {
                interval: 3000,
                ride: 'carousel',
                pause: false
            });
        }
    });
</script>
</body>
</html>
