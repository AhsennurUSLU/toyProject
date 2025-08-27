<?php
session_start();
require_once __DIR__ . '/../../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sepeti tamamen boşalt
    if (isset($_POST['clear_cart'])) {
        $_SESSION['cart'] = [];
    }

    // Sepetten ürün sil
    if (isset($_POST['remove'])) {
        $removeId = $_POST['remove'];
        if (isset($_SESSION['cart'][$removeId])) {
            unset($_SESSION['cart'][$removeId]);
        }
    }

    // Sepeti güncelle (miktar değiştiyse)
    if (isset($_POST['update_cart']) && !empty($_POST['quantities'])) {
        foreach ($_POST['quantities'] as $id => $qty) {
            if ($qty > 0) {
                $_SESSION['cart'][$id] = (int)$qty;
            } else {
                unset($_SESSION['cart'][$id]); // miktar 0 ise ürünü çıkar
            }
        }
    }
}

// İşlemden sonra sepet sayfasına yönlendir
header("Location: view.php");
exit;
