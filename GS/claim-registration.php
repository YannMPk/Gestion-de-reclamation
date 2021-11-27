<?php 
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	} else {header('location:login.php');}
?>

<?php 
	if (isset($_POST)) {
		$Nab = $_POST["Nab"];
		
		$Nline = $_POST["Nline"];

		$Nab = htmlentities($_POST['Det']);

		include_once('functions.php');
		if (is_connected()) {
			$idClt = $_SESSION["idClt"];

			try {
				$server = "localhost";
				$login = "root";
				$pass = "";
				$connection = new PDO("mysql:host=$server;dbname=Qdb", $login, $pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$ID = array_unique(cust_subscription($idClt));

				foreach ($ID as $key => $value){
					if ($Nab == $value){

						$requete = $connection -> prepare(
						"SELECT N°_Ligne FROM Abonnement WHERE N°_Ab=?");

						$requete-> execute(array($value));

						$res = $requete->fetch();
						$resultat = array_unique($res);
					}	
					 if (empty($resultat)) {
						header('location:claim-form.php?error="numero d\'abonnement incorrect !"');	
					 }
				}

			// Ici on a : $Nab $res(qui contient le num de ligne de l'abonnement où Nab = N°_Ab)

				if ((int)$resultat["N°_Ligne"] === (int)$Nline) {
					//Protection & securisation des BD des injections SQL

					//1- Preparation

				/*$sql = "INSERT INTO Reclamation(N°_Rec, Intitule, N°_Ab, N°_Sce, N°_Etat)
							VALUES ('', :Intitule, :N°_Ab, :N°_Sce, '1')";*/

					$requete = $connection -> prepare(
							"INSERT INTO Reclamation(Intitule, N°_Ab, N°_Sce, N°_Etat)
							VALUES (?, ?, ?, '1')"
						);

					$intitule = $_POST["intitule"];
					$Nab = $_POST["Nab"];
					$Sce = $_POST["sce"];

					$requete->execute(array($intitule, $Nab, $Sce));


					// on recupere ensuite  le numero dereclamation

					$requete1 = $connection->prepare("SELECT N°_Rec, N°_Etat FROM Reclamation WHERE N°_Ab=?");

					$requete1->execute(array($Nab));
					$requete1->setFetchMode(PDO::FETCH_ASSOC);

					while ($u = $requete->fetch(PDO::FETCH_ASSOC)) {
					   $res1[] = $u;
					}

					//Ensuite on envoie dans Faire les details de la reclamation

					$requete2->prepare("INSERT INTO Faire(N°_Clt, N°_Rec, Details) VALUES(?, ?, ?)");
					
					$Det = $_POST['detail'];

					$requete->execute(array($idClt, $res1['N°_Rec'], $Det));

					//MaJ du document de controle

					$requete3 = $connection -> prepare(
							"INSERT INTO Doc(Info, N°_Clt, N°_Rec, N°_Etat, N°_Sce)
							VALUES ('Pas d'info pour le moment', ?, ?, ?, '1',?)"
						);

					$requete3->execute(array($id_Clt, $res1['N°_Rec'], $res1['N°_Etat'], $Sce));

					// ENREIGISTREMENT DES DETAILS

					/*for ($i=0; $i < count($res1); $i++) { 
						foreach ($res1[$i] as $key => $value) {
						$resultat1[] = $value;
						}
					}

					$res2 = array_unique($resultat1);
					foreach ($res2 as $key => $value) {
						if ($value == $_POST['Nab']) {
							$requete2 = $connection->prepare("INSERT INTO Faire(N°_Clt, N°_Ab, Details) VALUES(?, ?, ?)");

							$Nab = htmlentities($_POST['Nab']);
							$details = htmlentities($_POST['Det']);	

							$requete2->execute(array($IDpost, $Nab, $details))*/

					header('location:claim-form.php?success="Votre Reclamation à bien été enregistré !"');

				} else{
					header('location:claim-form.php?error="numero de Ligne incorrect !"');
				}

			} catch (Exception $e) {
					echo "Error".$e->getmessage();
				}
		}
	}

 ?>