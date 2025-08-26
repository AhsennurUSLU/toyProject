<?php
$servername = "localhost";   // genelde localhost
$username   = "root";        // XAMPP için genelde root
$password   = "";            // şifre yoksa boş bırak
$dbname     = "oyuncak";   // kendi veritabanı adın

// bağlantı oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// hata kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>

