<?php
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	} 
	include_once('functions.php');
	$title = "Nous Contacter";
?>
<!DOCTYPE html>
<html lang="fr-FR">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="width=device-width, initial-scale=1.0">
		<!--<link rel="stylesheet" type="text/css" href="connexion.css">-->
		<script src="https://kit.fontawesome.com/6b47ac6fb8.js" crossorigin="anonymous"></script>
		<title><?php  if (isset($title)) {echo $title;} else{ echo "Mon site";}?></title>
	</head>
	<style type="text/css">
		body{
			font-family: Ubuntu, Sans-Serif;
			margin: 0;
			padding: 0;
			
		}
		header{
			position: fixed;
			background-color: ghostwhite;
			height: 61px;
			z-index: 100;
			width: 100%;
			box-shadow: 4px 4px 10px rgba(0, 0, 0, 1.0);
		}
		.navbar{
			padding: 0;
			margin-bottom: 62px;
			margin: 0;
			text-decoration: none;
			list-style-type: none;
			box-sizing: border-box;
		}

		nav{
			/*background-color: rgba(255,255,255, 0.1);*/
			width: 100%;
			padding: 0;
		}

		label.logo, img{
			/*font-size: 35px;
			color: black;
			line-height: 80px;
			font-weight: bold;*/
			padding: 0 100px 10px 0;
			
		}

		nav ul{
			margin: 0;
			padding: 0;
			height: 100%;
			float: right;
			margin-right: 20px;
		}

		nav ul li{
			display: inline-block;
			line-height: 80px;
			margin: 0 5px;
			border-radius: 3px;
		}

		nav ul li a{
			color: black;
			font-size: 12px;
			text-transform: capitalize;
			text-decoration: none;
			padding: 7px 13px;
			border-radius: 3px;
		}

		.active{
			border-radius: 100px;
			font-size: 10px;
		}

		.active:hover{
			background-color: #FFA400;
			color: white;
		}

		a.active, a:hover{ 
			color: #FFA400;
			transition: .3s;
		}

		.checkbtn{
			font-size: 30px;
			color: black;
			float: right;
			line-height: 80px;
			margin-top: 0px;
			margin-right: 40px;
			cursor: pointer;
			display: none;
		}

		#check{
			display: none;
		}

		/*For LANDING page*/

		.landing-page{
			padding-top: 65px;
			overflow: hidden;
			z-index: 20;
			background-color: ghostwhite;


		}

		.A h1{
			text-align: center;
			font-size: 48px;
			text-decoration: underline;
		}
		.lp-title{
			width: 100%;
			height: 70px;
			background-color: #FFA400;
			padding: 20px;
			padding-left: 150px;
		}

		.lp-wrap form{
			width: 60%;
			margin: 20px auto 50px auto;
			padding: 30px;
			background-color: ghostwhite;
			box-shadow: 4px 4px 10px black;
		}

		.champ input{
			outline: none;
			border: 2px solid lightgrey;
			width: 50%;
			height: 30px;
			border-radius: 10px;
		}
		
		.Cinfo{
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: space-between;

		}

		.champ{
			flex: 1;
		}

		textarea{
			outline: none;
			border: 2px solid lightgrey;
			width: 90%;
			height: 100px;
			border-radius: 10px;
		}

		.valide{
			width: 100%;
			float: rigth;
		}

		.valide input{
			outline: none;
			border: none;
			background-color: black;
			color: #FFA400;
			border-radius: 15px;
			padding: 5px;
			margin-top: 20px;
			margin-left: 5px;
			padding: 10px;
		}

		.valide input:hover{
			background-color: #FFA400;
			color: black;
		}
		/*footer new version*/

		footer{
			background-color: black;
			color: #FFA400;
			font-size: 14px;
			width: 100%;
		}

		.con-footer ul{
			list-style-type: none;
			width: 100%;
			margin: auto;
			padding: 0; 
		}

		.box-1 li{
			display: inline-block;
			margin: auto;
			padding: 10px;
			text-align: center;
			width: 10%;
			height: 100%;
			/*border: 1px solid red;*/
		}
		.con-footer ul li a{
			text-decoration: none;
			color: lightgrey;
			text-transform: capitalize;
		}
		.con-footer ul li a:hover{
			color: #FFA400;
		}
		.con-footer{
			display: flex;
			flex-direction: column;
			flex-wrap: wrap;
			flex-basis: 100%;
		}

		.box-1{
			flex: 1;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.submenu, .submenu0{
			display: none;
		}

		.minimenu li, .minimenu0 li{
			display: block;
			margin: 0;
			padding: 10px 0 10px 0;
			width: 100%;
			border-bottom: 1px solid lightgrey;
		}
		.submenu li a, .submenu0 li a{
			color: lightgrey;
			margin: auto;
			padding: 0 10px;
		}

		.minimenu:hover .submenu{
			display: inline-block;
			background-color: black;
			/*position: absolute;
			top:89%;
			width: auto;
			right: 5%;*/
		/*	height: 10%;*/
			/*border-bottom: 1px solid #FFA400;*/
		}
		.minimenu0:hover .submenu0{
			display: inline-block;
			background-color: black;
			position: absolute;
			top:95%;
			width: auto;
			right: 45%;
		}

		hr{
			margin: auto;
			padding: 0;
			width: 80%;
			color: rgba(211,211,211,0.10);
		}

		.box-2{
			flex: 1;
			display: flex;
			flex-direction: row;
			flex-wrap: wrap;
			justify-content: space-between;
		}

		.box-2-a, .box-2-b{
			flex: 1;
			padding-bottom: 10px;
		}

		.box-2-a p, .box-2-b p{
			margin: 10px;
			padding: 0px;
		}

		.box-2-b{
			display: flex;
			flex-wrap: wrap;
			flex-direction: row;
			justify-content: flex-end;
			padding: 10px 0;
			/*border: 1px solid white;*/
		}
		.box-2-b a{
			text-decoration: none;
			font-size: 20px;
			color: lightgrey;
		}
		.box-2-b a:hover{
			color: #FFA400;
		}

		.b-2-p0{
			flex-basis: 10%;
		}

		.b-2-p1{
			flex-basis: 10%;
			/*border: 1px solid white;*/
		}

		.b-2-p2{
			flex-basis: 10%;
			/*border: 1px solid white;*/
		}
		.b-2-p3{
			flex-basis: 10%;
			/*border: 1px solid white;*/
		}

		/*RESPONSIVITY*/
		@media (max-width: 952px/*, width: 1107px*/){
			/*For all*/
			p, a{
				font-size: 12px;
			}
			/*For header*/
			label.logo, img{
				font-size: 30px;
				padding-left: 50px;
			}
			nav ul li a{
				font-size: 16px;
			}
			/*For connection page*/

			/*For footer*/
			.ft-left{
				width: 100%;
				height: 30%;
				padding: 5% 5% 5% 0;
				margin: 0;
			}

			.ft-left-content, .ft-middle, .ft-right{
				width: 100%;
				text-align: center;
				margin: 0;
				padding: 0;
			}
		}

		@media (max-width: 858px){
			/*For header*/
			.checkbtn{
				display: block;
			}
			nav ul{
				position: fixed;
				width: 100%;
				height: 100vh;
				background: white;
				top: 80px;
				left: -150%;
				text-align: center;
				transition: all .5s;
			}
			nav ul li{
				display: block;
			}
			nav ul li a{
				font-size: 12px;
				color: black;
			}
			a:hover; a.active{
				background-color: none;
				color: #0082e6;
			}

			#check:checked ~ ul{
				left: 0;
			}
			.checkbtn:hover{
				color: #FFA400;
			}

			/*for connection page*/
			

			/*For footer*/
			.ft-left{margin-left: 0; padding: 0;}
		}


	</style>
	<body>
		<!--En tete-->
		<header>
			<nav class="navbar">
				<input type="checkbox" name="checkbox" id="check">
				<label for="check" class="checkbtn">
					<i class="fas fa-bars"></i>
				</label>
				<img src="siteimg/Q.png" alt="logo" style="width: 120px; height: 61px; margin-left: 10px;">
				<ul>
					<li><a href="index.php">acceuil</a></li>
					<li><a href="admin⁻login.php"><i class="fas fa-cog"></i> Admin</a></li>
					<?php if (is_connected()): ?>
						<?php  
							$nom = $_SESSION["nom"];
							$prenom = $_SESSION["prenom"];
						?>
						<li><a href="logout.php"><i class="fas fa-lock"></i> Se deconnecter</a></li>
						<li><a href="#" class="active"><?= $prenom." ".$nom?></a></li>
						<?php  /*$nom = $resultat["nom"];*/?>
						<?php /* $prenom = $resultat["prenom"];*/?>
					<?php endif; ?>
				</ul>
			</nav>
		</header>
		<main >
		<main class="landing-page">
			<div class="lp-title">
				<h1>Page contact</h1>
			</div>
			<div class="lp-wrap">
				<form>
					<div class="A">
						<h1>Formulaire de contact</h1>
						<p>N'hesiter pas à nous laissez un mail. Notre service Client vous contactera dès que possible.</p>
						<small><b style="text-decoration: underline;">Note</b>: Ce formulaire ne sera pas utiliser pour les reclamations. Nous n'accepterons aucune reclamation fait par ce moyen. Sauf pour des <b>*cas de force majeurs*</b> tels que (<i>Mot de passe oublier, difficulter de connection, ...</i>)</small>
					</div>
					<div class="Cinfo">
						
						<div class="champ">
							<h3>Nom</h3>
							<input type="text" id="Cname" name="Cname" autofocus="autofocus" placeholder="votre nom" required="required">
						</div>
						
						<div class="champ">
							<h3>Prenom</h3>
							<input type="text" id="Csurname" name="Csurname" placeholder="votre prenom" required="required">
						</div>
					</div>

					<div class="Cinfo">
						
						<div class="champ">
							<h3>Email</h3>
							<input type="text" id="Cname" name="Cname" placeholder="votre email" required="required">
						</div>
						
						<div class="champ">
							<h3>Tel</h3>
							<input type="text" id="Csurname" name="Csurname" placeholder="votre numero de telephone" required="required">
						</div>
					</div>

					<h3>Faite nous connaitre le motif de votre inquiétude</h3>
					<div class="Ctext">
						<textarea id="Ctext">Laisser nous un mot ...</textarea>
					</div>

					<div class="Ctext">
						<input type="checkbox" name="ok" id="ok">
						<label>J'accepte avoir lue et compris votre <a href="#">politique de confidentialité</a>.</label>
					</div>

					<div class="valide">
						<input class="btn" type="reset" value="tout effacer">
						<input class="btn" type="submit" value="Envoyer">
					</div>
				</form>
			</div>
		</main>

		<footer id="footer">
			<div class="con-footer">
				<ul class="box-1">
						<li><a href="#">Menu</a></li>
						<li><a href="">FAQ</a></li>
						<li><a href="">confidentialité</a>
						</li>
						<li><a href="">metions legales</a></li>
					<li class="minimenu">
						<a href=""><i class="fas fa-phone"></i>  +XX XXX XXX XXX</a>
					</li>
				</ul>
				<hr>
				<div class="box-2">
					<div class="box-2-a"> 
						<p>Copyright 2021 Q's Complaint - Toutes reproductions interdites</p>
					</div>
					<div class="box-2-b">
						<div class="b-2-p0">
							<a href= mailto:"contact@Qscomplaint.com"><i class="fas fa-envelope"></i></a>
						</div>
						<div class="b-2-p1">
							<a href="#"><i class="fab fa-facebook"></i></a>
						</div>
						<div class="b-2-p2">
							<a href="#"> <i class="fab fa-instagram"></i></a>
						</div>
						<div class="b-2-p3">
							<a href="#"> <i class="fab fa-linkedin-in"></i></a>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>