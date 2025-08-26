<?php include '../layout/header.php';
require_once "../functions/brandFunctions.php";
 
 $message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $message = addBrand($name);
}
 
 
 ?>
<div class="container-fluid position-relative bg-white d-flex p-0">
    <?php include '../layout/sidebar.php'; ?>

    <!-- Content Start -->
    <div class="content d-flex flex-column min-vh-100">
        <?php include '../layout/navbar.php'; ?>

        <div class="container-fluid my-4 flex-grow-1">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Yeni Marka Ekle</h5>
                </div>
                <div class="card-body">
                    <?php if ($message): ?>
                        <div class="alert alert-info"><?= $message ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="markaAdi" placeholder="Marka Adı" required>
                                    <label for="markaAdi">Marka Adı</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success col-md-6 mt-3">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>

        <?php include '../layout/footer.php'; ?>
    </div>
</div>
