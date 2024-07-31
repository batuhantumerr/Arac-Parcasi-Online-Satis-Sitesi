<?php

	include ("baglanti.php");
	
	if(isset($_POST))
	{

		$e_posta =$_POST["e_posta"];
		$sifre =$_POST["sifre"];

		$secim ="SELECT * FROM kullanici WHERE e_posta='$e_posta'";
        $calistir_giris=mysqli_query($baglanti,$secim);
        $ilgilikayit= mysqli_fetch_assoc($calistir_giris);

        if($ilgilikayit["e_posta"]==$e_posta && $ilgilikayit["sifre"]==$sifre ){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION["e_posta"]=$ilgilikayit["kullanici_id"];
            $_SESSION["kullanici_id"]=$ilgilikayit["kullanici_id"];

            header("location:index.php"); 
        }
        else{
            echo "<div class='alert alert-danger' role='alert'> Kullanıcı adı veya şifre Yanlış </div>";
        }
       
    }
    $baglanti->close();

?>