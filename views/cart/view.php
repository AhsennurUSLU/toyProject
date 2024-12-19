<?php include '../layout/header.php'; ?>
<?php include '../layout/navbar.php'; ?>

<div class="container mt-5">
    <div class="row">
        <!-- Sepet Detayı (Kartlar içinde) -->
        <div class="col-md-8">
            <h3>Sepet Detayı</h3>
            <div class="cart-items">
                <!-- Ürün 1 -->
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= BASE_URL; ?>assets/img/product1.jpg" class="card-img" alt="Ürün 1">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ürün 1 Adı</h5>
                                <p class="card-text">Özellikler: Renk, Boyut vb.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price"><?= '₺' . number_format(100, 2, ',', '.') ?></span>
                                    <div class="quantity">
                                        <button class="btn btn-sm btn-secondary" onclick="decreaseQuantity(1)">-</button>
                                        <span id="quantity-1">1</span>
                                        <button class="btn btn-sm btn-secondary" onclick="increaseQuantity(1)">+</button>
                                    </div>
                                    <button class="btn btn-danger btn-sm" onclick="removeFromCart(1)">Sepetten Sil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ürün 2 -->
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= BASE_URL; ?>assets/img/product2.jpg" class="card-img" alt="Ürün 2">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Ürün 2 Adı</h5>
                                <p class="card-text">Özellikler: Renk, Boyut vb.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price"><?= '₺' . number_format(150, 2, ',', '.') ?></span>
                                    <div class="quantity">
                                        <button class="btn btn-sm btn-secondary" onclick="decreaseQuantity(2)">-</button>
                                        <span id="quantity-2">1</span>
                                        <button class="btn btn-sm btn-secondary" onclick="increaseQuantity(2)">+</button>
                                    </div>
                                    <button class="btn btn-danger btn-sm" onclick="removeFromCart(2)">Sepetten Sil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sepeti Boşalt Butonu -->
            <button class="btn btn-warning btn-sm" onclick="clearCart()">Sepeti Boşalt</button>
        </div>

        <!-- Sepet Özeti (Kart içinde) -->
        <div class="col-md-4">
            <h3>Sepet Özeti</h3>
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between">
                            <span>Ara Toplam:</span>
                            <span id="subtotal">₺250,00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span>KDV (%18):</span>
                            <span id="vat">₺45,00</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <span><strong>Genel Toplam:</strong></span>
                            <span id="total">₺295,00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Alışverişi Tamamla Butonu -->
            <button class="btn btn-primary btn-block mt-4" onclick="completePurchase()">Alışverişi Tamamla</button>
        </div>
    </div>
</div>

<!-- Bootstrap ve Diğer JS Dosyaları -->
<script src="<?= BASE_URL; ?>assets/js/js/jquery-3.3.1.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/popper.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/main.js"></script>

<script>
    // Sepetteki ürün sayısını artırmak
    function increaseQuantity(productId) {
        let quantityElement = document.getElementById('quantity-' + productId);
        let quantity = parseInt(quantityElement.textContent);
        quantity++;
        quantityElement.textContent = quantity;
        updateCartSummary();
    }

    // Sepetteki ürün sayısını azaltmak
    function decreaseQuantity(productId) {
        let quantityElement = document.getElementById('quantity-' + productId);
        let quantity = parseInt(quantityElement.textContent);
        if (quantity > 1) {
            quantity--;
            quantityElement.textContent = quantity;
            updateCartSummary();
        }
    }

    // Sepetten ürün silmek
    function removeFromCart(productId) {
        document.getElementById('quantity-' + productId).parentElement.parentElement.parentElement.remove();
        updateCartSummary();
    }

    // Sepeti boşaltmak
    function clearCart() {
        let cartItems = document.querySelectorAll('.cart-item');
        cartItems.forEach(item => item.remove());
        updateCartSummary();
    }

    // Sepet toplamını güncellemek
    function updateCartSummary() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            let price = parseFloat(item.querySelector('.price').textContent.replace('₺', '').replace(',', '.'));
            let quantity = parseInt(item.querySelector('.quantity span').textContent);
            total += price * quantity;
        });

        let vat = total * 0.18;
        let subtotal = total - vat;
        document.getElementById('subtotal').textContent = '₺' + subtotal.toFixed(2).replace('.', ',');
        document.getElementById('vat').textContent = '₺' + vat.toFixed(2).replace('.', ',');
        document.getElementById('total').textContent = '₺' + total.toFixed(2).replace('.', ',');
    }

    // Alışverişi tamamlamak
    function completePurchase() {
        alert('Alışverişi tamamladınız!');
    }
</script>


<?php include '../layout/footer.php'; ?>