/**
 * GameHub - Professional Gaming Forum
 * Main JavaScript File
 * Handles all interactive features and UI enhancements
 */

// ===== GLOBAL VARIABLES =====
let isProfileMenuOpen = false;
let isNotificationsOpen = false;
let isMobileMenuOpen = false;

// ===== DOM LOADED EVENT =====
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

// ===== INITIALIZATION =====
function initializeApp() {
    console.log('🎮 GameHub initialized');
    
    // Initialize all components
    initializeScrollEffects();
    initializeFormEnhancements();
    initializeFilterButtons();
    initializeEngagementButtons();
    initializeSearchEnhancements();
    initializeFileUpload();
    initializeAnimations();
    initializeNotifications();
    
    // Add click outside listeners
    document.addEventListener('click', handleOutsideClicks);
    
    // Add keyboard shortcuts
    document.addEventListener('keydown', handleKeyboardShortcuts);
    
    // Add resize handler for responsive adjustments
    window.addEventListener('resize', handleWindowResize);
    
    // Initialize scroll to top button
    initializeScrollToTop();
}

// ===== MOBILE MENU =====
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    
    if (mobileMenu && mobileToggle) {
        isMobileMenuOpen = !isMobileMenuOpen;
        
        if (isMobileMenuOpen) {
            mobileMenu.classList.add('show');
            mobileToggle.classList.add('active');
            document.body.style.overflow = 'hidden';
        } else {
            mobileMenu.classList.remove('show');
            mobileToggle.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
}

// ===== PROFILE MENU =====
function toggleProfileMenu() {
    const dropdown = document.getElementById('profileDropdown');
    
    if (dropdown) {
        isProfileMenuOpen = !isProfileMenuOpen;
        
        if (isProfileMenuOpen) {
            dropdown.classList.add('show');
            closeNotifications();
        } else {
            dropdown.classList.remove('show');
        }
    }
}

// ===== NOTIFICATIONS =====
function toggleNotifications() {
    const dropdown = document.getElementById('notificationsDropdown');
    
    if (dropdown) {
        isNotificationsOpen = !isNotificationsOpen;
        
        if (isNotificationsOpen) {
            dropdown.classList.add('show');
            closeProfileMenu();
            markNotificationsAsRead();
        } else {
            dropdown.classList.remove('show');
        }
    }
}

function closeProfileMenu() {
    const dropdown = document.getElementById('profileDropdown');
    if (dropdown) {
        dropdown.classList.remove('show');
        isProfileMenuOpen = false;
    }
}

function closeNotifications() {
    const dropdown = document.getElementById('notificationsDropdown');
    if (dropdown) {
        dropdown.classList.remove('show');
        isNotificationsOpen = false;
    }
}

function markNotificationsAsRead() {
    // Simulate marking notifications as read
    setTimeout(() => {
        const badge = document.querySelector('.notification-badge');
        const unreadItems = document.querySelectorAll('.notification-item.unread');
        
        if (badge) {
            badge.style.opacity = '0';
            setTimeout(() => {
                badge.style.display = 'none';
            }, 300);
        }
        
        unreadItems.forEach(item => {
            item.classList.remove('unread');
        });
    }, 1000);
}

// ===== SCROLL EFFECTS =====
function initializeScrollEffects() {
    let lastScrollTop = 0;
    const header = document.querySelector('.header');
    
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Header hide/show on scroll
        if (header) {
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }
        }
        
        lastScrollTop = scrollTop;
        
        // Update scroll to top button
        updateScrollToTopButton();
        
        // Add scroll-based animations
        animateOnScroll();
    });
}

function initializeScrollToTop() {
    updateScrollToTopButton();
}

function updateScrollToTopButton() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (scrollToTopBtn) {
        if (window.pageYOffset > 300) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// ===== FORM ENHANCEMENTS =====
function initializeFormEnhancements() {
    // Auto-resize textareas
    const textareas = document.querySelectorAll('.form-textarea');
    textareas.forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });
    
    // Form validation feedback
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                showFormErrors(this);
            } else {
                showLoadingState(this);
            }
        });
    });
    
    // Real-time character counter for textareas
    const textInputs = document.querySelectorAll('.form-input, .form-textarea');
    textInputs.forEach(input => {
        addCharacterCounter(input);
    });
}

function validateForm(form) {
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('error');
            isValid = false;
        } else {
            field.classList.remove('error');
        }
    });
    
    return isValid;
}

function showFormErrors(form) {
    const errorFields = form.querySelectorAll('.error');
    if (errorFields.length > 0) {
        errorFields[0].focus();
        showNotification('Please fill in all required fields', 'error');
    }
}

function showLoadingState(form) {
    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        
        // Reset after 3 seconds (or when response is received)
        setTimeout(() => {
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }, 3000);
    }
}

