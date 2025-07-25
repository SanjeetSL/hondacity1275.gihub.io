<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="header">
    <nav class="navbar">
        <div class="nav-container">
            <!-- Logo & Brand -->
            <div class="nav-brand">
                <a href="index.php" class="brand-link">
                    <div class="brand-logo">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <div class="brand-text">
                        <span class="brand-name">GameHub</span>
                        <span class="brand-tagline">Gaming Community</span>
                    </div>
                </a>
            </div>

            <!-- Search Bar -->
            <div class="nav-search">
                <form class="search-form" action="search.php" method="GET">
                    <div class="search-input-group">
                        <i class="fas fa-search search-icon"></i>
                        <input 
                            type="text" 
                            name="q" 
                            placeholder="Search games, posts, users..." 
                            class="search-input"
                            autocomplete="off"
                        >
                        <button type="submit" class="search-btn">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Navigation Menu -->
            <div class="nav-menu">
                <ul class="nav-links">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="games.php" class="nav-link">
                            <i class="fas fa-trophy"></i>
                            <span>Games</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="leaderboard.php" class="nav-link">
                            <i class="fas fa-crown"></i>
                            <span>Leaderboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tournaments.php" class="nav-link">
                            <i class="fas fa-medal"></i>
                            <span>Tournaments</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- User Menu -->
            <div class="nav-user">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- Logged in user menu -->
                    <div class="user-menu">
                        <button class="notifications-btn" onclick="toggleNotifications()">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        
                        <div class="user-profile-menu">
                            <button class="profile-toggle" onclick="toggleProfileMenu()">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <span class="username"><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            
                            <div class="profile-dropdown" id="profileDropdown">
                                <div class="dropdown-header">
                                    <div class="dropdown-avatar">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="dropdown-info">
                                        <span class="dropdown-name"><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
                                        <span class="dropdown-email">gamer@example.com</span>
                                    </div>
                                </div>
                                
                                <div class="dropdown-divider"></div>
                                
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php" class="dropdown-link">
                                            <i class="fas fa-user"></i>
                                            <span>My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="settings.php" class="dropdown-link">
                                            <i class="fas fa-cog"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my-posts.php" class="dropdown-link">
                                            <i class="fas fa-edit"></i>
                                            <span>My Posts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="favorites.php" class="dropdown-link">
                                            <i class="fas fa-heart"></i>
                                            <span>Favorites</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <a href="auth/logout.php" class="dropdown-link logout">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Notifications Dropdown -->
                    <div class="notifications-dropdown" id="notificationsDropdown">
                        <div class="notifications-header">
                            <h3>Notifications</h3>
                            <button class="mark-all-read">Mark all as read</button>
                        </div>
                        
                        <div class="notifications-list">
                            <div class="notification-item unread">
                                <div class="notification-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="notification-content">
                                    <p><strong>GameMaster92</strong> liked your post</p>
                                    <span class="notification-time">2 minutes ago</span>
                                </div>
                            </div>
                            
                            <div class="notification-item">
                                <div class="notification-avatar">
                                    <i class="fas fa-comment"></i>
                                </div>
                                <div class="notification-content">
                                    <p>New comment on "Best Gaming Setup 2024"</p>
                                    <span class="notification-time">5 minutes ago</span>
                                </div>
                            </div>
                            
                            <div class="notification-item">
                                <div class="notification-avatar">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="notification-content">
                                    <p>You've earned the "Veteran Gamer" badge!</p>
                                    <span class="notification-time">1 hour ago</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="notifications-footer">
                            <a href="notifications.php">View all notifications</a>
                        </div>
                    </div>
                    
                <?php else: ?>
                    <!-- Guest user buttons -->
                    <div class="auth-buttons">
                        <a href="auth/login.php" class="btn btn-outline btn-sm">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Login</span>
                        </a>
                        <a href="auth/register.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-user-plus"></i>
                            <span>Join</span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-menu-content">
            <!-- Mobile Search -->
            <div class="mobile-search">
                <form class="search-form" action="search.php" method="GET">
                    <div class="search-input-group">
                        <i class="fas fa-search search-icon"></i>
                        <input 
                            type="text" 
                            name="q" 
                            placeholder="Search..." 
                            class="search-input"
                        >
                    </div>
                </form>
            </div>

            <!-- Mobile Navigation -->
            <nav class="mobile-nav">
                <ul class="mobile-nav-links">
                    <li>
                        <a href="index.php" class="mobile-nav-link">
                            <i class="fas fa-home"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="games.php" class="mobile-nav-link">
                            <i class="fas fa-trophy"></i>
                            <span>Games</span>
                        </a>
                    </li>
                    <li>
                        <a href="leaderboard.php" class="mobile-nav-link">
                            <i class="fas fa-crown"></i>
                            <span>Leaderboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="tournaments.php" class="mobile-nav-link">
                            <i class="fas fa-medal"></i>
                            <span>Tournaments</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Mobile User Menu -->
                <div class="mobile-user-section">
                    <div class="mobile-user-info">
                        <div class="mobile-user-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <span class="mobile-username"><?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
                    </div>
                    
                    <ul class="mobile-user-links">
                        <li>
                            <a href="profile.php" class="mobile-user-link">
                                <i class="fas fa-user"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="settings.php" class="mobile-user-link">
                                <i class="fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="auth/logout.php" class="mobile-user-link logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- Mobile Auth Buttons -->
                <div class="mobile-auth">
                    <a href="auth/login.php" class="btn btn-outline btn-block">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Login</span>
                    </a>
                    <a href="auth/register.php" class="btn btn-primary btn-block">
                        <i class="fas fa-user-plus"></i>
                        <span>Join Community</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<style>
