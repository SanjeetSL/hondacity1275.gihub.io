<?php
/**
 * GameHub - Professional Gaming Forum
 * Database Configuration
 */

// Database configuration
$host = 'localhost';
$username = 'root'; // Change this to your database username
$password = '';     // Change this to your database password
$database = 'gamehub_forum'; // Change this to your database name

// Create connection
try {
    $conn = new mysqli($host, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8mb4 for better emoji and unicode support
    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    // In production, you might want to log this error instead of displaying it
    die("Database connection failed. Please check your configuration.");
}

// Optional: Create tables if they don't exist (for development)
if (isset($_GET['setup']) && $_GET['setup'] === 'database') {
    createTables($conn);
}

function createTables($conn) {
    // Users table
    $sql_users = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        avatar VARCHAR(255) DEFAULT NULL,
        bio TEXT DEFAULT NULL,
        gaming_level ENUM('Beginner', 'Intermediate', 'Advanced', 'Expert', 'Pro') DEFAULT 'Beginner',
        favorite_games TEXT DEFAULT NULL,
        platform_preferences TEXT DEFAULT NULL,
        is_verified BOOLEAN DEFAULT FALSE,
        reputation_score INT DEFAULT 0,
        badges TEXT DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        last_seen TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Posts table
    $sql_posts = "CREATE TABLE IF NOT EXISTS posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        media_path VARCHAR(500) DEFAULT NULL,
        media_type ENUM('image', 'video') DEFAULT NULL,
        game_tag VARCHAR(100) DEFAULT NULL,
        category VARCHAR(50) DEFAULT 'general',
        is_featured BOOLEAN DEFAULT FALSE,
        is_pinned BOOLEAN DEFAULT FALSE,
        view_count INT DEFAULT 0,
        like_count INT DEFAULT 0,
        comment_count INT DEFAULT 0,
        share_count INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        INDEX idx_created_at (created_at),
        INDEX idx_user_id (user_id),
        INDEX idx_game_tag (game_tag),
        INDEX idx_category (category)
    )";
    
    // Comments table
    $sql_comments = "CREATE TABLE IF NOT EXISTS comments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT NOT NULL,
        user_id INT NOT NULL,
        parent_id INT DEFAULT NULL,
        content TEXT NOT NULL,
        like_count INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (parent_id) REFERENCES comments(id) ON DELETE CASCADE,
        INDEX idx_post_id (post_id),
        INDEX idx_user_id (user_id),
        INDEX idx_created_at (created_at)
    )";
    
    // Post likes table
    $sql_post_likes = "CREATE TABLE IF NOT EXISTS post_likes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        post_id INT NOT NULL,
        user_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY unique_like (post_id, user_id),
        FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    
    // Comment likes table
    $sql_comment_likes = "CREATE TABLE IF NOT EXISTS comment_likes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        comment_id INT NOT NULL,
        user_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY unique_like (comment_id, user_id),
        FOREIGN KEY (comment_id) REFERENCES comments(id) ON DELETE CASCADE,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    
    // Games table
    $sql_games = "CREATE TABLE IF NOT EXISTS games (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        slug VARCHAR(255) UNIQUE NOT NULL,
        description TEXT DEFAULT NULL,
        genre VARCHAR(100) DEFAULT NULL,
        platform VARCHAR(100) DEFAULT NULL,
        release_date DATE DEFAULT NULL,
        developer VARCHAR(255) DEFAULT NULL,
        publisher VARCHAR(255) DEFAULT NULL,
        rating DECIMAL(3,1) DEFAULT NULL,
        image_url VARCHAR(500) DEFAULT NULL,
        banner_url VARCHAR(500) DEFAULT NULL,
        is_trending BOOLEAN DEFAULT FALSE,
        post_count INT DEFAULT 0,
        follower_count INT DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_name (name),
        INDEX idx_slug (slug),
        INDEX idx_genre (genre),
        INDEX idx_is_trending (is_trending)
    )";
    
    // User followers table
    $sql_followers = "CREATE TABLE IF NOT EXISTS user_followers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        follower_id INT NOT NULL,
        following_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY unique_follow (follower_id, following_id),
        FOREIGN KEY (follower_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (following_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    
    // Game followers table
    $sql_game_followers = "CREATE TABLE IF NOT EXISTS game_followers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        game_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY unique_follow (user_id, game_id),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
    )";
    
    // Notifications table
    $sql_notifications = "CREATE TABLE IF NOT EXISTS notifications (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        type ENUM('like', 'comment', 'follow', 'mention', 'badge', 'system') NOT NULL,
        title VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        related_id INT DEFAULT NULL,
        related_type VARCHAR(50) DEFAULT NULL,
        is_read BOOLEAN DEFAULT FALSE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        INDEX idx_user_id (user_id),
        INDEX idx_is_read (is_read),
        INDEX idx_created_at (created_at)
    )";
    
    // User sessions table (for better session management)
    $sql_sessions = "CREATE TABLE IF NOT EXISTS user_sessions (
        id VARCHAR(128) PRIMARY KEY,
        user_id INT DEFAULT NULL,
        ip_address VARCHAR(45) DEFAULT NULL,
        user_agent TEXT DEFAULT NULL,
        payload LONGTEXT NOT NULL,
        last_activity INT UNSIGNED NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        INDEX idx_last_activity (last_activity),
        INDEX idx_user_id (user_id)
    )";
    
    // Execute table creation queries
    $tables = [
        'users' => $sql_users,
        'posts' => $sql_posts,
        'comments' => $sql_comments,
        'post_likes' => $sql_post_likes,
        'comment_likes' => $sql_comment_likes,
        'games' => $sql_games,
        'user_followers' => $sql_followers,
        'game_followers' => $sql_game_followers,
        'notifications' => $sql_notifications,
        'user_sessions' => $sql_sessions
    ];
    
    $success_count = 0;
    $errors = [];
    
    foreach ($tables as $table_name => $sql) {
        if ($conn->query($sql) === TRUE) {
            $success_count++;
        } else {
            $errors[] = "Error creating table {$table_name}: " . $conn->error;
        }
    }
    
    // Insert sample data if tables were created successfully
    if ($success_count === count($tables)) {
        insertSampleData($conn);
        echo "<div style='background: #10b981; color: white; padding: 20px; border-radius: 8px; margin: 20px;'>";
        echo "<h3>✅ Database Setup Complete!</h3>";
        echo "<p>All tables created successfully. Sample data has been inserted.</p>";
        echo "<p><strong>Tables created:</strong> " . implode(', ', array_keys($tables)) . "</p>";
        echo "<p><a href='index.php' style='color: white; text-decoration: underline;'>Go to GameHub Forum →</a></p>";
        echo "</div>";
    } else {
        echo "<div style='background: #ef4444; color: white; padding: 20px; border-radius: 8px; margin: 20px;'>";
        echo "<h3>❌ Database Setup Issues</h3>";
        echo "<p>Some tables could not be created:</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>{$error}</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

function insertSampleData($conn) {
    // Insert sample games
    $sample_games = [
        ['Cyberpunk 2077', 'cyberpunk-2077', 'Open-world action RPG set in a dystopian future', 'RPG', 'PC, PlayStation, Xbox', '2020-12-10', 'CD Projekt Red', 'CD Projekt', 8.2],
        ['Elden Ring', 'elden-ring', 'Action RPG from FromSoftware and George R.R. Martin', 'Action RPG', 'PC, PlayStation, Xbox', '2022-02-25', 'FromSoftware', 'Bandai Namco', 9.5],
        ['Valorant', 'valorant', 'Tactical first-person shooter', 'FPS', 'PC', '2020-06-02', 'Riot Games', 'Riot Games', 8.8],
        ['Minecraft', 'minecraft', 'Sandbox building and survival game', 'Sandbox', 'Multi-platform', '2011-11-18', 'Mojang Studios', 'Microsoft', 9.0],
        ['Fortnite', 'fortnite', 'Battle royale and creative building game', 'Battle Royale', 'Multi-platform', '2017-07-21', 'Epic Games', 'Epic Games', 8.5]
    ];
    
    $stmt = $conn->prepare("INSERT IGNORE INTO games (name, slug, description, genre, platform, release_date, developer, publisher, rating, is_trending) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, TRUE)");
    
    foreach ($sample_games as $game) {
        $stmt->bind_param("ssssssssd", ...$game);
        $stmt->execute();
    }
    
    // Insert sample user (for testing)
    $sample_password = password_hash('demo123', PASSWORD_DEFAULT);
    $conn->query("INSERT IGNORE INTO users (username, email, password, gaming_level, bio, is_verified) VALUES 
        ('GameMaster92', 'demo@gamehub.com', '{$sample_password}', 'Expert', 'Professional gamer and game reviewer. Love exploring new worlds and sharing gaming experiences!', TRUE),
        ('ProGamer21', 'pro@gamehub.com', '{$sample_password}', 'Pro', 'Competitive esports player. Mainly focus on FPS and MOBA games.', TRUE),
        ('CasualPlayer', 'casual@gamehub.com', '{$sample_password}', 'Intermediate', 'Just here to have fun and discover new games with the community!', FALSE)
    ");
    
    // Insert sample posts
    $conn->query("INSERT IGNORE INTO posts (user_id, title, content, game_tag, category, view_count, like_count) VALUES 
        (1, 'Best Gaming Setup for 2024', 'Just upgraded my entire gaming setup and wanted to share some tips with the community. After months of research and testing, here are my recommendations for building the ultimate gaming experience...', 'general', 'hardware', 156, 24),
        (2, 'Cyberpunk 2077: Review After Latest Updates', 'After playing through Cyberpunk 2077 with all the recent updates and DLC, I have to say the game has come a long way. The performance improvements are significant and the story is more engaging than ever...', 'cyberpunk-2077', 'review', 89, 18),
        (1, 'Valorant Ranked Tips for Beginners', 'Starting your ranked journey in Valorant can be intimidating, but with these essential tips, you will improve quickly. Focus on crosshair placement, map knowledge, and communication with your team...', 'valorant', 'guide', 234, 45),
        (3, 'Minecraft Building Contest - Ocean Theme', 'Our community is hosting a Minecraft building contest with an ocean theme! Build anything related to underwater structures, sea creatures, or ocean adventures. Prize pool includes gift cards and exclusive badges...', 'minecraft', 'event', 78, 12)
    ");
}

// Close connection function (call this at the end of your scripts)
function closeConnection() {
    global $conn;
    if ($conn) {
        $conn->close();
    }
}

// Optional: Display connection status (remove in production)
if (isset($_GET['test']) && $_GET['test'] === 'connection') {
    echo "<div style='background: #10b981; color: white; padding: 20px; border-radius: 8px; margin: 20px;'>";
    echo "<h3>✅ Database Connection Successful!</h3>";
    echo "<p>GameHub Forum is connected to the database.</p>";
    echo "<p><strong>Server Info:</strong> " . $conn->server_info . "</p>";
    echo "<p><a href='index.php' style='color: white; text-decoration: underline;'>Go to GameHub Forum →</a></p>";
    echo "</div>";
}
?>