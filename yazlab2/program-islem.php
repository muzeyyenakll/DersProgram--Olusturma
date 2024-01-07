<?php
include "baglanti.php";
if (isset($_POST["program-ekle"])) {

    $kaydet = $baglanti->prepare("insert into program set
    
    hoca_id=:hoca_id,
    sinif_id=:sinif_id,
    gun=:gun,
    saat=:saat
    
    ");
    $insert = $kaydet->execute(
        array(
                
            "hoca_id" => $_POST["hoca_id"],
            "sinif_id" => $_POST["sinif_id"],
            "gun" => $_POST["gun"],
            "saat" => $_POST["saat"]

        )
    );
    if ($insert) {
        header("location:program.php?durum=yes");
    } else {
        header("location:program.php?durum=no");
    }
} else {
    echo "gelmediii";
}



if (isset($_GET['programsil'])) {


    $sil = $baglanti->prepare("DELETE FROM program WHERE program_id=:program_id");

    $sil->execute(
        array(

            'program_id' => $_GET['program_id']

        )
    );


    if ($sil) {
        Header("location:program.php?durum=yes");
    } else {
        Header("location:program.php?durum=no");
    }


}
?>