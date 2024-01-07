<?php
include "baglanti.php";
if (isset($_POST["sinif-ekle"])) {

    $kaydet = $baglanti->prepare("insert into sinif set
    
    sinif_adi=:sinif_adi
  
    
   
    
    ");
    $insert = $kaydet->execute(
        array(

            "sinif_adi" => $_POST["sinif_adi"]
           


        )
    );
    if ($insert) {
        header("location:sinif.php?durum=yes");
    } else {
        header("location:sinif.php?durum=no");
    }
} else {
    echo "gelmediii";
}



if (isset($_GET['sinifsil'])) {


    $sil = $baglanti->prepare("DELETE FROM sinif WHERE sinif_id=:sinif_id");

    $sil->execute(
        array(

            'sinif_id' => $_GET['sinif_id']

        )
    );


    if ($sil) {
        Header("location:sinif.php?durum=yes");
    } else {
        Header("location:sinif.php?durum=no");
    }


}
?>