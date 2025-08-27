<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $quantity = intval($_POST['quantity'] ?? 1);

    // Sepette zaten varsa miktarı artır
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }

    // Sepet sayfasına yönlendir
    header("Location: view.php");
    exit;
}
?>
