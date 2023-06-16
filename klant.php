<?php
		// lemar

	require "Persoon.php";
	class klant extends Persoon
	{
		// properties - eigenschappen -------------------
		protected string $naam;
		protected string $email;
		protected string $adres;
		protected string $postcode;
		protected string $woonplaats;
		
		// methoden - functies -------------------
		// constructor
		function __construct($naam="", $email="", $adres="", $postcode="", $woonplaats="")
		{
			$this->naam=$naam;
			$this->email=$email;
			$this->adres=$adres;
			$this->postcode=$postcode;
			$this->woonplaats=$woonplaats;
		}

		// setters
		public function setnaam($naam)
		{
			$this->naam=$naam;
		}
		public function setemail($email)
		{
			$this->email=$email;
		}
		public function setadres($adres)
		{
			$this->adres=$adres;
		}
		public function setpostcode($postcode=NULL)
		{
			$this->postcode=$postcode;
		}
		public function setwoonplaats($woonplaats=NULL)
		{
			$this->woonplaats=$woonplaats;
		}

		// getters
		public function getnaam()
		{
			return $this->naam;
		}
		public function getemail()
		{
			return $this->email;
		}	

		public function getadres()
		{
			return $this->adres;
		}	

		public function getpostcode()
		{
			return $this->postcode;
		}	

		public function getwoonplaats()
		{
			return $this->woonplaats;
		}	
			public function afdrukken()
		{

			// afdrukken object -------------------
			echo $this->getNaam();
			echo "<br/>";
			echo $this->getEmail();
			echo "<br/>";
			echo $this->getadres();
			echo "<br/>";
			echo $this->getpostcode();
			echo "<br/>";
			echo $this->getwoonplaats();
			echo "<br/>";
			
			echo "<br/><br/>";
		}

        // CRUD Functies -------------------
        public function createklant(){
			echo "Create yes yes <br>";
			require "connectSchool.php";

			// gegevens naar variabelen
			$consoleid = NULL;
			$naam = $this->getNaam();
			$email = $this->getEmail();
			$adres = $this->getadres();
			$postcode = $this->getpostcode();
			$woonplaats = $this->getwoonplaats();

			// sql
			$sql = $conn->prepare("
			insert into klanten values 
				(:consoleid, :naam, :email, :adres, :postcode, :woonplaats);
			");

			// variabelen in de statement
			$sql->bindParam(":consoleid", $consoleid);
			$sql->bindParam(":naam", $naam);
			$sql->bindParam(":email", $email);
			$sql->bindParam(":adres", $adres);
			$sql->bindParam(":postcode", $postcode);
			$sql->bindParam(":woonplaats", $woonplaats);
			$sql->execute();
			echo "Toegevoegd aan de database <br>";

		}
        public function readklant()
		{
			require "connectSchool.php";
			// statement maken
			$sql = $conn->prepare("
									select *
									from klanten where 1  
								 ");
			$sql->execute();
			foreach($sql as $klant)
			{
				// gegevens uit de array in het object stoppen
				// en gelijk afdrukken
				echo $klant["consoleid"]. " - ";		// geen eigenschap van object
				echo $this->naam=$klant["naam"]. " - ";
				echo $this->adres=$klant["adres"]. " - ";
				echo $this->email=$klant["email"]. " - ";
				echo $this->postcode=$klant["postcode"]. " - ";
				echo $this->woonplaats=$klant["woonplaats"]. "<br/><br>"; 
				
			}
		}
        public function updateklant($consoleid)
		{
			require "Connectschool.php";
			// gegevens uit het object in variabelen zetten 
			$consoleid;
			$naam 		= $this->getnaam();
			$email 		= $this->getemail();
			$adres 		= $this->getadres();
			$postcode 	= $this->getpostcode();
			$woonplaats 	= $this->getwoonplaats();
			// statement maken
			$sql = $conn->prepare("
			update klanten
										set  naam=:naam, email=:email, adres=:adres, postcode=:postcode, woonplaats=:woonplaats
										where consoleid=:consoleid
								 ");
			// variabelen in de statement zetten
			$sql->bindParam(":consoleid", $consoleid);
			$sql->bindParam(":naam", $naam);
			$sql->bindParam(":email", $email);
			$sql->bindParam(":adres", $adres);
			$sql->bindParam(":postcode", $postcode);
			$sql->bindParam(":woonplaats", $woonplaats);
			$sql->execute();
		}

		
        public function deleteklant($consoleid)
		{
			require "Connectschool.php";
			// statement maken
			$sql = $conn->prepare("
									delete from klanten
									where consoleid = :consoleid
								 ");
			// variabele in de statement zetten
			$sql->bindParam(":consoleid", $consoleid);
			$sql->execute();
		}

        public function searchklant($consoleid) 
		{
			require "Connectschool.php";

			// statement maken
			$sql = $conn->prepare("
									select *
									from klanten
									where consoleid = :consoleid			
								 ");
			// variabele in de stament zetten
			$sql->bindParam(":consoleid", $consoleid);
			$sql->execute();

			// gegevens uit de array in het object stoppen
			foreach($sql as $klant)
			{			
				
				echo $this->naam=$klant["naam"];
				echo $this->adres=$klant["adres"];
				echo $this->email=$klant["email"];
				echo $this->postcode=$klant["postcode"];
				echo $this->woonplaats=$klant["woonplaats"];	
			}
		}
	}
?>