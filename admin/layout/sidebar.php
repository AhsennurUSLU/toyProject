<?php
require_once(__DIR__ .  '/../adminConfig.php');
?>
<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="<?= BASE_URL; ?>index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="<?= BASE_URL; ?>index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= BASE_URL; ?>general-pages/button.php" class="dropdown-item">Buttons</a>
                            <a href="<?= BASE_URL; ?>general-pages/typography.php" class="dropdown-item">Typography</a>
                            <a href="<?= BASE_URL; ?>general-pages/element.php" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="<?= BASE_URL; ?>general-pages/widget.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="<?= BASE_URL; ?>general-pages/form.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="<?= BASE_URL; ?>general-pages/table.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="<?= BASE_URL; ?>general-pages/chart.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= BASE_URL; ?>general-pages/signin.php" class="dropdown-item">Sign In</a>
                            <a href="<?= BASE_URL; ?>general-pages/signup.php" class="dropdown-item">Sign Up</a>
                            <a href="<?= BASE_URL; ?>general-pages/404.php" class="dropdown-item">404 Error</a>
                            <a href="<?= BASE_URL; ?>general-pages/blank.php" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Ayarlar</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="<?= BASE_URL; ?>views/addProduct.php" class="dropdown-item">Ürün Ekle</a>
                            <a href="<?= BASE_URL; ?>views/addBrand.php" class="dropdown-item">Marka Ekle</a>
                            <a href="<?= BASE_URL; ?>views/addCategory.php" class="dropdown-item">Kategori Ekle</a>
                            <a href="<?= BASE_URL; ?>views/blank.php" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->