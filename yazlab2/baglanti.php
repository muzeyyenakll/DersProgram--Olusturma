<?php
try {
    $baglanti = new PDO("mysql:host=localhost; dbname=yazlab3", "root", "");
    #echo "bağlandın";

} catch (\Throwable $th) {
    echo $e->getMessage();
}

?>