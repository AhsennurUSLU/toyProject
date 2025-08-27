<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ .  '/../../config.php');
require_once __DIR__ . '/../functions/categoryFunctions.php';
$categories = getAllCategories();
// Sepetteki toplam ürün sayısını hesapla
$cartItemCount = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $qty) {
        $cartItemCount += $qty;
    }
}

?>
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="<?= BASE_URL; ?>index.php" class="navbar-brand">
        <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>X Oyuncak</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="<?= BASE_URL; ?>index.php" class="nav-item nav-link active">Anasayfa</a>
            <a href="<?= BASE_URL; ?>views/general-pages/about.php" class="nav-item nav-link">Kurumsal</a>
            <a href="<?= BASE_URL; ?>views/general-pages/classes.php" class="nav-item nav-link">Alışveriş</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Oyuncak Çeşitleri</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="<?= BASE_URL; ?>views/products/product-list.php" class="dropdown-item"> Tüm Ürünler </a>
                     <?php foreach($categories as $category): ?>
                        <a href="<?= BASE_URL; ?>views/products/product-list.php?category_id=<?= $category['id']; ?>" class="dropdown-item">
                            <?= htmlspecialchars($category['name']); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="<?= BASE_URL; ?>views/general-pages/contact.php" class="nav-item nav-link">İletişim</a>
        </div>

        <a href="<?= BASE_URL; ?>views/cart/view.php" class="btn btn-outline-primary rounded-pill px-3 d-none d-lg-block position-relative ms-3">
            <i class="fa fa-shopping-cart"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?= isset($cartItemCount) ? $cartItemCount : '0'; ?>
            </span>

        </a>
        <a href="<?= BASE_URL; ?>views/auth/login.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block ms-3">Giriş Yap<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>