<?php

// Application Configuration
define('APP_NAME', 'World Cities Explorer');
define('APP_VERSION', '1.0.0');
define('APP_DESCRIPTION', 'Discover the beauty, culture, and unique characteristics of magnificent cities around the world');

// Database Configuration (for future use)
define('DB_HOST', 'localhost');
define('DB_NAME', 'cities_db');
define('DB_USER', 'root');
define('DB_PASS', '');

// Image Configuration
define('IMAGE_PATH', 'images/');
define('DEFAULT_IMAGE', 'images/default-city.jpg');

// Application Settings
define('CITIES_PER_PAGE', 10);
define('ENABLE_ANIMATIONS', true);
define('ENABLE_RESPONSIVE', true);

// Error Reporting (for development)
error_reporting(E_ALL);
ini_set('display_errors', 1);
