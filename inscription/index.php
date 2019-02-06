<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');

if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['email']) AND !empty($_POST['motdepasse']) AND !empty($_POST['rmotdepasse'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $motdepasse = sha1($_POST['motdepasse']);
    $rmotdepasse = sha1($_POST['rmotdepasse']);
    $activite = 1;
 
        if( $motdepasse == $rmotdepasse ) {

            if (!empty($_POST['statut']) AND $_POST['statut']=='oui') {

                $req = $bdd->prepare('INSERT INTO proprietaire (nom_proprietaire, prenom_proprietaire, tel, email, motdepasse) VALUES(:nom_proprietaire, :prenom_proprietaire, :tel, :email, :motdepasse)');
                    $req->execute(array(
                        'nom_proprietaire' => $nom,
                        'prenom_proprietaire' => $prenom,
                        'tel' => $telephone,
                        'email' => $email,
                        'motdepasse' => $motdepasse
    ));

                $succes ="Vous avez bien été inscit en tant que propriétaire de logement";
                header("Location: ../index.php");}

            elseif (!empty($_POST['statut']) AND $_POST['statut']=='non') {
                $req = $bdd->prepare('INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, telephone, email_u, motdepasse, activite) VALUES(:nom_utilisateur, :prenom_utilisateur, :telephone, :email_u, :motdepasse, :activite)');
                $req->execute(array(
                    'nom_utilisateur' => $nom,
                    'prenom_utilisateur' => $prenom,
                    'telephone' => $telephone,
                    'email_u' => $email,
                    'motdepasse' => $motdepasse,
                    'activite' => $activite
                ));
                $succes= "Vous avez bien été inscit en tant que chercheur de logement";
                header('Location: ../index.php');}
        }
        else {
            $erreur ="Les deux mots de passe doivent être identiques";
        }

}
else {
    $erreur="Tous les champs du formulaire doivent être remplis";
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



<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Connexion</h4></center>

            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Entrez votre Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Entrez votre mot de passe">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Se souvenir de moi
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Connexion</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
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
					<li> <a href="guide/guide.php">Guide</a></li>

					<li> <a href="../contact.php">Contact</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="active" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa  fa-user fa-2x" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" >
                                <li> <a href="../deposition/auth.php">Vendre ou louer un logement</a></li>
                                <li><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal">Connexion</button></li>
                                <li> <a href="index.php">S'incrire</a></li>
                            </ul>
                        </div>
                    </li>


                </ul>
			</div>	
		</nav>
		<div class="heading-right">
			<div class="logo">
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" style="width: 80px ; height: 80px ;" alt="" class="img-circle" ></a>
			</div>
			<div class="clearfix"> </div>	
        </div>			
	  <div class="clearfix"> </div>	
    </div>

<form method="post" action="">
    <h3><center>INSCRIPTION</center></h3>

    <div class="contentform">
        <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>


        <div class="leftcontact">
            <div class="form-group">
                <p>Nom</p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="text" name="nom" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                <div class="validation"></div>

            </div>

            <div class="form-group">
                <p>Numéro de téléphone</p>
                <span class="icon-case"><i class="fa fa-phone"></i></span>
                <input type="number" name="telephone" id="telephone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Numéro de téléphone' doit être renseigné. Exactement 9 chiffres"/>
                <div class="validation"></div>
            </div>


            <div class="form-group">
                <p>Mot de passe</p>
                <span class="icon-case"><i class="fa fa-lock"></i></span>
                <input type="password" name="motdepasse" id="motdepasse" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Mot de passe' doit être renseigné."/>
                <div class="validation"></div>
            </div>

            <div class="form-group">
                <p><label for="oui">Je suis propriétaire de logement</label></p>
                <input type="radio" name="statut" value="oui" id="oui" checked="checked" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné."/>
                <div class="validation"></div>
            </div>



        </div>

        <div class="rightcontact">

            <div class="form-group">
                <p>Prénom</p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="text" name="prenom" id="prenom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
                <div class="validation"></div>
            </div>

            <div class="form-group">
                <p>E-mail</p>
                <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                <div class="validation"></div>
            </div>


            <div class="form-group">
                <p>Saisir à nouveau le mot de passe</p>
                <span class="icon-case"><i class="fa fa-lock"></i></span>
                <input type="password" name="rmotdepasse" id="rmotdepasse" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Saisir à nouveau le mot de passe' doit être renseigné."/>
                <div class="validation"></div>
            </div>

            <div class="form-group">
                <p><label for="non">Je ne suis pas propriétaire de logement</label></p>
                <input type="radio" name="statut" value="non" id="non" checked="checked" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné."/>
                <div class="validation"></div>
            </div>
        </div>
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