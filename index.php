<?php
//ligne pour Test francis
/*
 * Nom de fichier : index.php
 * Description : Fichier PHP contenant la structure principal du site
 * Auteur(s) : Justine MEURIOT
*/

session_start();

// error_reporting(E_ALL);
// ini_set('display_errors', 'On');
// ini_set('display_startup_errors', 'On');

header("Content-Type: text/html; charset=utf-8");
ob_start("ob_gzhandler");

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="icon" type="image/png" href="images/icon.png" />
        <title>Auto-école Circuit 2000</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	<script src="js/jquery.min.js"></script>
		
		<script>
			$( document ).ready(function() {
				
				//alert($(window).height());
				
				var win = $(window);
				var winHeight = $(window).height();
				
				if (win.width() >= 100) {
					$("#menuNorm").addClass("hidden");
					$("#menuTel").removeClass("hidden");
					$("div[id=connexion] > div").addClass("hidden");
					$("div[id=connexion] > img").removeClass("hidden");
				}
				
				if (win.width() >= 480) {
					$("div[id=connexion] > img").addClass("hidden");
					$("div[id=connexion] > div").removeClass("hidden");
				}
				
				if (win.width() >= 768) { 
					$("#menuTel").addClass("hidden");
					$("#menuNorm").removeClass("hidden");
				}
				
				
					
				$("article").css("min-height",winHeight);
				
				// Permet de cacher et afficher le corps
				// Selon le bouton cliqué
				$(".navigateur").on('click', function(){
					cacherCorps();
					switch($(this).attr('class')){
						case 'navigateur btnMenu1':
							//$("#nos_services").removeClass("hidden");
						break;
						case 'navigateur btnMenu2':
							//$("#l_auto_ecole").removeClass("hidden");
						break;
						case 'navigateur btnMenu3':
							//$("#nos_bureaux").removeClass("hidden");
						break;
						case 'navigateur btnMenu4':
							//$("#faq").removeClass("hidden");
						break;
						case 'navigateur btnMenu6':
							//$("#contact").removeClass("hidden");
						break;
					}
				});
			
				$("#menuTel > p ,#menuTel > ul").on('click', function(){
					$("#menuTel > ul").toggleClass("hidden");
				});
				
				$("#iconeConnexion").on('click', function(){
					cacherCorps();
					$("#connexionTel").removeClass("hidden");
				});
				
				$(".mdp_oublie").on('click', function(){
					cacherCorps();
					$("#espace_clients").removeClass("hidden");
				});
				
				if(<?php echo((isset($_SESSION['connecte']) && $_SESSION['connecte']) ? 1 : 0);  ?>) {
					$("#zoneCo").hide();
					$("#iconeConnexion").hide();
					$("#connexion").append('<div><img class="imgMenuCo" id="deco" src="images/logos/power_2.png"/></div>');
					$("#connexion").append('<a id="lienAccueil" href="templates/accueil.php"><img class="imgMenuCo" src="images/logos/accueil.png"/></a>');
				}
			
			});
			
			$( window ).on('resize', function(){
				var win = $(this);
				if (win.width() >= 100) {
					$("#menuNorm").addClass("hidden");
					$("#menuTel").removeClass("hidden");
					$("div[id=connexion] > div[id='zoneCo']").addClass("hidden");
					$("div[id=connexion] > img[id='iconeConnexion']").removeClass("hidden");
				}
				
				if (win.width() >= 480) {
					$("div[id=connexion] > img[id='iconeConnexion']").addClass("hidden");
					$("div[id=connexion] > div").removeClass("hidden");
				}
				
				if (win.width() >= 768) { 
					$("#menuTel").addClass("hidden");
					$("#menuNorm").removeClass("hidden");
				}
			});
			
			/*function cacherCorps() {
				$("#connexionTel ,#nos_services ,#l_auto_ecole ,#nos_bureaux ,#faq ,#contact, #espace_clients").addClass("hidden");
			}*/
			
			function cacherLi() {
				$(".navigateur").addClass("hidden");
			}
                        
                        function afficherEspaceClients() { // Affiche l'espace client correspondant à l'utilisateur connecté
                                
				$.ajax({
					type:'POST',
					url:'./templates/recup_data.php',
					data:{action:"getEspacePerso",login:$("#identifiant").val(),password:$("#passe").val()},
					success:function(result, textStatus, jqXHR) {
						if(result.search('problem:') != -1) {
							
							alert(result.substring(8,result.length));
							
                                                        
						}
						else { // Si pas d'erreurs
                                                        document.location.href="../templates/accueil.php";
                                                        //$("#connexion").html("Bienvenue");
						}
					},
			        error : function(resultat, statut, erreur) {
			            console.log('Erreur AJAX sur le chargement de l\'espace clients');
			        }
				});

			}
                        
		
		</script>
    </head>
    <body>
        <div class="header-container">
            <?php include('templates/menu.html'); ?>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
				<article id="connexionTel" class="hidden">
					<div>
						<p>Identifiant : <a class="lienInscription" href="">(Inscription)</a></p>
						<input class="champForm" id="identifiant" type="text"/>
						<p>Mot de passe : <img class="mdp_oublie" src="images/ask.png"/></p>
						<input class="champForm" id="passe" type="password"/></br>
						<input id="butConnexion" type="button" value="Se connecter"/>
					</div>
				</article>
				<article id="nos_services">
					<div id="bloc1">
						<div id="aac" class="prestations blocH" onclick="">
							<a href="/prestations/aac.html">
								<img id="img_aac" src="images/logo_conduite_accompagnee.png">
								<span>Conduite accompagnée</span>
							</a>
						</div><div id="moto" class="prestations blocH">
							<a href="/prestations/moto.html">
								<img id="img_moto" src="images/logo_moto.png">
								<span>Moto</span>
							</a>
						</div><div id="forfait" class="prestations blocH">
							<a href="/prestations/forfait.html">
								<img id="img_forfait" src="images/logo_conduite_accompagnee.png">
								<span>Forfait</span>
							</a>
						</div>
					</div>
					<div id="bloc2">
						<div id="permis_am" class="prestations blocB">
							<a href="/prestations/permis_am.html">
								<img id="img_permis_am" src="images/logo_permis_am.png">
								<span>Permis AM</span>
							</a>
						</div><div id="retrait" class="prestations blocB">
							<a href="/prestations/retrait.html">
								<img id="img_retrait" src="images/logo_retrait.png">
								<span>Retrait</span>
							</a>
						</div>
					</div>
				</article>
				<article id="l_auto_ecole" class="">
					 <center>
						<div class="historique">
							<h1>L'auto-école</h1>
							<div class="texte">L’auto école Circuit 2000 est un établissement de formation à la conduite, à la moto et au scooter implanté sur <em>Lens</em> depuis plus de 30 ans et depuis 2014 sur <em>Loison sous Lens au 1 Rue du 11 Novembre</em> en face de la grande place de la Mairie et sur <em>Lievin au 2 Rue Jean Baptiste Defernez</em> au rond point de la piscine.</br></br>
							L'auto-école Circuit 2000 souhaite satisfaire un maximum sa clientèle en leur offrant un service sur mesure et en répondant le plus efficacement aux attentes de nos clients.</br></br>
							Notre but : vous donnez toutes les capacités pour réussir votre examen au permis le plus facilement et le plus rapidement possible.</br></br>
							N'hésitez pas à nous contacter ou à passer directement dans nos bureaux de <em>Lens, Lievin ou Loison</em> pour plus d'informations.</br></br>
							A très bientôt sur les routes,</br></br>
							<div class="center">L'école de conduite Circuit 2000.</br>
							<img src="images/CIRCUIT_2000.png">
							</div>
							</div>
						</div>
						<div id="reseaux_sociaux">
							<a id="facebook" href="https://fr-fr.facebook.com/pages/Circuit-2000/376830679070353" target="blank"><img class="logoRS" src="images/logos/facebook.png"/></a>
							<a id="twitter" href="https://twitter.com/circuit2000" target="blank"><img class="logoRS" src="images/logos/twitter.png"/></a>
							<a id="instagram" href="https://instagram.com/circuit2000" target="blank"><img class="logoRS" src="images/logos/instagram.png"/></a>
						</div>
					</center>
				</article>
				<article id="nos_bureaux" class="">
					<center>
						<div id="lievin">
							<h1>Liévin</h1>
							<p class="texte_bureau">
							2 Rue Jean Baptiste Defernez</br>
							62800 Liévin</br>
							Tél: 03 21 42 10 59
							</p>
							<a href="https://www.google.com/maps/place/2+Rue+Jean+Baptiste+Defernez+62800+Liévin/" target="blank"><img class="carte" id="carte_lievin"src="images/bureau_lievin.png"/></a>
						</div>
						<div class="separator"></div>
						<div id="lens">
							<h1>Lens</h1>
							<p class="texte_bureau">
							143 Rue Léon Blum </br>
							62300 Lens</br>
							Tél: 03 21 42 10 59
							</p>
							<a href="https://www.google.com/maps/place/143+Rue+Léon+Blum++62300+Lens/" target="blank"><img class="carte" id="carte_lens"src="images/bureau_lens.png"/></a>

						</div>
						<div class="separator"></div>
						<div id="loison">
							<h1>Loison-sous-lens</h1>
							<p class="texte_bureau">
							1 rue du 11 novembre </br>
							62218 Loison-sous-lens</br>
							Tél: 03 21 42 10 59
							</p>
							<a href="https://www.google.com/maps/place/1+rue+du+11+novembre++62218+Loison-sous-lens/" target="blank"><img class="carte" id="carte_loison"src="images/bureau_loison.png"/></a>

						</div>
					</center>
				</article>
				<article id="faq" class="">
					<div class="historique">
						<h1>Foire aux questions</h1>
						<p class="texte">Question n°1 : </br>
							Réponse n°1 : </br></br>
							Question n°2 : </br>
							Réponse n°2 : </br></br>
							Question n°3 : </br>
							Réponse n°3 : </br></br>
							Question n°4 : </br>
							Réponse n°4 : </br></br>
							Question n°5 : </br>
							Réponse n°5 : </br></br>
							Question n°6 : </br>
							Réponse n°6 : </br></br>
						</p>
					</div> 
				</article>
				<article id="contact" class="">
					<div id="formulaire_contact">
						<h1 id='titre_contact'>Vous souhaitez nous rencontrer ?</h1>
						<label class='label_contact'>Nom : </label>
						<input id="contact_nom" type="text" /><br/>	
						<label class='label_contact'>Prénom : </label>
						<input id="contact_prenom" type="text" /><br/>	
						<label class='label_contact'>Adresse e-mail : </label>
						<input id="contact_e_mail" type="text" /><br/>		
						<label class='label_contact'>Objet : </label>
						<input id="contact_objet" type="text" /><br/>
						<label class='label_contact'>Votre demande :</label>
						<textarea id="textarea_contact"></textarea><br/>
						<input id="submit_contact" type="button" value="Envoyer"/>
						<div id="msgErrorContact"></div>
					</div>
				</article>
            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
        </div>

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        
        <script type="text/javascript">
			function downloadJSAtOnload() {
				var element = document.createElement("script");
				var element1 = document.createElement("script");
				element.src = "js/script.js";
				document.body.appendChild(element);
				element1.src = "js/jquery-ui.min.js";
				document.body.appendChild(element1);
			}

			if (window.addEventListener)
				window.addEventListener("load", downloadJSAtOnload, false);
			else if (window.attachEvent)
				window.attachEvent("onload", downloadJSAtOnload);
			else window.onload = downloadJSAtOnload;
		</script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>-->
    </body>
</html>
