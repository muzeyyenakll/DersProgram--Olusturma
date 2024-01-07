<?php
include "baglanti.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program ekleme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
<div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class=" p-4" style="background-color: #001920;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="anasayfa.php"><img width="200px" src="tasarım/resimler/book.png"
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
    <br><br>
    <h1 style="text-align: center;" style="font-size: 24px; ">Ders Programı Ekleyiniz</h1>
    <br>
    <div class="container">
        <div>
            <form action="program-islem.php" method="post">
                <div class="form-group">
                    
                <label>Hoca Adı</label>
                <select class="form-select" name="hoca_id" aria-label="Default select example">
                        <?php
                        $urunsorgula = $baglanti->prepare("SELECT * FROM hoca");
                        $urunsorgula->execute();
                        while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $uruncek["hoca_id"] ?>">
                                <?php echo  $uruncek["hoca_adi"] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <label>Sınıf Adı</label>
                    <select class="form-select" name="sinif_id" aria-label="Default select example">
                        <?php
                        $urunsorgula = $baglanti->prepare("SELECT * FROM sinif");
                        $urunsorgula->execute();
                        while ($uruncek = $urunsorgula->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $uruncek["sinif_id"] ?>">
                                <?php echo  $uruncek["sinif_adi"] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <label>Gün</label>
                        <select class="form-select" name="gun" aria-label="Default select example">
                        
                        <option value="Pazartesi">Pazartesi</option>
                        <option value="Salı">Salı</option>
                        <option value="Çarşamba">Çarşamba</option>
                        <option value="Perşembe">Perşembe</option>
                        <option value="Cuma">Cuma</option>
                        </select>

                    <br>
                    <label>Saat</label>
                    
                    <select class="form-select" name="saat" aria-label="Default select example">
                        
                        <option value="9.00">9.00</option>
                        <option value="10.00">10.00</option>
                        <option value="11.00">11.00</option>
                        <option value="12.00">12.00</option>
                        <option value="13.00">13.00</option>
                        <option value="14.00">14.00</option>
                        <option value="15.00">15.00</option>
                        <option value="16.00">16.00</option>
                        <option value="17.00">17.00</option>
                        </select>

                    <br>
                   

                </div>
                <br>
                <button name="program-ekle" type="submit" class="btn btn-primary">Program Ekle</button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous">
            </script>
        </div>
    </div>
 

</body>

</html>