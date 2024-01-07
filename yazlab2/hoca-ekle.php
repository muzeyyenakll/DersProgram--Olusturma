<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoca ekleme</title>
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
    <h1 style="text-align: center;" style="font-size: 24px; ">Akademisyen Ekleyiniz</h1>
    <br>
    <div class="container">
        <div>
            <form action="hoca-islem.php" method="post">
                <div class="form-group">


                    <label>Hoca Adı</label>
                    <input type="text" class="form-control" name="hoca_adi">
                    <br>
                    <label>Ders Adı</label>
                    <input type="text" class="form-control" name="ders_adi">
                   

                </div>
                <br>
                <button name="hoca-ekle" type="submit" class="btn btn-primary">Hoca Ekle</button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous">
            </script>
        </div>
    </div>
    

</body>

</html>