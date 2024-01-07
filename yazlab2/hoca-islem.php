<?php
include "baglanti.php";
if (isset($_POST["hoca-ekle"])) {

    $kaydet = $baglanti->prepare("insert into hoca set
    
    hoca_adi=:hoca_adi,
    ders_adi=:ders_adi
    
    
    ");
    $insert = $kaydet->execute(
        array(

            "hoca_adi" => $_POST["hoca_adi"],
            "ders_adi" => $_POST["ders_adi"]
            


        )
    );
    if ($insert) {
        header("location:hoca.php?durum=yes");
    } else {
        header("location:hoca.php?durum=no");
    }
} else {
    echo "gelmediii";
}


if (isset($_GET['hocasil'])) {


    $sil = $baglanti->prepare("DELETE FROM hoca WHERE hoca_id=:hoca_id");

    $sil->execute(
        array(

            'hoca_id' => $_GET['hoca_id']

        )
    );


    if ($sil) {
        Header("location:hoca.php?durum=yes");
    } else {
        Header("location:hoca.php?durum=no");
    }


}
?>