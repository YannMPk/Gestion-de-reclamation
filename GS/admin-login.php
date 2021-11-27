 <?php 
	$erreur=null;
	if(!empty($_POST['Sce']) && !empty($_POST['ID']) && !empty($_POST['email']) && !empty($_POST['mdp'])){
		$IDpost	= htmlspecialchars($_POST['ID']);
		$emailpost = htmlspecialchars($_POST['email']);
		$passwpost = htmlspecialchars($_POST['mdp']);

		require_once('functions.php');

		$resultat = select_admin($IDpost);
		if ($emailpost == $resultat["email"]) {

			if (password_verify($passwpost, $resultat["mdp"])) {
				is_connected();

				$_SESSION["nom"] = $resultat["Nom"];
				$_SESSION["prenom"] = $resultat["Prenom"];
				$_SESSION['email'] = $resultat["email"];
				$_SESSION['idClt'] = $resultat["Id"];

				if ((int)$resultat['Id'] == 3) {
					header('location:control-dashboard.php?'.$_SESSION["nom"]." ".$_SESSION['prenom']);
				} else{
					header('location:admin-dashboard.php?'.$_SESSION["nom"]." ".$_SESSION['prenom']);
				}
				
				/*$rememberMe = $_POST['remberMe'];
				if (!empty($rememberMe)) {
					setcookie('user');
				}*/
			} else {
				header('location:#?message="mot depasse incorrect"');
			}
		}
		else{
			header('location:#?message="Email  incorrect"');
		}
	}
 ?>
 <?php 
 	if($erreur){
 		echo "ID incorrect";
 	}
  ?>
