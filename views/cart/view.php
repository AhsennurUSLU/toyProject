<?php
session_start();

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../functions/productFunctions.php';

$cartItems = [];
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $product = getProductById($productId);
        if ($product) {
            $product['quantity'] = $quantity;
            $cartItems[$productId] = $product;
        }
    }
}

include '../layout/header.php';
include '../layout/navbar.php';



?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h3>Sepet Detayı</h3>
            <?php if(!empty($cartItems)): ?>
                <form method="POST" action="cart_actions.php">
                <div class="cart-items">
                    <?php foreach($cartItems as $item): ?>
                        <div class="card mb-3 cart-item">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <?php 
                                        $images = json_decode($item['images'], true);
                                        $imgSrc = !empty($images) ? BASE_URL . "uploads/products/" . $images[0] : BASE_URL . "uploads/products/default-image.png";
                                    ?>
                                    <img src="<?= $imgSrc; ?>" class="card-img" alt="<?= htmlspecialchars($item['name']); ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($item['name']); ?></h5>
                                        <p class="card-text"><?= htmlspecialchars(mb_substr($item['description'], 0, 100)) . '...'; ?></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="price"><?= number_format($item['price'], 2, ',', '.') ?> TL</span>
                                            <div class="quantity">
                                                <button type="button" class="btn btn-sm btn-secondary" onclick="decreaseQuantity(<?= $item['id']; ?>)">-</button>
                                                <input type="text" readonly class="form-control d-inline-block text-center" 
                                                       style="width:50px;" 
                                                       id="quantity-<?= $item['id']; ?>" 
                                                       name="quantities[<?= $item['id']; ?>]" 
                                                       value="<?= $item['quantity']; ?>">
                                                <button type="button" class="btn btn-sm btn-secondary" onclick="increaseQuantity(<?= $item['id']; ?>)">+</button>
                                            </div>
                                            <button type="submit" name="remove" value="<?= $item['id']; ?>" class="btn btn-danger btn-sm">Sil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button type="submit" name="update_cart" class="btn btn-success btn-sm mt-2">Sepeti Güncelle</button>
                <a href="<?= BASE_URL; ?>index.php" class="btn btn-info btn-sm mt-2">Alışverişe Devam Et</a>
                <button type="submit" name="clear_cart" class="btn btn-warning btn-sm mt-2">Sepeti Boşalt</button>
                </form>
            <?php else: ?>
                <p>Sepetiniz boş.</p>
            <?php endif; ?>
        </div>

        <!-- Sepet Özeti -->
        <div class="col-md-4">
            <h3>Sepet Özeti</h3>
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <?php
                            $total = 0;
                            foreach($cartItems as $item) {
                                $total += $item['price'] * $item['quantity'];
                            }
                            $vat = $total * 0.18;
                        ?>
                        <li class="d-flex justify-content-between"><span>Ara Toplam:</span><span id="subtotal"><?= number_format($total, 2, ',', '.'); ?> TL</span></li>
                        <li class="d-flex justify-content-between"><span>KDV (%18):</span><span id="vat"><?= number_format($vat, 2, ',', '.'); ?> TL</span></li>
                        <li class="d-flex justify-content-between"><strong>Genel Toplam:</strong><span id="total"><?= number_format($total + $vat, 2, ',', '.'); ?> TL</span></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="btn btn-primary btn-block mt-4">Alışverişi Tamamla</a>
        </div>
    </div>
</div>

<script>
function increaseQuantity(id) {
    let el = document.getElementById('quantity-' + id);
    el.value = parseInt(el.value) + 1;
}

function decreaseQuantity(id) {
    let el = document.getElementById('quantity-' + id);
    if (parseInt(el.value) > 1) {
        el.value = parseInt(el.value) - 1;
    }
}
</script>

<?php include '../layout/footer.php'; ?>
