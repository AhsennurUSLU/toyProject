<?php include '../layout/header.php';
include '../functions/productFunctions.php';
include '../functions/brandFunctions.php';
include '../functions/categoryFunctions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = addProduct($_POST, $_FILES);

    if ($product_id) {
        header("Location: addProduct.php?success=1");
        exit;
    } else {
        echo "Hata: Ürün eklenemedi.";
    }
}

$brands = getAllBrands();
$categories = getAllCategories();


?>
  <div class="container-fluid position-relative bg-white d-flex p-0">
        <?php include '../layout/sidebar.php'; ?>

        <!-- Content Start -->
        <div class="content">
           
 <?php include '../layout/navbar.php'; ?>

 <div>

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Yeni Oyuncak Ekle</h5>
    </div>
    <div class="card-body">
        <form  method="POST" enctype="multipart/form-data">

            <div class="row g-3"><!-- g-3 = boşluk ayarı -->
                <!-- Oyuncak Adı -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name" id="oyuncakAdi" placeholder="Oyuncak Adı" required>
                        <label for="oyuncakAdi">Oyuncak Adı</label>
                    </div>
                </div>

                <!-- Kategori -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="category_id" id="oyuncakKategori" required>
                            <option value="">Kategori Seçin</option>
                           <?php foreach($categories as $cat): ?>
                                        <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                                    <?php endforeach; ?>
                        </select>
                        <label for="oyuncakKategori">Kategori</label>
                    </div>
                </div>

                <!-- Marka -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="brand_id" id="oyuncakMarka">
                            <option value="">Marka Seçin</option>
                             <?php foreach($brands as $brand): ?>
                                        <option value="<?= $brand['id'] ?>"><?= htmlspecialchars($brand['name']) ?></option>
                                    <?php endforeach; ?>
                        </select>
                        <label for="oyuncakMarka">Marka</label>
                    </div>
                </div>

                <!-- Fiyat -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" step="0.01" class="form-control" name="price" id="oyuncakFiyat" placeholder="Fiyat" required>
                        <label for="oyuncakFiyat">Fiyat (₺)</label>
                    </div>
                </div>

                <!-- İndirimli Fiyat -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" step="0.01" class="form-control" name="discount_price" id="oyuncakIndirim" placeholder="İndirimli Fiyat">
                        <label for="oyuncakIndirim">İndirimli Fiyat (₺)</label>
                    </div>
                </div>

                <!-- Stok -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" name="stock_quantity" id="oyuncakStok" placeholder="Stok" required>
                        <label for="oyuncakStok">Stok</label>
                    </div>
                </div>

                <!-- Yaş Grubu -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="age_group" id="oyuncakYas" placeholder="Yaş Grubu">
                        <label for="oyuncakYas">Yaş Grubu</label>
                    </div>
                </div>

                <!-- Malzeme -->
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="material" id="oyuncakMalzeme" placeholder="Malzeme">
                        <label for="oyuncakMalzeme">Malzeme</label>
                    </div>
                </div>

                <!-- Ağırlık -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="number" step="0.01" class="form-control" name="weight" id="oyuncakAgirlik" placeholder="Ağırlık">
                        <label for="oyuncakAgirlik">Ağırlık (kg)</label>
                    </div>
                </div>

                <!-- Ölçüler -->
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="dimensions" id="oyuncakOlcu" placeholder="Ölçüler">
                        <label for="oyuncakOlcu">Ölçüler</label>
                    </div>
                </div>

                <!-- Renk -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="color" id="oyuncakRenk" placeholder="Renk">
                        <label for="oyuncakRenk">Renk</label>
                    </div>
                </div>

                <!-- Durum -->
                <div class="col-md-4">
                    <div class="form-floating">
                        <select class="form-select" name="status" id="oyuncakDurum">
                            <option value="active" selected>Aktif</option>
                            <option value="inactive">Pasif</option>
                        </select>
                        <label for="oyuncakDurum">Durum</label>
                    </div>
                </div>

                <!-- Görsel -->
                <div class="col-md-4">
                    <label class="form-label">Görseller</label>
                    <input class="form-control" type="file" name="images[]" multiple>
                </div>

                <!-- Açıklama -->
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" name="description" id="oyuncakAciklama" placeholder="Açıklama" style="height: 120px;"></textarea>
                        <label for="oyuncakAciklama">Açıklama</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Kaydet</button>
        </form>
    </div>
</div>


</div>
           <?php include '../layout/footer.php'; ?>