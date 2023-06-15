<?php
	
	require "verkoopoders.php";
	class order 
	{
		// properties - eigenschappen -------------------
		protected string $klantid;
		protected string $artid;
		protected string $verkOrdDatum;
		protected string $verOrdBestAantal;
		protected string $verkOrdstatus;

		// methoden - functies -------------------
		// constructor
		function __construct($klantid="", $artid="", $verkOrdDatum="", $verOrdBestAantal="", $verkOrdstatus="")
		{
			$this->klantid=$klantid;
			$this->artid=$artid;
			$this->verkOrdDatum=$verkOrdDatum;
			$this->verOrdBestAantal=$verOrdBestAantal;
			$this->verkOrdstatus=$verkOrdstatus;
        }

		// setters
		public function setklantid($klantid)
		{
			$this->klantid=$klantid;
		}
		public function setartid($artid)
		{
			$this->artid=$artid;
		}
		public function setverkOrdDatum($verkOrdDatum)
		{
			$this->verkOrdDatum=$verkOrdDatum;
		}
		public function setverOrdBestAantal($verOrdBestAantal)
		{
			$this->verOrdBestAantal=$verOrdBestAantal;
		}
		public function setverkOrdstatus($verkOrdstatus)
		{
			$this->verkOrdstatus=$verkOrdstatus;
		}
	
		// getters
		public function getklantid()
		{
			return $this->klantid;
		}
		public function getartid()
		{
			return $this->artid;
		}
		public function getverkOrdDatum()
		{
			return $this->verkOrdDatum;
		}
		public function getverOrdBestAantal()
		{
			return $this->verOrdBestAantal;
		}	

		public function getverkOrdstatus()
		{
			return $this->verkOrdstatus;
		}	
		
			public function afdrukken()
		{

			// afdrukken object -------------------
			echo $this->getklantid();
			echo "<br/>";
			echo $this->getartid();
			echo "<br/>";
			echo $this->getverkOrdDatum();
			echo "<br/>";
			echo $this->getverOrdBestAantal();
			echo "<br/>";
			echo $this->getverkOrdstatus();
			echo "<br/>";		
					echo "<br/><br/>";
		}

        // CRUD Functies -------------------
        public function createorder(){
			require "connectSchool.php";

			// gegevens naar variabelen
			$verkOrdid = NULL;
			$klantid = $this->getklantid();
			$artid	 = $this->getartid();
			$verkOrdDatum = $this->getverkOrdDatum();
			$verOrdBestAantal = $this->getverOrdBestAantal();
			$verkOrdstatus = $this->getverkOrdstatus();
			
			// sql
			$sql = $conn->prepare("
			insert into verkooporders values 
				(:verkOrdid, :klantid, :artid, :verkOrdDatum, :verOrdBestAantal, :verkOrdstatus);
			");

			// variabelen in de statement
			$sql->bindParam(":verkOrdid", $verkOrdid);
			$sql->bindParam(":klantid", $klantid);
			$sql->bindParam(":artid", $artid);
			$sql->bindParam(":verkOrdDatum", $verkOrdDatum);
			$sql->bindParam(":verOrdBestAantal", $verOrdBestAantal);
			$sql->bindParam(":verkOrdstatus", $verkOrdstatus);
			$sql->execute();
			echo "Toegevoegd aan de database <br>";

		}
        public function readorder()
		{
			require "connectSchool.php";
			// statement maken
			$sql = $conn->prepare("select * from verkooporders where 1");
			$sql->execute();

			foreach($sql as $order)
			{
				// gegevens uit de array in het object stoppen
				// en gelijk afdrukken
				echo "<p>";
				echo $order["verkOrdid"]. " - ";		// geen eigenschap van object
				echo $this->klantid=$order["klantid"]. " - ";
				$this->artid = $order["artid"];
				echo $this->artid. " - ";
				$this->verkOrdDatum=$order["verkOrdDatum"];
				echo $this->verkOrdDatum. " - ";
				$this->verOrdBestAantal=$order["verOrdBestAantal"];
				echo $this->verOrdBestAantal. " - ";
				$this->verkOrdstatus=$order["verkOrdstatus"];
				echo $this->verkOrdstatus. "<br/><br>"; 
				echo "</p>";
				
			}
		}
		
        public function updateorder($verkOrdid)
		{
			require "Connectschool.php";
			// gegevens uit het object in variabelen zetten 
            $verkOrdid;
			$klantid;
            $artid;             
			$verkOrdDatum 		= $this->getverkOrdDatum();
			$verOrdBestAantal 		= $this->getverOrdBestAantal();
			$verkOrdstatus 		= $this->getverkOrdstatus();
			
			// statement maken
			$sql = $conn->prepare("
			update verkooporders
										set  klantid=:klantid, artid=:artid, verkOrdDatum=:verkOrdDatum, verOrdBestAantal=:verOrdBestAantal, verkOrdstatus=:verkOrdstatus
										where verkOrdid=:verkOrdid
								 ");
			// variabelen in de statement zetten
			$sql->bindParam(":verkOrdid", $verkOrdid);
			$sql->bindParam(":klantid", $klantid);
			$sql->bindParam(":artid", $artid);
			$sql->bindParam(":verkOrdDatum", $verkOrdDatum);
			$sql->bindParam(":verOrdBestAantal", $verOrdBestAantal);
			$sql->bindParam(":verkOrdstatus", $verkOrdstatus);
			$sql->execute();
		}

		
		public function deleteorder($verkOrdid)
		{
			require "Connectschool.php";
			// statement maken
			$sql = $conn->prepare("
									delete from verkooporders
									where verkOrdid = :verkOrdid
								 ");
			// variabele in de statement zetten
			$sql->bindParam(":verkOrdid", $verkOrdid);
			$sql->execute();
		}
		public function searchorder($verkOrdid) 
		{
			require "connectSchool.php";

			// statement maken
			$sql = $conn->prepare("
									select *
									from verkooporders
									where verkOrdid = :verkOrdid			
								 ");
			// variabele in de stament zetten
			$sql->bindParam(":verkOrdid", $verkOrdid);
			$sql->execute();

			// gegevens uit de array in het object stoppen
			foreach($sql as $order)
			{			
				
				echo "<p>";
				echo $order["verkOrdid"]. " - ";		// geen eigenschap van object
				echo $this->klantid=$order["klantid"]. " - ";
				$this->artid = $order["artid"];
				echo $this->artid. " - ";
				$this->verkOrdDatum=$order["verkOrdDatum"];
				echo $this->verkOrdDatum. " - ";
				$this->verOrdBestAantal=$order["verOrdBestAantal"];
				echo $this->verOrdBestAantal. " - ";
				$this->verkOrdstatus=$order["verkOrdstatus"];
				echo $this->verkOrdstatus. "<br/><br>"; 
				echo "</p>";
			}
		}
	}
?>