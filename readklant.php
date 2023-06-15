<!doctype html>
<html lang="nl">
<head>
    <meta name="Author" content="Anjo Eijrika">
    <meta charset="UTF-8">
    <title>bas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="garage.css"><!-- navbar -->
    <main>
        <header class="p-3 bg-dark text-white">
            <div class="h33">
                <h3><img src="Bas_Vanderheyden_Logo.png" alt="Bedrijf foto" width="150"></h3>
            </div>
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="Home.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="Magazijnmeester.php" class="nav-link px-2 text-white">magazijnmeester</a></li>
                        <li><a href="MagazijnMedewerker.php" class="nav-link px-2 text-white">MagazijnMedewerker</a></li>
                        <li><a href="bezorger.php"class="nav-link px-2 text-white">bezorger</a></li>
                        <li><a href="verkoper.php" class="nav-link px-2 text-white">verkoper</a></li>
              
                    </ul>
                    
            </div>
            </div>
        </header>
    </main>
</head>
<body STYLE="background-color: #8B0000">
<div class="h33">
    <h1> Read </h1>
    <p>
        Dit zijn alle gegevens
    <br>
    <a href="home.php"><br/>Terug naar het hoofdmenu</a>
    </p>
    
    <?php
			require "klant.php";			
			$klant1 = new klant();
			$klant1->readklant();
		?>
		<a href="verkoper.php"><br/>Terug naar het hoofdmenu</a>

</div>
</body>
<style>

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>

<div class="footer">
  <p>Bel nu gratis naar  0800.11.11.216 </p>
</div>
</html>
