<?php // index.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GameHub - Professional Gaming Community</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Join the ultimate gaming community. Share experiences, discuss games, and connect with fellow gamers worldwide.">
    
    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Navigation Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <span class="gradient-text">GameHub</span>
                    <span class="subtitle">Professional Gaming Community</span>
                </h1>
                <p class="hero-description">
                    Connect with gamers worldwide, share your gaming experiences, 
                    discover new games, and be part of the ultimate gaming community.
                </p>
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['user_id'])): ?>
                <div class="hero-cta">
                    <a href="auth/register.php" class="btn btn-primary">
                        <i class="fas fa-gamepad"></i>
                        Join Community
                    </a>
                    <a href="auth/login.php" class="btn btn-secondary">
                        <i class="fas fa-sign-in-alt"></i>
                        Sign In
                    </a>
                </div>
                <?php endif; ?>
            </div>
            <div class="hero-visual">
                <div class="gaming-card">
                    <div class="card-header">
                        <i class="fas fa-trophy"></i>
                        <span>Active Community</span>
                    </div>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-number">15.2K</span>
                            <span class="stat-label">Gamers</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">3.8K</span>
                            <span class="stat-label">Posts Today</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">1.2K</span>
                            <span class="stat-label">Games</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">24/7</span>
                            <span class="stat-label">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="main-container">
        <div class="content-wrapper">
            <!-- Left Sidebar -->
            <aside class="sidebar-left">
                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-fire"></i>
                        Trending Games
                    </h3>
                    <ul class="trending-list">
                        <li class="trending-item">
                            <div class="game-rank">#1</div>
                            <div class="game-info">
                                <span class="game-name">Cyberpunk 2077</span>
                                <span class="game-posts">2.3k posts</span>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="game-rank">#2</div>
                            <div class="game-info">
                                <span class="game-name">Elden Ring</span>
                                <span class="game-posts">1.8k posts</span>
                            </div>
                        </li>
                        <li class="trending-item">
                            <div class="game-rank">#3</div>
                            <div class="game-info">
                                <span class="game-name">Valorant</span>
                                <span class="game-posts">1.5k posts</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-users"></i>
                        Online Members
                    </h3>
                    <div class="online-count">
                        <span class="count">847</span>
                        <span class="label">members online</span>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="main-content">
                <?php
                include 'config/db.php';
                if (isset($_SESSION['user_id'])):
                ?>
                
                <!-- Post Creation Section -->
                <section class="create-post-section">
                    <div class="post-form-container">
                        <div class="form-header">
                            <h2 class="form-title">
                                <i class="fas fa-pen-fancy"></i>
                                Share Your Gaming Experience
                            </h2>
                            <p class="form-subtitle">What's happening in your gaming world?</p>
                        </div>
                        
                        <form method="POST" enctype="multipart/form-data" class="create-post-form">
                            <div class="form-group">
                                <label for="title" class="form-label">
                                    <i class="fas fa-heading"></i>
                                    Post Title
                                </label>
                                <input 
                                    type="text" 
                                    id="title" 
                                    name="title" 
                                    class="form-input" 
                                    placeholder="Share something amazing about your gaming experience..."
                                    required
                                >
                            </div>
                            
                            <div class="form-group">
                                <label for="content" class="form-label">
                                    <i class="fas fa-align-left"></i>
                                    Content
                                </label>
                                <textarea 
                                    id="content" 
                                    name="content" 
                                    class="form-textarea" 
                                    rows="5"
                                    placeholder="Tell us more about your gaming experience, tips, or any gaming-related topic..."
                                    required
                                ></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="media" class="form-label">
                                    <i class="fas fa-image"></i>
                                    Media (Optional)
                                </label>
                                <div class="file-upload-area">
                                    <input 
                                        type="file" 
                                        id="media" 
                                        name="media" 
                                        accept="image/*,video/*"
                                        class="file-input"
                                    >
                                    <label for="media" class="file-upload-label">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Click to upload or drag and drop</span>
                                        <small>Images and videos supported</small>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-large">
                                    <i class="fas fa-paper-plane"></i>
                                    Publish Post
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <?php
                // Handle post submission
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['title'], $_POST['content'])) {
                    $uid = $_SESSION['user_id'];
                    $title = htmlspecialchars(trim($_POST['title']));
                    $content = htmlspecialchars(trim($_POST['content']));
                    
                    $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, created_at) VALUES (?, ?, ?, NOW())");
                    $stmt->bind_param("iss", $uid, $title, $content);
                    
                    if ($stmt->execute()) {
                        echo '<div class="alert alert-success">
                                <i class="fas fa-check-circle"></i>
                                <span>Post published successfully!</span>
                              </div>';
                    } else {
                        echo '<div class="alert alert-error">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>Error publishing post. Please try again.</span>
                              </div>';
                    }
                    $stmt->close();
                }
                ?>

                <!-- Posts Feed Section -->
                <section class="posts-feed">
                    <div class="feed-header">
                        <h2 class="feed-title">
                            <i class="fas fa-stream"></i>
                            Latest Posts
                        </h2>
                        <div class="feed-filters">
                            <button class="filter-btn active" data-filter="all">
                                <i class="fas fa-globe"></i>
                                All Posts
                            </button>
                            <button class="filter-btn" data-filter="trending">
                                <i class="fas fa-fire"></i>
                                Trending
                            </button>
                            <button class="filter-btn" data-filter="recent">
                                <i class="fas fa-clock"></i>
                                Recent
                            </button>
                        </div>
                    </div>

                    <div class="posts-container">
                        <?php
                        $res = $conn->query("
                            SELECT p.id, p.title, p.content, p.created_at, u.username, p.media_path, p.media_type,
                                   COUNT(pl.id) as likes_count
                            FROM posts p 
                            JOIN users u ON u.id = p.user_id 
                            LEFT JOIN post_likes pl ON pl.post_id = p.id
                            GROUP BY p.id
                            ORDER BY p.created_at DESC 
                            LIMIT 15
                        ");
                        
                        while ($row = $res->fetch_assoc()):
                        ?>
                        <article class="post-card">
                            <div class="post-header">
                                <div class="author-info">
                                    <div class="author-avatar">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="author-details">
                                        <h4 class="author-name"><?= htmlspecialchars($row['username']) ?></h4>
                                        <span class="post-time">
                                            <i class="fas fa-clock"></i>
                                            <?= date('M j, Y • g:i A', strtotime($row['created_at'])) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="post-actions">
                                    <button class="action-btn">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="posts/view_post.php?id=<?= $row['id'] ?>">
                                        <?= htmlspecialchars($row['title']) ?>
                                    </a>
                                </h3>
                                
                                <?php if ($row['media_path']): ?>
                                <div class="post-media">
                                    <?php if ($row['media_type'] === 'image'): ?>
                                        <img 
                                            src="<?= htmlspecialchars($row['media_path']) ?>" 
                                            alt="Post Image"
                                            class="post-image"
                                            loading="lazy"
                                        >
                                    <?php elseif ($row['media_type'] === 'video'): ?>
                                        <video controls class="post-video">
                                            <source src="<?= htmlspecialchars($row['media_path']) ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                
                                <div class="post-text">
                                    <?= nl2br(htmlspecialchars(substr($row['content'], 0, 300))) ?>
                                    <?php if (strlen($row['content']) > 300): ?>
                                        <a href="posts/view_post.php?id=<?= $row['id'] ?>" class="read-more">
                                            Read more...
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="post-footer">
                                <div class="engagement-stats">
                                    <button class="engagement-btn like-btn">
                                        <i class="fas fa-heart"></i>
                                        <span><?= $row['likes_count'] ?: 0 ?></span>
                                    </button>
                                    <button class="engagement-btn comment-btn">
                                        <i class="fas fa-comment"></i>
                                        <span>Comment</span>
                                    </button>
                                    <button class="engagement-btn share-btn">
                                        <i class="fas fa-share"></i>
                                        <span>Share</span>
                                    </button>
                                </div>
                                <div class="post-tags">
                                    <span class="tag">#gaming</span>
                                    <span class="tag">#community</span>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; ?>
                    </div>
                </section>

                <?php else: ?>
                <!-- Guest User Section -->
                <section class="guest-section">
                    <div class="welcome-card">
                        <div class="welcome-content">
                            <h2 class="welcome-title">
                                <i class="fas fa-gamepad"></i>
                                Welcome to GameHub
                            </h2>
                            <p class="welcome-text">
                                Join thousands of gamers sharing their experiences, discovering new games, 
                                and connecting with the gaming community worldwide.
                            </p>
                            <div class="welcome-features">
                                <div class="feature">
                                    <i class="fas fa-users"></i>
                                    <span>Connect with gamers worldwide</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-share-alt"></i>
                                    <span>Share your gaming experiences</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-trophy"></i>
                                    <span>Discover trending games</span>
                                </div>
                            </div>
                            <div class="welcome-cta">
                                <a href="auth/register.php" class="btn btn-primary">
                                    <i class="fas fa-user-plus"></i>
                                    Create Account
                                </a>
                                <a href="auth/login.php" class="btn btn-outline">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Sign In
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sample Posts for Guests -->
                    <div class="sample-posts">
                        <h3 class="section-title">Recent Community Posts</h3>
                        <?php
                        $res = $conn->query("
                            SELECT p.title, p.content, p.created_at, u.username
                            FROM posts p 
                            JOIN users u ON u.id = p.user_id 
                            ORDER BY p.created_at DESC 
                            LIMIT 5
                        ");
                        
                        while ($row = $res->fetch_assoc()):
                        ?>
                        <div class="sample-post">
                            <h4><?= htmlspecialchars($row['title']) ?></h4>
                            <p><?= htmlspecialchars(substr($row['content'], 0, 150)) ?>...</p>
                            <span class="sample-meta">by <?= htmlspecialchars($row['username']) ?></span>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </section>
                <?php endif; ?>
            </div>

            <!-- Right Sidebar -->
            <aside class="sidebar-right">
                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-calendar-alt"></i>
                        Gaming Events
                    </h3>
                    <div class="event-list">
                        <div class="event-item">
                            <div class="event-date">
                                <span class="day">25</span>
                                <span class="month">Dec</span>
                            </div>
                            <div class="event-info">
                                <h4>Winter Gaming Festival</h4>
                                <p>Special tournaments and prizes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget">
                    <h3 class="widget-title">
                        <i class="fas fa-star"></i>
                        Top Contributors
                    </h3>
                    <div class="contributors-list">
                        <div class="contributor">
                            <div class="contributor-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="contributor-info">
                                <span class="name">GameMaster_92</span>
                                <span class="posts">156 posts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>