<?php
	$title="Connexion";
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
			background-image: url("siteimg/loglog.jpg");
			background-size: 100%;
		}

		header{
			position: fixed;
			background-color: rgba(248, 248, 255, 0.9);
			z-index: 100;
			width: 100%;
		}
		.navbar{
			padding: 0;
			/*margin-bottom: 62px;*/
			margin: 0;
			text-decoration: none;
			list-style-type: none;
			box-sizing: border-box;
		}

		nav{
			/*background-color: rgba(255,255,255, 0.1);*/
			height: 62px;
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
			font-size: 17px;
			text-transform: capitalize;
			text-decoration: none;
			padding: 7px 13px;
			border-radius: 3px;
		}

		.active{
			background-color: black;
			border-radius: 100px;
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
			margin-top: 20px;
			margin-right: 40px;
			cursor: pointer;
			display: none;
		}

		#check{
			display: none;
		}

		/*For connection page*/

		#div-con-cust{
			width: 100%;
			height: 100%;
			padding-top: 61px;
			position: relative;
			/*top-bottom: 64px;*/
			overflow: hidden;
			background-color: rgba(0, 0, 0, 0.4);
			background-size: 100%;
		}

		.container{
			height: 100%;
			color: /*lightgrey*/ black;
			position: relative;
			float: right;
			margin-top: 30px;
			margin-right: 15%;
			padding: 0 2%;
			margin-bottom: 50px;
			width: 400px;
			background-color: rgba(248, 248, 255, 0.9);
			box-shadow: 4px 4px 10px black;
			border-radius: 10px;
			display: flex;
			flex-direction: column;
			flex-wrap: wrap;
			justify-content: space-around;

			position: relative;
			-webkit-animation-name: passage;
			-webkit-animation-duration: 5s;
			-webkit-animation-timing-function: linear;
			-webkit-animation-delay: 0s;
			-webkit-animation-iteration-count: 1;
			-webkit-animation-direction: alternate;
			
			animation-name: passage;
			animation-duration: 5s;
			animation-timing-function: linear;
			animation-delay: 0s;
			animation-iteration-count: 1;
			animation-direction: alternate;
		}

		@-webkit-keyframes  passage{
			0%{right: 500px;}
			50%{right: 25px;}
			100%{right: 0px}
		}

		 .con-box-1 h1{
		 	text-align: center;
		 	font-size: 30px;
		 	color: #FFA400;
		 }
		form h2{
			font-size: 14px;
			margin: 0 0 15px 0;
			text-align: left;
		}

		.whoami{
			margin: 20px auto;
		}

		.input-div{
			display: flex;
			flex-direction: column;
			margin: 0 0 15px 0;
			padding:0;
			border-bottom: 2px solid #FFA400;
		}
		.champ{
			display: grid;
			grid-template-columns: 10fr 89fr;
			justify-content: space-between;
		}

		.champ label{
			align-self: center;
		}

		.champ input{
			height: 50px;
			font-size: 15px;
			background: none;
			border: none;
			outline: none;
		}

		.con-box-2 div a{
			color: #333;
			text-decoration: none;
			margin-bottom: 30px;
			padding: 20px;
			text-align: right;
		}
		.con-box-2 div a:hover{
			color: #FFA400;
		}

		.forgotten-link{
			font-size: 12px;
			text-align: right;
		}

		/*.remember-me{
			font-size: 10px;
			color: #333;
		}*/

		.btn{
			margin: 15px;
			padding: 10px;
			font-size: 12px;
			background-color: black;
			color: #FFA400;
			outline: none;
			border-radius: 20px;
			border: none;
			background-color: black; 
		}

		.btn:hover{
			background-color: #FFA400;
			color: black;
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

		/*footer new version*/

		footer{
			background-color: rgba(0, 0, 0, 0.9);
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
			color: black;
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
					<li><a href="contact.php">nous contater</a></li>
					<li><a class="active" href="login.php"><i class="las la-arrow"></i>Client</a></li>
				</ul>
			</nav>
		</header>
		<section id="div-con-cust">
			<div class="container">
				<div class="con-box-1">
					<h1>Admin Login</h1>
				</div>
				<div class="con-box-2">
					<form method="POST" action="">
						<?php if (!empty($_GET['message'])): ?>
							<div class="error_message">
								<p><?= $_GET['message']; ?></p>
							</div>
						<?php endif ?>
						<div class="whoami">
							<h3>De quel service etes vous ?</h3>
							<input type="radio" id="Sce" name="Sce" value="1"> <label>Technique</label>
							<input type="radio" id="Sce" name="Sce" value="2"> <label>Facturation</label>
							<input type="radio" id="Sce" name="Sce" value="3"> <label>Controle</label>
							<!--<select>
								<optgroup label="−−− Veuillez préciser votre Service −−−">
									<option>Service Technique</option>
									<option>Service de Facturation</option>
									<option>Service de Control des traitements</option>
								</optgroup>
							</select>-->
						</div>
						<h2 style="font-size: 28px; text-align: center; text-decoration: underline; margin: 20px auto; color: #FFA400;">Authentification</h2>
						<h2>ID</h2>
						<div class="input-div">
							<div class="champ">
									<label for="ID"><i class="fas fa-user-alt"></i></i></label>
									<input type="text" id="ID" name="ID" placeholder="Identifiant" autofocus="autofocus">
							</div>
						</div>
						<h2>Email</h2>
						<div class="input-div">
							<div class="champ">
								<label for="email"><i class="fas fa-envelope"></i></label>
								<input type="email" id="email" name="email" placeholder="email">
							</div>
						</div>	
						<h2>Mot de passe</h2>
						<div class="input-div">
							<div class="champ">
								<label for="mdp" ><i class="fas fa-key"></i></i></label>
								<input type="password" id="mdp" name="mdp" placeholder="mot de passe">
							</div>
						</div>	
						<div class="forgotten-link"><a href="#" class="forgotten-link">Mot de passe oublier?</a></div>
						<div class="">
							<input type="checkbox"  id="rememberMe" name="rememberMe" value="1">
							<label style="font-size: 12px;">Rester connecté</label>
						</div>	
						<center><input class="btn" type="submit" value="se connecter"></center>
					</form>
				</div>
			</div>
		</section>
		<footer id="footer">
			<div class="con-footer">
				<ul class="box-1">
						<li><a href="#">Menu</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="">confidentialité</a>
						</li>
						<li><a href="termofuse.php">metions legales</a></li>
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