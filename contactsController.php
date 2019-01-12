<?php  
	require_once('Database.php');

	if (isset($_POST)) {
		if(isset($_POST['add'])){addEvent($_POST);}
		if(isset($_POST['modify'])){modifyEvent($_POST);}
		if(isset($_POST['delete'])){deleteEvent($_POST['id']);}
	}

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

	function modifyEvent($post){
		$con = getConnection();
		update($con, 'contacts', $data);
		header('location: index.php');
	}

	function addEvent($post) {
		$con = getConnection();
		add($con, 'contacts', $post);
		header('location: index.php');
	}

	function deleteEvent($id) {
		$con = getConnection();
		delete($con, 'contacts', $id);
		header('location: index.php');
	}
?>