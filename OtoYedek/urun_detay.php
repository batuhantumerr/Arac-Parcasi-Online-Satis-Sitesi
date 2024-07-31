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
        </div>
        <div class="d-inline-flex align-items-center">

        </div>
    </div>
</div>
<!-- Topbar End -->

<?php
include("baglanti.php");
if(isset($_GET['id'])){
$urun_id=$_GET['id'];

$urun_ilan_sorgu = "SELECT * FROM urun_ilan WHERE urun_id='$urun_id'";
$urun_ilan_sonuc = $baglanti->query($urun_ilan_sorgu);
$urun_ilan= $urun_ilan_sonuc->fetch_assoc();

$kullanici_id=$urun_ilan["kullanici_id"];
$baslik=$urun_ilan["baslik"];
$fiyat=$urun_ilan["fiyat"];
$ilan_no=$urun_ilan["urun_id"];
$tarih=$urun_ilan["tarih"];
$kategori=$urun_ilan["kategori"];
$arac_marka=$urun_ilan["arac_marka"];
$arac_model=$urun_ilan["arac_model"];
$urun_marka=$urun_ilan["urun_marka"];
$durumu=$urun_ilan["durumu"];
$il_ilce=$urun_ilan["il_ilce"];
$aciklama=$urun_ilan["aciklama"];
$tel_izin=$urun_ilan["tel_izin"];


$kullanici_sorgu="SELECT * FROM kullanici WHERE kullanici_id='$kullanici_id'";
$kullanici_sorgu_sonuc=$baglanti->query($kullanici_sorgu);
$kullanici=mysqli_fetch_assoc($kullanici_sorgu_sonuc);
$tel_no=$kullanici["telefon"];
$e_posta=$kullanici["e_posta"];
$satici=$kullanici["ad"].' '.$kullanici["soyad"];

//izin sorgulama
if($tel_izin==1){
    $iletisim=$tel_no;
}
else{
    $iletisim=$e_posta;
}

$fotograflar_sorgu = "SELECT * FROM fotograflar WHERE urun_id='$urun_id'";
$fotograflar_sonuc = $baglanti->query($fotograflar_sorgu);
$urun_ilan_fotograflar=array();


if ($fotograflar_sonuc->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($fotograflar_sonuc)) {
        $urun_ilan_fotograflar[] = $row["resim_yolu"];
    }
}

}
?>
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5 mt-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                        <?php foreach ($urun_ilan_fotograflar as $key => $foto): ?>
                        <img class="w-100 mt-5 slaytResim" src="<?php echo $foto; ?>" alt="Fotoğraf">
                        <?php endforeach; ?>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev" onclick="onceki()">
                        <i class="fa fa-2x fa-angle-left text-light"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next" onclick="sonraki()">
                        <i class="fa fa-2x fa-angle-right text-light"></i>
                    </a>  
                    
    <script>
        var slaytIndex = 0;
        slaytGoster(slaytIndex);

        function slaytGoster(index) {
            var i;
            var slayt = document.getElementsByClassName("slaytResim");
            for (i = 0; i < slayt.length; i++) {
                slayt[i].style.display = "none";
            }
            slaytIndex = index;
            if (slaytIndex >= slayt.length) {
                slaytIndex = 0;
            }
            if (slaytIndex < 0) {
                slaytIndex = slayt.length - 1;
            }
            slayt[slaytIndex].style.display = "block";
        }

        function sonraki() {
            slaytGoster(slaytIndex + 1);
        }

        function onceki() {
            slaytGoster(slaytIndex - 1);
        }
    </script>

                </div>
            </div>
            
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3 ><?php echo "$baslik"?></h3>
                    <h4 class="font-weight-semi-bold mb-4"><?php echo "TL $fiyat"?></h4>

                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Satıcı:</strong>
                        <label><?php echo "$satici"?></label>                      
                    
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">İletişim:</strong>
                        <label><?php echo "$iletisim"?></label>                      
                    
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">İlan No:</strong>
                        <label><?php echo "$ilan_no"?></label>                       
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Yüklenme Tarihi:</strong>
                        <label><?php echo "$tarih"?></label>                        
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Kategori:</strong>
                        <label><?php echo "$kategori"?></label>                        
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Araç Marka:</strong>
                        <label><?php echo "$arac_marka"?></label>                        
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Araç Model:</strong>
                        <label><?php echo "$arac_model"?></label>                        
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Ürün Markası:</strong>
                        <label><?php echo "$urun_marka"?></label>                        
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">Durumu:</strong>
                        <label><?php echo "$durumu"?></label>                        
                    </div>
                    <div class="d-flex mb-2">
                        <strong class="text-dark mr-3">İl/İlçe:</strong>
                        <label><?php echo "$il_ilce"?></label>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Ürün Açıklaması</a>
                        
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <p><?php echo "$aciklama"?></p>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

</body>

</html>

