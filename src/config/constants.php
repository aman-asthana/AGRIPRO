<?php
/**
 * Application Constants
 * This file contains application-wide constants loaded from environment variables
 */

// Load environment configuration
require_once __DIR__ . '/env.php';

// Define application constants
define('APP_NAME', $app_name);
define('APP_URL', $app_url);
define('CONTACT_EMAIL', $contact_email);
define('CONTACT_PHONE', $contact_phone);
define('APP_SECRET_KEY', $app_secret_key);
define('APP_ENV', $app_env);

// Database constants
define('DB_HOST', $db_host);
define('DB_USER', $db_user);
define('DB_NAME', $db_name);
// Note: We don't define DB_PASSWORD as a constant for security reasons

?>
