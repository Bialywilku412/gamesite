<!--lemar-->
<?php
require "product.php";
class artikel
{
	// properties - eigenschappen -------------------
	protected string $gamenaam;
	protected float $gameprijs;
	protected float $gameplatform;


	// methoden - functies -------------------
	// constructor
	function __construct($gamenaam = "", $gameprijs = 0, $gameplatform = 0, )
	{
		$this->gamenaam = $gamenaam;
		$this->gameprijs = $gameprijs;
		$this->gameplatform = $gameplatform;

	}

	// setters
	public function setgamenaam($gamenaam)
	{
		$this->gamenaam = $gamenaam;
	}
	public function setgameprijs($gameprijs)
	{
		$this->gameprijs = $gameprijs;
	}
	public function setgameplatform($gameplatform)
	{
		$this->gameplatform = $gameplatform;
	}


	// getters
	public function getgamenaam()
	{
		return $this->gamenaam;
	}
	public function getgameprijs()
	{
		return $this->gameprijs;
	}

	public function getgameplatform()
	{
		return $this->gameplatform;
	}


	public function afdrukken()
	{

		// afdrukken object -------------------
		echo $this->getgamenaam();
		echo "<br/>";
		echo $this->getgameprijs();
		echo "<br/>";
		echo $this->getgameplatform();
		echo "<br/>";


		echo "<br/><br/>";
	}

	// CRUD Functies -------------------
	public function createartikel()
	{
		require "connectSchool.php";

		// gegevens naar variabelen
		$gameid = NULL;
		$gamenaam = $this->getgamenaam();
		$gameprijs = $this->getgameprijs();
		$gameplatform = $this->getgameplatform();


		// sql
		$sql = $conn->prepare("
			insert into games values 
				( :gameid, :gamenaam, :gameprijs, :gameplatform);
			");


		// variabelen in de statement
		$sql->bindParam(":gameid", $gameid);
		$sql->bindParam(":gamenaam", $gamenaam);
		$sql->bindParam(":gameprijs", $gameprijs);
		$sql->bindParam(":gameplatform", $gameplatform);

		$sql->execute();
		echo "Toegevoegd aan de database <br>";
	}
	public function readartikel()
	{
		require "connectSchool.php";
		// statement maken
		$sql = $conn->prepare("select * from games where 1");
		$sql->execute();

		foreach ($sql as $artikel)
		{
			// gegevens uit de array in het object stoppen
			// en gelijk afdrukken
			echo "<p>";
			echo $artikel["gameid"] . " - "; // geen eigenschap van object
			echo $this->gamenaam = $artikel["gamenaam"] . " - ";
			$this->gameprijs = $artikel["gameprijs"];
			echo $this->gameprijs . " - ";
			$this->gameplatform = $artikel["gameplatform"];
			echo $this->gameplatform . " - ";

			echo "</p>";

		}
	}
	public function updateartikel($gameid)
	{
		require "connectSchool.php";
		// gegevens uit het object in variabelen zetten 

		$gamenaam = $this->getgamenaam();
		$gameprijs = $this->getgameprijs();
		$gameplatform = $this->getgameplatform();

		// statement maken
		$sql = $conn->prepare("
			update games
						set gamenaam=:gamenaam, gameprijs=:gameprijs, gameplatform=:gameplatform
						where gameid=:gameid
								 ");
		// variabelen in de statement zetten

		$sql->bindParam(":gamenaam", $gamenaam);
		$sql->bindParam(":gameprijs", $gameprijs);
		$sql->bindParam(":gameplatform", $gameplatform);
		$sql->bindParam(":gameid", $gameid);


		$sql->execute();
	}


	public function deleteartikel($gameid)
	{
		require "connectSchool.php";

		// Prepare the SQL statement
		$sql = $conn->prepare("
        DELETE FROM games
        WHERE gameid = :gameid
    ");

		// Bind the parameter to the statement
		$sql->bindParam(":gameid", $gameid);

		// Execute the statement
		$sql->execute();
	}

	public function searchartikel($gameid)
	{
		require "connectSchool.php";

		// statement maken
		$sql = $conn->prepare("
									select *
									from games
									where gameid = :gameid		
								 ");
		// variabele in de stament zetten
		$sql->bindParam(":gameid", $gameid);
		$sql->execute();

		// gegevens uit de array in het object stoppen
		foreach ($sql as $games)
		{

			echo "<p>";
			echo $games["gameid"] . " - "; // geen eigenschap van object
			echo $this->gamenaam = $games["gamenaam"] . " - ";
			$this->gameprijs = $games["gameprijs"];
			echo $this->gameprijs . " - ";
			$this->gameplatform = $games["gameplatform"];
			echo $this->gameplatform . " - ";
			echo "</p>";
		}
	}
}
?>