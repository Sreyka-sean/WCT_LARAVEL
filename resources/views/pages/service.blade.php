<!-- filepath: c:\Users\user\Desktop\laravel_wct\resources\views\pages\service.blade.php -->
@extends('layouts.app')

@section('content')

    <!-- Page Title -->
    <div class="page-title accent-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Services</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li class="current">Services</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Features Section -->
    <section id="features" class="features section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Features</h2>
            <p>Explore the amazing features we offer to enhance your experience.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">
                @forelse($features as $feature)
                    <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="features-item">
                            @if($feature->image)
                                <img src="{{ asset('storage/' . $feature->image) }}" class="img-fluid mb-3" alt="{{ $feature->name }}">
                            @endif
                            <h3>{{ $feature->name }}</h3>
                        </div>
                    </div><!-- End Feature Item -->
                @empty
                    <p class="text-center">No features available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section><!-- /Features Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Card</li>
                    <li data-filter=".filter-branding">Web</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <!-- Example Portfolio Items -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('/theme/Company-1.0.0/assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>Lorem ipsum, dolor sit</p>
                            <a href="{{ asset('/theme/Company-1.0.0/assets/img/masonry-portfolio/masonry-portfolio-1.jpg') }}" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div><!-- End Portfolio Item -->
                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Portfolio Section -->

@endsection