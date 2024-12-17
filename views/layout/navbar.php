<?php
require_once (__DIR__ .  '/../../config.php');
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
                    <a href="<?= BASE_URL; ?>views/about.php" class="nav-item nav-link">Kurumsal</a>
                    <a href="<?= BASE_URL; ?>views/classes.php" class="nav-item nav-link">Alışveriş</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Oyuncak Çeşitleri</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="<?= BASE_URL; ?>views/facility.php" class="dropdown-item">Oyuncak</a>
                            <a href="<?= BASE_URL; ?>views/team.php" class="dropdown-item">Kırtasiye-Ofis</a>
                            <a href="<?= BASE_URL; ?>views/call-to-action.php" class="dropdown-item">Parti-Süs</a>
                            <a href="<?= BASE_URL; ?>views/appointment.php" class="dropdown-item">Hediyelik Eşya</a>
                            <a href="<?= BASE_URL; ?>views/testimonial.php" class="dropdown-item">Kamp Malzemeleri</a>
                            <a href="<?= BASE_URL; ?>views/404.php" class="dropdown-item">Yılbaşı Ürünleri</a>
                            <a href="<?= BASE_URL; ?>views/404.php" class="dropdown-item">Pet Shop</a>
                        </div>
                    </div>
                    <a href="<?= BASE_URL; ?>views/contact.php" class="nav-item nav-link">İletişim</a>
                </div>
                <a href="" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Üye Ol<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>