/* ===== HEADER STYLES ===== */
.header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background: rgba(15, 15, 35, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--border-primary);
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.2);
}

.navbar {
    width: 100%;
    height: 70px;
}

.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 var(--space-lg);
    gap: var(--space-lg);
}

/* Brand Section */
.nav-brand {
    display: flex;
    align-items: center;
    flex-shrink: 0;
}

.brand-link {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    text-decoration: none;
    color: var(--text-primary);
}

.brand-logo {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--primary), var(--gaming-purple));
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.brand-text {
    display: flex;
    flex-direction: column;
}

.brand-name {
    font-size: 1.25rem;
    font-weight: 800;
    line-height: 1;
    background: linear-gradient(135deg, var(--primary), var(--gaming-cyan));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.brand-tagline {
    font-size: 0.75rem;
    color: var(--text-muted);
    line-height: 1;
}

/* Search Section */
.nav-search {
    flex: 1;
    max-width: 500px;
}

.search-form {
    width: 100%;
}

.search-input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.search-icon {
    position: absolute;
    left: var(--space-md);
    color: var(--text-muted);
    z-index: 1;
}

.search-input {
    width: 100%;
    padding: var(--space-sm) var(--space-md) var(--space-sm) 3rem;
    border: 2px solid var(--border-primary);
    border-radius: var(--radius-lg);
    background: var(--bg-secondary);
    color: var(--text-primary);
    font-size: 0.875rem;
    transition: var(--transition);
}

.search-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
}

.search-btn {
    position: absolute;
    right: var(--space-xs);
    width: 32px;
    height: 32px;
    border: none;
    border-radius: var(--radius);
    background: var(--primary);
    color: white;
    cursor: pointer;
    transition: var(--transition);
}

.search-btn:hover {
    background: var(--primary-dark);
}

/* Navigation Menu */
.nav-menu {
    display: flex;
    align-items: center;
}

.nav-links {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: var(--space-sm);
}

.nav-link {
    display: flex;
    align-items: center;
    gap: var(--space-xs);
    padding: var(--space-sm) var(--space-md);
    border-radius: var(--radius);
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: var(--transition);
}

.nav-link:hover {
    background: var(--bg-secondary);
    color: var(--primary);
}

/* User Menu */
.nav-user {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    flex-shrink: 0;
}

.user-menu {
    display: flex;
    align-items: center;
    gap: var(--space-md);
}

.notifications-btn {
    position: relative;
    width: 40px;
    height: 40px;
    border: none;
    border-radius: 50%;
    background: var(--bg-secondary);
    color: var(--text-muted);
    cursor: pointer;
    transition: var(--transition);
}

.notifications-btn:hover {
    background: var(--primary);
    color: white;
}

.notification-badge {
    position: absolute;
    top: -2px;
    right: -2px;
    background: var(--danger);
    color: white;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 0.75rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
}

.user-profile-menu {
    position: relative;
}

.profile-toggle {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-sm);
    border: none;
    border-radius: var(--radius);
    background: var(--bg-secondary);
    color: var(--text-primary);
    cursor: pointer;
    transition: var(--transition);
}

.profile-toggle:hover {
    background: var(--bg-tertiary);
}

.user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--gaming-purple));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.125rem;
}

.username {
    font-weight: 600;
    font-size: 0.875rem;
}

