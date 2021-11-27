<?php 
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	} else {header('location:login.php');}
		include_once('functions.php');

?>

<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
		<title><?php if (isset($title)) { echo $title;} ?></title>
		<script src="https://kit.fontawesome.com/6b47ac6fb8.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
		<!--<link rel="stylesheet" type="text/css" href="style.css">-->
		<style type="text/css">
			body{
				margin: 0;
				padding: 0;
				font-family: ubuntu, sans-serif;
				box-sizing: border-box;
				text-decoration: none;
				overflow-x: hidden;
			}


			#sidebar-toggle{
				display: none;	
			}

			.body-label{
				position: fixed;
				height: 100%;
				width: calc(100% - 280px);
				z-index: 150;
				top: 0;
				right: -100%;
			}

			#sidebar-toggle:checked ~ .sidebar{
				left: -100%;
			}

			#sidebar-toggle:checked ~ .main-content header{
				left: 0;
				width: 100%;
				right: 0;
			}

			#sidebar-toggle:checked ~ .main-content{
				margin-left: 0;
			}

			.sidebar{
				width: 220px;
				position: fixed;
				left: 0;
				top: 0;
				height: 100%;
				padding: 2%;
				background: black;
				color: ghostwhite;
				border: 1px solid black;
				z-index: 100;
				transition: left -300ms;
			}

			.sidebar-brand{
				height: 100px;
			}

			.side-flex{
				display: flex;
				justify-content: space-between;
				align-items: center;
			}


			.brand-icons  span{
				font-size: 50px;
				margin-left: 5px;

			}

			.sidebar-user{
				margin: 0 0 2% 0;
				text-align: center;

			}

			.sidebar-user img{
				width: 110px;
				height: 110px;
				margin: auto;
				border-radius: 100%;
				border-top: 2px solid #FFA400;
				border-bottom: 2px solid #FFA400;
				border-left: 2px solid transparent;
				border-right: 2px solid #FFA400;
			}

			.sidebar-user h3{
				font-size: 20px;
			}

			.sidebar-user span{
				font-size: 12px;
			}

			.sidebar-menu{
				margin-top: 1%;
			}

			.menu-head{
				text-transform: uppercase;
				color: #FFA400;
				font-size: 15px;
				font-weight: bold;
				/*margin-bottom: 10px;*/
			}

			.sidebar ul{
				margin-bottom: 15px;
				list-style-type: none;
			}

			.sidebar-menu li{
				margin-bottom: 15px;
				display: flex;
			}

			.sidebar-menu li a{
				color: lightgrey;
				text-decoration: none;
				font-size: 12px;
			}

			.sidebar-menu li a:hover{
				color: #FFA400;
			}

			.sidebar-menu li a i{
				 font-size: 16px;
				 display: inline-block;
				 margin-right: 12px;
				}/* transformer plus tard des span en i*/

			header{
				height: 61px;
				display: flex;
				justify-content: space-between;
				align-items: center;
				padding: 0 24px;
				position: fixed;
				top: 0;
				left: 280px;
				width: calc(100% - 280px);
				z-index: 100;
				background-color: ghostwhite;
				box-shadow: 4px 4px 10px rgba(0, 0, 0, 1.0);
				transition: left 300ms;
			}

			.active{
				text-decoration: none;
				color: black;
				font-size: 12px;
				margin-right: 10px;
				flex:  1;
			}

			.active:hover{
				color: #FFA400;
			}

			.menu-toggle label{
				height: 60px;
				width: 60px;
				display: grid;
				place-items: center;
				font-size: 24px;
				border-radius: 50%;
			}

			.menu-toggle label:hover{
				background: #FFA400 ;
			}

			.hi{
				width: 20%;
				text-align: rigth;
				display: flex;
				justify-content: flex-end;
			}

			.header-icons{
				flex-basis: 80%;
				/*align-self: flex-end;	*/
			}

			

			.main-content{
				margin-left: 280px;
				transition: margin-left 300ms;
			}

			main{
				padding: 10px;
				background-color: lightgrey;
				min-height: 576px/*calc(100vh - 70px)*/;
				margin-top: 70px;
			}

			.landing-page{
				display: flex;
				flex-direction: column;
				justify-content: space-between;
				/*align-items: center;*/
				/*border: 1px solid black;*/
				padding: 0 10px;
			}

			.head small a{
				/*text-decoration: none;*/
				color: #222;
			}
			.head small a:hover{
				color: ghostwhite;
			}

			.head{
				background-color: #FFA400;
				box-shadow: 0 0 15px black;
				flex: 1;
				/*border: 1px solid red;*/
				flex-basis: 100%;	
				padding: 20px;	
			}

			.head h1{
				margin: 0;
				padding: 0;
			}

			.page-form{
				flex: 1;
				/*border: 1px solid black;*/
				padding: 0 25px;
				padding-bottom: 25px;
				flex-basis: 95%;	
				background-color: ghostwhite;
				box-shadow: 0 0 15px black;
				/*box-shadow: 0 0 10px black;*/

			}

			.page-form h1{
				/*font-size: 20px;*/
				text-align: center;
				text-transform: capitalize;
				text-decoration: underline;
				line-height: 50px;
			}

			.legend{
				font-size: 20px;
				font-weight: 500;
			}

			.ab{
				border-radius: 20px;
				border-color:	lightgrey;
				padding: 25px;
				margin-bottom: 15px;
				display: flex;
				flex-direction: row;
				justify-content: space-between;
			}

			.input-div{
				/*border: 1px solid red;*/
				flex: 1;
			}

			.champ input{
				margin-top: 5px;
				border:2px solid lightgrey;
				outline:  none;
				border-radius: 5px;
				height: 25px;
				width: 250px;

			}

			.rec{
				border-radius: 20px;
				padding: 25px;
			}

			.rec p{
				font-size: 13px;
			}

			.rec textarea{
				width: 100%;
				border-radius: 10px;
				outline: none;
				border: 3px solid lightgrey;
			}

			.select-div select{
				width: 250px;
				height: 30px;
				outline: none;
				border-radius: 10px;
				border: 1px solid lightgrey;
			}

			.error_message{
				background-color: rgba(255, 69, 0, 0.4);
				width: 50%;
				margin: auto ;
				padding: 5px;
				text-align: center;
				border-radius: 10px;
				border: 1px solid orangered;
			}
			
			.success_message{
				background-color: rgba(46, 139, 87, 0.4);
				width: 50%;
				margin: auto ;
				padding: 5px;
				text-align: center;
				border-radius: 10px;
				border: 1px solid seagreen;

			}

			.btn{
				width: 100%;
			}

			.btn input{
				margin-top: 20px;
				padding: 10px;
				width: 200px;
				outline: none;
				border: 2px solid lightgrey;
				border-radius: 30px;
				background-color: black;
				font-size: 14px;
				font-weight: 600;
				color: #FFA400;
				float: right;
			}

			.btn input:hover{
				background-color: #FFA400;
				color: black;
				transition: .3s;
			}

			/* MEDIA QUERIES*/
			@media only screen and (max-width: 1124px){
				.sidebar{
					left: -100%;
					z-index: 110;
				}

				.main-content{
					margin-left: 0;
				}

				header {
					left: 0;
					width: 100%;
				}

				#sidebar-toggle:checked ~ .sidebar{
					left: 0;
				}

				#sidebar-toggle:checked ~ .body-label{
					right: 0;
				}

				.cards{
					grid-template-columns: repeat(2, 1fr) ;
				}
			}

			@media only screen and (max-width: 778px){
				.ab{
					flex-direction: column;
				}
				.cards{
					grid-template-columns: 100%;
				}

				.jobs-grid{
					grid-template-columns: 100%;
				}

				.page-header{
					display: block;
				}

				.header-actions{
					margin-top: 16px;
					text-align: right;
				}

				.header-actions button:first-child{
					margin-left: 0;
				}
			}
		</style>
	</head>
	<body>

		<input type="checkbox" name="" id="sidebar-toggle">
		<div class="sidebar">
			<div class="sidebar-brand">
				<div class="brand-flex">

					<div class="brand-icons"></div>
						<img src="siteimg/Q.png" width="30px" alt="logo" style="margin-right: 80px;">
					<?php include_once('functions.php'); ?>
					<?php if (is_connected()):?>

					<?php 
						$idClt = $_SESSION["idClt"];
					 ?>
						<span style="width: 12x;"><?= "Cust-ID : ".$idClt ?></span>
					<?php endif; ?>
				</div>
			</div>

			<div class="sidebar-main">
				<div class="sidebar-user">
				<?php include_once('functions.php'); ?>
				<?php if (is_connected()):?>

				<?php 
					$nom = $_SESSION["nom"];
					$prenom = $_SESSION["prenom"];
					$email = $_SESSION["email"];
					$idClt = $_SESSION["idClt"];

					$photo = id_photo($idClt);
					$src = $photo["src"];
					$img = $photo["Photo_Nom"];
				 ?>
					<img src= "<?= $src.$img; ?>">
					<div>
						<h3><?= $nom." ".$prenom; ?></h3>
						<span><?= $email; ?></span>
					</div>
				<?php endif; ?>
				</div>

				<div class="sidebar-menu">
					<div class="menu-block">
						<div class="menu-head">
							<span>Dashboard</span>
						</div>
							<ul>
								<li>
									<a href="">
										<i class="fas fa-file-alt"></i> Mes reclamations
									</a>
								</li>
								<li>
									<a href="">
										<i class="fas fa-pen"></i> Creer une reclamation
									</a>
								</li>
								<li>
									<a href="">
										<i class="fas fa-trash"></i>supprimer une reclamation
									</a>
								</li>
							</ul>
						</div>

						<div class="menu-head">
							<span>Navigation</span>
						</div>
						<ul>
							<li>
								<a href="index.php">
									<i class="fas fa-house-user"></i> Menu
								</a>
							</li>
							<li>
								<a href="contact.php">
									<i class="fas fa-phone"></i> Nous Contacter
								</a>
							</li>
							<li>
								<a href="">
									<i class="fas fa-question"></i> FAQ
								</a>
							</li>
							<li>
								<a href="">
									<i class="fas fa-file-contract"></i> Confidentialité
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="main-content">
			<header>
				<div class="menu-toggle">
						<label for="sidebar-toggle">
							<span class="las la-bars"></span>
						</label>
				</div>

				<div class="hi">
					<div class="header-icons">
						<?php if (is_connected()): ?>
						<p><a class="active" href="logout.php"><i class="fas fa-lock"></i> Se deconnecter?</a></p>
						<?php endif; ?>
					</div>
				</div>
			</header>
			<main>
				<div class="landing-page">
					<div class="head">
						<h1>Nouvelle Reclamation</h1>
						<small><a href="cust-dashboard.php"><i class="fas fa-arrow-left" style="font-weight: 10px;"></i> Retourner au Dashboard</a></small>
					</div>
					<div class="page-form">
						<form method="POST" action="claim-registration.php">
						<h1>Formulaire de Reclamation</h1>
						<?php if (!empty($_GET['error'])):?>
							<div class="error_message">
								<p><?= $_GET['error'];?></p>
							</div>
						<?php elseif (!empty($_GET['success'])) :?>
							<div class="success_message">
								<p><?= $_GET["success"];?></p>
							</div>
						<?php endif; ?>
						<fieldset class="ab">
							<legend class="legend">Info sur l'abonnement</legend>
							
							<div class="input-div">
								<span>Numero d'abonnement</span>
								<div class="champ">	
									<input type="text" id="Nab" name="Nab" placeholder="enter votre Numero d'abonnement" autofocus="autofocus">
								</div>
							</div>
							
							<div class="input-div">
								<span>Numero de ligne</span>
								<div class="champ">
									<input type="text" id="Nline" name="Nline" placeholder="enter votre Numero de ligne"required="">
								</div>
							</div>
						</fieldset>

						<fieldset class="rec">
							<legend class="legend">Info sur la reclamation</legend>
							<h3>Type du probleme renconter :</h3>

							<p>Selectionnez ici le type de probleme. Pour nous aider à mieux rediriger votre reclamation vers le service concerné par cette dernière.</p>

							<div class="input-div">
								<div class="">
									<input type="radio" id="sce" name="sce" value="1"><label>Probleme Technique</label>
									<input type="radio" id="sce" name="sce" value="2"><label>Probleme de facturation</label>
								</div>
							</div>	
							<h3>Donner un theme au probleme que vous rencontez :</h3>

							<p>Le theme ici va nous donner une vision globale sur le probleme que vous avez renconter</p>

							<p><i><b style="color: #FFA400;">Note :</b> lire attentivement les differents point soulignés.</i></p>

							<div class="select-div">
								<select name="intitule" id="intitule" required="">
									<optgroup label="−−− Veuilez selectionner un theme−−−">
										<option value="Debit de connection Faible">Debit de connection Faible</option>
										<option value="Ereur de paiement">Ereur de paiement</option>
										<option value="Perturbation de reseau">Perturbation de reseau</option>
										<option value="Facture en surplus">Facture en surplus</option>
										<option value="Probleme au niveau de la box">Probleme au niveau de la box</option>
									</optgroup>
								</select>
							</div>	
							<h3>Faite nous savoir avec exactitude le probleme que vous avez rencontez :</h3>
							<div class="input-div">
								<div class="champ">
									<textarea id="detail" name="detail" required="" spellcheck="default" rows="15" cols="30"> Dites nous plus ...</textarea>
								</div>
							</div>	
						</fieldset>
						<div class="btn">
							<input type="reset" value="Reinitiliser">
							<input type="submit" value="Envoyer">
						</div>
					</form>
					</div>
					<!--<div class="jobs">
						<h2>Jobs <small> see all Jobs <span class="las la-arrow-right"></span></small></h2>
					<div class="table-responsive">
						<table style="width: 100%;">
							<thead>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>4</th>
								<th>5</th>
							</thead>
							<tbody>
								<tr>
									<td>
										<div>
											<span class="indicator"><i class="fas fa-user-edit"></i></span>
										</div>
									</td>
									<td>
										<div>
											Customers experience designer
										</div>
									</td>
									<td>
										<div>
											design
										</div>
									</td>
									<td>
										<div>
											Copenhangen Dk.
										</div>
									</td>
									<td>
										<div>
											posted 6 days ago
										</div>
									</td>
									<td><button>8 applicants</button></td>
								</tr>
								<tr>
									<td>
										<div>
											<span class="indicator"><i class="fas fa-user-edit"></i></span>
										</div>
									</td>
									<td>
										<div>
											software developer
										</div>
									</td>
									<td>
										<div>
											developer
										</div>
									</td>
									<td>
										<div>
											Copenhangen Dk.
										</div>
									</td>
									<td>
										<div>
											posted 6 days ago</td>
										</div>
									<td><button>3 applicants</button></td>
								</tr>
							</tbody>
							
						</table>
					</div>
					</div>
				</div>-->
			</main>
		</div>
		<label for="sidebar-toggle" class="body-label"></label>
	</body>
</html>