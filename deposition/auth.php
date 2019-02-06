<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
if (!empty($_POST['mail']) ) {
    $mail = htmlspecialchars($_POST['mail']);

    $req = $bdd->prepare('SELECT id_proprietaire FROM proprietaire WHERE email = :pseudo');
    $req->execute(array(
        'pseudo' => $mail) );

    $resultat = $req->fetch();

        if (!$resultat) {
            $erreur = "Vous n'êtes pas autorisé à effectuer une déposition Vous devez être inscris en tant que propriétaire";
        }

        else{
            $succes ="Vous avez bien été inscit en tant que propriétaire de logement";
            header('Location: index.php');}

    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>EAFI</title>
<link href="assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="assets/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="assets/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet" media="all">

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Immobilier,Guide Immobilier, Consiel,Location,Vente,Achat" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //Custom Theme files -->

<!-- js -->
<script src="assets/js/jquery-1.11.1.min.js"></script>



    <!-- //js -->
	
<!-- start-smoth-scrolling-->
<script type="text/javascript" src="assests/js/move-top.js"></script>
<script type="text/javascript" src="assets/js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smoth-scrolling-->
</head>
<body>

<!--banner-->
<div class="banner">
	<!--headder-->
	<div class="headder">		
		<nav class="navbar navbar-default">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"> </span>
					<span class="icon-bar"> </span>
					<span class="icon-bar"> </span>
				</button>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li> <a href="../index.php" >Accueil</a></li>
					<li> <a href="../logements/index.php">Logements</a></li>
					<li> <a href="../guide/index.php">Guide</a></li>

					<li> <a href="../contact.php">Contact</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="active" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa  fa-user fa-2x" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" >
                                <li> <a href="auth.php">Vendre ou louer un logement</a></li>
                                <li><button type="button" class="btn btn-link" data-toggle="modal" data-target=".bs-example-modal">Deconnexion</button></li>
                            </ul>
                        </div>
                    </li>


                </ul>
			</div>	
		</nav>
		<div class="heading-right">
			<div class="logo">
				<a class="navbar-brand" href="index.php"><img class="img-circle" src="assets/images/logo.png" style="width: 80px ; height: 80px ;" alt="" ></a>
			</div>
			<div class="clearfix"> </div>	
        </div>			
	  <div class="clearfix"> </div>	
    </div>

<form method="post" action="">
    <div class="contentform">
        <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
        <div class="form-group">
            <p>Entrez votre E-mail</p>
            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
            <input type="email" name="mail" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
            <div class="validation"></div>
        </div>
        <?php
        if(isset ($erreur)) {
            echo '<center><font color="red"> <b>' . $erreur . '</b> </font></center>';
        }
        elseif (isset ($succes)) {
            echo '<center><font color="green"> <b>' . $succes . '</b> </font></center>';
        }
        ?>
        <button type="submit" class="bouton-contact">Terminer</button>
    </div>

</form>



</div>
	<!--services-->
	<div class="services">
		<!-- container -->
		<div class="container">
		   <h4>Nos Services</h4>
			<div class="serve-grids">
				<div class="serve-grids-top">
				    <div class="col-md-3 service-box">
						<figure class="icon">
						 <i class="glyphicon glyphicon-map-marker"> </i>
						</figure>
						<h5>Localisation</h5>
						<p>Nous permettons à l'utilisateur de géolocaliser le logement en question.</p>
					</div>
					<div class="col-md-3 service-box">
						<figure class="icon">
						  <i class="glyphicon glyphicon-modal-window"> </i>
						</figure>
						<h5>Tracabilité</h5>
						<p>Nous permettons à l'utilisateur de savoir quel chemin qu'il faut emprunter pour se rendre sur le lieu en question.</p>
					</div>
					<div class="col-md-3 service-box">
						<figure class="icon">
						 <i class="glyphicon glyphicon-tent"> </i>
						</figure>
						<h5>Description du lieu</h5>
						<p>Nous vous donnons une description du logement en question et ainsi que les activités aux alentours.</p>
					</div>
					<div class="col-md-3 service-box">
						<figure class="icon">
						 <i class="glyphicon glyphicon-asterisk"> </i>
						</figure>
						<h5>Visite guité en ligne</h5>
						<p>Nous voulons avant tout que le logement choisit répondre à vos critères, pour cela nous vous proposons une visite guidée en ligne.</p>
					</div>
				  <div class="clearfix"> </div>
			</div>
		</div>
		<!-- //container -->
	</div>
</div>
	<!--/services-->
	<div class="mid-section">
	    <div class="container">
		     <div class="mid-top">
		        <h3>Nous sommes à votre service</h3>
				<p>Notre objectif premier n'est pas seulement de vos proposer un logement qui répond à vos critères mais qui sied à vos attendes.</p>
		     </div>
		</div>
	</div>
	
	<div class="footer">
		<div class="container">
			<div class="rights-wthree">
				<p>© EAFI (Easy And Fast Immovable) 2017</p>
			</div>
		</div>
	</div>
		<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"> </script>
<div class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" id="vtf">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">.col-md-4</div>
                        <div class="col-md-4 col-md-offset-4">.col-md-4 .col-md-offset-4</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3">.col-md-3 .col-md-offset-3</div>
                        <div class="col-md-2 col-md-offset-4">.col-md-2 .col-md-offset-4</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            Level 1: .col-sm-9
                            <div class="row">
                                <div class="col-xs-8 col-sm-6">
                                    Level 2: .col-xs-8 .col-sm-6
                                </div>
                                <div class="col-xs-4 col-sm-6">
                                    Level 2: .col-xs-4 .col-sm-6
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>