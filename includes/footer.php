<footer class="footer">
    <div class="footer-container">
        <!-- Main Footer Content -->
        <div class="footer-content">
            <!-- Brand Section -->
            <div class="footer-section footer-brand">
                <div class="footer-logo">
                    <div class="footer-logo-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <div class="footer-logo-text">
                        <h3 class="footer-brand-name">GameHub</h3>
                        <p class="footer-brand-tagline">Professional Gaming Community</p>
                    </div>
                </div>
                <p class="footer-description">
                    Join thousands of gamers worldwide. Share experiences, discover new games, 
                    and connect with the ultimate gaming community.
                </p>
                <div class="footer-stats">
                    <div class="footer-stat">
                        <span class="stat-number">15.2K+</span>
                        <span class="stat-label">Active Gamers</span>
                    </div>
                    <div class="footer-stat">
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Posts</span>
                    </div>
                    <div class="footer-stat">
                        <span class="stat-number">1.2K+</span>
                        <span class="stat-label">Games</span>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h4 class="footer-title">
                    <i class="fas fa-link"></i>
                    Quick Links
                </h4>
                <ul class="footer-links">
                    <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="games.php"><i class="fas fa-trophy"></i> Popular Games</a></li>
                    <li><a href="leaderboard.php"><i class="fas fa-crown"></i> Leaderboard</a></li>
                    <li><a href="tournaments.php"><i class="fas fa-medal"></i> Tournaments</a></li>
                    <li><a href="reviews.php"><i class="fas fa-star"></i> Game Reviews</a></li>
                    <li><a href="news.php"><i class="fas fa-newspaper"></i> Gaming News</a></li>
                </ul>
            </div>

            <!-- Community -->
            <div class="footer-section">
                <h4 class="footer-title">
                    <i class="fas fa-users"></i>
                    Community
                </h4>
                <ul class="footer-links">
                    <li><a href="forums.php"><i class="fas fa-comments"></i> Forums</a></li>
                    <li><a href="discord.php"><i class="fab fa-discord"></i> Discord Server</a></li>
                    <li><a href="streamers.php"><i class="fas fa-video"></i> Streamers</a></li>
                    <li><a href="clans.php"><i class="fas fa-shield-alt"></i> Gaming Clans</a></li>
                    <li><a href="events.php"><i class="fas fa-calendar"></i> Events</a></li>
                    <li><a href="guides.php"><i class="fas fa-book"></i> Gaming Guides</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="footer-section">
                <h4 class="footer-title">
                    <i class="fas fa-headset"></i>
                    Support
                </h4>
                <ul class="footer-links">
                    <li><a href="help.php"><i class="fas fa-question-circle"></i> Help Center</a></li>
                    <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
                    <li><a href="faq.php"><i class="fas fa-question"></i> FAQ</a></li>
                    <li><a href="privacy.php"><i class="fas fa-shield-alt"></i> Privacy Policy</a></li>
                    <li><a href="terms.php"><i class="fas fa-file-contract"></i> Terms of Service</a></li>
                    <li><a href="report.php"><i class="fas fa-flag"></i> Report Issue</a></li>
                </ul>
            </div>

            <!-- Newsletter & Social -->
            <div class="footer-section">
                <h4 class="footer-title">
                    <i class="fas fa-bell"></i>
                    Stay Connected
                </h4>
                <p class="newsletter-description">
                    Get the latest gaming news, updates, and exclusive content.
                </p>
                
                <!-- Newsletter Signup -->
                <form class="newsletter-form" action="newsletter.php" method="POST">
                    <div class="newsletter-input-group">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="Your email address" 
                            class="newsletter-input"
                            required
                        >
                        <button type="submit" class="newsletter-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>

                <!-- Social Media Links -->
                <div class="social-links">
                    <h5 class="social-title">Follow Us</h5>
                    <div class="social-icons">
                        <a href="#" class="social-link twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link discord">
                            <i class="fab fa-discord"></i>
                        </a>
                        <a href="#" class="social-link youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#" class="social-link twitch">
                            <i class="fab fa-twitch"></i>
                        </a>
                        <a href="#" class="social-link instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link reddit">
                            <i class="fab fa-reddit"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gaming Platforms -->
        <div class="gaming-platforms">
            <h4 class="platforms-title">
                <i class="fas fa-gamepad"></i>
                Supported Gaming Platforms
            </h4>
            <div class="platforms-grid">
                <div class="platform-item">
                    <i class="fab fa-steam"></i>
                    <span>Steam</span>
                </div>
                <div class="platform-item">
                    <i class="fab fa-playstation"></i>
                    <span>PlayStation</span>
                </div>
                <div class="platform-item">
                    <i class="fab fa-xbox"></i>
                    <span>Xbox</span>
                </div>
                <div class="platform-item">
                    <i class="fas fa-desktop"></i>
                    <span>PC</span>
                </div>
                <div class="platform-item">
                    <i class="fab fa-nintendo-switch"></i>
                    <span>Nintendo</span>
                </div>
                <div class="platform-item">
                    <i class="fas fa-mobile-alt"></i>
                    <span>Mobile</span>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; <?= date('Y') ?> GameHub. All rights reserved.</p>
                    <p class="made-with">Made with <i class="fas fa-heart"></i> for gamers worldwide</p>
                </div>
                
                <div class="footer-bottom-links">
                    <a href="privacy.php">Privacy</a>
                    <a href="terms.php">Terms</a>
                    <a href="cookies.php">Cookies</a>
                    <a href="sitemap.php">Sitemap</a>
                </div>

                <div class="footer-badges">
                    <div class="badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>Secure</span>
                    </div>
                    <div class="badge">
                        <i class="fas fa-clock"></i>
                        <span>24/7 Support</span>
                    </div>
                    <div class="badge">
                        <i class="fas fa-users"></i>
                        <span>Active Community</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<style>
