<?php include '../layout/header.php'; ?>
<?php include '../layout/navbar.php'; ?>
<?php
// Örnek Ürün Bilgileri
$product = [
    "name" => "Örnek Ürün Adı",
    "category" => "Elektronik",
    "brand" => "Marka XYZ",
    "stock_code" => "STK12345",
    "package_content" => "1 x Ürün, 1 x Kullanım Kılavuzu",
    "unit_price" => 499.99,
    "image" => "https://via.placeholder.com/500",
    // "similar_products" => [
    //     ["name" => "Ürün 1", "image" => "https://via.placeholder.com/150"],
    //     ["name" => "Ürün 2", "image" => "https://via.placeholder.com/150"],
    //     ["name" => "Ürün 3", "image" => "https://via.placeholder.com/150"],
    // ],
    $product['similar_products'] = [
        [
            'image' => 'product1.jpg',
            'name' => 'Ürün 1',
            'description' => 'Ürün açıklaması 1',
            'price' => '100'
        ],
        [
            'image' => 'product2.jpg',
            'name' => 'Ürün 2',
            'description' => 'Ürün açıklaması 2',
            'price' => '150'
        ]
        ],
    
];
?>

    <style>
       
    /* Benzer Ürün Kartlarının Mobil Uyumu */
    @media (max-width: 768px) {
        .carousel-inner .col-md-4 {
            flex: 0 0 100%; /* Mobilde her bir slaytta yalnızca bir kart göster */
            max-width: 100%;
        }
    }

    /* Yan Menü için Mobil Düzenleme */
    @media (max-width: 768px) {
        .col-md-3 {
            display: none; /* Mobilde filtreyi gizle */
        }
    }

    /* Ürün Detayları - Mobil */
    @media (max-width: 576px) {
        .col-md-6 {
            flex: 0 0 100%; /* Detay kısmı tam genişlikte */
            max-width: 100%;
        }

        .price {
            font-size: 1.5rem; /* Mobil için daha küçük fiyat boyutu */
        }
    }

    /* Genel Responsive Düzenlemeler */
    .card-title {
        font-size: 1rem; /* Kart başlıkları mobilde daha küçük olabilir */
    }

    .tab-content {
        font-size: 0.9rem; /* Sekme içerikleri mobilde daha küçük boyut */
    }
</style>

   

<div class="container py-5">
    <!-- Ürün Detayları -->
    <div class="row mb-4">
        <div class="col-md-6">
            <img src="<?php echo $product['image']; ?>" alt="Ürün Resmi" class="img-fluid rounded">
        </div>
        <div class="col-md-6">
            <h2><?php echo $product['name']; ?></h2>
            <p><strong>Kategori:</strong> <?php echo $product['category']; ?></p>
            <p><strong>Marka:</strong> <?php echo $product['brand']; ?></p>
            <p><strong>Stok Kodu:</strong> <?php echo $product['stock_code']; ?></p>
            <p><strong>Paket İçeriği:</strong> <?php echo $product['package_content']; ?></p>
            <p><strong>Birim Fiyat:</strong> <?php echo number_format($product['unit_price'], 2); ?> TL</p>
            <div class="price"><?php echo number_format($product['unit_price'], 2); ?> TL</div>
            <div class="mt-3 d-flex align-items-center">
                <div class="input-group me-3" style="width: 120px;">
                    <button class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>
                    <input type="text" id="quantity" class="form-control text-center" value="1">
                    <button class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>
                </div>
                <!-- <button class="btn btn-primary">Sepete Ekle</button> -->
                <a  href="../cart/view.php"  class="btn btn-primary">Sepete Ekle</a>
                <button class="btn btn-success ms-2">Hemen Al</button>
            </div>
            <div class="mt-4 d-flex">
                <button class="btn btn-light me-2"><i class="fa fa-share"></i> Paylaş</button>
                <button class="btn btn-light me-2"><i class="fa fa-comment"></i> Yorum Yap</button>
                <button class="btn btn-light me-2"><i class="fa fa-heart"></i> Tavsiye Et</button>
                <button class="btn btn-light"><i class="fa fa-bell"></i> Fiyat Düşünce Haber Ver</button>
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
    <div class="tab-content">
        <div class="tab-pane fade show active" id="info">Ürün bilgileri burada yer alacak.</div>
        <div class="tab-pane fade" id="reviews">Yorumlar burada yer alacak.</div>
        <div class="tab-pane fade" id="qa">Soru-cevap burada yer alacak.</div>
        <div class="tab-pane fade" id="suggestions">Önerileriniz burada yer alacak.</div>
    </div>

    <!-- Benzer Ürünler -->
    <div class="container mt-5">
    <h4>Benzer Ürünler</h4>
    <div id="similarProductsCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php 
        if (!empty($product['similar_products'])) {
            $chunks = array_chunk($product['similar_products'], 3); // Her slide için 3 ürün
            foreach ($chunks as $index => $chunk): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="row">
                        <?php foreach ($chunk as $item): ?>
                            <div class="col-md-4">
                                <div class="card text-center">
                                    <img src="<?php echo $item['image'] ?? 'default-image.jpg'; ?>" 
                                         class="card-img-top" 
                                         alt="<?php echo $item['name'] ?? 'Ürün Adı'; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $item['name'] ?? 'Ürün Adı'; ?></h5>
                                        <p class="card-text"><?php echo $item['description'] ?? 'Açıklama mevcut değil'; ?></p>
                                        <p class="card-text text-primary">
                                            <?php echo $item['price'] ?? '0'; ?> TL
                                        </p>
                                        <a href="#" class="btn btn-primary">İncele</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; 
        } else {
            echo '<div class="text-center">Benzer ürün bulunmamaktadır.</div>';
        }
        ?>
    </div>
    <!-- Carousel Kontrolleri -->
    <button class="carousel-control-prev" type="button" data-bs-target="#similarProductsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Önceki</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#similarProductsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sonraki</span>
    </button>
</div>


        <!-- Önceki ve Sonraki Butonları -->
        <button class="carousel-control-prev" type="button" data-bs-target="#similarProductsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Önceki</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#similarProductsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sonraki</span>
        </button>
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
