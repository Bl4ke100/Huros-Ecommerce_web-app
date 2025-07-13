<?php include "connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horos | Premium Fashion</title>
    <link rel="stylesheet" href="new-home-styles.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body onload="loadProduct(0);" class="new-home-body">

    <style>
        /* new-home-styles.css */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-black: #000000;
            --secondary-black: #1a1a1a;
            --pure-white: #ffffff;
            --gray-100: #f8f9fa;
            --gray-200: #e9ecef;
            --gray-400: #6c757d;
            --gray-600: #495057;
            --gray-800: #343a40;

            --gradient-primary: linear-gradient(135deg, #000000 0%, #1a1a1a 50%, #2d2d2d 100%);
            --gradient-secondary: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);

            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 8px rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 8px 16px rgba(0, 0, 0, 0.2);
            --shadow-xl: 0 20px 40px rgba(0, 0, 0, 0.3);

            --border-radius-sm: 8px;
            --border-radius-md: 12px;
            --border-radius-lg: 16px;
            --border-radius-xl: 24px;

            --transition-fast: 0.2s ease;
            --transition-normal: 0.3s ease;
            --transition-slow: 0.5s ease;
        }

        body.new-home-body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--primary-black);
            color: var(--pure-white);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Search Modal */
        .search-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
        }

        .search-container {
            position: relative;
            background: var(--primary-black);
            border: 2px solid var(--pure-white);
            border-radius: var(--border-radius-xl);
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            z-index: 10000;
            animation: slideInUp 0.4s ease;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(50px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .search-header {
            padding: 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .search-header h3 {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .search-close {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--pure-white);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-close:hover {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .search-content {
            padding: 2rem;
        }

        .search-filters {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }




        .bestsellers-section {
            background: var(--secondary-black);
            padding: 6rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header.centered {
            text-align: center;
        }

        .section-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--primary-black);
            color: var(--pure-white);
            border: 2px solid var(--pure-white);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .section-badge.accent {
            background: var(--primary-black);
            color: var(--pure-white);
            border: 2px solid var(--pure-white);
        }

        .section-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--pure-white);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Enhanced Testimonial Carousel */
        .testimonial-carousel {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            padding: 3rem;
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            margin-top: 4rem;
        }

        .testimonial-carousel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
            pointer-events: none;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform;
        }

        .testimonial-slide {
            min-width: 100%;
            padding: 2rem;
            text-align: center;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .testimonial-slide.active {
            opacity: 1;
        }

        .testimonial-quote {
            font-size: 1.4rem;
            font-style: italic;
            color: var(--pure-white);
            margin-bottom: 2.5rem;
            line-height: 1.6;
            position: relative;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .testimonial-quote::before,
        .testimonial-quote::after {
            content: '"';
            font-size: 3rem;
            color: rgba(255, 255, 255, 0.3);
            position: absolute;
            font-family: serif;
        }

        .testimonial-quote::before {
            top: -1rem;
            left: -2rem;
        }

        .testimonial-quote::after {
            bottom: -2rem;
            right: -2rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--pure-white);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .author-info {
            text-align: left;
        }

        .author-name {
            font-weight: 600;
            color: var(--pure-white);
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .author-title {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 0.5rem;
        }

        .author-location {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
        }

        .testimonial-rating {
            color: #ffd700;
            font-size: 1.1rem;
            display: flex;
            gap: 0.25rem;
        }

        .testimonial-product {
            display: inline-block;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Carousel Controls */
        .carousel-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .carousel-btn {
            width: 50px;
            height: 50px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: transparent;
            color: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .carousel-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--pure-white);
            color: var(--pure-white);
            transform: scale(1.1);
        }

        .carousel-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            transform: none;
        }

        .carousel-dots {
            display: flex;
            gap: 0.5rem;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: transparent;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .carousel-dot.active {
            background: var(--pure-white);
            border-color: var(--pure-white);
        }

        .carousel-dot:hover {
            border-color: var(--pure-white);
            transform: scale(1.2);
        }

        /* Auto-play indicator */
        .carousel-progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            background: var(--pure-white);
            transition: width 0.1s linear;
            border-radius: 0 0 var(--border-radius-xl) var(--border-radius-xl);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .testimonial-carousel {
                padding: 2rem 1.5rem;
            }

            .testimonial-quote {
                font-size: 1.1rem;
                margin-bottom: 2rem;
            }

            .testimonial-quote::before,
            .testimonial-quote::after {
                font-size: 2rem;
            }

            .testimonial-quote::before {
                top: -0.5rem;
                left: -1rem;
            }

            .testimonial-quote::after {
                bottom: -1.5rem;
                right: -1rem;
            }

            .testimonial-author {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .author-info {
                text-align: center;
            }

            .carousel-btn {
                width: 45px;
                height: 45px;
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .testimonial-slide {
                padding: 1.5rem 1rem;
            }

            .testimonial-quote {
                font-size: 1rem;
            }

            .author-avatar {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }













        .filter-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .filter-select,
        .price-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 0.95rem;
            transition: var(--transition-normal);
        }

        .filter-select:focus,
        .price-input:focus {
            outline: none;
            border-color: var(--pure-white);
            background: rgba(255, 255, 255, 0.1);
        }

        .price-inputs {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .price-separator {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.6);
        }

        .search-btn {
            width: 100%;
            background: var(--pure-white);
            color: var(--primary-black);
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius-md);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .search-btn:hover {
            background: var(--gray-100);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-primary);
        }

        .hero-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.02);
            animation: float 20s infinite linear;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: 10%;
            left: -5%;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            top: 60%;
            right: -10%;
            animation-delay: 10s;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            bottom: 20%;
            left: 50%;
            animation-delay: 5s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 900;
            line-height: 0.9;
            margin-bottom: 2rem;
        }

        .title-line {
            display: block;
        }

        .title-accent {
            display: block;
            background: linear-gradient(135deg, var(--pure-white) 0%, rgba(255, 255, 255, 0.6) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 3rem;
            max-width: 500px;
            line-height: 1.6;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 4rem;
        }

        .hero-btn {
            padding: 1rem 2rem;
            border-radius: var(--border-radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
        }

        .btn-primary {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .btn-primary:hover {
            background: var(--gray-100);
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
        }

        .btn-secondary {
            background: transparent;
            color: var(--pure-white);
            border: 2px solid var(--pure-white);
        }

        .btn-secondary:hover {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .hero-stats {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-lg);
            backdrop-filter: blur(20px);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--pure-white);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
        }

        /* Section Styling */
        section {
            padding: 6rem 0;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header.centered {
            text-align: center;
        }

        .section-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: var(--pure-white);
            color: var(--primary-black);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
        }

        .section-badge.secondary {
            background: transparent;
            color: var(--pure-white);
            border: 1px solid var(--pure-white);
        }

        .section-badge.accent {
            background: var(--primary-black);
            color: var(--pure-white);
            border: 2px solid var(--pure-white);
        }

        .section-badge.trending {
            background: linear-gradient(135deg, var(--pure-white) 0%, var(--gray-200) 100%);
            color: var(--primary-black);
        }

        .section-title {
            font-size: clamp(2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 1rem;
            color: var(--pure-white);
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
        }

        .section-text {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        /* Featured Products */
        .featured-section {
            background: var(--secondary-black);
        }

        .products-container {
            margin-bottom: 3rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        /* Product Card Styling (for loaded products) */
        .products-grid .card,
        .mini-products-grid .card,
        .bestsellers-grid .card,
        .trending-track .card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            transition: var(--transition-normal);
            backdrop-filter: blur(20px);
        }

        .products-grid .card:hover,
        .mini-products-grid .card:hover,
        .bestsellers-grid .card:hover,
        .trending-track .card:hover {
            transform: translateY(-10px);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: var(--shadow-xl);
        }

        .products-grid .card-img-top,
        .mini-products-grid .card-img-top,
        .bestsellers-grid .card-img-top,
        .trending-track .card-img-top {
            height: 250px;
            object-fit: cover;
            filter: grayscale(30%);
            transition: var(--transition-normal);
        }

        .products-grid .card:hover .card-img-top,
        .mini-products-grid .card:hover .card-img-top,
        .bestsellers-grid .card:hover .card-img-top,
        .trending-track .card:hover .card-img-top {
            filter: grayscale(0%);
            transform: scale(1.05);
        }

        .products-grid .card-body,
        .mini-products-grid .card-body,
        .bestsellers-grid .card-body,
        .trending-track .card-body {
            padding: 1.5rem;
            color: var(--pure-white);
        }

        .products-grid .card-title,
        .mini-products-grid .card-title,
        .bestsellers-grid .card-title,
        .trending-track .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--pure-white);
            margin-bottom: 0.5rem;
        }

        .section-footer {
            text-align: center;
        }

        .view-all-btn {
            background: transparent;
            color: var(--pure-white);
            border: 2px solid var(--pure-white);
            padding: 1rem 2rem;
            border-radius: var(--border-radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .view-all-btn:hover {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        /* New Arrivals */
        .arrivals-section {
            background: var(--gradient-primary);
        }

        .split-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .content-side {
            padding-right: 2rem;
        }

        .features-list {
            margin: 2rem 0;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .feature-item i {
            width: 20px;
            color: var(--pure-white);
        }

        .btn-outline {
            background: transparent;
            color: var(--pure-white);
            border: 2px solid var(--pure-white);
            padding: 1rem 2rem;
            border-radius: var(--border-radius-md);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-outline:hover {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .mini-products-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        /* Best Sellers */
        .bestsellers-section {
            background: var(--secondary-black);
        }

        .bestsellers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .testimonial-banner {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            padding: 3rem;
            text-align: center;
            backdrop-filter: blur(20px);
        }

        .testimonial-quote {
            font-size: 1.25rem;
            font-style: italic;
            color: var(--pure-white);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
        }

        .author-name {
            font-weight: 600;
            color: var(--pure-white);
        }

        .author-title {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .testimonial-rating {
            color: #ffd700;
        }

        /* Categories */
        .categories-section {
            background: var(--gradient-primary);
        }

        .categories-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 1.5rem;
            height: 600px;
        }

        .category-card {
            position: relative;
            border-radius: var(--border-radius-lg);
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .category-card.large {
            grid-row: 1 / 3;
        }

        .category-card:hover {
            transform: scale(1.02);
        }

        .category-image {
            background-image: url('Resources/homepageImg/audemars-piguet-royal-oak-offsho.png');
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-image5 {
            background-image: url('Resources/homepageImg/carred1-scaled-e1659541845383.png');
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-image2 {
            background-image: url('Resources/homepageImg/IW344001_cover.png');
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-image3 {
            background-image: url('Resources/homepageImg/watch-club-rolex-gmt-master-gold-and-steel-box-and-warranty-card-ref-116713ln-year-2015-13305-1.png');
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-image4 {
            background-image: url('Resources/homepageImg/OS-WC-Patek-Philippe-5811-52.jpg');
            width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            transition: var(--transition-normal);
        }

        .category-card:hover .category-overlay {
            background: rgba(0, 0, 0, 0.6);
        }

        .category-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--pure-white);
        }

        .category-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .category-subtitle {
            font-size: 1rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .category-btn {
            background: var(--pure-white);
            color: var(--primary-black);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
        }

        .category-btn:hover {
            background: var(--gray-100);
            transform: translateY(-2px);
        }

        /* Trending */
        .trending-section {
            background: var(--secondary-black);
        }

        .trending-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
        }

        .trending-controls {
            display: flex;
            gap: 1rem;
        }

        .trend-nav {
            width: 50px;
            height: 50px;
            border: 2px solid var(--pure-white);
            background: transparent;
            color: var(--pure-white);
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .trend-nav:hover {
            background: var(--pure-white);
            color: var(--primary-black);
        }

        .trending-slider {
            overflow: hidden;
            border-radius: var(--border-radius-lg);
        }

        .trending-track {
            display: flex;
            gap: 2rem;
            transition: transform 0.5s ease;
        }

        .trending-track .card {
            min-width: 300px;
            flex-shrink: 0;
        }

        /* Newsletter */
        .newsletter-section {
            background: var(--gradient-primary);
        }

        .newsletter-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius-xl);
            padding: 4rem;
            text-align: center;
            backdrop-filter: blur(20px);
            max-width: 800px;
            margin: 0 auto;
        }

        .newsletter-icon {
            width: 80px;
            height: 80px;
            background: var(--pure-white);
            color: var(--primary-black);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2rem;
        }

        .newsletter-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .newsletter-text {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 3rem;
        }

        .newsletter-form .form-group {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 1rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: var(--border-radius-md);
            color: var(--pure-white);
            font-size: 1rem;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-input:focus {
            outline: none;
            border-color: var(--pure-white);
        }

        .newsletter-btn {
            background: var(--pure-white);
            color: var(--primary-black);
            border: none;
            padding: 1rem 2rem;
            border-radius: var(--border-radius-md);
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition-normal);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .newsletter-btn:hover {
            background: var(--gray-100);
            transform: translateY(-2px);
        }

        .newsletter-benefits {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 3rem;
                text-align: center;
            }

            .hero-stats {
                flex-direction: row;
                justify-content: center;
                max-width: 600px;
                margin: 0 auto;
            }
        }

        @media (max-width: 968px) {
            .container {
                padding: 0 1.5rem;
            }

            .split-layout {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .content-side {
                padding-right: 0;
            }

            .mini-products-grid {
                grid-template-columns: 1fr;
            }

            .categories-grid {
                grid-template-columns: 1fr 1fr;
                height: auto;
            }

            .category-card.large {
                grid-row: auto;
            }

            .trending-header {
                flex-direction: column;
                align-items: center;
                gap: 2rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            section {
                padding: 4rem 0;
            }

            .hero-actions {
                flex-direction: column;
                align-items: center;
            }

            .hero-btn {
                width: 100%;
                max-width: 300px;
                justify-content: center;
            }

            .search-filters {
                grid-template-columns: 1fr;
            }

            .newsletter-form .form-group {
                flex-direction: column;
            }

            .newsletter-benefits {
                flex-direction: column;
                gap: 1rem;
            }

            .testimonial-author {
                flex-direction: column;
                gap: 1rem;
            }

            .categories-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .products-grid,
            .bestsellers-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
            }
        }

        /* Utility Classes */
        .d-none {
            display: none !important;
        }

        /* Loading Animation */
        .new-home-body {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <!-- Navigation -->
    <?php include "homeNav.php"; ?>



    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="hero-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>

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

    <!-- Featured Products Section -->
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

    <!-- New Arrivals Section -->
    <section class="arrivals-section">
        <div class="container">
            <div class="split-layout">
                <div class="content-side">
                    <div class="section-badge secondary">New Arrivals</div>
                    <h2 class="section-title">Fresh Drops</h2>
                    <p class="section-text">
                        Discover our latest arrivals — curated timepieces that blend innovation with timeless style. Stay ahead with cutting-edge designs from the world’s leading watchmakers.
                    </p>

                    <div class="features-list">
                        <div class="feature-item">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Free Express Delivery</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-undo"></i>
                            <span>30-Day Easy Returns</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Authenticity Guaranteed</span>
                        </div>
                    </div>

                    <button class="btn-outline" onclick="location.href='shop.php'">
                        Explore New Arrivals
                        <i class="fas fa-external-link-alt"></i>
                    </button>
                </div>

                <div class="products-side">
                    <div class="mini-products-grid" id="newArrivals">
                        <!-- New arrivals products loaded here -->
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
                        <!-- Testimonial 1 -->
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

                        <!-- Testimonial 2 -->
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

                        <!-- Testimonial 3 -->
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

                        <!-- Testimonial 4 -->
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

                        <!-- Testimonial 5 -->
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




    <!-- Categories Showcase -->
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

    <!-- Trending Section -->
<section class="trending-section">
    <div class="container">
        <div class="trending-header">
            <div class="trending-info">
                <div class="section-badge trending">Trending Now</div>
                <h2 class="section-title">What's Hot</h2>
                <p class="section-text">
                    Keep up with the latest arrivals and essential timepieces defining modern style and innovation.
                </p>
            </div>
        </div>


        <!-- Image Banner -->
        <div style="
            width: 100%;
            height: 700px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            backdrop-filter: blur(20px);
            overflow: hidden;
            margin-top: 3rem;
            transition: all 0.3s ease;
            position: relative;
        " onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(0, 0, 0, 0.3)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
            <img src="resource/Grey Silver Modern Minimalist Luxury Watch Facebook Ad.png" 
                 alt="Luxury Watch Advertisement" 
                 style="
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    object-position: center;
                    transition: all 0.3s ease;
                 " 
                 onmouseover="this.style.transform='scale(1.02)'" 
                 onmouseout="this.style.transform='scale(1)'">
        </div>
    </div>
</section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-card">
                
                    <div class="newsletter-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="newsletter-title">Stay in Style</h3>
                    <p class="newsletter-text">
                        Be the first to know about new collections, exclusive offers, and fashion insights.
                    </p>

                    <form class="newsletter-form">
                        <div class="form-group">
                            <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                            <button type="submit" class="newsletter-btn">
                                Subscribe
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>

                    <div class="newsletter-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-gift"></i>
                            <span>Exclusive Offers</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-bell"></i>
                            <span>New Arrivals First</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-star"></i>
                            <span>Style Tips</span>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "homeFooter.php"; ?>

    <script src="new-home-scripts.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>