<?php
	// lemar
	class product
	{
		// properties - eigenschappen --------------------
		protected string $artOmschrijving;
		protected string $artinkoop;
		protected string $artverkoop;
		protected string $artvoorraad;
		protected string $artminvoorraad;
		protected string $artmaxvoorraad;
		protected string $artLocatie;
		
		
		// methoden - functies ----------------------------
		// constructor
		function __construct($artinkoop=NULL, $artverkoop=NULL)
		{
			$this->artinkoop=$artinkoop;
			$this->artverkoop=$artverkoop;
		}

		// setters
        public function setartOmschrijving($artOmschrijving)
		{
			$this->artOmschrijving=$artOmschrijving;
		}
		public function setartinkoop($artinkoop)
		{
			$this->artinkoop=$artinkoop;
		}
		public function setartverkoop($artverkoop)
		{
			$this->artverkoop=$artverkoop;
		}
		public function setartvoorraad($artvoorraad)
		{
			$this->artvoorraad=$artvoorraad;
		}
		public function setartminvoorraad($artminvoorraad)
		{
			$this->artminvoorraad=$artminvoorraad;
		}
		public function setartmaxvoorraad($artmaxvoorraad)
		{
			$this->artmaxvoorraad=$artmaxvoorraad;
		}
        public function setartLocatie($artLocatie)
		{
			$this->artLocatie=$artLocatie;
        }
		
		// getters
		public function getartOmschrijving()
		{
			return $this->artOmschrijving;
		}
	    public function getartinkoop()
		{
			return $this->artinkoop;
		}
		public function getartverkoop()
		{
			return $this->artverkoop;
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