<?php
	
	// Emircan/Lemar
	class verkooporders
	{
		// properties - eigenschappen --------------------
		protected string $verkOrdDatum;
		protected string $verOrdBestAantal;
		protected string $verkOrdstatus;
	
		// methoden - functies ----------------------------
		// constructor
		function __construct($verkOrdDatum=NULL, $verOrdBestAantal=NULL)
		{
			$this->verkOrdDatum=$verkOrdDatum;
			$this->verOrdBestAantal=$verOrdBestAantal;
		}

		// setters
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
		
	}	
?>