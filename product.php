<?php
// lemar
class product
{
	// properties - eigenschappen --------------------
	protected string $gamenaam;
	protected string $gameprijs;
	protected string $gameplatform;
	protected string $artvoorraad;
	protected string $artminvoorraad;
	protected string $artmaxvoorraad;
	protected string $artLocatie;


	// methoden - functies ----------------------------
	// constructor
	function __construct($gameprijs = NULL, $gameplatform = NULL)
	{
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
	public function setartvoorraad($artvoorraad)
	{
		$this->artvoorraad = $artvoorraad;
	}
	public function setartminvoorraad($artminvoorraad)
	{
		$this->artminvoorraad = $artminvoorraad;
	}
	public function setartmaxvoorraad($artmaxvoorraad)
	{
		$this->artmaxvoorraad = $artmaxvoorraad;
	}
	public function setartLocatie($artLocatie)
	{
		$this->artLocatie = $artLocatie;
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

}
?>