<!DOCTYPE html>
<html lang="nl">
<head>
    <meta name="author" content="Anjo Eijweriks"
          charset="UTF-8">
    <title>artikel</title>
    <link rel="stylesheet" href="garage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>

    footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;
    }
</style>
</head>    
<body STYLE="background-color: #8B0000">
    <!-- navbar -->
    <header class="p-3 bg-dark text-white">
        <div class="h33">
        <h3><img src="Bas_Vanderheyden_Logo.png" alt="Bedrijf foto" width="150"></h3>
        </div>
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="Home.php" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="Magazijnmeester.php" class="nav-link px-2 text-white">games</a></li>
                        <li><a href="MagazijnMedewerker.php" class="nav-link px-2 text-white">leverancier</a></li>
                        <li><a href="bezorger.php"class="nav-link px-2 text-white">console</a></li>
                        <li><a href="verkoper.php" class="nav-link px-2 text-white">accesories</a></li>
      
                </ul>
               
            </div>
        </div>
    </header>
    <main>
    <div class="h33">
    <?php
        require "artikel.php";
        
        // uitlezen vakjes van createStudentForm1
        $artOmschrijving=$_POST["artOmschrijvingvak"];
        $artInkoop=$_POST["artInkoopvak"];
        $artVerkoop=$_POST["artVerkoopvak"];
        $artVoorraad=$_POST["artVoorraadvak"];
        $artMinVoorraad=$_POST["artMinVoorraadvak"];
        $artMaxVoorraad=$_POST["artMaxVoorraadvak"];
        $artLocatie=$_POST["artLocatievak"];
        
        // maken object -----------------------
        $artikel = new artikel ($artOmschrijving, $artInkoop, $artVerkoop, $artVoorraad, $artMinVoorraad, $artMaxVoorraad, $artLocatie);
        
        // In de database zetten
        $artikel->createartikel();

        // afdrukken object -------------------
        $artikel->afdrukken();
    
    ?>
    <a href="home.php"><br/>Terug naar het hoofdmenu</a>
    </div>
<footer>
  <p>Bel nu gratis naar  0800.11.11.216 </p>
</footer>
</body>
</html>

