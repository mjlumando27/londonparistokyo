<?php
require_once 'classes/CityManager.php';

// Initialize the city manager
$cityManager = new CityManager();

// Get the selected city from URL parameter or default to welcome
$selectedCity = isset($_GET['city']) ? $_GET['city'] : 'welcome';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Cities Explorer - London, Tokyo & Paris</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>World Cities Explorer</h1>
            <p>Discover the beauty, culture, and unique characteristics of three magnificent cities around the world</p>
        </div>
    </header>

    <main class="container">
        <!-- Navigation Buttons -->
        <nav class="navigation">
            <button class="nav-button <?php echo $selectedCity === 'welcome' ? 'active' : ''; ?>" onclick="showContent('welcome')">
                Welcome
            </button>
            <button class="nav-button <?php echo $selectedCity === 'london' ? 'active' : ''; ?>" onclick="showContent('london')">
                London
            </button>
            <button class="nav-button <?php echo $selectedCity === 'tokyo' ? 'active' : ''; ?>" onclick="showContent('tokyo')">
                Tokyo
            </button>
            <button class="nav-button <?php echo $selectedCity === 'paris' ? 'active' : ''; ?>" onclick="showContent('paris')">
                Paris
            </button>
        </nav>

        <!-- Content Area -->
        <div class="content-area" id="content-area">
            <?php if ($selectedCity === 'welcome'): ?>
                <!-- Welcome Content -->
                <div class="welcome-content">
                    <h2>Welcome to World Cities Explorer</h2>
                    <p>Embark on a journey through three of the world's most fascinating cities. Each city has its own unique character, rich history, and cultural treasures waiting to be discovered.</p>
                    
                    <div class="welcome-features">
                        <div class="feature-card">
                            <h3>🏛️ Rich History</h3>
                            <p>Explore centuries of history and culture in each magnificent city</p>
                        </div>
                        <div class="feature-card">
                            <h3>🌆 Iconic Landmarks</h3>
                            <p>Discover world-famous landmarks and architectural marvels</p>
                        </div>
                        <div class="feature-card">
                            <h3>🌍 Diverse Cultures</h3>
                            <p>Experience the unique traditions and lifestyles of each city</p>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- City Content -->
                <div class="cities-container active">
                    <?php echo $cityManager->displaySingleCity($selectedCity); ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 World Cities Explorer. Explore the world, one city at a time.</p>
        </div>
    </footer>

    <script>
        function showContent(city) {
            // Update active button
            document.querySelectorAll('.nav-button').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Update URL without page reload
            const url = new URL(window.location);
            url.searchParams.set('city', city);
            window.history.pushState({}, '', url);
            
            // Show loading effect
            const contentArea = document.getElementById('content-area');
            contentArea.style.opacity = '0.5';
            
            // Simulate content loading (in real app, this would be AJAX)
            setTimeout(() => {
                window.location.href = '?city=' + city;
            }, 300);
        }
        
        // Add interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add click effect for landmarks
            const landmarks = document.querySelectorAll('.landmarks li');
            landmarks.forEach(landmark => {
                landmark.addEventListener('click', function() {
                    this.style.background = 'linear-gradient(45deg, #764ba2, #667eea)';
                    setTimeout(() => {
                        this.style.background = 'linear-gradient(45deg, #667eea, #764ba2)';
                    }, 200);
                });
            });
            
            // Add hover effects for feature cards
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
