<?php
session_start();

// Sepet yoksa oluştur
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

require_once __DIR__ . '/../../config.php';
include '../layout/header.php';
include '../layout/navbar.php';
require_once __DIR__ . '/../../db.php';
require_once __DIR__ . '/../functions/productFunctions.php';

// URL'den ürün ID'sini al
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "<p>Geçersiz ürün.</p>";
    include '../layout/footer.php';
    exit;
}

// DB'den ürün bilgilerini çek
$product = getProductById($id); // Artık $conn kullanacak şekilde fonksiyon güncellendi

if (!$product) {
    echo "<p>Ürün bulunamadı.</p>";
    include '../layout/footer.php';
    exit;
}

// Resimler varsa decode et

$images = json_decode($product['images'], true);





// Benzer ürünler (aynı kategori, farklı id)
$similarProducts = getSimilarProducts($product['category_id'], $product['id']);

?>

<div class="container py-5">
    <!-- Ürün Detayları -->
    <div class="row mb-4">
        <div class="col-md-6">
            <?php
            if (!empty($images)):
            ?>
                <img src="<?= BASE_URL . "uploads/products/" . $images[0]; ?>"
                    alt="<?= htmlspecialchars($product['name']); ?>"
                    class="img-fluid rounded" style="max-height:400px; object-fit:contain;">

            <?php else: ?>
                <img src="<?= BASE_URL ?>uploads/products/default-image.png"
                    alt="Varsayılan Resim"
                    class="img-fluid rounded" style="max-height:400px; object-fit:contain;">
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <h2><?= htmlspecialchars($product['name']); ?></h2>
            <p><strong>Kategori:</strong> <?= htmlspecialchars($product['category_name']); ?></p>
            <p><strong>Marka:</strong> <?= htmlspecialchars($product['brand_name']); ?></p>
            <p><strong>Stok Kodu:</strong> <?= htmlspecialchars($product['stock_quantity']); ?></p>
            <p><strong>Üretilen Malzeme:</strong> <?= htmlspecialchars($product['material']); ?></p>
            <p><strong>Birim Fiyat:</strong> <?= number_format($product['price'], 2); ?> TL</p>
            <div class="price text-primary fw-bold"><?= number_format($product['price'], 2); ?> TL</div>

            <div class="mt-3 d-flex align-items-center">
                
                <form method="POST" action="<?= BASE_URL ?>views/cart/add_to_cart.php" class="d-flex align-items-center">
    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
    <div class="input-group me-3" style="width: 120px;">
        <button type="button" class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
        <input type="text" id="quantity" name="quantity" class="form-control text-center" value="1">
        <button type="button" class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
    </div>
    <button type="submit" class="btn btn-primary">Sepete Ekle</button>
</form>
                <button class="btn btn-success ms-2">Hemen Al</button>
            </div>

            <div class="mt-4 d-flex flex-wrap">
                <button class="btn btn-light me-2 mb-2"><i class="fa fa-share"></i> Paylaş</button>
                <button class="btn btn-light me-2 mb-2"><i class="fa fa-comment"></i> Yorum Yap</button>
                <button class="btn btn-light me-2 mb-2"><i class="fa fa-heart"></i> Tavsiye Et</button>
                <button class="btn btn-light mb-2"><i class="fa fa-bell"></i> Fiyat Düşünce Haber Ver</button>
            </div>
        </div>
    </div>

    <!-- Sekme Yapısı -->
    <ul class="nav nav-tabs" id="product-tabs" role="tablist">
        <li class="nav-item">
            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button">Ürün Bilgisi</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">Yorumlar</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="qa-tab" data-bs-toggle="tab" data-bs-target="#qa" type="button">Soru-Cevap</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="suggestions-tab" data-bs-toggle="tab" data-bs-target="#suggestions" type="button">Önerileriniz</button>
        </li>
    </ul>
    <div class="tab-content p-3 border border-top-0 rounded-bottom">
        <div class="tab-pane fade show active" id="info">
            <?= !empty($product['description']) ? htmlspecialchars($product['description']) : "Ürün bilgileri bulunmamaktadır."; ?>
        </div>
        <div class="tab-pane fade" id="reviews">Yorumlar burada yer alacak.</div>
        <div class="tab-pane fade" id="qa">Soru-cevap burada yer alacak.</div>
        <div class="tab-pane fade" id="suggestions">Önerileriniz burada yer alacak.</div>
    </div>

    <!-- Benzer Ürünler -->
    <div class="container mt-5">
        <h4>Benzer Ürünler</h4>
        <?php if (!empty($similarProducts)): ?>
            <div id="similarProductsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $chunks = array_chunk($similarProducts, 3);
                    foreach ($chunks as $index => $chunk): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                            <div class="row">
                                <?php foreach ($chunk as $item):
                                    $itemImages = json_decode($item['images'], true);
                                    $itemImage = !empty($itemImages) ? BASE_URL . "uploads/products/" . $itemImages[0] : BASE_URL . "uploads/products/default-image.png";
                                ?>
                                    <div class="col-md-4">
                                        <div class="card text-center h-100">
                                            <img src="<?= $itemImage; ?>"
                                                class="card-img-top"
                                                alt="<?= htmlspecialchars($item['name']); ?>"
                                                style="height:200px; object-fit:contain;">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= htmlspecialchars($item['name']); ?></h5>
                                                <p class="card-text text-truncate"><?= htmlspecialchars($item['description']); ?></p>
                                                <p class="card-text text-primary fw-bold"><?= number_format($item['price'], 2); ?> TL</p>
                                                <a href="details.php?id=<?= $item['id']; ?>" class="btn btn-primary">İncele</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#similarProductsCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Önceki</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#similarProductsCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sonraki</span>
                </button>
            </div>
        <?php else: ?>
            <div class="text-center">Benzer ürün bulunmamaktadır.</div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function increaseQuantity() {
        const input = document.getElementById('quantity');
        input.value = parseInt(input.value) + 1;
    }

    function decreaseQuantity() {
        const input = document.getElementById('quantity');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>

<?php include '../layout/footer.php'; ?>