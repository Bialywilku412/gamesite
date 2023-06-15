<?php
	// Persoon.php
	// lemar
	class Persoon
	{
		// properties - eigenschappen --------------------
		protected string $naam;
		protected string $email;
		protected string $adres;
		protected string $postcode;
		protected string $woonplaats;
		
		
		// methoden - functies ----------------------------
		// constructor
		function __construct($naam=NULL, $email=NULL)
		{
			$this->naam=$naam;
			$this->email=$email;
		}

		// setters
		public function setNaam($naam)
		{
			$this->naam=$naam;
		}
		public function setEmail($email)
		{
			$this->email=$email;
		}
		public function setadres($adres)
		{
			$this->adres=$adres;
		}
		public function setpostcode($postcode)
		{
			$this->postcode=$postcode;
		}
		public function setwoonplaats($woonplaats)
		{
			$this->woonplaats=$woonplaats;
		}
		
		// getters
		public function getNaam()
		{
			return $this->naam;
		}
	    public function getEmail()
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
			return $this->email;
		}
	}	
?>