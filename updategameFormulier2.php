<!doctype html>
<html>
  <!-- lemar-->
<head>
    <meta name="author" content="Anjo Eijweriks"
          charset="UTF-8">
    <title>gar-menu.php</title>
    <link rel="stylesheet" href="garage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- navbar -->
    <main>
    <header class="p-3 bg-dark text-white">
        <div class="h33">
        <img src="xgames.png" alt="Bedrijf foto" width="100"></h3>
        </div>
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="Home.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="games.php" class="nav-link px-2 text-white">games</a></li>
                        <li><a href="leverancier.php" class="nav-link px-2 text-white">leverancier</a></li>
                        <li><a href="console.php"class="nav-link px-2 text-white">console</a></li>
                </ul>
            </div>
        </header>
    </main>
</head>
<body STYLE="background-color: #808080">
<div class="h33">
		<h1>update game formulier</h1>
		
		<?php
			
			require "artikel.php";					// nodig om object te maken
			$artikelid = $_POST["consolenaamvak"];	// uitlezen vakje van klant 
			$artikel = new artikel();				// object aanmaken
			$artikel->searchartikel($artikelid);	
			// properties in variabelen zetten
			$artOmschrijving=$artikel->getartOmschrijving();
			$artInkoop=$artikel->getartInkoop();
			$artVerkoop=$artikel->getartVerkoop();
			$artVoorraad=$artikel->getartVoorraad();
            $artMinVoorraad=$artikel->getartMinVoorraad();
			$artMaxVoorraad=$artikel->getartMaxVoorraad();
            $artLocatie=$artikel->getartLocatie();
            
            
		?>
		
		<form class="contact-form" action="updategameFormulier3.php" method="post">
			<!-- $klant mag niet meer gewijzigd worden -->
            <?php echo $artikelid ?>
            <input type="hidden" class="contact-form-text"  name="consolenaamvak" value="<?php echo $artikelid; ?> "><br/>
            <input type="text"   class="contact-form-text"  name="artOmschrijvingVak"      value="<?php echo $artOmschrijving;      ?> "><br/>
            <input type="text"   class="contact-form-text"  name="artInkoopvak" value="<?php echo $artInkoop; ?> "><br/><br/>
			<input type="text"   class="contact-form-text"  name="artVerkoopvak" value="<?php echo $artVerkoop; ?> "><br/><br/>
            <input type="text"   class="contact-form-text"  name="artVoorraadvak"  value="<?php echo $artVoorraad;  ?> "><br/>
            <input type="text"   class="contact-form-text"  name="artMinVoorraadvak"  value="<?php echo $artMinVoorraad;  ?> "><br/>
            <input type="text"   class="contact-form-text"  name="artMaxVoorraadvak"  value="<?php echo $artMaxVoorraad;  ?> "><br/>
            <input type="text"    class="contact-form-text" name="artLocatievak"  value="<?php echo $artLocatie;  ?> "><br/>
			<input type="submit" class="contatct-form-btn" value="Verstuur"><br/><br/>
		</form>

        <a href="home.php"><br/>Terug naar het hoofdmenu</a>
</div>
	</body>	
	<style>

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: darkgray;
  color: white;
  text-align: center;
}
</style>

<div class="footer">
  <p>Bel nu gratis naar  0800.11.11.216 </p>
</div>