/* Dropdowns */
.profile-dropdown,
.notifications-dropdown {
    position: absolute;
    top: calc(100% + var(--space-sm));
    right: 0;
    background: var(--bg-card);
    border: 1px solid var(--border-primary);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    min-width: 280px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: var(--transition);
    z-index: 100;
}

.profile-dropdown.show,
.notifications-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-header {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-lg);
    border-bottom: 1px solid var(--border-primary);
}

.dropdown-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--gaming-purple));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.dropdown-info {
    display: flex;
    flex-direction: column;
}

.dropdown-name {
    font-weight: 700;
    color: var(--text-primary);
}

.dropdown-email {
    font-size: 0.75rem;
    color: var(--text-muted);
}

.dropdown-menu {
    list-style: none;
    margin: 0;
    padding: var(--space-sm) 0;
}

.dropdown-link {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-md) var(--space-lg);
    color: var(--text-secondary);
    text-decoration: none;
    transition: var(--transition);
}

.dropdown-link:hover {
    background: var(--bg-secondary);
    color: var(--text-primary);
}

.dropdown-link.logout {
    color: var(--danger);
}

.dropdown-divider {
    height: 1px;
    background: var(--border-primary);
    margin: var(--space-sm) 0;
}

/* Auth Buttons */
.auth-buttons {
    display: flex;
    gap: var(--space-sm);
}

.btn-sm {
    padding: var(--space-xs) var(--space-md);
    font-size: 0.75rem;
}

/* Mobile Menu Toggle */
.mobile-menu-toggle {
    display: none;
    flex-direction: column;
    justify-content: center;
    width: 30px;
    height: 30px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0;
}

.hamburger-line {
    width: 100%;
    height: 2px;
    background: var(--text-primary);
    margin: 2px 0;
    transition: var(--transition);
}

.mobile-menu-toggle.active .hamburger-line:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
}

.mobile-menu-toggle.active .hamburger-line:nth-child(2) {
    opacity: 0;
}

.mobile-menu-toggle.active .hamburger-line:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -6px);
}

/* Mobile Menu */
.mobile-menu {
    position: fixed;
    top: 70px;
    left: 0;
    right: 0;
    background: var(--bg-primary);
    border-bottom: 1px solid var(--border-primary);
    transform: translateY(-100%);
    transition: transform 0.3s ease;
    z-index: 999;
    max-height: calc(100vh - 70px);
    overflow-y: auto;
}

.mobile-menu.show {
    transform: translateY(0);
}

.mobile-menu-content {
    padding: var(--space-lg);
}

.mobile-search {
    margin-bottom: var(--space-lg);
}

.mobile-nav-links {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-nav-link {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-md) 0;
    color: var(--text-secondary);
    text-decoration: none;
    border-bottom: 1px solid var(--border-primary);
    transition: var(--transition);
}

.mobile-nav-link:hover {
    color: var(--primary);
}

.mobile-user-section {
    margin-top: var(--space-lg);
    padding-top: var(--space-lg);
    border-top: 1px solid var(--border-primary);
}

.mobile-user-info {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    margin-bottom: var(--space-lg);
}

.mobile-user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--gaming-purple));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.25rem;
}

.mobile-username {
    font-weight: 700;
    color: var(--text-primary);
}

.mobile-user-links {
    list-style: none;
    margin: 0;
    padding: 0;
}

.mobile-user-link {
    display: flex;
    align-items: center;
    gap: var(--space-md);
    padding: var(--space-md) 0;
    color: var(--text-secondary);
    text-decoration: none;
    border-bottom: 1px solid var(--border-primary);
    transition: var(--transition);
}

.mobile-user-link:hover {
    color: var(--primary);
}

.mobile-user-link.logout {
    color: var(--danger);
}

.mobile-auth {
    display: flex;
    flex-direction: column;
    gap: var(--space-md);
    margin-top: var(--space-lg);
}

.btn-block {
    width: 100%;
    justify-content: center;
}

/* Responsive */
@media (max-width: 1024px) {
    .nav-menu {
        display: none;
    }
    
    .mobile-menu-toggle {
        display: flex;
    }
}

@media (max-width: 768px) {
    .nav-search {
        display: none;
    }
    
    .nav-container {
        padding: 0 var(--space-md);
    }
}

@media (max-width: 480px) {
    .brand-text {
        display: none;
    }
    
    .auth-buttons {
        flex-direction: column;
        gap: var(--space-xs);
    }
    
    .btn-sm {
        padding: var(--space-xs) var(--space-sm);
        font-size: 0.7rem;
    }
}
</style>