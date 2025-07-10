<?php
/**
 * Environment Configuration Loader
 * This file loads environment variables from .env file
 */

class EnvLoader {
    
    public static function load($path) {
        if (!file_exists($path)) {
            throw new Exception('.env file not found at: ' . $path);
        }
        
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue; // Skip comments
            }
            
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Remove quotes if present
            if (preg_match('/^"(.*)"$/', $value, $matches)) {
                $value = $matches[1];
            } elseif (preg_match("/^'(.*)'$/", $value, $matches)) {
                $value = $matches[1];
            }
            
            if (!array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
            }
            
            if (!array_key_exists($name, $_SERVER)) {
                $_SERVER[$name] = $value;
            }
            
            putenv($name . '=' . $value);
        }
    }
    
    public static function get($key, $default = null) {
        return $_ENV[$key] ?? $default;
    }
}

// Load environment variables
try {
    EnvLoader::load(__DIR__ . '/../../.env');
} catch (Exception $e) {
    // If .env file doesn't exist, use default values
    error_log('Warning: ' . $e->getMessage());
}

// Database configuration from environment variables
$db_host = EnvLoader::get('DB_HOST', 'localhost');
$db_user = EnvLoader::get('DB_USER', 'root');
$db_password = EnvLoader::get('DB_PASSWORD', '');
$db_name = EnvLoader::get('DB_NAME', 'agriinfo');

// Application configuration
$app_name = EnvLoader::get('APP_NAME', 'Agri Info');
$app_url = EnvLoader::get('APP_URL', 'http://localhost/agripro');

// Contact information
$contact_email = EnvLoader::get('CONTACT_EMAIL', 'agriiinfo00@gmail.com');
$contact_phone = EnvLoader::get('CONTACT_PHONE', '+91 935 953 9232');

// Email configuration
$smtp_host = EnvLoader::get('SMTP_HOST', 'smtp.gmail.com');
$smtp_port = EnvLoader::get('SMTP_PORT', '587');
$smtp_username = EnvLoader::get('SMTP_USERNAME', '');
$smtp_password = EnvLoader::get('SMTP_PASSWORD', '');
$contact_to_email = EnvLoader::get('CONTACT_TO_EMAIL', 'contact@example.com');

// Security
$app_secret_key = EnvLoader::get('APP_SECRET_KEY', 'default_secret_key_change_this');
$jwt_secret = EnvLoader::get('JWT_SECRET', 'default_jwt_secret_change_this');
$app_env = EnvLoader::get('APP_ENV', 'development');

$con = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if(!$con){
    die('Connection Failed: ' . mysqli_connect_error());
}

?>
