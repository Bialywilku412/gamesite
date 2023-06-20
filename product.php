<?php
// lemar
class product
{
	// properties - eigenschappen --------------------
	protected string $gamenaam;
	protected string $gameprijs;
	protected string $gameplatform;
	


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
	
	

}
?>