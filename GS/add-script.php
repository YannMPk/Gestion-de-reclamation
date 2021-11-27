
<?php 
	include_once("functions.php");
	
	try {
			$server = "localhost";
			$login = "root";
			$pass = "";
			$connection = new PDO("mysql:host=$server;dbname=Qdb", $login, $pass);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// LIAISON N°_Clt - N°_Ab //
			$ID = array_unique(cust_subscription(1001));

			//LIAISON Ab - Rec

				foreach ($ID as $key => $value){
					$requete1 = $connection->prepare("SELECT N°_Rec FROM Reclamation WHERE N°_Ab=?");

					$requete1->execute(array($value));
					$requete1->setFetchMode(PDO::FETCH_ASSOC);

					while ($u = $requete1->fetch(PDO::FETCH_ASSOC)) {
					   $resultat1[] = $u;

					}
				}

			//Rec Client 1001 et leurs Etat

			/*foreach ($resultat1 as $key => $value){ */
				for ($i=0; $i < count($resultat1); $i++) { 
					$requete2 = $connection->prepare("SELECT N°_Etat FROM Reclamation WHERE  N°_Rec=? ");

					$requete2->execute(array($resultat1[$i]['N°_Rec']));
			
					$requete2->setFetchMode(PDO::FETCH_ASSOC);

					while ($u = $requete2->fetch(PDO::FETCH_ASSOC)) {
					   $resultat2[] = $u;

					}
				}

				for ($i=0; $i <count($resultat2) ; $i++) { 
					if ($resultat2[$i]['N°_Etat'] == "2") {
						$resultat[] = $resultat2[$i]['N°_Etat'];
					}
				}
					

				echo "<pre>";
				var_dump($resultat);
				echo "</pre>";
			
		} catch (Exception $e) {
			echo "Error".$e->getmessage();
		}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout image CLT</title>
	</head>
	<body>
		<form method="POST" action="">
			<label for="Nab">Nab</label>
			<input type="text" name="Nab" id="Nab">
			<br>
			<label for="Nline">nline</label>
			<input type="text" name="Nline" id="Nline">
			<br>
			
			<input type="submit" name="" value="enreigistrer">
		</form>

	</body>
</html>