<?php
require_once "../../db.php";

function addCategory($name) {
    global $conn;

    if (empty($name)) {
        return "⚠️ Kategori adı boş olamaz.";
    }

    $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        return "✅ Kategori başarıyla eklendi.";
    } else {
        return "❌ Hata: " . $conn->error;
    }
}

function getAllCategories() {
    global $conn;
    $result = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");
    return $result->fetch_all(MYSQLI_ASSOC);
}



?>