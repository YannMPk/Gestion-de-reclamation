<?php 
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	} else {header('location:login.php');}
		include_once('functions.php');
?>
<?php $title = "Admin" ?>
<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
		<title><?php if (isset($title)) { echo $title;} ?></title>
		<script src="https://kit.fontawesome.com/6b47ac
		script+6fb8.js" crossorigin="anonymous"></script>
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

			.sidebar-menu li a span{
				 font-size: 24px;
				 display: inline-block;
				 margin-right: 12px;
				}/* transformer plus tard des span en li*/

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

			.page-header{
				display: flex;
				justify-content: space-between;
				align-items: center;
				background-color: #FFA400;
				padding: 20px;
				box-shadow: 4px 4px 10px black;
				/*border: 1px solid black;*/
			}

			.header-actions button{
				outline: none;
				color: /*black*/ ghostwhite;
				border: /*1px solid black*/ none;
				background-color:#FFA400;
				padding: 5px 20px;
				border-radius: 5px;
				font-weight: 600;
			}

			.header-actions button span{
				font-size: 20px;
				margin-right: 10px;
			}

			#linkto{
				text-decoration: none;
				color: black;
			}

			#linkto:hover{
				color: ghostwhite;
			}

			.jobs-grid{
				margin-top: 48px;
			}

			.jobs{
				overflow: auto;
			}

			.jobs h2 small{
				color: #FFA200;
				font-weight: 600;
				display: inline-block;
				margin-left: 16px;
				font-size: 14px;
			}

			.jobs table{
				border-collapse: collapse;
				margin-top: 16px;
				overflow-x: auto;
			}

			span.indicator{
				color: #FFA400;
				height: 15px;
				width: 15px;
			}

			.jobs table td div{
				background-color: ghostwhite;
				margin-bottom: 16px;
				height: 50px;
				display: flex;
				align-items: center;
				padding: 8px;
				font-size: 14px;
				color: #222;
				font-weight: 500;
			}

			.trait-form{
				padding: 20px;
				margin: auto;
			}

			.trait-form input{
				outline: none;
				border: 2px solid #FFA400;
				height: 20px;
				border-radius: 5px;

			}

			#traitement{
				outline: none;
				border: none;
				background-color: transparent;
			}

			#traitement:hover{
				color: #FFA400;
			}

			.table-responsive{ 
				overflow-x: auto;

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
						<span style="width: 12x;"><?= "Admin-ID : ".$idClt ?></span>
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
					/*$src = $photo["src"];
					$img = $photo["Photo_Nom"];*/
				 ?>
					<?php if ($idClt == 1):?>
				 	<img src= "siteimg/tech.png">
				 <?php elseif ($idClt == 2):?>
				 	<img src= "siteimg/fact.png">
				 <?php else : ?>
				 	<img src= "siteimg/cont.jpg">
				 <?php endif; ?>
					
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
									<a href="admin-dashboard.php">
										<i class="fas fa-binoculars"></i> Tableau de bord analytique
									</a>
								</li>
								<li>
									<a href="all-claim-list.php">
										<i class="fas fa-file-alt" style="color: black;"></i> Liste de Reclamation
									</a>
								</li>
								<li>
									<a href="processing.php">
										<i class="fas fa-pen"></i> Proceder au traitement d'une reclamation
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
							<!--<li>
								<a href="contact.php">
									<i class="fas fa-phone"></i> Nous Contacter
								</a>
							</li>-->
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
				<div class="page-header">
					<h1>Liste de toutes les Reclamations</h1>
					<small><i class="las la-arrow"></i><a href="admin-dashboard.php" id="linkto" ><i class="fas fa-arrow-left"></i> Retourner au tableau de bord</a></small>	
				</div>

				<div class="jobs-grid">
					<div class="jobs">
						<?php if (!empty($_GET['success'])) :?>
							<div class="success_message">
								<p><?= $_GET["success"];?></p>
							</div>
						<?php endif; ?>
						<h2>Jobs </h2>
						<div class="trait-form">
							<form method="GET" action="processing.php">
								N°_Rec : <input type="text" id="Rec" name="Rec">
								  N°_Ab : <input type="text" id="Ab" name="Ab">
								  <input type="submit" value="Proceder au Traitement" id="traitement"><label><i class="las la-arrow-right"></i></label>
							</form>
						</div>
					<div class="table-responsive">

						<table style="width: 100%;">
							<thead>
								<th></th>
								<th>N° de reclamation</th>
								<th>Sur :</th>
								<th>N° d'abonnement :</th>
								<th>Pour :</th>
								<th>Statut :</th>
							</thead>
							<tbody>
								<?php include_once('functions.php'); ?>
								<?php if (is_connected()):?>
										<?php 
											$idClt = $_SESSION["idClt"];
										 ?>
								<?php endif; ?>
								<?php $Tab = all_claim_list($idClt); ?>
								<?php for ($i=0; $i < count($Tab) ; $i++):?>
									<tr>
									
										<td>
											<span class="indicator"><i class="fas fa-user-edit"></i></span>
										</td>

										<td>
											<div><?= "Rec_num 00".$Tab[$i]['N°_Rec']; ?></div>	
										</td>

										<td>
											<div><?= $Tab[$i]['Intitule']; ?></div>	
										</td>

										<td>
											<div><?= "Ab_num ".$Tab[$i]['N°_Ab']; ?></div>	
										</td>

										<td>
											<?php if ($Tab[$i]['N°_Sce'] == 1):?>
												<div><?= "Technique"; ?></div>
											<?php else : ?>
												<div><?= "Facturation"; ?></div>
											<?php endif; ?>
										</td>

										<td>
											<?php if ($Tab[$i]['N°_Etat'] == 1):?>
												<span style="font-size: 12px; background-color: grey;border-radius: 10px; padding: 10px; ,margin: auto;"><?= "Pas encore Traité"; ?></span>
											<?php if ($idClt == $Tab[$i]['N°_Sce'])?>
										</td>
											<?php endif; ?>
										</td>
									</tr>
								<?php endfor; ?>
							</tbody>
							
						</table>
					</div>
					</div>
				</div>
			</main>
		</div>
		<label for="sidebar-toggle" class="body-label"></label>
	</body>
</html>