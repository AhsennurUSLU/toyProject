<?php
require_once "../../db.php"; // ana dizindeki db bağlantısı

function addBrand($name) {
    global $conn;

    if (empty($name)) {
        return "⚠️ Marka adı boş olamaz.";
    }

    $stmt = $conn->prepare("INSERT INTO brands (name) VALUES (?)");
    $stmt->bind_param("s", $name);

    if ($stmt->execute()) {
        return "✅ Marka başarıyla eklendi.";
    } else {
        return "❌ Hata: " . $conn->error;
    }
}


function getAllBrands() {
    global $conn;
    $result = $conn->query("SELECT id, name FROM brands ORDER BY name ASC");
    return $result->fetch_all(MYSQLI_ASSOC);
}


?>