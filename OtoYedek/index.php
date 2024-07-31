<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>OtoMarket</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-dark py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Oto</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Yedek</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left mr-4">
                <form action="shop_arama.php" method="post">
                    <div class="input-group">
                        <input type="text" name="aranan" class="form-control" placeholder="Ürün Ara">
                        <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-primary" name="btn_arama"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row col-lg-4 col-6 ">
    
    <?php

session_start();

// Kullanıcı oturumunu kontrol et
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    // Kullanıcı giriş yapmış ise "Çıkış Yap" butonunu görüntüle
    echo '<a href="ilan_ver.php" class="nav-item nav-link bg-primary text-dark">İlan Ver</a>';
    echo '<a href="ilanlarim.php" class="nav-item nav-link bg-primary text-dark ml-4">İlanlarım</a>';
    echo '<a  id="oturum_btn" href="cikis_yap.php" class="nav-item nav-link bg-primary text-dark ml-4">Çıkış Yap</a>';
} else {
    // Kullanıcı giriş yapmamış ise "Giriş Yap" butonunu görüntüle
    echo '<a  id="oturum_btn" href="giris_yap.html" class="nav-item nav-link bg-primary text-dark ml-5">Giriş Yap</a>';
    echo '<a  id="oturum_btn" href="kayit_ol.html" class="nav-item nav-link bg-primary text-dark ml-5">Kayıt Ol</a>';
}
?>
            <!-- <a  id="oturum_btn" href="giris_yap.html" class="nav-item nav-link bg-primary text-dark ml-5">Giriş Yap</a> -->
            </div>
            <div class="d-inline-flex align-items-center">

            </div>
        </div>
    </div>
    <!-- Topbar End -->


<div class="container-fluid pt-5 pb-3 text-center">
            <img src="img/add_photo.png" alt="">
            <h1>REKLAM</h1>
</div>


    <!-- Categories Start -->
    <div class="container-fluid pt-5" id="kategoriler">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">Kategoriler</span></h2>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Ateşleme-Yakıt">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Ateşleme & Yakıt.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Ateşleme-Yakıt</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Egzoz">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Egzoz.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Egzoz</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Elektrik">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Elektrik.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Elektrik</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Filtre">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Filtre.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Filtre</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Fren-Debriyaj">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Fren & Debriyaj.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Fren-Debriyaj</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Isıtma-Havalandırma-Klima">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Isıtma & Havalandırma & Klima.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Isıtma-Havalandırma-Klima</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Kaporta-Karoser">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Kaporta & Karoser.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Kaporta-Karoser</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Mekanik">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Mekanik.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Mekanik</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Motor">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Motor.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Motor</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Şanzıman-Vites">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Şanzıman & Vites.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Şanzıman-Vites</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="shop_kategori.php?kategori=Yürüyen-Direksiyon">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="img/Kategoriler/Yürüyen & Direksiyon.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Yürüyen-Direksiyon</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 "><span class="bg-secondary pr-3">Son Yüklenenler </span></h2>
        
        <div class="row px-xl-5">
<?php
include("baglanti.php");
    $tum_ilanlar_sorgu = "SELECT * FROM urun_ilan ORDER BY tarih DESC LIMIT 8 ";
    $tum_ilanlar_sonuc = $baglanti->query($tum_ilanlar_sorgu);
    $tum_ilanlar= $tum_ilanlar_sonuc->fetch_all(PDO::FETCH_ASSOC);       

    foreach ($tum_ilanlar as $row) {

        $ilan_ilk_fotograf_sorgu="SELECT * FROM fotograflar WHERE urun_id=$row[0]";
        $ilan_ilk_fotograf_sonuc = $baglanti->query($ilan_ilk_fotograf_sorgu);
        $ilan_ilk_fotograf= mysqli_fetch_assoc($ilan_ilk_fotograf_sonuc);

        echo '<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
        <a href="urun_detay.php?id='.$row[0].'">
    <div class="product-item bg-light mb-4 ">
            <div class="product-img position-relative overflow-hidden mb-5" style="height:200px ">
                <img class="img-fluid w-100 p-3" src="'.$ilan_ilk_fotograf['resim_yolu'].'" alt="">  
            </div>
            <div class="text-center py-4">
                <h4 class="text-decoration-none text-truncate">'.$row[4].'</h4>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <h5 class="text-decoration-none text-primary bg-dark">&nbsp;TL '.$row[5].'&nbsp;</h5>
                </div>
            </div>
        </div>
    </a>
    </div>';
    }
    ?>        
            
        </div>
    </div>
    <!-- Products End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

</body>

</html>