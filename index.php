<?php include "connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Horos | Premium Watches</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body onload="loadProduct(0);" class="new-home-body">



    <?php include "homeNav.php"; ?>

    <section class="hero">
        <div class="hero-content" style="padding: 100px;">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="title-line">WHERE STYLE</span>
                    <span class="title-accent">MEETS LEGACY</span>
                </h1>
                <p class="hero-subtitle">
                    Explore exclusive collections that merge contemporary design with timeless craftsmanship. Each watch is a statement of precision, elegance, and innovation.
                </p>
                <div class="hero-actions">
                    <button class="btn-primary hero-btn" onclick="document.querySelector('.featured-section').scrollIntoView({behavior: 'smooth'})">
                        Explore Collection
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Premium Items</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">99%</div>
                    <div class="stat-label">Satisfaction Rate</div>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Featured</div>
                <h2 class="section-title">Curated Collections</h2>
                <p class="section-subtitle">
                    Exceptional timepieces, thoughtfully selected to reflect the highest standards of design, quality, and craftsmanship.
                </p>
            </div>

            <div class="products-container">
                <div class="products-grid" id="pid">
                </div>
            </div>

            <div class="section-footer">
                <button class="view-all-btn" onclick="location.href='shop.php'">
                    View All Products
                    <i class="fas fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </section>





    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <div class="section-badge">Categories</div>
                <h2 class="section-title">Pick Your Style</h2>
            </div>

            <div class="categories-grid">
                <div class="category-card large">
                    <div class="category-image">
                        <div class="category-overlay"></div>
                        <div class="category-content">
                            <h3 class="category-title">Luxury</h3>
                            <p class="category-subtitle">Audemars Piguet</p>
                            <button class="category-btn" onclick="location.href='shop.php'">Shop Now</button>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image2">
                        <div class="category-overlay"></div>
                        <div class="category-content">
                            <h3 class="category-title">Pilot</h3>
                            <p class="category-subtitle">IWC Schaffhausen</p>
                            <button class="category-btn" onclick="location.href='shop.php'">Shop Now</button>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image3">
                        <div class="category-overlay"></div>
                        <div class="category-content">
                            <h3 class="category-title">Dive</h3>
                            <p class="category-subtitle">Rolex</p>
                            <button class="category-btn" onclick="location.href='shop.php'">Shop Now</button>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image4">
                        <div class="category-overlay"></div>
                        <div class="category-content">
                            <h3 class="category-title">Sport</h3>
                            <p class="category-subtitle">Patek Philippe</p>
                            <button class="category-btn" onclick="location.href='shop.php'">Shop Now</button>
                        </div>
                    </div>
                </div>

                <div class="category-card">
                    <div class="category-image5">
                        <div class="category-overlay"></div>
                        <div class="category-content">
                            <h3 class="category-title">Chronograph</h3>
                            <p class="category-subtitle">TAG Heuer</p>
                            <button class="category-btn" onclick="location.href='shop.php'">Shop Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bestsellers-section">
        <div class="container">
            <div class="section-header centered">
                <div class="section-badge accent">Best Sellers</div>
                <h2 class="section-title">Customer Favorites</h2>
                <p class="section-subtitle">
                    The most loved timepieces by our community of watch enthusiasts
                </p>
            </div>

            <div class="testimonial-carousel">
                <div class="carousel-container">
                    <div class="carousel-track" id="carouselTrack">
                        <div class="testimonial-slide active">
                            <div class="testimonial-quote">
                                I've been wearing my Horo Classic for over a year now, and it still looks brand new. The craftsmanship is exceptional, and I get compliments everywhere I go. Best investment I've made!
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Marcus Chen</div>
                                    <div class="author-title">Business Executive</div>
                                    <div class="author-location">Singapore</div>
                                </div>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial-product">Horo Classic Steel</div>
                        </div>

                        <div class="testimonial-slide">
                            <div class="testimonial-quote">
                                The attention to detail on my Horo Sport is incredible. From the perfectly weighted feel to the smooth second hand movement, everything screams quality. Worth every penny!
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Sarah Johnson</div>
                                    <div class="author-title">Fitness Trainer</div>
                                    <div class="author-location">New York, USA</div>
                                </div>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial-product">Horo Sport Titanium</div>
                        </div>

                        <div class="testimonial-slide">
                            <div class="testimonial-quote">
                                I was looking for a watch that could transition from boardroom to weekend, and my Horo Elegance does exactly that. The design is timeless and sophisticated.
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name">James Rodriguez</div>
                                    <div class="author-title">Architect</div>
                                    <div class="author-location">Barcelona, Spain</div>
                                </div>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial-product">Horo Elegance Gold</div>
                        </div>

                        <div class="testimonial-slide">
                            <div class="testimonial-quote">
                                The precision and reliability of my Horo Professional is outstanding. As a pilot, I need a watch I can trust completely, and this delivers every single time.
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Captain Emily Watson</div>
                                    <div class="author-title">Commercial Pilot</div>
                                    <div class="author-location">London, UK</div>
                                </div>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial-product">Horo Professional GMT</div>
                        </div>

                        <div class="testimonial-slide">
                            <div class="testimonial-quote">
                                My Horo Vintage has become a conversation starter. The retro design mixed with modern reliability is perfect. I've already recommended it to three friends!
                            </div>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="author-info">
                                    <div class="author-name">Alex Thompson</div>
                                    <div class="author-title">Creative Director</div>
                                    <div class="author-location">Melbourne, Australia</div>
                                </div>
                                <div class="testimonial-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="testimonial-product">Horo Vintage Bronze</div>
                        </div>
                    </div>
                </div>

                <div class="carousel-controls">
                    <button class="carousel-btn" id="prevBtn">
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <div class="carousel-dots" id="carouselDots">
                        <button class="carousel-dot active" data-slide="0"></button>
                        <button class="carousel-dot" data-slide="1"></button>
                        <button class="carousel-dot" data-slide="2"></button>
                        <button class="carousel-dot" data-slide="3"></button>
                        <button class="carousel-dot" data-slide="4"></button>
                    </div>

                    <button class="carousel-btn" id="nextBtn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>



    <?php include "homeFooter.php"; ?>

    <script src="new-home-scripts.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>