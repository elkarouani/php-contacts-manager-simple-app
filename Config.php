<?php 	
	function adresse() {
		// Change to your adresse
		$adresse = "127.0.0.1" ;
		
		return $adresse;
	}

	function user() {
		// Change to your user's name
		$user = "root" ; 
		
		return $user;
	}

	function password() {
		// Change to your password
		$password = "" ; 
		
		return $password;
	}

	function databaseName() {
		// Change to your database's name
		$database_name = "contacts-manager-database" ;
		
		return $database_name;
	}

	function pages($size) {
		$opt1 = intdiv($size,3)+1;
		$opt2 = $size / 3;
		
		$pages = (is_float($opt2))? $opt1 : $opt2;

		return $pages;
	}

	function refill($paginate, $contacts) {
		$index = (($paginate) + ($paginate - 3));

		$array = $contacts;
		$contacts = [];

		$contacts[0] = $array[$index + $paginate];
		if(isset($array[$index + $paginate + 1])){$contacts[1] = $array[$index + $paginate + 1];}
		if(isset($array[$index + $paginate + 2])){$contacts[2] = $array[$index + $paginate + 2];}

		return $contacts;
	}
?>