<style>
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

    .modern-footer {
        background: var(--gradient-primary);
        position: relative;
        overflow: hidden;
        margin-top: 4rem;
    }

    .modern-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.03) 0%, transparent 50%),
                   radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
        pointer-events: none;
    }

    .footer-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: var(--border-radius-xl);
        backdrop-filter: blur(20px);
        box-shadow: var(--shadow-lg);
        margin: 2rem;
        position: relative;
        z-index: 2;
    }

    .footer-body {
        padding: 3rem;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .footer-section {
        margin-bottom: 3rem;
    }

    .footer-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--pure-white);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .footer-title i {
        font-size: 1.25rem;
        color: var(--pure-white);
    }

    /* Contact Section */
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        line-height: 1.6;
        transition: var(--transition-normal);
    }

    .contact-item:hover {
        color: var(--pure-white);
        transform: translateX(5px);
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pure-white);
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .contact-text {
        flex: 1;
    }

    /* Newsletter Section */
    .newsletter-section {
        background: rgba(255, 255, 255, 0.03);
        padding: 2rem;
        border-radius: var(--border-radius-lg);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .newsletter-form {
        margin-top: 1rem;
    }

    .newsletter-input-group {
        display: flex;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .newsletter-input {
        flex: 1;
        padding: 1rem 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius-md);
        color: var(--pure-white);
        font-size: 1rem;
        transition: var(--transition-normal);
    }

    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .newsletter-input:focus {
        outline: none;
        border-color: var(--pure-white);
        background: rgba(255, 255, 255, 0.15);
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
        box-shadow: var(--shadow-md);
    }

    /* Map Section */
    .map-section {
        margin-top: 2rem;
    }

    .map-container {
        position: relative;
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .map-container iframe {
        width: 100%;
        height: 250px;
        border: 0;
        filter: grayscale(100%) invert(100%) contrast(100%);
        transition: var(--transition-normal);
    }

    .map-container:hover iframe {
        filter: grayscale(80%) invert(90%) contrast(90%);
    }

    /* Copyright Section */
    .copyright-section {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem 0;
        margin-top: 2rem;
        text-align: center;
    }

    .copyright-content {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
    }

    .copyright-logo {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
    }

    .copyright-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: brightness(0) invert(1);
    }

    .copyright-text {
        font-weight: 600;
        color: var(--pure-white);
    }

    /* Social Media Section */
    .social-section {
        margin-top: 2rem;
        text-align: center;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 1rem;
    }

    .social-link {
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--pure-white);
        text-decoration: none;
        transition: var(--transition-normal);
    }

    .social-link:hover {
        background: var(--pure-white);
        color: var(--primary-black);
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .footer-body {
            padding: 2rem;
        }
        
        .newsletter-input-group {
            flex-direction: column;
        }
        
        .newsletter-btn {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .modern-footer {
            margin: 1rem;
        }
        
        .footer-card {
            margin: 1rem;
        }
        
        .footer-body {
            padding: 1.5rem;
        }
        
        .footer-section {
            margin-bottom: 2rem;
        }
        
        .contact-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
        
        .map-container iframe {
            height: 200px;
        }
        
        .copyright-content {
            flex-direction: column;
            gap: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .footer-title {
            font-size: 1.25rem;
        }
        
        .contact-item {
            font-size: 0.9rem;
        }
        
        .newsletter-input {
            padding: 0.875rem 1.25rem;
            font-size: 0.9rem;
        }
        
        .newsletter-btn {
            padding: 0.875rem 1.5rem;
            font-size: 0.9rem;
        }
    }

    /* Animation */
    .footer-card {
        animation: slideInUp 0.8s ease-out;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Floating background element */
    .modern-footer::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.02);
        border-radius: 50%;
        animation: float 20s infinite linear;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }
</style>

<div class="modern-footer">
    <div class="row">
        <div class="footer-card">
            <div class="col-12">
                <div class="footer-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-section">
                                <h5 class="footer-title">
                                    <i class="fas fa-phone-alt"></i>
                                    Contact Us
                                </h5>
                                <div class="contact-info">
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="contact-text">+94 11 059 789 54</div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="contact-text">celestialsoff@gmail.com</div>
                                    </div>
                                    <div class="contact-item">
                                        <div class="contact-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-text">Java Institute, Gampaha</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="footer-section newsletter-section">
                                <h5 class="footer-title">
                                    <i class="fas fa-paper-plane"></i>
                                    Subscribe to Our Newsletter
                                </h5>
                                <form class="newsletter-form">
                                    <div class="newsletter-input-group">
                                        <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                                        <button type="submit" class="newsletter-btn">
                                            <i class="fas fa-arrow-right"></i>
                                            Subscribe
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <small style="color: rgba(255, 255, 255, 0.6); font-size: 0.85rem;">
                                            Get exclusive offers and updates delivered to your inbox
                                        </small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="map-section">
                                <h5 class="footer-title">
                                    <i class="fas fa-map-pin"></i>
                                    Find Us
                                </h5>
                                <div class="map-container">
                                    <iframe 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2354.219234917617!2d79.99889020744986!3d7.090130897414276!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2fb1c286b065b%3A0x13616876f884dc14!2sJava%20Institute%20for%20Advanced%20Technology%20Gampaha!5e0!3m2!1sen!2slk!4v1717455308099!5m2!1sen!2slk" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="social-section">
                                <h5 class="footer-title">
                                    <i class="fas fa-share-alt"></i>
                                    Connect With Us
                                </h5>
                                <div class="social-links">
                                    <a href="#" class="social-link" title="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="social-link" title="Instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="#" class="social-link" title="Twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="social-link" title="YouTube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="copyright-section">
                        <div class="copyright-content">
                            <div class="copyright-logo">
                                <img src="Resources/img/3249825_health_treatment_illustration_hair_beauty_icon.ico" alt="Celeste Logo">
                            </div>
                            <div class="copyright-text">
                                © 2024 Celeste.corp | All Rights Reserved
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>