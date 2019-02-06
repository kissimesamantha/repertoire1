<!DOCTYPE html>
<html lang="fr">
<head>
    <style>
        /* Aspect des checkboxes */
        /* :before sert à créer la case à cocher */
        [type="checkbox"]:not(:checked) + label:before,
        [type="checkbox"]:checked + label:before {
            content: '';
            position: absolute;
            left:0; top: 2px;
            width: 17px; height: 17px; /* dim. de la case */
            border: 1px solid #aaa;
            background: #f8f8f8;
            border-radius: 3px; /* angles arrondis */
            box-shadow: inset 0 1px 3px rgba(0,0,0,.3) /* légère ombre interne */
        }

        /* Aspect général de la coche */
        [type="checkbox"]:not(:checked) + label:after,
        [type="checkbox"]:checked + label:after {
            content: '✔';
            position: absolute;
            top: 0; left: 4px;
            font-size: 14px;
            color: #09ad7e;
            transition: all .2s; /* on prévoit une animation */
        }
        /* Aspect si "pas cochée" */
        [type="checkbox"]:not(:checked) + label:after {
            opacity: 0; /* coche invisible */
            transform: scale(0); /* mise à l'échelle à 0 */
        }
        /* Aspect si "cochée" */
        [type="checkbox"]:checked + label:after {
            opacity: 1; /* coche opaque */
            transform: scale(1); /* mise à l'échelle 1:1 */
        }
        /* aspect désactivée */
        [type="checkbox"]:disabled:not(:checked) + label:before,
        [type="checkbox"]:disabled:checked + label:before {
            box-shadow: none;
            border-color: #bbb;
            background-color: #ddd;
        }
        /* styles de la coche (si cochée/désactivée) */
        [type="checkbox"]:disabled:checked + label:after {
            color: #999;
        }
        /* on style aussi le label quand désactivé */
        [type="checkbox"]:disabled + label {
            color: #aaa;
        }

        /* aspect au focus de l'élément */
        [type="checkbox"]:checked:focus + label:before,
        [type="checkbox"]:not(:checked):focus + label:before {
            border: 1px dotted blue;
        }
        .form-style-5 input[type="text"]:focus,
        .form-style-5 input[type="date"]:focus,
        .form-style-5 input[type="datetime"]:focus,
        .form-style-5 input[type="email"]:focus,
        .form-style-5 input[type="number"]:focus,
        .form-style-5 input[type="search"]:focus,
        .form-style-5 input[type="time"]:focus,
        .form-style-5 input[type="url"]:focus,
        .form-style-5 textarea:focus,
        .form-style-5 select:focus{
            background: #d2d9dd;
        }
        .form-style-5 select {
            -webkit-appearance: menulist-button;
            height: 35px;
        }

    </style>
<title>EAFI</title>
<link href="assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="assets/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="assets/font-awesome/css/font-awesome.css" type="text/css" rel="stylesheet" media="all">

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Immobilier,Guide Immobilier, Consiel,Location,Vente" />
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


		});
