<?php 
	try {
			$server = "localhost";
			$login = "root";
			$pass = "";
			$connection = new PDO("mysql:host=$server;dbname=Qdb", $login, $pass);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			/*PREPARATION & EXECUTION DE LA REQUETE*/
				$requete = $connection -> prepare(
					"INSERT INTO PhotoClient(PhotoID, Photo_Nom, src)
					VALUES (:id_Clt, :nom, :source)"
				);
				// liaisions des marqueur à nos variables
				$requete -> bindParam(':id_Clt', $id_Clt);
				$requete -> bindParam(':nom', $nom);
				$requete -> bindParam(':source', $src);

				$id_Clt = $_POST['Id'];
				$nom = $_POST['nom'];
				$src = $_POST['src'];

				echo "image enregistré !";
				
		} catch (Exception $e) {
		echo "Error".$e->getmessage();
	}
 ?>