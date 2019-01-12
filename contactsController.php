<?php  
	require_once('Database.php');

	function allContacts() {
		$con = getConnection();
		$index = 0;
		$datas = all($con, 'contacts');
		$contacts = [];

		foreach ($datas as $data) {
			$id = $data[0];
			$nom = $data[1];
			$prenom = $data[2];
			$portable = $data[3];
			$fax = $data[4];
			$ville = $data[5];

			$contacts[$index] = [
				'id' => $id,
				'nom' => $nom,
				'prenom' => $prenom,
				'portable' => $portable,
				'fax' => $fax,
				'ville' => $ville
			];

			$index++;
		}

		return $contacts;
	}

?>