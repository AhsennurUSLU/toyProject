<?php
// admin/functions/productFunctions.php
require_once __DIR__ . '/../../db.php';

function addProduct($data, $files) {
    global $conn;

    // Ürün bilgilerini al
    $name           = $data['name'];
    $category_id    = $data['category_id'];
    $brand_id       = $data['brand_id'];
    $price          = $data['price'];
    $discount_price = $data['discount_price'] ?? null;
    $stock_quantity = $data['stock_quantity'];
    $age_group      = $data['age_group'] ?? null;
    $material       = $data['material'] ?? null;
    $weight         = $data['weight'] ?? null;
    $dimensions     = $data['dimensions'] ?? null;
    $color          = $data['color'] ?? null;
    $status         = $data['status'] ?? 'active';
    $description    = $data['description'] ?? null;

    // Resimleri kaydet
    $imageNames = [];
    if (!empty($files['images']['name'][0])) {
        foreach ($files['images']['tmp_name'] as $key => $tmp_name) {
            $filename = uniqid() . "_" . basename($files['images']['name'][$key]);
           $targetPath = __DIR__ . "/../../uploads/products/" . $filename;

            if (move_uploaded_file($tmp_name, $targetPath)) {
                $imageNames[] = $filename;
            }
        }
    }

    // Resimleri JSON formatında kaydediyoruz
    $imagesJSON = json_encode($imageNames);

    // Toys tablosuna ekle
    $stmt = $conn->prepare("INSERT INTO toys
        (name, description, category_id, brand_id, price, discount_price, stock_quantity, age_group, material, weight, dimensions, color, images, date_added, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");
    $stmt->bind_param("ssiiddissdssss", 
        $name, $description, $category_id, $brand_id, $price, $discount_price, $stock_quantity,
        $age_group, $material, $weight, $dimensions, $color, $imagesJSON, $status
    );
    $stmt->execute();

    return $stmt->insert_id;
}


function getAllProducts() {
    global $conn;
    $result = $conn->query("SELECT * FROM toys ORDER BY date_added DESC");
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>
