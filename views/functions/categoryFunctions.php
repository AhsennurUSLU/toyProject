<?php
require_once __DIR__ . '/../../db.php';

function getAllCategories() {
    global $conn;
    $result = $conn->query("SELECT * FROM categories ORDER BY name ASC");
    return $result->fetch_all(MYSQLI_ASSOC);
}





?>