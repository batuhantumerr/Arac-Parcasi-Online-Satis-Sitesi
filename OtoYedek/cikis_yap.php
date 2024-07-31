<?php
session_start();

// Oturumu sonlandır ve tüm oturum verilerini temizle
session_unset();
session_destroy();

// Giriş sayfasına yönlendir
header("Location:index.php");
exit();
?>