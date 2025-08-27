<?php
session_start();

// Sepet yoksa oluştur
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


require_once __DIR__ . '/../../config.php';
include '../layout/header.php';
?>
<?php include '../layout/navbar.php'; ?>
<?php require_once __DIR__ . '/../../db.php'; ?>
<?php require_once __DIR__ . '/../functions/productFunctions.php';

// GET parametrelerinden filtreleri al
$filters = [
    'category'   => $_GET['category']   ?? null,
    'min_price'  => $_GET['min_price']  ?? null,
    'max_price'  => $_GET['max_price']  ?? null,
    'brand'      => $_GET['brand']      ?? null,
    'search'     => $_GET['search']     ?? null,
];

$products = getAllProducts($filters);



?>
<style>
    .filter-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .card img {
        width: 200px;
        /* istediğin sabit genişlik */
        height: 200px;
        /* istediğin sabit yükseklik */
        object-fit: contain;
        /* resmin orantılı kırpılmasını sağlar */
        border-radius: 8px;
        /* kenarları yumuşatmak istersen */
    }
</style>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Filtreleme Bölümü -->
        <div class="col-md-3">
            <h5 class="filter-title">Filtreleme Araçları</h5>
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" name="category" id="category">
                        <option value="">Tümü</option>
                        <!-- Kategoriler DB'den de çekilebilir -->
                        <option value="1">Oyuncak</option>
                        <option value="2">Kırtasiye</option>
                        <option value="3">Parti Malzemeleri</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Fiyat Aralığı</label>
                    <input type="number" class="form-control mb-2" name="min_price" placeholder="En Düşük">
                    <input type="number" class="form-control" name="max_price" placeholder="En Yüksek">
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Marka</label>
                    <input type="text" class="form-control" name="brand" placeholder="Marka ID">
                </div>
                <button type="submit" class="btn btn-primary w-100">Filtrele</button>
            </form>
        </div>

        <!-- Ürün Listesi Bölümü -->
        <div class="col-md-9">
            <!-- Arama Barı -->
            <div class="d-flex mb-4">
                <input type="text" class="form-control" placeholder="Ürün ara..." name="search">
                <button class="btn btn-primary ms-2">
                    <i class="bi bi-search"></i> Ara
                </button>
            </div>

            <!-- Ürün Kartları -->
            <div class="row">

                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <?php
                                $images = json_decode($product['images'], true);
                                if (!empty($images)) : ?>
                                    <img src="<?= BASE_URL ?>uploads/products/<?= $images[0]; ?>"
                                        class="card-img-top"
                                        alt="<?= htmlspecialchars($product['name']); ?>">
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                                    <p class="card-text text-truncate"><?= htmlspecialchars($product['description']); ?></p>
                                    <p class="card-text text-primary fw-bold"><?= $product['price']; ?> TL</p>
                                    <a href="details.php?id=<?= $product['id']; ?>" class="btn btn-primary">İncele</a>
                                    <form method="POST" action="<?= BASE_URL ?>views/cart/add_to_cart.php">
                                        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary">Sepete Ekle</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Ürün bulunamadı.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php include '../layout/footer.php'; ?>