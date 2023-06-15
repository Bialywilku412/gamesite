<!--lemar-->
<?php	
	require "product.php";
	class artikel
	{
		// properties - eigenschappen -------------------
		protected string $artOmschrijving;
		protected float $artinkoop;
		protected float $artverkoop;
		protected int $artvoorraad;
		protected int $artminvoorraad;
        protected int $artmaxvoorraad;
        protected int $artLocatie;
		
		// methoden - functies -------------------
		// constructor
		function __construct($artOmschrijving="", $artinkoop=0, $artverkoop=0, $artvoorraad=0,$artminvoorraad=0,$artmaxvoorraad=0,  $artLocatie=0)
		{
			$this->artOmschrijving=$artOmschrijving;
			$this->artinkoop=$artinkoop;
			$this->artverkoop=$artverkoop;
			$this->artvoorraad=$artvoorraad;
			$this->artminvoorraad=$artminvoorraad;
            $this->artmaxvoorraad=$artmaxvoorraad;
            $this->artLocatie=$artLocatie;
		}

		// setters
		public function setartOmschrijving($artOmschrijving)
		{
			$this->artOmschrijving=$artOmschrijving;
		}
		public function setartinkoop($artinkoop)
		{
			$this->artinkoop=$artinkoop;
		}
		public function setartverkoop($artverkoop)
		{
			$this->artverkoop=$artverkoop;
		}
		public function setartvoorraad($artvoorraad)
		{
			$this->artvoorraad=$artvoorraad;
		}
		public function setartminvoorraad($artminvoorraad)
		{
			$this->artminvoorraad=$artminvoorraad;
		}
        public function setartmaxvoorraad($artmaxvoorraad)
		{
			$this->artmaxvoorraad=$artmaxvoorraad;
		}
        public function setartLocatie($artLocatie)
		{
			$this->artLocatie=$artLocatie;
		}

		// getters
		public function getartOmschrijving()
		{
			return $this->artOmschrijving;
		}
		public function getartinkoop()
		{
			return $this->artinkoop;
		}	

		public function getartverkoop()
		{
			return $this->artverkoop;
		}	

		public function getartvoorraad()
		{
			return $this->artvoorraad;
		}	

		public function getartminvoorraad()
		{
			return $this->artminvoorraad;
		}	
        public function getartmaxvoorraad()
		{
			return $this->artmaxvoorraad;
		}
        public function getartLocatie()
		{
			return $this->artLocatie;
		}	
		public function afdrukken()
		{

			// afdrukken object -------------------
			echo $this->getartOmschrijving();
			echo "<br/>";
			echo $this->getartinkoop();
			echo "<br/>";
			echo $this->getartverkoop();
			echo "<br/>";
			echo $this->getartvoorraad();
			echo "<br/>";
			echo $this->getartminvoorraad();
			echo "<br/>";
            echo $this->getartmaxvoorraad();
			echo "<br/>";
            echo $this->getartLocatie();
			echo "<br/>";
			
			echo "<br/><br/>";
		}

        // CRUD Functies -------------------
        public function createartikel(){
			require "connectSchool.php";

			// gegevens naar variabelen
			$artid = NULL;
			$artOmschrijving = $this->getartOmschrijving();
			$artinkoop = $this->getartinkoop();
			$artverkoop = $this->getartverkoop();
			$artvoorraad = $this->getartvoorraad();
			$artminvoorraad = $this->getartminvoorraad();
            $artmaxvoorraad = $this->getartmaxvoorraad();
            $artLocatie = $this->getartLocatie();

			// sql
			$sql = $conn->prepare("
			insert into artikelen values 
				( :artid, :artOmschrijving, :artinkoop, :artverkoop, :artvoorraad, :artminvoorraad, :artmaxvoorraad, :artLocatie);
			");
			

			// variabelen in de statement
			$sql->bindParam(":artid", $artid);
			$sql->bindParam(":artOmschrijving", $artOmschrijving);
			$sql->bindParam(":artinkoop", $artinkoop);
			$sql->bindParam(":artverkoop", $artverkoop);
			$sql->bindParam(":artvoorraad", $artvoorraad);
			$sql->bindParam(":artminvoorraad", $artminvoorraad);
            $sql->bindParam(":artmaxvoorraad", $artmaxvoorraad);
            $sql->bindParam(":artLocatie", $artLocatie);
			$sql->execute();
			echo "Toegevoegd aan de database <br>";
		}
        public function readartikel()
		{
			require "connectSchool.php";
			// statement maken
			$sql = $conn->prepare("select * from artikelen where 1");
			$sql->execute();

			foreach($sql as $artikel)
			{
				// gegevens uit de array in het object stoppen
				// en gelijk afdrukken
				echo "<p>";
				echo $artikel["artid"]. " - ";		// geen eigenschap van object
				echo $this->artOmschrijving=$artikel["artOmschrijving"]. " - ";
				$this->artinkoop = $artikel["artInkoop"];
				echo $this->artinkoop. " - ";
				$this->artverkoop=$artikel["artVerkoop"];
				echo $this->artverkoop. " - ";
				$this->artvoorraad=$artikel["artVoorraad"];
				echo $this->artvoorraad. " - ";
				$this->artminvoorraad=$artikel["artMinVoorraad"];
				echo $this->artminvoorraad. "<br/><br>"; 
				$this->artmaxvoorraad=$artikel["artMaxVoorraad"];
				echo $this->artmaxvoorraad. " - ";
				$this->artLocatie=$artikel["artLocatie"];
				echo $this->artLocatie. "<br/><br>"; 
				echo "</p>";
				
			}
		}
        public function updateartikel($artid)
		{
			require "Connectschool.php";
			// gegevens uit het object in variabelen zetten 
			$artid;
			$artOmschrijving 		= $this->getartOmschrijving();
			$artinkoop 		= $this->getartinkoop();
			$artverkoop 		= $this->getartverkoop();
			$artvoorraad 	= $this->getartvoorraad();
			$artminvoorraad 	= $this->getartminvoorraad();
            $artmaxvoorraad 	= $this->getartmaxvoorraad();
			$artLocatie 	= $this->getartLocatie();
			// statement maken
			$sql = $conn->prepare("
			update artikelen
						set artOmschrijving=:artOmschrijving, artinkoop=:artinkoop, artverkoop=:artverkoop, artvoorraad=:artvoorraad, artminvoorraad=:artminvoorraad, artmaxvoorraad=:artmaxvoorraad, artLocatie=:artLocatie
						where artid=:artid
								 ");
			// variabelen in de statement zetten
			$sql->bindParam(":artid", $artid);
			$sql->bindParam(":artOmschrijving", $artOmschrijving);
			$sql->bindParam(":artinkoop", $artinkoop);
			$sql->bindParam(":artverkoop", $artverkoop);
			$sql->bindParam(":artvoorraad", $artvoorraad);
			$sql->bindParam(":artminvoorraad", $artminvoorraad);
            $sql->bindParam(":artmaxvoorraad", $artmaxvoorraad);
            $sql->bindParam(":artLocatie", $artLocatie);
			$sql->execute();
		}

		
        public function deleteartikel($artid)
		{
			require "Connectschool.php";
			// statement maken
			$sql = $conn->prepare("
									delete from artikelen
									where artid = :artid
								 ");
			// variabele in de statement zetten
			$sql->bindParam(":artid", $artid);
			$sql->execute();
		}

        public function searchartikel($artid) 
		{
			require "connectSchool.php";

			// statement maken
			$sql = $conn->prepare("
									select *
									from artikelen
									where artid = :artid			
								 ");
			// variabele in de stament zetten
			$sql->bindParam(":artid", $artid);
			$sql->execute();

			// gegevens uit de array in het object stoppen
			foreach($sql as $artikel)
			{			
				
				echo "<p>";
				echo $artikel["artid"]. " - ";		// geen eigenschap van object
				echo $this->artOmschrijving=$artikel["artOmschrijving"]. " - ";
				$this->artinkoop = $artikel["artInkoop"];
				echo $this->artinkoop. " - ";
				$this->artverkoop=$artikel["artVerkoop"];
				echo $this->artverkoop. " - ";
				$this->artvoorraad=$artikel["artVoorraad"];
				echo $this->artvoorraad. " - ";
				$this->artminvoorraad=$artikel["artMinVoorraad"];
				echo $this->artminvoorraad. "<br/><br>"; 
				$this->artmaxvoorraad=$artikel["artMaxVoorraad"];
				echo $this->artmaxvoorraad. " - ";
				$this->artLocatie=$artikel["artLocatie"];
				echo $this->artLocatie. "<br/><br>"; 
				echo "</p>";
			}
		}
	}
?>