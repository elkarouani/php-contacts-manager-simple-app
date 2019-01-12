<?php 
	require_once('Config.php');

	function getConnection() {
		$adresse = adresse();
		$user = user();
		$password = password();
		$databaseName = dataBaseName();

		$con = mysqli_connect($adresse, $user, $password, $databaseName);
		
		return $con;
	}

	function status($con) {
		return (mysqli_ping($con));
	}

	function all($con, $table) {
		$query = mysqli_query($con, "SELECT * FROM `".$table."` ;");
		$data = mysqli_fetch_all($query);

		return $data;
	}

	function getDataBy($con, $table, $nom) {
		$query = mysqli_query($con, "SELECT * FROM `".$table."` WHERE `nom` LIKE '".$nom."%' ;");
		$data = mysqli_fetch_all($query);

		return $data;
	}

	function update($con, $table, $data){
		$stmt = mysqli_prepare($con, "UPDATE `".$table."` SET ".
			"`nom` = '".$data['nom']."', ".
			"`prenom` = '".$data['prenom']."', ".
			"`portable` = '".$data['portable']."', ".
			"`fax` = '".$data['fax']."', ".
			"`ville` = '".$data['ville']."' WHERE `id` = ".$data['id']." ;"
		);

		$result = mysqli_stmt_execute($stmt);

		return $result;
	}

	function add($con, $table, $data) {
		$stmt = mysqli_prepare($con, "INSERT INTO `".$table."`(nom, prenom, portable, fax, ville) VALUES ('".$data['nom']."', '".$data['prenom']."', '".$data['portable']."', '".
					$data['fax']."', '".$data['ville']."') ;"
		);

		$result = mysqli_stmt_execute($stmt);

		return $result;
	}

	function delete($con, $table, $id) {
		$stmt = mysqli_prepare($con, "DELETE FROM `".$table."` WHERE `id` = ".$id." ;");

		$result = mysqli_stmt_execute($stmt);

		return $result;
	}
?>