<?php
	
	require "verkoopoders.php";
	class order 
	{
		// properties - eigenschappen -------------------
		protected string $consoleid;
		protected string $consolenaam;
		protected string $consoleprijs;
		protected string $consoletype;
		

		// methoden - functies -------------------
		// constructor
		function __construct($consoleid="", $consolenaam="", $consoleprijs="", $consoletype="")
		{
			$this->consoleid=$consoleid;
			$this->consolenaam=$consolenaam;
			$this->consoleprijs=$consoleprijs;
			$this->consoletype=$consoletype;
			
        }

		// setters
		public function setconsoleid($consoleid)
		{
			$this->consoleid=$consoleid;
		}
		public function setconsolenaam($consolenaam)
		{
			$this->consolenaam=$consolenaam;
		}
		public function setconsoleprijs($consoleprijs)
		{
			$this->consoleprijs=$consoleprijs;
		}
		public function setconsoletype($consoletype)
		{
			$this->consoletype=$consoletype;
		}
		
	
		// getters
		public function getconsoleid()
		{
			return $this->consoleid;
		}
		public function getconsolenaam()
		{
			return $this->consolenaam;
		}
		public function getconsoleprijs()
		{
			return $this->consoleprijs;
		}
		public function getconsoletype()
		{
			return $this->consoletype;
		}	
		
			public function afdrukken()
		{

			// afdrukken object -------------------
			echo $this->getconsoleid();
			echo "<br/>";
			echo $this->getconsolenaam();
			echo "<br/>";
			echo $this->getconsoleprijs();
			echo "<br/>";
			echo $this->getconsoletype();
			echo "<br/>";
					echo "<br/><br/>";
		}

        // CRUD Functies -------------------
        public function createorder(){
			require "connectSchool.php";

			// gegevens naar variabele
			$consoleid = $this->getconsoleid();
			$consolenaam	 = $this->getconsolenaam();
			$consoleprijs = $this->getconsoleprijs();
			$consoletype = $this->getconsoletype();
			
			
			// sql
			$sql = $conn->prepare("
			insert into console values 
				( :consoleid, :consolenaam, :consoleprijs, :consoletype);
			");

			// variabelen in de statement
			$sql->bindParam(":consoleid", $consoleid);
			$sql->bindParam(":consolenaam", $consolenaam);
			$sql->bindParam(":consoleprijs", $consoleprijs);
			$sql->bindParam(":consoletype", $consoletype);
			
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
				echo $this->consoleid=$order["consoleid"]. " - ";
				$this->consolenaam = $order["consolenaam"];
				echo $this->consolenaam. " - ";
				$this->consoleprijs=$order["consoleprijs"];
				echo $this->consoleprijs. " - ";
				$this->consoletype=$order["consoletype"];
				echo $this->consoletype. " - ";
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
			$consoleid;
            $consolenaam;             
			$consoleprijs 		= $this->getconsoleprijs();
			$consoletype 		= $this->getconsoletype();
			$verkOrdstatus 		= $this->getverkOrdstatus();
			
			// statement maken
			$sql = $conn->prepare("
			update verkooporders
										set  consoleid=:consoleid, consolenaam=:consolenaam, consoleprijs=:consoleprijs, consoletype=:consoletype, verkOrdstatus=:verkOrdstatus
										where verkOrdid=:verkOrdid
								 ");
			// variabelen in de statement zetten
			$sql->bindParam(":verkOrdid", $verkOrdid);
			$sql->bindParam(":consoleid", $consoleid);
			$sql->bindParam(":consolenaam", $consolenaam);
			$sql->bindParam(":consoleprijs", $consoleprijs);
			$sql->bindParam(":consoletype", $consoletype);
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
				echo $this->consoleid=$order["consoleid"]. " - ";
				$this->consolenaam = $order["consolenaam"];
				echo $this->consolenaam. " - ";
				$this->consoleprijs=$order["consoleprijs"];
				echo $this->consoleprijs. " - ";
				$this->consoletype=$order["consoletype"];
				echo $this->consoletype. " - ";
				$this->verkOrdstatus=$order["verkOrdstatus"];
				echo $this->verkOrdstatus. "<br/><br>"; 
				echo "</p>";
			}
		}
	}
?>