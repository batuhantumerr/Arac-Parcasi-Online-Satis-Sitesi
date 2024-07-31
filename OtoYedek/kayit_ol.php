<?php
include("baglanti.php");

if(isset($_POST['kayit_ol'])){
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$e_posta=$_POST['e_posta'];
$telefon=$_POST['telefon'];
$sifre=$_POST['sifre'];

$kullanici_ekle="INSERT INTO kullanici(ad,soyad,e_posta,telefon,sifre) VALUES('$ad','$soyad','$e_posta','$telefon','$sifre')";
$calistir_kullanici_ekle=mysqli_query($baglanti,$kullanici_ekle);

if($calistir_kullanici_ekle){
echo "Kayıt başarılı bir şekilde tamamlandı. Yönlendiriliyorsunuz";
header("Refresh:3; url=giris_yap.html" );
}
else{
    echo "Kayıt yapılırken bir sorun oluştu";
}
}
$baglanti->close();
?>


