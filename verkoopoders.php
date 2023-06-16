<?php
	
	// Emircan/Lemar
	class verkooporders
	{
		// properties - eigenschappen --------------------
		protected string $consoleprijs;
		protected string $consoletype;
		
	
		// methoden - functies ----------------------------
		// constructor
		function __construct($consoleprijs=NULL, $consoletype=NULL)
		{
			$this->consoleprijs=$consoleprijs;
			$this->consoletype=$consoletype;
		}

		// setters
		public function setconsoleprijs($consoleprijs)
		{
			$this->consoleprijs=$consoleprijs;
		}
		public function setconsoletype($consoletype)
		{
			$this->consoletype=$consoletype;
		}
		
		
		
		// getters
		public function getconsoleprijs()
		{
			return $this->consoleprijs;
		}
	    public function getconsoletype()
		{
			return $this->consoletype;
		}
		
		
	}	
?>