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

			.cards{
				display: grid;
				grid-template-columns: repeat(3, 1fr);
				grid-gap: 3rem;
				margin-top: 10px;
			}

			.card-single{
				background-color: ghostwhite;
				padding: 10px;
				box-shadow: 4px 4px 10px #444;
				border-radius: 2px;
			}

			.card-flex{
				display: grid;
				grid-template-columns: 70% auto;
				align-items: center;
			}

			.card-head span{
				display: block;
				text-transform: uppercase;
				color: #222;
			}

			.card-head small{
				font-weight: 600;
				color: #555;
			}

			#linkto{
				text-decoration: none;
				color: black;
			}

			#linkto:hover{
				color: #FFA400;
			}

			.card-info h2{
				font-size: 40px;
				color: #FFA400;
			} 

			
			.card-chart span{
				font-size: 100px;
			}

			.card-chart.success span{
				color: seagreen;
			}

			.card-chart.yellow span{
				color: yellow;
			}

			.card-chart.danger span{
				color: grey;
			}

			.chart-circle{
				height: 150px;
				width: 150px;
				border-top: 10px solid #FFA400;
				border-bottom: 10px solid transparent;
				border-left: 10px solid transparent;
				border-right: 10px solid #FFA400;

				display: grid;
				place-items: center;
				margin: auto;
				border-radius: 50%;
			}

			.jobs-grid{
				margin-top: 48px;
			}

			.analytics-card{
				background-color: ghostwhite;
				padding: 24px;
				width: 95%;
			}

			.analytics-head{
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.analytics-head span{
				font-size: 20px;
			}

			.analytics-chart small{
				font-weight: 24px;
				color: #555;
				display: block;
				margin-bottom: 16px;
			}

			.analytics-card button{
				display: block;
				padding: 8px 16px;
				width: 100%;
				height: 45px;
				background-color: grey;
				border: 1px solid #FFA400;
				border-radius: 3px;
			}

			svg circle{
				 fill: none;
				 stroke: #FFA400;
				 stroke-width: 10px;
				 stroke-dasharray: 410;
				 stroke-dashoffset: 409;
				 stroke-linecap: round;
				 animation: circle 2s forwards;
			}

			#percent{
				position: relative;
				top: 50%;
				left: 10%;
				transform: translate(-5.5%, -200%);
				font-size: 40px;
				font-weight: bold;
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
									<a href="all-claim-list.php">
										<i class="fas fa-file-alt"></i> Liste de Reclamation
									</a>
								</li>
								<li>
									<a href="all-claim-list.php">
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
					<div>
						<h1> Dashboard Analytique</h1>
						<small>Surveiller les indicateurs clés, vérifier les rapports et examiner les résultats.</small>
					</div>

					<!--<div class="header-actions">
						<button>
							<span class="las la-file-export"></span> Export
						</button>
						<button>
							<span class="las la-tools"></span> settings
						</button>
					</div>-->
				</div>
				<div class="cards">
					<div class="card-single">
						<div class="card-flex">
							<div class="card-info">
								<div class="card-head">
									<span>Réclamations à traiter</span>
									<small> Nombre de reclamations</small>
								</div>

								<?php 
									include_once('functions.php');
									$nboc = count(all_claim_list());
								 ?>
								<h2><?= $nboc; ?></h2>
								<small><a href="all-claim-list.php" id="linkto">acceder à la liste  <i class="fas fa-arrow-right"></i></a></small>
							</div>

							<div class="card-chart danger">
								<span><i class="fas fa-meh"></i></span>
							</div>
						</div>
					</div>

					<div class="card-single">
						<div class="card-flex">
							<div class="card-info">
								<div class="card-head">
									<span>Réclamation déjà traités</span>
									<small> Nombre :</small>
								</div>
								<?php 
									include_once('functions.php');
									$nbocp = count(nbofclaimprocessed());
								 ?>
								<h2><?= $nbocp; ?></h2>
							</div>

							<div class="card-chart success">
								<span><i class="fas fa-laugh-beam"></i></span>
							</div>
						</div>
					</div>
				</div>

				<div class="jobs-grid">
					<div class="analytics-card">
						<div class="analytics-head">
							<h2>Etat de progression</h2>
							<span class="las la-ellipsis-h"></span>
						</div>
						<div class="Analytics-chart">
							<!--<div class="chart-circle">
								<?php  ?>
								<h1 style=""><?= ((($nboc - $nbocp)/$nboc)*100)."%"; ?></h1>
							</div>-->
							<svg>
								<circle cx="80px" cy="80px" r="65px">
								<circle cx="80px" cy="80px" r="65px">
									<?php (float)$sous = $nbocp - $nboc;
									$moy = ($sous / $nbocp)*100;?>
									<?php if (isset($moy)):?>
										<style type="text/css">
											@keyframes circle{
												to {
													stroke-dashoffset: <?=((100 - $moy)*410)/100;  ?>;
												}
											}

										</style>
									<?php endif; ?>
									<div id="percent"><?php echo $moy."%"; ?></div>
							</svg>

							<div class="analytics-note">
								<small>Note: Plus vite est traité la reclamation, mieux le client est !</small>
							</div>
						</div>

						<div class="analytics-btn">
							<button>Generate report</button>
						</div>
					</div>
				</div>
			</main>
		</div>
		<label for="sidebar-toggle" class="body-label"></label>
	</body>
</html>