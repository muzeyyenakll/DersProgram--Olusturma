<?php
include "baglanti.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kitaplar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body >
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class=" p-4" style="background-color: #001920;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                        <a ><img width="150px" src="kouLogo.png"
                                    alt="foto ismi" /></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-dark" style="background-color: #191970 ; ">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <a class="text-white nav-link ml-2" style="text-decoration:none;" ></a>
            <a class="text-white nav-link ml-2" style="text-decoration:none;" href=" hoca.php">AKADEMİSYENLER</a>
            <a class="text-white nav-link ml-2" style="text-decoration:none;" href="sinif.php">DERSLİKLER</a>
            <a class="text-white nav-link ml-2" style="text-decoration:none;" href="program.php">DERS PROGRAMI</a>
            <a class="text-white nav-link ml-2" style="text-decoration:none;" ></a>
            <a class="text-white nav-link ml-2" style="text-decoration:none;" ></a>
            
        </nav>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="text-align:center;">
                <?php if (@$_GET["durum"] == "yes") { ?>
                <div class="alert bg-success" id="successAlert">
                    <b style="color:aliceblue">Başarılı</b>
                </div>
                <script>
                setTimeout(function() {
                    document.getElementById("successAlert").style.display = "none";
                }, 2000); // 3 saniye sonra mesaj kutusunu gizle
                </script>
                <?php } else if (@$_GET["durum"] == "no") { ?>
                <div class="alert bg-danger" id="successAlert">
                    <b style="color:aliceblue">Başarısız</b>

                </div>
                <script>
                setTimeout(function() {
                    document.getElementById("successAlert").style.display = "none";
                }, 2000); // 3 saniye sonra mesaj kutusunu gizle
                </script>
                <?php } ?>
            </div>
        </div>
        <br>
        <a href="program-ekle.php"><button style="float:right" class="btn btn-dark" type="submit">Program
                Ekle</button></a>
        <br><br>
        <table class="table  table-hover " style="background-color: #cccccc;">
            <thead>
                <tr class="text-dark">
                    <th>Program ID</th>
                    <th>Hoca ADI</th>
                    <th>Sınıf Adı </th>
                    <th>Gün </th>
                    <th>Saat</th>
                    <th></th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi 
                FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id
                JOIN sinif ON program.sinif_id = sinif.sinif_id");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>

                <tr>
                <td>
                        <?php echo $uruncek["program_id"] ?>
                    </td>
                    <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                    </td>
                    <td>
                        <?php echo $uruncek["sinif_adi"] ?>
                    </td>
                    <td>
                        <?php echo $uruncek["gun"] ?>
                    </td>
                    <td>
                        <?php echo $uruncek["saat"] ?>
                    </td>
                
                    <td></td>
                    <td> <a href="program-islem.php?programsil&program_id=<?php echo $uruncek["program_id"] ?>"><button
                                type=" submit" class="btn btn-danger">Sil</button></a> </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>



        

        <table>
        <tr>
            <th colspan="12" style="background-color:cadetblue">DERS PROGRAMI 1036 </th>
        </tr>
        
        
        <tr>
            <th>Pazartesi</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'pazartesi' AND sinif.sinif_adi = '1036';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Salı</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Salı' AND sinif.sinif_adi = '1036';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Çarşamba</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Çarşamba' AND sinif.sinif_adi = '1036';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Perşembe</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Perşembe' AND sinif.sinif_adi = '1036';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Cuma</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Cuma' AND sinif.sinif_adi = '1036';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        
    </table>
    <br><br>
    <table>
        <tr>
            <th colspan="12" style="background-color:cadetblue">DERS PROGRAMI 1044 </th>
        </tr>
        
        
        <tr>
            <th>Pazartesi</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'pazartesi' AND sinif.sinif_adi = '1044';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Salı</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Salı' AND sinif.sinif_adi = '1044';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Çarşamba</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Çarşamba' AND sinif.sinif_adi = '1044';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Perşembe</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Perşembe' AND sinif.sinif_adi = '1044';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Cuma</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Cuma' AND sinif.sinif_adi = '1044';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        
    </table>
    <br><br>
    <table>
        <tr>
            <th colspan="12" style="background-color:cadetblue">DERS PROGRAMI 1040 </th>
        </tr>
        
        
        <tr>
            <th>Pazartesi</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'pazartesi' AND sinif.sinif_adi = '1040';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Salı</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Salı' AND sinif.sinif_adi = '1040';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Çarşamba</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Çarşamba' AND sinif.sinif_adi = '1040';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Perşembe</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Perşembe' AND sinif.sinif_adi = '1040';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        <tr>
            <th>Cuma</th>
            <?php
                $urunsorgula = $baglanti->prepare("SELECT program.*, hoca.hoca_adi, sinif.sinif_adi, hoca.ders_adi FROM program 
                JOIN hoca ON program.hoca_id = hoca.hoca_id             
                JOIN sinif ON program.sinif_id = sinif.sinif_id
                WHERE program.gun = 'Cuma' AND sinif.sinif_adi = '1040';");
                $urunsorgula->execute();
                while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {

                    ?>
            <td>
                        <?php echo $uruncek["hoca_adi"] ?>
                        <br>
                        <?php echo $uruncek["ders_adi"] ?>
                        <br>
                        <?php echo $uruncek["saat"] ?>
            </td>
            <?php
                }
                ?>
                
        </tr>
        
    </table>
    <br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <div>
       
        
</body>