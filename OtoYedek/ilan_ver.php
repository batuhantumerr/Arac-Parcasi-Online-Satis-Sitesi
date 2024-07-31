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
    <!-- Topbar End -->
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



    <!-- Checkout Start -->
    <div class="container-fluid">
        <form action="ilan_ver.php" method="post" class="row px-xl-5 mt-5" enctype="multipart/form-data">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">İlan Ver</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Kategori</label>
                            <select name="kategori" class="custom-select" required>
                                <option disabled selected>Seçiniz</option>
                                <option>Ateşleme-Yakıt</option>
                                <option>Egzoz</option>
                                <option>Elektrik</option>
                                <option>Filtre</option>
                                <option>Fren-Debriyaj</option>
                                <option>Isıtma-Havalandırma-Klima</option>
                                <option>Kaporta-Karoser</option>
                                <option>Mekanik</option>
                                <option>Motor</option>
                                <option>Şanzıman-Vites</option>
                                <option>Yürüyen-Direksiyon</option>

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Başlık</label>
                            <input name="baslik" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Fiyat</label>
                            <input name="fiyat" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Araç Marka</label>
                            <input name="arac_marka" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Araç Model</label>
                            <input name="arac_model" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ürün Marka</label>
                            <input name="urun_marka" class="form-control" type="text" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Durumu</label>
                            <select name="durumu" class="custom-select" required>
                            <option disabled selected>Seçiniz</option>
                            <option>Sıfır</option>
                            <option>İkinci El</option>

                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>İl/İlçe</label>
                            <input name="il_ilce" class="form-control" type="text" required>
                        </div>    
                        <div class="col-md-6 form-group">
                            <label>Açıklama</label>
                            <textarea  name="aciklama"  cols="100" rows="5" required></textarea>
                        </div>                 
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"></span></h5>
                <div class="bg-light p-30 text-center">                    
                            <input type="file" name="dosyalar[]" multiple>
                        </form>
                </div>
                <div class="ml-5">
                <input type="checkbox" name="tel_izin"> Telefon numaram görünmesin
                </div>
                <div class="bg-light p-30"> 
                    <button type="submit" name="ilan_ver" class="btn btn-block btn-primary font-weight-bold py-3 submit" >İlan Ver</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->

</body>

</html>
<?php
//urun id oluşturma
include("baglanti.php");
if(isset($_POST['ilan_ver'])){    
$rastgelesayi1=rand(1000,9999);
$rastgelesayi2=rand(1000,9999);

//kullanici id bulma
// $kullanici_id_sorgu="SELECT * FROM kullanici WHERE e_posta='$_SESSION[e_posta]'";
// $kullanici_id_sonuc=$baglanti->query($kullanici_id_sorgu);
// $kullanici=mysqli_fetch_assoc($kullanici_id_sonuc);

$urun_id=$rastgelesayi1.$rastgelesayi2;
$kullanici_id= $_SESSION["kullanici_id"];
$tarih=date("d/m/Y");
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


$urun_ekle="INSERT INTO urun_ilan(urun_id,kullanici_id,tarih,kategori,baslik,fiyat,arac_marka,arac_model,urun_marka,durumu,il_ilce,aciklama,tel_izin) VALUES('$urun_id','$kullanici_id','$tarih','$kategori','$baslik','$fiyat','$arac_marka','$arac_model','$urun_marka','$durumu','$il_ilce','$aciklama','$tel_izin')";
$calistir_urun_ekle=mysqli_query($baglanti,$urun_ekle);

 if($calistir_urun_ekle){
 echo "Kayıt başarılı bir şekilde tamamlandı. Yönlendiriliyorsunuz";
 echo '<script>window.location.href ="urun_detay.php?id='.$urun_id.'";</script>';
 }
 else{
     echo "Kayıt yapılırken bir sorun oluştu";
 }
 }
$baglanti->close();
?>
