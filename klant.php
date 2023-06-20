<?php
		// lemar

	require "Persoon.php";
	class klant extends Persoon
	{
		// properties - eigenschappen -------------------
		protected string $levnaam;
		protected string $levcontact;
		protected string $levemail;
	
	
		// methoden - functies -------------------
		// constructor
		function __construct($levnaam="", $levcontact="", $levemail="")
		{
			$this->levnaam=$levnaam;
			$this->levcontact=$levcontact;
			$this->levemail=$levemail;
		
		}
		// setters
		public function setlevnaam($levnaam)
		{
			$this->levnaam=$levnaam;
		}
		public function setlevcontact($levcontact)
		{
			$this->levcontact=$levcontact;
		}
		public function setlevemail($levemail)
		{
			$this->levemail=$levemail;
		}

		// getters
		public function getlevnaam()
		{
			return $this->levnaam;
		}
		public function getlevcontact()
		{
			return $this->levcontact;
		}	

		public function getlevemail()
		{
			return $this->levemail;
		}	

		
			public function afdrukken()
		{

			// afdrukken object -------------------
			echo $this->getlevnaam();
			echo "<br/>";
			echo $this->getlevcontact();
			echo "<br/>";
			echo $this->getlevemail();
			echo "<br/>";
			
			
			echo "<br/><br/>";
		}

        // CRUD Functies -------------------
        public function createklant(){
			echo "Create yes yes <br>";
			require "connectSchool.php";

			// gegevens naar variabelen
			$levid = NULL;
			$levnaam = $this->getlevnaam();
			$levcontact = $this->getlevcontact();
			$levemail = $this->getlevemail();
		

			// sql
			$sql = $conn->prepare("
			insert into leveranciers values 
				(:levid, :levnaam, :levcontact, :levemail);
			");

			// variabelen in de statement
			$sql->bindParam(":levid", $levid);
			$sql->bindParam(":levnaam", $levnaam);
			$sql->bindParam(":levcontact", $levcontact);
			$sql->bindParam(":levemail", $levemail);
			$sql->execute();
			echo "Toegevoegd aan de database <br>";

		}
        public function readklant()
		{
			require "connectSchool.php";
			// statement maken
			$sql = $conn->prepare("
									select *
									from leveranciers where 1  
								 ");
			$sql->execute();
			foreach($sql as $klant)
			{
				// gegevens uit de array in het object stoppen
				// en gelijk afdrukken
				echo $klant["levid"]. " - ";		// geen eigenschap van object
				echo $this->levnaam=$klant["levnaam"]. " - ";
				echo $this->levcontact=$klant["levcontact"]. " - ";
				echo $this->levemail=$klant["levemail"]. " - ";
				
				
			}
		}
        public function updateklant($levid)
{
    require_once "Connectschool.php";

    // Retrieve data from the object's properties
    $levnaam = $this->getLevNaam();
    $levcontact = $this->getLevContact();
    $levemail = $this->getLevEmail();

    // Create the SQL statement
    $sql = $conn->prepare("
        UPDATE leveranciers
        SET levnaam = :levnaam, levcontact = :levcontact, levemail = :levemail
        WHERE levid = :levid
    ");

    // Bind the variables to the statement parameters
    $sql->bindParam(":levnaam", $levnaam);
    $sql->bindParam(":levcontact", $levcontact);
    $sql->bindParam(":levemail", $levemail);
    $sql->bindParam(":levid", $levid);

    $sql->execute();
}

		
        public function deleteklant($levid)
		{
			require "Connectschool.php";
			// statement maken
			$sql = $conn->prepare("
									delete from leveranciers
									where levid = :levid
								 ");
			// variabele in de statement zetten
			$sql->bindParam(":levid", $levid);
			$sql->execute();
		}

        public function searchklant($levid) 
		{
			require "Connectschool.php";

			// statement maken
			$sql = $conn->prepare("
									select *
									from leveranciers
									where levid = :levid			
								 ");
			// variabele in de stament zetten
			$sql->bindParam(":levid", $levid);
			$sql->execute();

			// gegevens uit de array in het object stoppen
			foreach($sql as $klant)
			{			
				
				echo $this->levnaam=$klant["levnaam"];
				echo $this->levcontact=$klant["levcontact"];
				echo $this->levemail=$klant["levemail"];
				
			}
		}
	}
?>