</script>
<!--//end-smoth-scrolling-->
</head>
<body style="background-color: #F5F5F5 ;">



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
	<div class="headder" style="position: fixed; width: 100%; z-index: 2000;">		
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
					<li style ="font-size: .9em;"> <a href="../index.php" >Accueil</a></li>
                    <li style ="font-size: .9em;"> <a href="index.php" class="active">Appartements</a></li>
                    <li style ="font-size: .9em;"> <a href="index.php">Terrains</a></li>
					<li style ="font-size: .9em;"> <a href="../guide/index.php">Guide</a></li>
					<li style ="font-size: .9em;"> <a href="../contact.php">Contact</a></li>
                    <li>
                        <div class="dropdown">
                            <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa  fa-user fa-2x" aria-hidden="true"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" >
                                <li><a href="../deposition/auth.php">Vendre ou louer un logement</a></li>
                                <li><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal">Deconnexion</button></li>
                                <li> <button type="button" class="btn btn-info"><a href="../inscription/index.php">S'incrire</a></button></li>
                            </ul>
                        </div>
                    </li>
                </ul>
			</div>	
		</nav>
		<div class="heading-right">
			<div class="logo">
				<a class="navbar-brand" href="index.php"><img src="assets/log1.jpg" style="height: 80px ; width: 80px ;" alt="" class="img-circle" ></a>
			</div>
			<div class="clearfix"> </div>	
        </div>			
	  <div class="clearfix"> </div>	
    </div>
    <!-- filtre-->

 <div class="row" style=" border-radius: 10px ; height: 250px ;margin-top: 50px ; margin-left: 50px ; margin-right: 50px ; background-color: #FFF8DC;">
     <center style="margin-top: 15px ;"> <h3>Recherchez votre Appartement en utilisant plusieurs filtres </h3></center>
     <form method="post" action="../info/valid.php">
        <section class="col-md-6 col-sm-6 col-xs-10">
                 <div class="form-group" style="margin-top: 10px ; margin-bottom: 10px ;">
                     <div class="row" style="margin-bottom: 10px ; margin-top: 40px ;">
                        <div class=" col-md-3" >
                            <div class="form-group" style="display: inline-block; ">
                                <label for="louer" style="display: block; margin-bottom: 8px;">Louer</label>
                                <input type="radio" name="type" value="louer" id="louer" checked="checked" style="font-family: Georgia, Times New Roman, Times, serif;
                                background: rgba(255,255,255,.1);
                                border: none;
                                border-radius: 4px;
                                font-size: 16px;
                                margin: 0;
                                outline: 0;
                                padding: 7px;
                                width: 100%;
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                background-color: #e8eeef;
                                color:#8a97a0;
                                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                margin-bottom: 30px;"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <p><label for="achat" style="display: block; margin-bottom: 8px;">Acheter</label></p>
                                <input type="radio" name="type" value="achat" id="achat" style="font-family: Georgia, Times New Roman, Times, serif;
                                background: rgba(255,255,255,.1);
                                border: none;
                                border-radius: 4px;
                                font-size: 16px;
                                margin: 0;
                                outline: 0;
                                padding: 7px;
                                width: 100%;
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                background-color: #e8eeef;
                                color:#8a97a0;
                                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                margin-bottom: 30px;"/>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <p><label for="non" style="display: block; margin-bottom: 8px;">Quartier</label></p>
                        </div>
                        <div class="col-md-2">
                             <div class="form-group">
                                <select name="nature" id="nature" style="border-radius: 10px ;font-family: Georgia, Times New Roman, Times, serif;
                                        background: rgba(255,255,255,.1);
                                        border: none;
                                        border-radius: 4px;
                                        font-size: 16px;
                                        margin: 0;
                                        outline: 0;
                                        padding: 7px;
                                        width: 200%;
                                        box-sizing: border-box;
                                        -webkit-box-sizing: border-box;
                                        -moz-box-sizing: border-box;
                                        background-color: #e8eeef;
                                        color:#8a97a0;
                                        -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                        box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                        margin-bottom: 30px;"">
                                 <option value=""></option>
                                 <option value="obili">OBILI</option>
                                 <option value="biyemassi">BIYEMASSI</option>
                                 <option value="cradat">CRADAT</option>
                                 <option value="bonas">BONAS</option>
                                 <option value="mokolo">MOKOLO</option>
                                 <option value="tsinga">TSINGA</option>
                                 <option value="bastos">BASTOS</option>
                                 <option value="messassi">MESSASSI</option>
                                 <option value="emana">EMANA</option>
                                 <option value="nsam">NSAM</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                         <div class=" col-md-2" >
                             <p><label for="budgetmin" style="display: block; margin-bottom: 8px;">Budget min</label></p>
                         </div>
                         <div class="col-md-4">
                            <input type="number" name="budgetmin" value="budgetmin" id="budgetmin" style="border-radius: 10px ; font-family: Georgia, Times New Roman, Times, serif;
                                   background: rgba(255,255,255,.1);
                                   border: none;
                                   border-radius: 4px;
                                   font-size: 16px;
                                   margin: 0;
                                   outline: 0;
                                   padding: 7px;
                                   width: 100%;
                                   box-sizing: border-box;
                                   -webkit-box-sizing: border-box;
                                   -moz-box-sizing: border-box;
                                   background-color: #e8eeef;
                                   color:#8a97a0;
                                   -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                   box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                   margin-bottom: 30px;""/>
                         </div>

                         <div class=" col-md-2" >
                            <p><label for="budgetmax" style="display: block; margin-bottom: 8px;">Budget max</label></p>
                         </div>
                         <div class="col-md-4">
                            <input type="number" name="budgetmax" value="budgetmax" id="budgetmax" style="border-radius: 10px ;font-family: Georgia, Times New Roman, Times, serif;
                                   background: rgba(255,255,255,.1);
                                   border: none;
                                   border-radius: 4px;
                                   font-size: 16px;
                                   margin: 0;
                                   outline: 0;
                                   padding: 7px;
                                   width: 100%;
                                   box-sizing: border-box;
                                   -webkit-box-sizing: border-box;
                                   -moz-box-sizing: border-box;
                                   background-color: #e8eeef;
                                   color:#8a97a0;
                                   -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                   box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                   margin-bottom: 30px;""/>
                         </div>
                    </div>
        </section>

        <section class="col-md-6 col-sm-6 col-xs-10">
            <div class="form-group" style="margin-top: 10px ; margin-bottom: 10px ;">
                <div class="row" style="margin-bottom: 10px ; margin-top: 40px ;">

                    <div class="col-md-1">
                        <p><label for="non" style="display: block; margin-bottom: 8px;">Type</label></p>
                    </div>
                    <div class="col-md-2"style="margin-right: 100px ;">
                        <div class="form-group">
                            <select name="nature" id="nature" style="border-radius: 10px ; font-family: Georgia, Times New Roman, Times, serif;
                                    background: rgba(255,255,255,.1);
                                    border: none;
                                    border-radius: 4px;
                                    font-size: 16px;
                                    margin: 0;
                                    outline: 0;
                                    padding: 7px;
                                    width: 200%;
                                    box-sizing: border-box;
                                    -webkit-box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    background-color: #e8eeef;
                                    color:#8a97a0;
                                    -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                    box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                    margin-bottom: 30px;"">
                                <option value=""></option>
                                <option value="chambre">Chambre</option>
                                <option value="chambremoderne">Chambre moderne</option>
                                <option value="studio">Studio</option>
                                <option value="studiomoderne">Studio Moderne</option>
                                <option value="appartement" style="border-radius: 10px ;">Appartement</option>
                                <option value="villa">Villa</option>
                                <option value="immeuble">Immeuble</option>
                                <option value="bureau">Bureau</option>
                                <option value="entrepot">Entrpôt</option>
                                <option value="duplex">Duplex</option>
                                <option value="triplex">Triplex</option>
                            </select>
                        </div>
                    </div>

                    <div class=" col-md-2" >
                        <div class="form-group">
                            <p><label for="louer" style="display: block; margin-bottom: 8px;">Avec parking</label></p>
                            <input type="checkbox" name="meuble" value="meuble" id="meuble" checked="checked" style="font-family: Georgia, Times New Roman, Times, serif;
                                background: rgba(255,255,255,.1);
                                border: none;
                                border-radius: 4px;
                                font-size: 16px;
                                margin: 0;
                                outline: 0;
                                padding: 7px;
                                width: 100%;
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                background-color: #e8eeef;
                                color:#8a97a0;
                                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                margin-bottom: 30px;"/>
                        </div>
                    </div>
                    <div class=" col-md-2" >
                        <div class="form-group">
                            <p><label for="louer" style="display: block; margin-bottom: 8px;">Avec vidéo</label></p>
                            <input type="checkbox" name="video" value="video" id="video" checked="checked" style="font-family: Georgia, Times New Roman, Times, serif;
                                background: rgba(255,255,255,.1);
                                border: none;
                                border-radius: 4px;
                                font-size: 16px;
                                margin: 0;
                                outline: 0;
                                padding: 7px;
                                width: 100%;
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                background-color: #e8eeef;
                                color:#8a97a0;
                                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                margin-bottom: 30px;"/>
                        </div>
                    </div>
                    <div class=" col-md-2" >
                        <div class="form-group">
                            <p><label for="louer" style="display: block; margin-bottom: 8px;">Meublé</label></p>
                            <input type="checkbox" name="meuble" value="meuble" id="meuble" checked="checked" style="font-family: Georgia, Times New Roman, Times, serif;
                                background: rgba(255,255,255,.1);
                                border: none;
                                border-radius: 4px;
                                font-size: 16px;
                                margin: 0;
                                outline: 0;
                                padding: 7px;
                                width: 100%;
                                box-sizing: border-box;
                                -webkit-box-sizing: border-box;
                                -moz-box-sizing: border-box;
                                background-color: #e8eeef;
                                color:#8a97a0;
                                -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
                                margin-bottom: 30px;"/>

                        </div>
                     </div>
                    <div class="row" style="margin-bottom: 10px ; margin-top: 40px ;">
                        <div col-md-4 style="margin-top: 20px ;">
                            <a href="../info/valid.php"><input  class="btn btn-primary" type="submit" value="Rechercher"  /></a>
                        </div>
                    </div>

                </div>
            </div>

        </section>
     </form>
 </div>
