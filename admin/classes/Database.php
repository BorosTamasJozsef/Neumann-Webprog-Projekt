<?php

/**
 * 
 */
class Database
{
	
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "root", "", "bluegaming");
		return $this->con;
	}
}

?>