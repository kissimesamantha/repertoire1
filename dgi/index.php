<?php
$bdd = new PDO('mysql:host=localhost;dbname=pfe', 'root', '');
if (!empty($_POST['mail']) AND !empty($_POST['motdepasse']) ) {
    $mail = htmlspecialchars($_POST['mail']);
    $motdepasse = sha1($_POST['motdepasse']);

    $req = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE email_u = :pseudo AND motdepasse = :pass');
    $req->execute(array(
        'pseudo' => $mail,
        'pass' => $motdepasse));
    $resultat = $req->fetch();

    if (!$resultat)
    {
        $req = $bdd->prepare('SELECT id_proprietaire FROM proprietaire WHERE email = :pseudo AND motdepasse = :pass');
        $req->execute(array(
            'pseudo' => $mail,
            'pass' => $motdepasse));
        $resultat = $req->fetch();

        if (!$resultat) {
            $erreur = "Mail ou mot de passe inconrect";


        }

        else{
            session_start();
            $_SESSION['id'] = $resultat['id_proprietaire'];
            $_SESSION['mail'] = $mail;
            $succes = "Vous êtes connectés en tant que proprio";
            $bien = "true";
        }



    }
    else {
        session_start();
        $_SESSION['id'] = $resultat['id_utilisateur'];
        $_SESSION['mail'] = $mail;
        $succes = "Vous êtes connectés en tant que utilisateur";
        $bien = "true";
    }
}
else {
    $erreur = "tous les champs doivent etres remplis";

}
 function verifSaisie () {
    if (isset ($bien)) {
        echo "true";
    }
    else {
        echo "false";
    }
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
                <form class="form-horizontal" method="post" action="" onsubmit="return <?php verifSaisie() ?>">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="mail" class="form-control" id="inputEmail3" placeholder="Entrez votre Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" name="motdepasse" class="form-control" id="inputPassword3" placeholder="Entrez votre mot de passe">
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
                <a class="btn btn-link" href="../inscription/index.php">Je ne me suis pas encore inscris</a>
            </div>
            <?php
            if(isset ($erreur)) {
                echo '<center><font color="red"> <b>' . $erreur . '</b> </font></center>';
            }
            elseif (isset ($succes)) {
                echo '<center><font color="green"> <b>' . $succes . '</b> </font></center>';
            }
            ?>
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
		<nav class="navbar navbar-default fixed-top">
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
					<li> <a href="../index.php" class="active">Accueil</a></li>
					<li> <a href="../logements/index.php">Logements</a></li>
					<li> <a href="guide/guide.php">Guide</a></li>

					<li> <a href="../contact.php">Contact</a></li>
                    <li>
                        <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa  fa-user fa-2x" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" >
                                <li><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal">Deonnexion</button></li>
                            </ul>
                        </div>
                    </li>


                </ul>
			</div>	
		</nav>
		<div class="heading-right">
			<div class="logo">
				<a class="navbar-brand" href="index.php"><img class="img-circle" src="assets/images/logo.png"  style="height: 80px ; width: 80px ;" alt="" ></a>
			</div>
			<div class="clearfix"> </div>	
        </div>			
	  <div class="clearfix"> </div>	
    </div>
    <div class="row" style="margin-top: 75px ; margin-bottom: 75px ;">
        <h3><center>Liste des propriétaires</center></h3>
        <div class="col-md-2 col-sm-2 col-xs-10" style="margin-top: 75px ;">

        </div>
        <div class="col-md-8 col-sm-8 col-xs-10"  style="background-color: #FAFAD2;">
            <table class="table ">
                <thead class="thead-inverse">
                <tr>
                    <th>Identifiant</th>
                    <th>Noms et Prenoms </th>
                    <th>E-mail</th>
                    <th>Contact</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Jean Pierre</td>
                    <td>jeanp@gmail.com</td>
                    <td>699887755</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Paul Renard</td>
                    <td>p_renard@yahoo.fr</td>
                    <td>693215478</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry Moss</td>
                    <td>lmstar_moss@yahoo.vom</td>
                    <td>665321459</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Olivier Mars</td>
                    <td>marscm-olivier@gmail.com</td>
                    <td>666325419</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Frank Underwood</td>
                    <td>underwood.frank@gmail.com</td>
                    <td>678952135</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>hisk petrov</td>
                    <td>prtovhisk@yahoo.fr</td>
                    <td>224563637</td>
                </tr><tr>
                    <th scope="row">7</th>
                    <td>Frédéric Jean Louis</td>
                    <td>fjl_eafi@gmail.com</td>
                    <td>678523129</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>James Kingsman</td>
                    <td>j-kingsmam@yahoo.fr</td>
                    <td>224972263</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Jean laurent loic</td>
                    <td>jean-ll@gmail.com</td>
                    <td>692356879</td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Yamachui Sitcheu Angelo</td>
                    <td>jovinangelo@yahoofr</td>
                    <td>656243855</td>
                </tr>
                </tbody>
            </table>


        </div>
        <div class="col-md-2 col-sm-2 col-xs-10">

        </div>
    </div>
		<!--//header-->


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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
</html>