/* ===== FOOTER STYLES ===== */
.footer {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--bg-secondary) 100%);
    border-top: 1px solid var(--border-primary);
    margin-top: var(--space-2xl);
    position: relative;
    overflow: hidden;
}

.footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, var(--primary), var(--gaming-purple), var(--gaming-cyan), var(--primary));
}

.footer-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: var(--space-2xl) var(--space-lg) 0;
}

.footer-content {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
    gap: var(--space-2xl);
    margin-bottom: var(--space-2xl);
}

/* Brand Section */
.footer-brand {
    max-width: 400px;
}

.footer-logo {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
}

.footer-logo-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--primary), var(--gaming-purple));
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.footer-brand-name {
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: var(--space-xs);
    background: linear-gradient(135deg, var(--primary), var(--gaming-cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.footer-brand-tagline {
    color: var(--text-muted);
    font-size: 0.875rem;
    margin: 0;
}

.footer-description {
    color: var(--text-secondary);
    line-height: 1.6;
    margin-bottom: var(--space-lg);
}

.footer-stats {
    display: flex;
    gap: var(--space-lg);
}

.footer-stat {
    text-align: center;
}

.footer-stat .stat-number {
    display: block;
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--primary);
    font-family: var(--font-mono);
}

.footer-stat .stat-label {
    font-size: 0.75rem;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* Footer Sections */
.footer-section {
    min-width: 0;
}

.footer-title {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    padding-bottom: var(--space-sm);
    border-bottom: 2px solid var(--border-primary);
}

.footer-links {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer-links li {
    margin-bottom: var(--space-sm);
}

.footer-links a {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.875rem;
    transition: var(--transition);
    padding: var(--space-xs) 0;
}

.footer-links a:hover {
    color: var(--primary);
    padding-left: var(--space-sm);
}

.footer-links i {
    width: 16px;
    text-align: center;
    color: var(--text-muted);
}

/* Newsletter */
.newsletter-description {
    color: var(--text-secondary);
    font-size: 0.875rem;
    margin-bottom: var(--space-lg);
    line-height: 1.5;
}

.newsletter-form {
    margin-bottom: var(--space-lg);
}

.newsletter-input-group {
    display: flex;
    background: var(--bg-secondary);
    border: 2px solid var(--border-primary);
    border-radius: var(--radius);
    overflow: hidden;
    transition: var(--transition);
}

.newsletter-input-group:focus-within {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.newsletter-input {
    flex: 1;
    padding: var(--space-sm) var(--space-md);
    border: none;
    background: transparent;
    color: var(--text-primary);
    font-size: 0.875rem;
}

.newsletter-input:focus {
    outline: none;
}

.newsletter-input::placeholder {
    color: var(--text-muted);
}

.newsletter-btn {
    padding: var(--space-sm) var(--space-md);
    background: var(--primary);
    color: white;
    border: none;
    cursor: pointer;
    transition: var(--transition);
}

.newsletter-btn:hover {
    background: var(--primary-dark);
}

/* Social Links */
.social-links {
    margin-top: var(--space-lg);
}

.social-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: var(--space-md);
}

.social-icons {
    display: flex;
    gap: var(--space-sm);
    flex-wrap: wrap;
}

.social-link {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: var(--transition);
    font-size: 1.125rem;
}

.social-link:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.social-link.twitter { background: #1da1f2; }
.social-link.discord { background: #7289da; }
.social-link.youtube { background: #ff0000; }
.social-link.twitch { background: #9146ff; }
.social-link.instagram { background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d); }
.social-link.reddit { background: #ff4500; }

/* Gaming Platforms */
.gaming-platforms {
    background: var(--bg-card);
    border-radius: var(--radius-lg);
    padding: var(--space-xl);
    margin-bottom: var(--space-2xl);
    border: 1px solid var(--border-primary);
}

.platforms-title {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: var(--space-lg);
    text-align: center;
    justify-content: center;
}

.platforms-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: var(--space-md);
}

.platform-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md);
    background: var(--bg-secondary);
    border-radius: var(--radius);
    border: 1px solid var(--border-primary);
    transition: var(--transition);
    cursor: pointer;
}

.platform-item:hover {
    background: var(--bg-tertiary);
    border-color: var(--primary);
    transform: translateY(-2px);
}

.platform-item i {
    font-size: 1.5rem;
    color: var(--primary);
}

.platform-item span {
    font-size: 0.875rem;
    font-weight: 500;
    color: var(--text-secondary);
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid var(--border-primary);
    padding: var(--space-lg) 0;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: var(--space-lg);
}

.copyright {
    color: var(--text-muted);
    font-size: 0.875rem;
}

.made-with {
    margin-top: var(--space-xs);
    font-size: 0.75rem;
}

.made-with i {
    color: var(--danger);
    margin: 0 var(--space-xs);
}

.footer-bottom-links {
    display: flex;
    gap: var(--space-lg);
}

.footer-bottom-links a {
    color: var(--text-muted);
    text-decoration: none;
    font-size: 0.875rem;
    transition: var(--transition);
}

.footer-bottom-links a:hover {
    color: var(--primary);
}

.footer-badges {
    display: flex;
    gap: var(--space-md);
}

.badge {
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    padding: var(--space-xs) var(--space-sm);
    background: var(--bg-secondary);
    border-radius: var(--radius);
    border: 1px solid var(--border-primary);
    font-size: 0.75rem;
    color: var(--text-secondary);
}

.badge i {
    color: var(--primary);
}

/* Scroll to Top */
.scroll-to-top {
    position: fixed;
    bottom: var(--space-xl);
    right: var(--space-xl);
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--primary), var(--gaming-purple));
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
    box-shadow: var(--shadow-lg);
    transition: var(--transition);
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    z-index: 100;
}

.scroll-to-top.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.scroll-to-top:hover {
    background: linear-gradient(135deg, var(--primary-dark), var(--gaming-purple));
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .footer-content {
        grid-template-columns: 1fr 1fr 1fr;
        gap: var(--space-xl);
    }
    
    .footer-brand {
        grid-column: 1 / -1;
        max-width: none;
        margin-bottom: var(--space-lg);
    }
    
    .footer-stats {
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: var(--space-lg);
    }
    
    .footer-container {
        padding: var(--space-xl) var(--space-md) 0;
    }
    
    .gaming-platforms {
        padding: var(--space-lg);
    }
    
    .platforms-grid {
        grid-template-columns: repeat(3, 1fr);
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
        gap: var(--space-md);
    }
    
    .footer-badges {
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .scroll-to-top {
        bottom: var(--space-lg);
        right: var(--space-lg);
        width: 45px;
        height: 45px;
    }
}

@media (max-width: 480px) {
    .footer-stats {
        flex-direction: column;
        gap: var(--space-md);
    }
    
    .social-icons {
        justify-content: center;
    }
    
    .platforms-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .footer-bottom-links {
        flex-direction: column;
        gap: var(--space-sm);
        text-align: center;
    }
}
</style>