<?php
require_once __DIR__ . '/../../db.php';

function getAllProducts($filters = []) {
    global $conn;

    $sql = "SELECT * FROM toys WHERE 1=1";
    $params = [];
    $types = "";

    // Kategori filtresi
    if (!empty($filters['category'])) {
        $sql .= " AND category_id = ?";
        $params[] = $filters['category'];
        $types .= "i";
    }

    // Fiyat filtresi
    if (!empty($filters['min_price'])) {
        $sql .= " AND price >= ?";
        $params[] = $filters['min_price'];
        $types .= "d";
    }
    if (!empty($filters['max_price'])) {
        $sql .= " AND price <= ?";
        $params[] = $filters['max_price'];
        $types .= "d";
    }

    // Marka filtresi
    if (!empty($filters['brand'])) {
        $sql .= " AND brand_id = ?";
        $params[] = $filters['brand'];
        $types .= "i";
    }

    // Arama filtresi
    if (!empty($filters['search'])) {
        $sql .= " AND name LIKE ?";
        $params[] = "%" . $filters['search'] . "%";
        $types .= "s";
    }

    $stmt = $conn->prepare($sql);

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}


function getProductById($id) {
    global $conn;
    $id = $conn->real_escape_string($id);
    
    $query = "
        SELECT p.*, c.name AS category_name, b.name AS brand_name
        FROM toys p
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN brands b ON p.brand_id = b.id
        WHERE p.id = '$id'
    ";
    
    $result = $conn->query($query);
    return $result->num_rows ? $result->fetch_assoc() : null;
}

function getSimilarProducts($categoryId, $excludeId) {
    global $conn;
    $categoryId = $conn->real_escape_string($categoryId);
    $excludeId  = $conn->real_escape_string($excludeId);
    
    $query = "
        SELECT p.*, c.name AS category_name, b.name AS brand_name
        FROM toys p
        LEFT JOIN categories c ON p.category_id = c.id
        LEFT JOIN brands b ON p.brand_id = b.id
        WHERE p.category_id = '$categoryId' AND p.id != '$excludeId'
        LIMIT 9
    ";
    
    $result = $conn->query($query);
    $products = [];
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    return $products;
}

?>