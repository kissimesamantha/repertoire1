<!DOCTYPE html>
<html lang="en">
<head>
<title>EAFI</title>
    <link href="assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="assets/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="style1.css" type="text/css" rel="stylesheet" media="all">
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
					<li> <a href="index.php" >Accueil</a></li>
                    <li> <a href="logements/index.php">Appartements</a></li>
                    <li> <a href="terrains/index.php">Terrains</a></li>
					<li> <a href="guide/index.php">Guide</a></li>
					<li> <a href="contact.php" class="active"">Contact</a></li>
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
				<a class="navbar-brand" href="index.php"><img class="img-circle" src="assets/images/log1.jpg" style="width: 80px ; height: 80px" alt="" ></a>
			</div>
			<div class="clearfix"> </div>	
        </div>			
	  <div class="clearfix"> </div>	
    </div> 					
		<!--//header-->

</div>
	<!--//banner-->
<div class="contact c-grid">
	<div class="container">	
        <section id="contact" class="contact">
            <div class="overlay sections">
                <div class="container">
                    <div class="row">
                        <div class="contact-wrapper">

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="contact-area">

                                    <h4>Message</h4>
                                    <form>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nom*">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Prenom*">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Sujet*">
                                        </div>

                                        <div class="form-group">
                                            <textarea rows="9" class="form-control" placeholder="Message"></textarea>
                                        </div>
                                        <a type="submit" class="btn btn-default">Envoyer</a>

                                    </form>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="contact-details-area">

                                    <div class="contact-details">
                                        <h4>Adresse</h4>
                                        <p>Yaonde_Cameroun</p>
                                    </div>

                                    <div class="contact-details">
                                        <h4>Telephone</h4>
                                        <p>+237 656243855</p>
                                        <p>+237 698357996</p>
                                    </div>

                                    <div class="contact-details">
                                        <h4>Web</h4>
                                        <p>Yahoo Mail : eafi_2017@yahoo.fr </br> Gmail : eafi_2017@gmail.com </p>
                                    </div>

                                </div>
                            </div>

                        </div>	
                    </div>
                </div>
            </div>       
        </section>
	</div>
</div>
    <div class="footer">
		<div class="container">
			<div class="rights-wthree">
				<p>� EAFI (Easy And Fast Immovable) 2017</p>
			</div>
		</div>
	</div>
</body>
</html>