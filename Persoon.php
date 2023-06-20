<?php
	// Persoon.php
	// lemar
	class Persoon
	{
		// properties - eigenschappen --------------------
		protected string $levnaam;
		protected string $levcontact;
		protected string $levemail;

		
		
		// methoden - functies ----------------------------
		// constructor
		function __construct($levnaam=NULL, $levcontact=NULL)
		{
			$this->levnaam=$levnaam;
			$this->levcontact=$levcontact;
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
		
	}	
?>