</div>
    <!--//banner-->
    





<div class="row" style=" margin-left: 50px ; margin-right: 50px ; margin-top: 50px ;">

<div class="col-xs-6 col-md-4">
        <div style="height: 50px ; background-color: #FFFFFF; margin-bottom: 10px; padding-top: 10px; " class="card-block">
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
                        <img src="../appartement_m/appartm1.jpg"  class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">
                                    
                        </div>
                    </div>


                    <div class="item">
                        <img src="../appartement_m/appartm2.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>


                    <div class="item">
                        <img src="../appartement_m/appartm3.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="../appartement_m/appartm4.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="../appartement_m/appartm5.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="../appartement_m/appartm6.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="../appartement_m/appartm7.jpg" class="img-responsive" style="height: 250px ; width: 400px  ; " alt="...">
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
            <li class="list-group-item" style="text-align: center;  ">Lieu : </li>
           <!-- <li class="list-group-item">Prix :80 000 Francs CFA</li>-->
            <li class="list-group-item" style="text-align: center;"><button class="btn btn-link" >Plus d'informations</button> </li>
        </ul>
    </div>










    <div class="col-xs-6 col-md-4">
        <div style="height: 50px ; background-color: #FFFFFF; margin-bottom: 10px; padding-top: 10px;" class="card-block">
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
                        <img src="../appartement_nm/appartnm1.jpg" class="img-responsive" style="height: 250px ; width: 400px ;   " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>


                    <div class="item">
                        <img src="../appartement_nm/appartnm2.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>


                    <div class="item">
                        <img src="../appartement_nm/appartnm4.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="../appartement_nm/appartnm5.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption">

                        </div>
                    </div>

                    <div class="item">
                        <img src="../appartement_nm/appartnm6.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
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
            <li class="list-group-item" style="text-align: center;">Lieu :</li>
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
                        <img src="../terrains/terrain1.jpg" class="img-responsive" style="height: 250px ; width: 400px ;   " alt="...">
                        <div class="carousel-caption"></div>
                    </div>


                    <div class="item">
                        <img src="../terrains/terrain2.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption"></div>
                    </div>


                    <div class="item">
                        <img src="../terrains/terrain3.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
                        <div class="carousel-caption"></div>
                    </div>

                     <div class="item">
                        <img src="../terrains/terrain4.jpg" class="img-responsive" style="height: 250px ; width: 400px ; " alt="...">
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












</div>	<!--/services-->
	<div class="mid-section">
	    <div class="container">
		     <div class="mid-top">
		        <h3>Nous sommes à votre service</h3>
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