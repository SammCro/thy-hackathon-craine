<?php
ob_start();
session_start();


spl_autoload_register(function ($className) {
    $prefix = 'craine\\';
    $base_dir = __DIR__ . '/';
    $length = strlen($prefix);
    if (strncmp($prefix, $className, $length) !== 0) {
        return;
    }
    $className = strtolower($className);
    $relative_class = substr($className, $length);
    $path = $base_dir . str_replace('\\', '/', $relative_class) . '.class.php';
    if (file_exists($path)) {
        require $path;
    }
});
