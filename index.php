<?php
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
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
        $req = $bdd->prepare('SELECT id_proprietaire FROM propriétaire WHERE email = :pseudo AND motdepasse = :pass');
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

        }



    }
    else {
        session_start();
        $_SESSION['id'] = $resultat['id_utilisateur'];
        $_SESSION['mail'] = $mail;
        $succes = "Vous êtes connectés en tant que utilisateur";

    }
}
else {
    $erreur = "tous les champs doivent etres remplis";

    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>EAFI</title>
<link href="assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="assets/style.css" type="text/css" rel="stylesheet" media="all">
<link href="style1.css" type="text/css" rel="stylesheet" media="all">
<link href="assets/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet" media="all">
<link rel="icon" type="image/png" href="favicon.png" />

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
            
            var posparent = $('.headder').offset();
                posparent.top = 0;
                $('.headder').offset(posparent);

                 $('#bt1').click(function(){
                             $('#bac1').css('border', '2px dashed black');
                             });

                $('#bt2').click(function(){
                             $('#bac1').css('background-color', '#FF3300');
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
                <form class="form-horizontal" method="post" action="">
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
                <a class="btn btn-link" href="inscription/index.php">Je ne me suis pas encore inscris</a>
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


	<div class="headder" style="position: fixed; z-index: 10000; width:100%; margin-bottom: 100px;">		
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
					<li> <a href="index.php" class="active">Accueil</a></li>
					<li> <a href="logements/index.php">Appartements</a></li>
                    <li> <a href="terrains/index.php">Terrains</a></li>	
                    <li> <a href="guide/index.php">Guide</a></li>
					<li> <a href="contact.php" >Contact</a></li>
                    <li>


                        <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa  fa-user fa-2x" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" >
                                <li><a href="deposition/auth.php">Vendre ou louer un logement</a></li>
                                <li><button type="button" class="btn btn-link" data-toggle="modal" data-target=".bs-example-modal">Connexion</button></li>
                                <li><a href="inscription/index.php">S'incrire</a></li>
                            </ul>
                        </div>


                    </li>
                </ul>
			</div>	
		</nav>
		<div class="heading-right">
			<div class="logo">
				<a class="navbar-brand" href="index.php"><img class="img-circle" src="assets/images/log1.jpg" style="width: 80px ; height: 80px ;"  alt="" ></a>
			</div>
			<div class="clearfix"></div>
        </div>			
	  <!--<div class="clearfix"></div>-->
    </div>




    <h1 style = "margin-top: 90px;">N' hésitez plus, réalisez votre rêve!!!</h1>


    <div class="container home-searchWidget">
        <div class="SearchWidget">


           <!-- <form method="post" action="/classifieds/" id="searchbox">-->
                <div class="SearchWidget-tabsContainer js-searchWidget-tabsContainer">

                    <div  id="search-widget-tabs" class="SearchWidget-tabs" style="margin-left: 265px; width: 350px; margin-bottom: 10px;">


                        <div class="SearchWidget-tab" style="width: 150px; margin-left: 45px">
                            <input type="radio"  class="SearchWidget-tab-radio active" value="louer" name="type" id="buy-button" checked="checked"  >
                            <label class="SearchWidget-tab-label" for="buy-button">
                            <button  id="bt1"> Location </button>
                            </label>
                        </div>


                        <div class="SearchWidget-tab" style="width: 150px;">
                            <input type="radio" class="SearchWidget-tab-radio" value="acheter" name="type" id="rent-button" checked="checked" >
                            <label class="SearchWidget-tab-label" for="rent-button">
                            <button id="bt2"> Achat </button>
                            </label>
                         </div>


                    </div>

        
		            <div class="SearchWidget-tabBody" id="bac1" style="display: block; background-color: #F5F5F5; width: 393px; height: 250px; margin-left: 270px; border-radius: 5px 5px 5px 5px;">
                        <input id="attribute-option" name="attribute_option" value="offer_type:rent" data-storage="attribute-option" type="hidden">
                            
                            <div class="row SearchWidget-fulltext">


                                <span class="twitter-typeahead" style="position: relative; display: inline-block; border-radius: 5px 5px 5px 5px; direction: ltr; margin-bottom:20px;">
						           <!-- <input id="searchbar" class="SearchWidget-fulltext-input tt-input clearable clear-close" placeholder="Où souhaitez-vous habiter?" style="position: relative; vertical-align: top;" dir="auto" type="text">-->
                                    <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: optimizelegibility; text-transform: none;"></pre>
                                    <span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
                                        <div class="tt-dataset-regions"></div>
                                        <div class="tt-dataset-cities"></div>
                                        <div class="tt-dataset-areas"></div>
                                    </span>
                                </span>
                                         

                                <div class="selectkit SearchWidget-selectWrapper" style="margin-bottom: 200px"; id="sk-category">


                                    <div class="dropdown-menu open" role="combobox">


                                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">


                                            <li data-original-index="1" class="selected">
                                                <a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true">
                                                    <span class="text">Appartement</span>
                                                    <span class="md md- check-mark"></span>
                                                </a>
                                            </li>


                                            <li data-original-index="2">
                                                <a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">
                                                    <span class="text">Maison</span>
                                                    <span class="md md- check-mark"></span>
                                                </a>
                                            </li>


                                            <li data-original-index="3">
                                                <a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">
                                                    <span class="text">Studio</span>
                                                    <span class="md md- check-mark"></span>
                                                </a>
                                            </li>


                                            <li data-original-index="4">
                                                <a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false">
                                                    <span class="text">Chambre</span>
                                                    <span class="md md- check-mark"></span>
                                                </a>
                                            </li>


                                        </ul>
                                    </div>   
                                    
                                     <select data-width="100%" title="log" name="log" type="select" class="" tabindex="-98" style="border-radius: 5px 5px 5px 5px;">
                                        <option value="none">Appartements meublé</option>
                                        <option value="studio">Appartements non meublé </option>
                                        <!--<option value="appartement">Appartement</option>
                                        <option value="maison">Maison</option>
                                        <option value="bureau">Bureau</option>
                                        <option value="duplex">Duplex</option>
                                        <option value="triplex">Triplex</option>
                                        <option value="villa">Villa</option>
                                        <option value="entrepot">Entrepot</option>-->
                                     </select>
                                     
                                     <span class="hpLineText hpSearchSentenceAfter"></span>


                                       <!-- <div class="hpLine" style="">
                                            <div data-field="locations" class="searchLocationContainer form-group"><span class="naturalLanguageText"></span>
                                                <div class="bootstrap-tagsinput"><span class="twitter-typeahead isfocused" style="position: relative; display: inline-block;">
                                                    <input size="1" class="tt-hint" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1;	background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%;" readonly="" autocomplete="off" spellcheck="false" tabindex="-1" dir="ltr" type="text">
                                                </div>
                                            </div>
                                        </div> -->


                                       <!--<input id="maximum-price" placeholder="Prix maximum" style="margin-left: 266px; border-radius: 5px 5px 5px 5px; display: inline-block; margin-bottom: 0px; clear: both; width: 100px;" class="SearchWidget-maxPrice clearable clear-close" value="" autocomplete="off" data-storage="range-price" data-clearable="" type="text">-->
                                       <input name="q" value="" type="hidden">
                                       <div style="height: 40px;"></div>
                                       <button class="SearchWidget-submit" style="margin-left: 205px; type="submit" id="btnSubmitSearch"><span class="icon-search"></span> Rechercher</button>
                                     
                                    </div>

                                                 
                                   
                                    

                                </div>

                            </div>
                            
                    </div>
                </div>

            <!--</form>-->





        </div>
		
	
</div>




<div class="row" style="margin-left: 50px ; margin-right: 50px ; margin-top: 50px ;">





    <div class="col-xs-6 col-md-4">
        <div style="height: 50px ; background-color: #FFFFFF; margin-bottom: 10px; padding-top: 10px;" class="card-block">
            <center> <h3 class="card-title">Appartements meublé</h3> </center>
        </div>

        <center>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">


                    <div class="item active">
                        <img src="appartement_m/appartm1.jpg"  class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">
                                    
                        </div>
                    </div>


                    <div class="item">
                        <img src="appartement_m/appartm2.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>


                    <div class="item">
                        <img src="appartement_m/appartm3.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="appartement_m/appartm4.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="appartement_m/appartm5.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="appartement_m/appartm6.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="appartement_m/appartm7.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    


                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </center>

        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="text-align: center;  ">Lieu :</li>
           <!-- <li class="list-group-item">Prix :80 000 Francs CFA</li>-->
            <li class="list-group-item" style="text-align: center;"><button class="btn btn-link" >Plus d'informations</button> </li>
        </ul>
    </div>






    <div class="col-xs-6 col-md-4">
        <div style="height: 50px; background-color: #FFFFFF; margin-bottom: 10px; padding-top: 10px;" class="card-block">
            <center> <h3 class="card-title">Appartements non meublé</h3> </center>
        </div>
        <center>
            <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">


                    <div class="item active">
                        <img src="appartement_nm/appartnm1.jpg" class="img-responsive" style="height: 250px ; width: 400px ;   " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>


                    <div class="item">
                        <img src="appartement_nm/appartnm2.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>


                    <div class="item">
                        <img src="appartement_nm/appartnm4.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="appartement_nm/appartnm5.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="appartement_nm/appartnm6.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>



                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </center>

        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="text-align: center;">Lieu : Melen</li>
           <!-- <li class="list-group-item">Prix :30 000 Francs CFA</li>-->
            <li class="list-group-item" style="text-align: center;"><button class="btn btn-link">Plus d'informations</button> </li>
        </ul>
    </div>







    <div class="col-xs-6 col-md-4">
        <div style="height: 50px; background-color: #FFFFFF; margin-bottom: 10px; padding-top: 10px;" class="card-block">
            <center> <h3 class="card-title">Terrains</h3> </center>
        </div>
        <center>
            <div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">


                    <div class="item active">
                        <img src="terrains/terrain1.jpg" class="img-responsive" style="height: 250px ; width: 400px ;   " alt="...">
                        <div class="carousel-caption"></div>
                    </div>


                    <div class="item">
                        <img src="terrains/terrain2.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption"></div>
                    </div>


                    <div class="item">
                        <img src="terrains/terrain3.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption"></div>
                    </div>

                     <div class="item">
                        <img src="terrains/terrain4.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption"></div>
                    </div>



                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </center>

        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="text-align: center;">Lieu : Cradat</li>
<!--<li class="list-group-item">Prix :45 000 Francs CFA</li>-->
            <li class="list-group-item" style="text-align: center;"><button class="btn btn-link">Plus d'informations</button> </li>
        </ul>
    </div>





</div>
	
	<!--propo-->
	
	<!--/propo-->

	<!--Guide-->

     <!--//guide-->
	<!--services-->
	<div class="services" style="margin-top: 100px;">
		<!-- container -->
		<div class="container">
		   <h4 style="border-radius: 5px 5px 5px 5px; width: 250px; margin-left: 345px; font-size: 1.5em; padding:10px 10px 10px 10px; background-color: #FFA500">NOS SERVICES</h4>
			<div class="serve-grids">
				<div class="serve-grids-top">


				    <div class="col-md-3 service-box" style="">
						<figure class="icon">
						 <i class="glyphicon glyphicon-map-marker"> </i>
						</figure>
						<h5>Lotissement et Aménagement</h5>
					<!--	<p>Nous vous permettons de géolocaliser le logement en question.</p>-->
					</div>


					<div class="col-md-3 service-box" style="margin-left: 120px;">
						<figure class="icon">
						  <i class="glyphicon glyphicon-modal-window"> </i>
						</figure>
						<h5>Réalisation</h5>
						<!--<p>Nous vous donnons le chemin à emprunter pour se rendre sur le lieu en question.</p>-->
					</div>


				<!--	<div class="col-md-3 service-box">
						<figure class="icon">
						 <i class="glyphicon glyphicon-tent"> </i>
						</figure>
						<h5>Description du lieu</h5>
						<p>Nous vous donnons une description du logement en question, ainsi que les activités aux alentours.</p>
					</div>-->


					<div class="col-md-3 service-box" style="margin-left: 105px;">
						<figure class="icon">
						 <i class="glyphicon glyphicon-asterisk"> </i>
						</figure>
						<h5>Etudes et Plans de Construction</h5>
                 <!--	<p>Nous voulons avant tout que le logement choisit répondre à vos critères, pour cela nous vous proposons une visite guidée en ligne.</p>-->
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
		        <h3 >Nous sommes à votre service</h3>
				<p>Notre objectif premier n'est pas seulement de vous proposer un logement qui répond à vos critères, mais celui qui sied à vos attendes.</p>
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
                        <div class="col-sm-9">Level 1: .col-sm-9
                            <div class="row">
                                <div class="col-xs-8 col-sm-6"> Level 2: .col-xs-8 .col-sm-6</div>
                                <div class="col-xs-4 col-sm-6"> Level 2: .col-xs-4 .col-sm-6</div>
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