function addCharacterCounter(input) {
    const maxLength = input.getAttribute('maxlength');
    if (maxLength) {
        const counter = document.createElement('div');
        counter.className = 'character-counter';
        counter.textContent = `0/${maxLength}`;
        
        input.parentNode.appendChild(counter);
        
        input.addEventListener('input', function() {
            const currentLength = this.value.length;
            counter.textContent = `${currentLength}/${maxLength}`;
            
            if (currentLength > maxLength * 0.9) {
                counter.style.color = 'var(--warning)';
            } else {
                counter.style.color = 'var(--text-muted)';
            }
        });
    }
}

// ===== FILTER BUTTONS =====
function initializeFilterButtons() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter posts (implement your filtering logic here)
            const filter = this.getAttribute('data-filter');
            filterPosts(filter);
            
            // Add visual feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });
}

function filterPosts(filter) {
    const posts = document.querySelectorAll('.post-card');
    
    // Add loading animation
    posts.forEach(post => {
        post.style.opacity = '0.5';
        post.style.transform = 'scale(0.98)';
    });
    
    // Simulate filtering delay
    setTimeout(() => {
        posts.forEach(post => {
            post.style.opacity = '1';
            post.style.transform = 'scale(1)';
            
            // Here you would implement actual filtering logic
            // For now, we'll just show all posts
            post.style.display = 'block';
        });
        
        showNotification(`Showing ${filter} posts`, 'success');
    }, 300);
}

// ===== ENGAGEMENT BUTTONS =====
function initializeEngagementButtons() {
    // Like buttons
    const likeButtons = document.querySelectorAll('.like-btn');
    likeButtons.forEach(button => {
        button.addEventListener('click', function() {
            toggleLike(this);
        });
    });
    
    // Comment buttons
    const commentButtons = document.querySelectorAll('.comment-btn');
    commentButtons.forEach(button => {
        button.addEventListener('click', function() {
            toggleCommentSection(this);
        });
    });
    
    // Share buttons
    const shareButtons = document.querySelectorAll('.share-btn');
    shareButtons.forEach(button => {
        button.addEventListener('click', function() {
            sharePost(this);
        });
    });
}

function toggleLike(button) {
    const countSpan = button.querySelector('span');
    const currentCount = parseInt(countSpan.textContent) || 0;
    const isLiked = button.classList.contains('liked');
    
    if (isLiked) {
        button.classList.remove('liked');
        countSpan.textContent = currentCount - 1;
        button.style.color = '';
    } else {
        button.classList.add('liked');
        countSpan.textContent = currentCount + 1;
        button.style.color = 'var(--danger)';
        
        // Add heart animation
        createHeartAnimation(button);
    }
    
    // Animate button
    button.style.transform = 'scale(1.2)';
    setTimeout(() => {
        button.style.transform = '';
    }, 200);
}

function createHeartAnimation(button) {
    const heart = document.createElement('div');
    heart.innerHTML = '<i class="fas fa-heart"></i>';
    heart.style.position = 'absolute';
    heart.style.color = 'var(--danger)';
    heart.style.fontSize = '1.5rem';
    heart.style.pointerEvents = 'none';
    heart.style.animation = 'heartFloat 1s ease-out forwards';
    
    button.style.position = 'relative';
    button.appendChild(heart);
    
    setTimeout(() => {
        heart.remove();
    }, 1000);
}

function toggleCommentSection(button) {
    // This would toggle a comment section for the post
    showNotification('Comment feature coming soon!', 'info');
}

function sharePost(button) {
    // Get post URL (would be dynamic in real implementation)
    const postUrl = window.location.href;
    
    if (navigator.share) {
        navigator.share({
            title: 'Check out this gaming post!',
            url: postUrl
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(postUrl).then(() => {
            showNotification('Post URL copied to clipboard!', 'success');
        });
    }
}

// ===== SEARCH ENHANCEMENTS =====
function initializeSearchEnhancements() {
    const searchInputs = document.querySelectorAll('.search-input');
    
    searchInputs.forEach(input => {
        let searchTimeout;
        
        input.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            const query = this.value.trim();
            
            if (query.length > 2) {
                searchTimeout = setTimeout(() => {
                    performSearch(query);
                }, 300);
            }
        });
        
        // Add search suggestions
        addSearchSuggestions(input);
    });
}

function performSearch(query) {
    // This would perform actual search - for now just show feedback
    console.log('Searching for:', query);
    
    // You would implement actual search logic here
    // For demonstration, we'll just show a notification
    if (query.length > 0) {
        showNotification(`Searching for "${query}"...`, 'info');
    }
}

