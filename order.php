<?php
	
	require "verkoopoders.php";
	class order 
	{
		// properties - eigenschappen -------------------
		
		protected string $consolenaam;
		protected string $consoleprijs;
		protected string $consoletype;
		

		// methoden - functies -------------------
		// constructor
		function __construct($consolenaam="", $consoleprijs="", $consoletype="")
		{

			$this->consolenaam=$consolenaam;
			$this->consoleprijs=$consoleprijs;
			$this->consoletype=$consoletype;
			
        }

		// setters
	
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
			$sql = $conn->prepare("select * from console where 1");
			$sql->execute();

			foreach($sql as $order)
			{
				// gegevens uit de array in het object stoppen
				// en gelijk afdrukken
				echo "<p>";
				echo $order["consoleid"]. " - ";		// geen eigenschap van object
				$this->consolenaam = $order["consolenaam"];
				echo $this->consolenaam. " - ";
				$this->consoleprijs=$order["consoleprijs"];
				echo $this->consoleprijs. " - ";
				$this->consoletype=$order["consoletype"];
				echo $this->consoletype. " - ";
				 
				echo "</p>";
				
			}
		}
		
		public function updateorder($consoleid)
		{
			require "connectSchool.php";
			// gegevens uit het object in variabelen zetten 
	
			$consolenaam = $this->getconsolenaam();
			$consoleprijs = $this->getconsoleprijs();
			$consoletype = $this->getconsoletype();
	
			// statement maken
			$sql = $conn->prepare("
				update console	
							set consolenaam=:consolenaam, consoleprijs=:consoleprijs, consoletype=:consoletype
							where consoleid=:consoleid
									 ");
			// variabelen in de statement zetten
	
			$sql->bindParam(":consolenaam", $consolenaam);
			$sql->bindParam(":consoleprijs", $consoleprijs);
			$sql->bindParam(":consoletype", $consoletype);
			$sql->bindParam(":consoleid", $consoleid);
	
	
			$sql->execute();
		}
		
		public function deleteorder($consoleid)
		{
			require "Connectschool.php";
			// statement maken
			$sql = $conn->prepare("
									delete from console
									where consoleid = :consoleid
								 ");
			// variabele in de statement zetten
			$sql->bindParam(":consoleid", $consoleid);
			$sql->execute();
		}
		public function searchorder($consoleid) 
		{
			require "connectSchool.php";

			// statement maken
			$sql = $conn->prepare("
									select *
									from console
									where consoleid = :consoleid			
								 ");
			// variabele in de stament zetten
			$sql->bindParam(":consoleid", $consoleid);
			$sql->execute();

			// gegevens uit de array in het object stoppen
			foreach($sql as $order)
			{			
				
				echo "<p>";
				echo $order["consoleid"]. " - ";		// geen eigenschap van object
				$this->consolenaam = $order["consolenaam"];
				echo $this->consolenaam. " - ";
				$this->consoleprijs=$order["consoleprijs"];
				echo $this->consoleprijs. " - ";
				$this->consoletype=$order["consoletype"];
				echo $this->consoletype. " - ";
				echo "</p>";
			}
		}
	}
?>