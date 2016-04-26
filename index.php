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
				var win = $(window);
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
				
				// Permet de cacher et afficher le corps
				// Selon le bouton cliqué
				$(".navigateur").on('click', function(){
					cacherCorps();
					switch($(this).attr('class')){
						case 'navigateur btnMenu1':
							$("#nos_services").removeClass("hidden");
						break;
						case 'navigateur btnMenu2':
							$("#l_auto_ecole").removeClass("hidden");
						break;
						case 'navigateur btnMenu3':
							$("#nos_bureaux").removeClass("hidden");
						break;
						case 'navigateur btnMenu4':
							$("#faq").removeClass("hidden");
						break;
						case 'navigateur btnMenu6':
							$("#contact").removeClass("hidden");
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
				
				
			
			});
			
			$( window ).on('resize', function(){
				var win = $(this);
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
			});
			
			function cacherCorps() {
				$("#connexionTel ,#nos_services ,#l_auto_ecole ,#nos_bureaux ,#faq ,#contact").addClass("hidden");
			}
			
			function cacherLi() {
				$(".navigateur").addClass("hidden");
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
						<p>Identifiant :</p>
						<input class="champForm" id="identifiant" type="text"/>
						<p>Mot de passe :</p>
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
				
				<article id="l_auto_ecole" class="hidden">
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
					</center>
				</article>
				
				<article id="nos_bureaux" class="hidden">
					<center>
						<div id="lievin">
							<h1>Liévin</h1>
							<p class="texte_bureau">
							2 Rue Jean Baptiste Defernez</br>
							62800 Liévin</br>
							Tél: 03 21 42 10 59
							</p>
							<a href="https://www.google.com/maps/place/2+Rue+Jean+Baptiste+Defernez+62800+Liévin/" target="blank"><div class="carte" id="carte_lievin"></div></a>
						</div>
						<div class="separator"></div>
						<div id="lens">
							<h1>Lens</h1>
							<p class="texte_bureau">
							143 Rue Léon Blum </br>
							62300 Lens</br>
							Tél: 03 21 42 10 59
							</p>
							<a href="https://www.google.com/maps/place/143+Rue+Léon+Blum++62300+Lens/" target="blank"><div class="carte" id="carte_lens"></div></a>

						</div>
						<div class="separator"></div>
						<div id="loison">
							<h1>Loison-sous-lens</h1>
							<p class="texte_bureau">
							1 rue du 11 novembre </br>
							62218 Loison-sous-lens</br>
							Tél: 03 21 42 10 59
							</p>
							<a href="https://www.google.com/maps/place/1+rue+du+11+novembre++62218+Loison-sous-lens/" target="blank"><div class="carte" id="carte_loison"></div></a>

						</div>
					</center>
				</article>
				
				<article id="faq" class="hidden">
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
				
				<article id="espace_clients" class="hidden">
					<div id='identification'>
						<div id="new_password">
							<div>
								<h2>Réinitialisation de mot de passe</h2><div id="image_new_password"></div>
							</div>
							<p>Vous avez oublié votre mot de passe, celui-ci va être réinitialisé.</p>
							<p>Le nouveau mot de passe va être envoyé à l'adresse e-mail suivante : </p>
							<input type="text" id="emailReinit" value="Votre adresse e-mail"/>
							<p>Assurez-vous que cette adresse e-mail est la bonne et cliquez sur "Envoyer un nouveau mot de passe". Il est conseillé de le changer une fois que vous aurez réussi à vous connecter.</p>
							<input type="button" id="reinit" value="Envoyer un nouveau mot de passe" />
						</div>
					</div>
				</article>
				
				<article id="contact" class="hidden">
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
