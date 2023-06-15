<!doctype html>
<html>
	<!-- lemar -->
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
        <h3><img src="Bas_Vanderheyden_Logo.png" alt="Bedrijf foto" width="150"></h3>
        </div>
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="Home.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="Magazijnmeester.php" class="nav-link px-2 text-white">magazijnmeester</a></li>
                        <li><a href="MagazijnMedewerker.php" class="nav-link px-2 text-white">MagazijnMedewerker</a></li>
                        <li><a href="bezorger.php"class="nav-link px-2 text-white">bezorger</a></li>
                        <li><a href="verkoper.php" class="nav-link px-2 text-white">verkoper</a></li>
                       
                </ul>
                
            </div>
        </header>
    </main>
</head>
<body STYLE="background-color: #8B0000">
	<div class="h33">
		<h1>update order formulier 2</h1>
		
		<?php
			
			require "order.php";					// nodig om object te maken
			$orderid = $_POST["verkOrdidvak"];	// uitlezen vakje van klant 
			$order = new order();				// object aanmaken
			$order->searchorder($orderid);	
			// properties in variabelen zetten
			$klantid=$order->getklantid();
			$artid=$order->getartid();
			$verkOrdDatum=$order->getverkOrdDatum();
			$verOrdBestAantal=$order->getverOrdBestAantal();
            $verkOrdstatus=$order->getverkOrdstatus();
		
            
            
		?>
		
		<form class="contact-form" action="updateorderFormulier3.php" method="post">
			<!-- $klant mag niet meer gewijzigd worden -->
            <?php echo $orderid ?>
            <input type="hidden"  class="contact-form-text" name="verkOrdidvak" value="<?php echo $orderid; ?> ">
            <input type="text"    class="contact-form-text" name="klantidvak"      value="<?php echo $klantid;      ?> ">
            <input type="text"    class="contact-form-text" name="artidvak" value="<?php echo $artid; ?> ">
			<input type="text"    class="contact-form-text" name="verkOrdDatumvak" value="<?php echo $verkOrdDatum; ?> ">
            <input type="text"    class="contact-form-text" name="verOrdBestAantalvak"  value="<?php echo $verOrdBestAantal;  ?> ">
            <input type="text"    class="contact-form-text" name="verkOrdstatusvak"  value="<?php echo $verkOrdstatus;  ?> ">
			<input type="submit"  class="contatct-form-btn" value="Verstuur"><br/><br/>
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
  background-color: red;
  color: white;
  text-align: center;
}
</style>

<div class="footer">
  <p>Bel nu gratis naar  0800.11.11.216 </p>
</div>