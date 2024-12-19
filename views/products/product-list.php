<?php include '../layout/header.php'; ?>
<?php include '../layout/navbar.php'; ?>
    <style>
        .filter-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
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
                            <option value="electronics">Elektronik</option>
                            <option value="clothing">Giyim</option>
                            <option value="books">Kitaplar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat Aralığı</label>
                        <input type="number" class="form-control mb-2" name="min_price" placeholder="En Düşük">
                        <input type="number" class="form-control" name="max_price" placeholder="En Yüksek">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Marka</label>
                        <input type="text" class="form-control" name="brand" placeholder="Marka Adı">
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
                    <?php
                    // Örnek Ürünler
                    $products = [
                        [
                            'image' => 'https://via.placeholder.com/150',
                            'name' => 'Ürün 1',
                            'description' => 'Bu bir ürün açıklamasıdır.',
                            'price' => 100
                        ],
                        [
                            'image' => 'https://via.placeholder.com/150',
                            'name' => 'Ürün 2',
                            'description' => 'Başka bir ürün açıklaması.',
                            'price' => 150
                        ],
                        [
                            'image' => 'https://via.placeholder.com/150',
                            'name' => 'Ürün 3',
                            'description' => 'Daha fazla ürün açıklaması.',
                            'price' => 200
                        ],
                    ];

                    foreach ($products as $product): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                    <p class="card-text text-truncate"><?php echo $product['description']; ?></p>
                                    <p class="card-text text-primary fw-bold"><?php echo $product['price']; ?> TL</p>
                                    <a href="#" class="btn btn-primary">İncele</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include '../layout/footer.php'; ?>
