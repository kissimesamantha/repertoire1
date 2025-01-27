<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" href="itineraire/css/style.css" />
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script src="itineraire/js/script.js"></script>
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
		});
</script>
<!--//end-smoth-scrolling-->
</head>
<body   onload="initialize()" style="background-color: #F5F5F5 ;">



<div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-mg">
        <div class="modal-content">
            
            <div class="modal-body">
                
                <center><p>Votre requête a bien été enregistrée</p></center>
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
					<li> <a href="../index.php" >Accueil</a></li>
					<li> <a href="index.php" class="active">Logements</a></li>
					<li> <a href="guide/index.php">Guide</a></li>

					<li> <a href="../contact.php">Contact</a></li>
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
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo.png" style="height: 80px ; width: 80px ;" alt="" class="img-circle" ></a>
			</div>
			<div class="clearfix"> </div>	
        </div>			
	  <div class="clearfix"> </div>	
    </div>
    <!-- filtre-->

 <div class="row" style=" border-radius: 10px ; height: 500px ;margin-top: 50px ; margin-left: 50px ; margin-right: 50px ; background-color:beige;">
     <center style="margin-top: 15px ; margin-bottom: 15px"> <h2>Chambre</h2></center>
        <section class="col-md-4 col-sm-4 col-xs-10">
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
                            <img src="cha1.jpg"  class="img-responsive" style="height: 300px ; width: 100%  ; " alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img src="cha2.jpg" class="img-responsive" style="height: 300px ; width: 100% ; " alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <div class="item">
                            <img src="cha3.jpg" class="img-responsive" style="height: 300px ; width: 100%  ; " alt="...">
                            <div class="carousel-caption">

                            </div>
                        </div>

                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Précédent</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Suivant</span>
                    </a>
                    </div>
                    <ul class="list-group list-group-flush">
            <li class="list-group-item">Lieu : Chapelle-Obili</li>
            <li class="list-group-item">Prix :28 000 Francs CFA</li>
            <li class="list-group-item"><button type="button" class="bouton-contact" data-toggle="modal" data-target=".bs-example-modal">Contacter l'agence</button </li>
        </ul>
                 
              </center>                            
            </section>

            <section class="col-md-8 col-sm-8 col-xs-10">
                <p>
                   <h3>
                       Chambre moderne à louer
                   </h3> 
                </p><br>
                <p><br>
                    <h3>
                       Caractéristiques :
                   </h3><br>

                    <h4>
                     30 m2 , Espace cuisine , Douche , Penderie
                   </h4>
                </p><br>
                <p>
                    
                </p><br>
                <p>
                    <a href="">Video en ligne</a>
                </p><br>

            </section>


        
        
    </div>

 </div>
<center><div id="map_canvas" style="margin-bottom: 50px ;"></div></center>

    
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