function addSearchSuggestions(input) {
    const suggestions = [
        'Cyberpunk 2077', 'Elden Ring', 'Valorant', 'Among Us',
        'Minecraft', 'Fortnite', 'Call of Duty', 'League of Legends'
    ];
    
    const suggestionsContainer = document.createElement('div');
    suggestionsContainer.className = 'search-suggestions';
    suggestionsContainer.style.display = 'none';
    
    input.parentNode.appendChild(suggestionsContainer);
    
    input.addEventListener('focus', function() {
        if (this.value.length === 0) {
            showSearchSuggestions(suggestionsContainer, suggestions.slice(0, 5));
        }
    });
    
    input.addEventListener('blur', function() {
        setTimeout(() => {
            suggestionsContainer.style.display = 'none';
        }, 200);
    });
}

function showSearchSuggestions(container, suggestions) {
    container.innerHTML = '';
    
    suggestions.forEach(suggestion => {
        const item = document.createElement('div');
        item.className = 'suggestion-item';
        item.textContent = suggestion;
        item.addEventListener('click', function() {
            const input = container.parentNode.querySelector('.search-input');
            input.value = suggestion;
            container.style.display = 'none';
            performSearch(suggestion);
        });
        container.appendChild(item);
    });
    
    container.style.display = 'block';
}

// ===== FILE UPLOAD ENHANCEMENTS =====
function initializeFileUpload() {
    const fileInputs = document.querySelectorAll('.file-input');
    
    fileInputs.forEach(input => {
        const label = input.nextElementSibling;
        
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                updateFileUploadLabel(label, file);
                previewFile(file, label);
            }
        });
        
        // Add drag and drop functionality
        addDragAndDrop(input, label);
    });
}

function updateFileUploadLabel(label, file) {
    const filename = file.name;
    const filesize = formatFileSize(file.size);
    
    label.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <span>${filename}</span>
        <small>${filesize}</small>
    `;
    
    label.style.borderColor = 'var(--success)';
    label.style.color = 'var(--success)';
}

function previewFile(file, label) {
    if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.createElement('img');
            preview.src = e.target.result;
            preview.style.maxWidth = '200px';
            preview.style.maxHeight = '200px';
            preview.style.borderRadius = 'var(--radius)';
            preview.style.marginTop = 'var(--space-md)';
            
            label.appendChild(preview);
        };
        reader.readAsDataURL(file);
    }
}

function addDragAndDrop(input, label) {
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        label.addEventListener(eventName, preventDefaults, false);
    });
    
    ['dragenter', 'dragover'].forEach(eventName => {
        label.addEventListener(eventName, () => {
            label.style.borderColor = 'var(--primary)';
            label.style.backgroundColor = 'var(--bg-tertiary)';
        }, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        label.addEventListener(eventName, () => {
            label.style.borderColor = '';
            label.style.backgroundColor = '';
        }, false);
    });
    
    label.addEventListener('drop', function(e) {
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            input.files = files;
            updateFileUploadLabel(label, files[0]);
            previewFile(files[0], label);
        }
    }, false);
}

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// ===== ANIMATIONS =====
function initializeAnimations() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements that should animate
    const animateElements = document.querySelectorAll('.post-card, .widget, .gaming-card');
    animateElements.forEach(el => {
        observer.observe(el);
    });
}

function animateOnScroll() {
    const elements = document.querySelectorAll('.trending-item');
    
    elements.forEach((element, index) => {
        const rect = element.getBoundingClientRect();
        const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
        
        if (isVisible) {
            element.style.setProperty('--index', index);
            element.classList.add('animate-slide-in');
        }
    });
}

// ===== NOTIFICATIONS SYSTEM =====
function initializeNotifications() {
    // Create notifications container if it doesn't exist
    if (!document.getElementById('notificationsContainer')) {
        const container = document.createElement('div');
        container.id = 'notificationsContainer';
        container.className = 'notifications-container';
        document.body.appendChild(container);
    }
}

function showNotification(message, type = 'info', duration = 3000) {
    const container = document.getElementById('notificationsContainer');
    
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    
    const icons = {
        success: 'fa-check-circle',
        error: 'fa-exclamation-circle',
        warning: 'fa-exclamation-triangle',
        info: 'fa-info-circle'
    };
    
    notification.innerHTML = `
        <i class="fas ${icons[type]}"></i>
        <span>${message}</span>
        <button class="notification-close" onclick="closeNotification(this)">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    container.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.add('show');
    }, 10);
    
    // Auto remove
    setTimeout(() => {
        closeNotification(notification.querySelector('.notification-close'));
    }, duration);
}

function closeNotification(button) {
    const notification = button.parentElement;
    notification.classList.remove('show');
    
    setTimeout(() => {
        notification.remove();
    }, 300);
}

