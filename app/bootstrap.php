<?php

// Composer autoload
require __DIR__ . '/../vendor/autoload.php';

try {
    // PDO
    $db = new PDO('mysql:host=localhost;dbname=todo', 'root', '');
} catch (PDOException $e) {
    die($e->getMessage());
}
