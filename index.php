<?php
require_once(__DIR__ . '/config.php');
?>
<?php include 'views/layout/header.php'; ?>
<?php
// Ürünler: Her kategori için örnek veri
$products = [
    'cok_satanlar' => [
        ['name' => 'Ürün 1', 'price' => '150₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 2', 'price' => '200₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 3', 'price' => '250₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 4', 'price' => '250₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 5', 'price' => '250₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 6', 'price' => '250₺', 'image' => 'assets/img/anasayfa1.jpg']
    ],
    'tavsiye_edilenler' => [
        ['name' => 'Ürün 7', 'price' => '300₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 8', 'price' => '350₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 9', 'price' => '400₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 10', 'price' => '400₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 11', 'price' => '400₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 12', 'price' => '400₺', 'image' => 'assets/img/anasayfa1.jpg']
    ],
    'yeni_eklenenler' => [
        ['name' => 'Ürün 13', 'price' => '450₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 14', 'price' => '500₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 15', 'price' => '550₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 16', 'price' => '550₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 17', 'price' => '550₺', 'image' => 'assets/img/anasayfa1.jpg'],
        ['name' => 'Ürün 18', 'price' => '550₺', 'image' => 'assets/img/anasayfa1.jpg']
    ],
];

// Aktif kategori kontrolü (default olarak çok satanlar)
$active_category = $_GET['category'] ?? 'cok_satanlar';
?>
<style>
    /* Carousel için ekstra stil */
    .carousel-item {
        transition: transform 0.5s ease-in-out;
    }

    .btn-category {
        min-width: 150px;
    }


    .product-card {
            transition: transform 0.2s ease-in-out;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .section-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: #333;
        }
</style>

<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <?php include 'views/layout/navbar.php'; ?>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="<?= BASE_URL; ?>assets/img/caro1.jpeg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">Denemedenemedenemedenemedeneme</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">DahafazlaDenemedenemedenemedenemedenemeDahafazlaDenemedenemedenemedenemedeneme</p>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Deneme Metni</a>
                                <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Deneme Metni</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="<?= BASE_URL; ?>assets/img/caro1.jpeg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">Denemedenemedenemedenemedeneme</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">DahafazlaDenemedenemedenemedenemedenemeDahafazlaDenemedenemedenemedenemedeneme</p>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Deneme Metni</a>
                                <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Deneme Metni</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Call To Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="<?= BASE_URL; ?>assets/img/anasayfa2.jpg" style="object-fit: cover;">
                        </div>
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->


<!-- carousel ürünler için çok satanlar/tavsiye/ yeni-->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">

                    <div class="container my-5">
                        <!-- Kategori Seçim Butonları -->
                        <div class="d-flex justify-content-center mb-4">
                            <a href="?category=cok_satanlar" class="btn btn-primary me-2">Çok Satanlar</a>
                            <a href="?category=tavsiye_edilenler" class="btn btn-success me-2">Tavsiye Edilenler</a>
                            <a href="?category=yeni_eklenenler" class="btn btn-warning">Yeni Eklenenler</a>
                        </div>

                        <!-- Carousel Yapısı -->
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                // Aktif kategorinin ürünlerini döngü ile gösteriyoruz
                                $items = $products[$active_category];
                                foreach (array_chunk($items, 3) as $index => $chunk): // 3'lü ürün kartı grupları
                                ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                                        <div class="row justify-content-center">
                                            <?php foreach ($chunk as $product): ?>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card text-center">
                                                        <img src="<?= $product['image']; ?>" class="card-img-top" alt="Ürün Resmi">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                                                            <p class="card-text"><?= htmlspecialchars($product['price']); ?></p>
                                                            <a href="views/products/details.php" class="btn btn-primary">İncele</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <!-- Carousel Kontrolleri -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Önceki</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Sonraki</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- Appointment Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="<?= BASE_URL; ?>assets/img/anasayfa3.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="<?= BASE_URL; ?>assets/img/anasayfa4.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->




        <!-- sizin için seçtiklerimiz -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">


                <div class="container my-5">
    <!-- Başlık -->
    <h2 class="section-title">Sizin İçin Seçtiklerimiz</h2>

    <!-- Ürün Kartları -->
    <div class="row">
        <!-- Ürün 1 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 1">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 1</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">150₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>

        <!-- Ürün 2 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 2">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 2</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">200₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>

        <!-- Ürün 3 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 3">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 3</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">250₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>

        <!-- Ürün 4 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 4">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 4</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">300₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Ürün 1 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 1">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 1</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">150₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>

        <!-- Ürün 2 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 2">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 2</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">200₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>

        <!-- Ürün 3 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 3">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 3</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">250₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>

        <!-- Ürün 4 -->
        <div class="col-md-3 mb-4">
            <div class="card h-100 text-center shadow product-card">
                <img src="<?= BASE_URL; ?>assets/img/anasayfa1.jpg" class="card-img-top product-img" alt="Ürün 4">
                <div class="card-body">
                    <h5 class="card-title">Ürün Adı 4</h5>
                    <p class="card-text">Bu ürün kısa açıklamasıdır. Detaylı bilgi için inceleyin.</p>
                    <p class="text-primary fw-bold">300₺</p>
                    <a href="#" class="btn btn-outline-primary">İncele</a>
                </div>
            </div>
        </div>
    </div>


</div>







                </div>
            </div>
        </div>
    </div>

    <?php include 'views/layout/footer.php'; ?>