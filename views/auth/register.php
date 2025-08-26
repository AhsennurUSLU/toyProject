<?php include '../layout/header.php'; ?>


<div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?= BASE_URL; ?>assets/img/caro1.jpeg');"></div>
    <div class="contents order-2 order-md-1">

        <div class="container">
  
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8">
                    <div class="form-block" >
                        <div class="text-center mb-3">
                            <h3>X Oyuncak'a<strong> Üye Ol</strong></h3>
                        </div>
                        <form action="#" method="post">
                            <!-- Ad -->
                            <div class="form-group first">
                                <label for="first_name">Ad</label>
                                <input type="text" class="form-control" placeholder="Adınız" id="first_name" required>
                            </div>

                            <!-- Soyad -->
                            <div class="form-group first">
                                <label for="last_name">Soyad</label>
                                <input type="text" class="form-control" placeholder="Soyadınız" id="last_name" required>
                            </div>

                            <!-- E-posta -->
                            <div class="form-group first">
                                <label for="email">E-posta Adresi</label>
                                <input type="email" class="form-control" placeholder="E-posta Adresiniz" id="email" required>
                            </div>

                            <!-- Şifre -->
                            <div class="form-group last mb-3">
                                <label for="password">Şifre</label>
                                <input type="password" class="form-control" placeholder="Şifrenizi Giriniz" id="password" required>
                            </div>

                            <!-- Cinsiyet -->
                            <div class="form-group mb-3">
                                <label>Cinsiyet</label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                        <label class="form-check-label" for="male">Erkek</label>
                                    </div>
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                        <label class="form-check-label" for="female">Kadın</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="none" value="none" required>
                                        <label class="form-check-label" for="female">Belirtmek İstemiyorum</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Cep Telefonu -->
                            <div class="form-group first">
                                <label for="phone">Cep Telefonu</label>
                                <input type="tel" class="form-control" placeholder="Telefon Numaranız (Başına 0 koyarak yazınız)" id="phone" required>
                            </div>

                            <!-- Aydınlatma Metni -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="infoText" required>
                                <label class="form-check-label" for="infoText">Aydınlatma Metnini Okudum ve Kabul Ediyorum</label>
                            </div>

                            <!-- Kişisel Veri İşleme -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="personalData" required>
                                <label class="form-check-label" for="personalData">Kişisel Verilerimin İşlenmesini Kabul Ediyorum</label>
                            </div>

                            <!-- Üyelik Sözleşmesi -->
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="membershipAgreement" required>
                                <label class="form-check-label" for="membershipAgreement">Üyelik Sözleşmesini Okudum ve Kabul Ediyorum</label>
                            </div>

                        

                            <!-- Üye Ol Butonu -->
                            <input type="submit" value="Üye Ol" class="btn btn-block btn-primary mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Bootstrap ve Diğer JS Dosyaları -->
<script src="<?= BASE_URL; ?>assets/js/js/jquery-3.3.1.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/popper.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL; ?>assets/js/js/main.js"></script>
