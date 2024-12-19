<?php include '../layout/header.php'; ?>


<div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?= BASE_URL; ?>assets/img/caro1.jpeg');"></div>
    <div class="contents order-2 order-md-1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="form-block">
                        <div class="text-center mb-5">
                            <h3>X Oyuncak'a<strong> Giriş Yap</strong></h3>
                            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
                        </div>
                        <form action="#" method="post">
                            <div class="form-group first">
                                <label for="username">Kullanıcı Adı</label>
                                <input type="text" class="form-control" placeholder="E-mail Adresiniz" id="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Şifre</label>
                                <input type="password" class="form-control" placeholder="Şifrenizi Giriniz" id="password">
                            </div>

                            <div class="d-sm-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Beni Hatırla</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="#" class="forgot-pass">Şifremi Unuttum</a></span>
                            </div>

                            <input type="submit" value="Giriş Yap" class="btn btn-block btn-primary">
                            <br>
                            <h2>Henüz Üye Değil Misiniz?</h2>
                            <a href="register.php" class="btn btn-primary btn-member">Üye Ol</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- login template js -->
<script src="<?= BASE_URL; ?>assets/js/js/jquery-3.3.1.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/popper.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/main.js"></script>