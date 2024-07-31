<?php
include("baglanti.php");

if(isset($_GET['id'])){
    $urun_id=$_GET['id'];

    // $ilan_fotograf_sil="DELETE FROM fotograflar WHERE urun_id='$urun_id'";
    // $calistir_ilan_fotograf_sil=mysqli_query($baglanti,$ilan_fotograf_sil);

    $ilan_sil="DELETE FROM urun_ilan WHERE urun_id='$urun_id'";
    $calistir_ilan_sil=mysqli_query($baglanti,$ilan_sil);

}

?>