// ===== EVENT HANDLERS =====
function handleOutsideClicks(event) {
    // Close dropdowns when clicking outside
    const profileMenu = document.getElementById('profileDropdown');
    const notificationsMenu = document.getElementById('notificationsDropdown');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (profileMenu && !event.target.closest('.user-profile-menu')) {
        closeProfileMenu();
    }
    
    if (notificationsMenu && !event.target.closest('.notifications-btn') && !event.target.closest('.notifications-dropdown')) {
        closeNotifications();
    }
    
    if (mobileMenu && isMobileMenuOpen && !event.target.closest('.mobile-menu') && !event.target.closest('.mobile-menu-toggle')) {
        toggleMobileMenu();
    }
}

function handleKeyboardShortcuts(event) {
    // Keyboard shortcuts
    if (event.ctrlKey || event.metaKey) {
        switch(event.key) {
            case 'k':
                event.preventDefault();
                const searchInput = document.querySelector('.search-input');
                if (searchInput) {
                    searchInput.focus();
                }
                break;
            case '/':
                event.preventDefault();
                const searchInputMobile = document.querySelector('.mobile-search .search-input');
                if (searchInputMobile) {
                    searchInputMobile.focus();
                }
                break;
        }
    }
    
    // Escape key to close menus
    if (event.key === 'Escape') {
        closeProfileMenu();
        closeNotifications();
        if (isMobileMenuOpen) {
            toggleMobileMenu();
        }
    }
}

function handleWindowResize() {
    // Close mobile menu on resize to desktop
    if (window.innerWidth > 1024 && isMobileMenuOpen) {
        toggleMobileMenu();
    }
    
    // Adjust layout for different screen sizes
    adjustLayoutForScreenSize();
}

function adjustLayoutForScreenSize() {
    const heroContent = document.querySelector('.hero-content');
    
    if (window.innerWidth <= 768 && heroContent) {
        heroContent.style.gridTemplateColumns = '1fr';
    }
}

// ===== UTILITY FUNCTIONS =====
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ===== ADDITIONAL CSS FOR ANIMATIONS =====
const additionalStyles = `
<style>
/* Notification System */
.notifications-container {
    position: fixed;
    top: 90px;
    right: 20px;
    z-index: 10000;
    display: flex;
    flex-direction: column;
    gap: var(--space-sm);
}

.notification {
    display: flex;
    align-items: center;
    gap: var(--space-sm);
    padding: var(--space-md);
    background: var(--bg-card);
    border-radius: var(--radius);
    border: 1px solid var(--border-primary);
    box-shadow: var(--shadow-lg);
    min-width: 300px;
    max-width: 400px;
    transform: translateX(100%);
    opacity: 0;
    transition: var(--transition);
}

.notification.show {
    transform: translateX(0);
    opacity: 1;
}

.notification-success {
    border-left: 4px solid var(--success);
    color: var(--success);
}

.notification-error {
    border-left: 4px solid var(--danger);
    color: var(--danger);
}

.notification-warning {
    border-left: 4px solid var(--warning);
    color: var(--warning);
}

.notification-info {
    border-left: 4px solid var(--primary);
    color: var(--primary);
}

.notification span {
    flex: 1;
    color: var(--text-primary);
}

.notification-close {
    background: none;
    border: none;
    color: var(--text-muted);
    cursor: pointer;
    padding: var(--space-xs);
    border-radius: var(--radius-sm);
    transition: var(--transition);
}

.notification-close:hover {
    background: var(--bg-secondary);
    color: var(--text-primary);
}

/* Character Counter */
.character-counter {
    font-size: 0.75rem;
    color: var(--text-muted);
    text-align: right;
    margin-top: var(--space-xs);
}

/* Search Suggestions */
.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: var(--bg-card);
    border: 1px solid var(--border-primary);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    z-index: 100;
    margin-top: var(--space-xs);
}

.suggestion-item {
    padding: var(--space-sm) var(--space-md);
    cursor: pointer;
    transition: var(--transition);
    border-bottom: 1px solid var(--border-primary);
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:hover {
    background: var(--bg-secondary);
    color: var(--primary);
}

/* Heart Animation */
@keyframes heartFloat {
    0% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    100% {
        opacity: 0;
        transform: translateY(-30px) scale(1.5);
    }
}

/* Scroll Animations */
.animate-in {
    animation: fadeInUp 0.6s ease-out forwards;
}

.animate-slide-in {
    animation: slideInLeft 0.3s ease-out forwards;
    animation-delay: calc(var(--index, 0) * 0.1s);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Loading States */
.loading {
    position: relative;
    pointer-events: none;
}

.form-input.error,
.form-textarea.error {
    border-color: var(--danger);
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
}

/* Responsive Notifications */
@media (max-width: 480px) {
    .notifications-container {
        right: 10px;
        left: 10px;
    }
    
    .notification {
        min-width: auto;
        max-width: none;
    }
}
</style>
`;

// Inject additional styles
document.head.insertAdjacentHTML('beforeend', additionalStyles);

console.log('🎮 GameHub JavaScript loaded successfully!');