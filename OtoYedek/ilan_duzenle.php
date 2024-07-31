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
    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="ilan_duzenle.php" method="post" class="row px-xl-5 mt-5" enctype="multipart/form-data">
        <input type="hidden" name="urun_id" value="<?php echo isset($urun_id) ? $urun_id : ''; ?>">    
        <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">İlan Düzenle</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="custom-select" required>
                                <option disabled selected>Seçiniz</option>
                                <option <?php if($kategori == 'Ateşleme-Yakıt') echo 'selected'; ?>>Ateşleme-Yakıt</option>
                                <option <?php if($kategori == 'Egzoz') echo 'selected'; ?>>Egzoz </option>
                                <option <?php if($kategori == 'Elektrik') echo 'selected'; ?>>Elektrik </option>
                                <option <?php if($kategori == 'Filtre') echo 'selected'; ?>>Filtre </option>
                                <option <?php if($kategori == 'Fren-Debriyaj') echo 'selected'; ?>>Fren-Debriyaj </option>
                                <option <?php if($kategori == 'Isıtma-Havalandırma-Klima') echo 'selected'; ?>>Isıtma-Havalandırma-Klima </option>
                                <option <?php if($kategori == 'Kaporta-Karoser') echo 'selected'; ?>>Kaporta-Karoser </option>
                                <option <?php if($kategori == 'Mekanik') echo 'selected'; ?>>Mekanik </option>
                                <option <?php if($kategori == 'Motor') echo 'selected'; ?>>Motor </option>
                                <option <?php if($kategori == 'Şanzıman-Vites') echo 'selected'; ?>>Şanzıman-Vites </option>
                                <option <?php if($kategori == 'Yürüyen-Direksiyon') echo 'selected'; ?>>Yürüyen-Direksiyon </option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Başlık</label>
                            <input name="baslik" class="form-control" type="text" value="<?php echo $baslik ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Fiyat</label>
                            <input name="fiyat" class="form-control" type="text" value="<?php echo $fiyat ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Araç Marka</label>
                            <input name="arac_marka" class="form-control" type="text" value="<?php echo $arac_marka ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Araç Model</label>
                            <input name="arac_model" class="form-control" type="text" value="<?php echo $arac_model ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ürün Marka</label>
                            <input name="urun_marka" class="form-control" type="text" value="<?php echo $urun_marka ?>" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Durumu</label>
                            <select name="durumu" class="custom-select"  required>
                            <option disabled selected>Seçiniz</option>
                            <option <?php if($durumu == 'Sıfır') echo 'selected'; ?>>Sıfır</option>
                            <option <?php if($durumu == 'İkinci El') echo 'selected'; ?>>İkinci El</option>

                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>İl/İlçe</label>
                            <input name="il_ilce" class="form-control" type="text" value="<?php echo $il_ilce ?>" required>
                        </div>    
                        <div class="col-md-6 form-group">
                            <label>Açıklama</label>
                            <?php
                            echo '<textarea name="aciklama" cols="100" rows="5" required>' . htmlspecialchars($aciklama) . '</textarea>';
                            ?>
                        </div>                 
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"></span></h5>
                <div class="bg-light p-30 text-center">                    
                            <input type="file" name="dosyalar[]" multiple required>
                        </form>
                </div>
                <script>
            var fileInput = document.querySelector('input[type="file"]');
            var photoURLs =<?php $urun_ilan_fotograflar?>;

        photoURLs.forEach(function(url) {
        var file = new File([url], url);
        fileInput.files.push(file);
    });
</script>
                <div class="ml-5">
                <input type="checkbox" name="tel_izin"> Telefon numaram görünmesin
                </div>
                <div class="bg-light p-30"> 
                    <button type="submit" name="degisiklik_kaydet" class="btn btn-block btn-primary font-weight-bold py-3 submit">Değişiklikleri Kaydet</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->

    <?php

    if(isset($_POST['degisiklik_kaydet'])){ 
    $urun_id=$_POST['urun_id'];
    $kategori=$_POST['kategori'];
    $baslik=$_POST['baslik'];
    $fiyat=$_POST['fiyat'];
    $arac_marka=$_POST['arac_marka'];
    $arac_model=$_POST['arac_model'];
    $urun_marka=$_POST['urun_marka'];
    $durumu=$_POST['durumu'];
    $il_ilce=$_POST['il_ilce'];
    $aciklama=$_POST['aciklama'];
    if(isset($_POST['tel_izin'])){
        $tel_izin=false;
    }
    else{
        $tel_izin=true;
    }

$fotograf_sil= "DELETE FROM fotograflar WHERE urun_id='$urun_id'";

if ($baglanti->query($fotograf_sil) === TRUE) {
    $silinen_fotograf_sayisi = $baglanti->affected_rows;
} 
//FOTOĞRAF EKLEME
$dosyaAdlari = $_FILES['dosyalar']['name'];
$dosyaTmpAdlari = $_FILES['dosyalar']['tmp_name'];
$hedefKlasor = "uploads/"; // Kaydedilecek klasör adı
$yuklenenDosyalar = array(); // Kaydedilen dosya adlarını tutacak dizi

foreach($dosyaAdlari as $key => $dosyaAdi){
       $hedefDosya = $hedefKlasor . basename($dosyaAdi);
       
       if(move_uploaded_file($dosyaTmpAdlari[$key], $hedefDosya)){
           $yuklenenDosyalar[] = $hedefDosya;
       }
       else{
           echo "Dosya yüklenirken hata oluştu: " . $dosyaAdi;
       }
   }
   
   // Veritabanına dosya bilgilerini kaydetme
   foreach($yuklenenDosyalar as $dosya){
       $sql = "INSERT INTO fotograflar(urun_id,resim_yolu) VALUES ('$urun_id','$dosya')";
       if($baglanti->query($sql) === TRUE){
           echo "Dosya veritabanına başarıyla eklendi: " . $dosya;
       }
       else{
           echo "Veritabanına dosya eklenirken hata oluştu: " ;
       }
   }
    
    $ilan_duzenle="UPDATE urun_ilan SET kategori='$kategori',baslik='$baslik',fiyat='$fiyat',arac_marka='$arac_marka',arac_model='$arac_model',urun_marka='$urun_marka',durumu='$durumu',il_ilce='$il_ilce',aciklama='$aciklama',tel_izin='$tel_izin' WHERE urun_id='$urun_id'";
    $calistir_ilan_duzenle=mysqli_query($baglanti,$ilan_duzenle);
    if($calistir_ilan_duzenle){
        echo '<script>window.location.href ="urun_detay.php?id='.$urun_id.'";</script>';
    }
    }
   $baglanti->close();
   ?>

</body>

</html>
