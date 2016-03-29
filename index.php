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
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="icon" type="image/png" href="images/icon.png" />
		<title>Auto-école Circuit 2000</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/prestations.css">
		<link rel="stylesheet" type="text/css" href="css/slider.css">
		<script src="js/jquery.min.js"></script>
		<!-- <script src="js/jquery-ui.min.js"></script> -->
		<script type="text/javascript">
			$(document).ready(function() {
				if(<?php echo((isset($_SESSION['connecte']) && $_SESSION['connecte']) ? 1 : 0);  ?>) {
					// Si l'utilisateur est déjà connecté et que la page est rechargée pour une raison quelconque
					afficherEspaceClients(); // Alors on affiche directement l'espace clients correspondant en lieu et place du formulaire d'identification
				}
				$("body").css("padding-top",0.115*$(window).height());
				// Le menu à une hauteur de 11.5% selon la hauteur de la fenêtre
				// Il faut donc appliquer un padding en haut du body de 11.5% x la hauteur de la fenêtre
				// Pour que le corps du texte commence en dessous du menu
				$("article").css("height",0.885*$(window).height());
				// On applique donc une hauteur de 100% - 11,5% = 88,5% à la page affichée pour qu'elle couvre la hauteur de la fenêtre pas plus pas moins
				$(".historique").css("height",0.885*$(window).height());
				// On fait la même chose pour les éléments de classe historique (page de présentation de l'auto-école et page de la faq)
                                
			});

			function afficherEspaceClients() { // Affiche l'espace client correspondant à l'utilisateur connecté
				var chaine = "";
                                
                                
                                
				$.ajax({
					type:'POST',
					url:'./templates/recup_data.php',
					data:{action:"getEspacePerso",login:$("#login").val(),password:$("#password").val()},
					success:function(result, textStatus, jqXHR) {
						if(result.search('problem:') != -1) {
							
							$('#msgErrorConnexion').text(result.substring(8,result.length));
							// On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
							$('#msgErrorConnexion').show(); // On affiche le message
							$('#msgErrorConnexion').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
						}
						else { // Si pas d'erreurs
							$('#identification').hide(); // On cache le formulaire d'identification
							$('#espace_clients').append(result); // On affiche l'espace perso
							
						}
					},
			        error : function(resultat, statut, erreur) {
			            console.log('Erreur AJAX sur le chargement de l\'espace clients');
			        }
				});
				
				
				$fonctionUser = <?php echo $_SESSION["admin"]; ?>;
				
                                if($fonctionUser || $fonctionUser==0)
                                {
                                    switch($fonctionUser){
                                        case 0:
                                            $("#menuClient").show();
                                        break;
                                        
                                        case 1:
                                            $("#menuAdmin").show();
                                        break;
                                        
                                        case 2:
                                            $("#menuMoniteur").show();
                                        break;
                                    }
                                }
			}
			
			$(document).on("click","#submit_connexion", function() { // Au clic sur un item du menu de l'espace clients
				//Lors du clic sur le bouton se connecter lance l'affichage Client
				if($("#login").val() && $("#login").val()!= "" && $("#password").val() && $("#password").val() != "") {
					
					afficherEspaceClients(); // on affiche directement l'espace clients correspondant en lieu et place du formulaire d'identification
				}
				
			});
		</script>
	</head>
	<body>
		<!-- <div id="cercle"></div> -->
		<?php include('templates/menu.html'); ?>
		<section>
		<div id="menuAdmin">
                    <p id="gTitre"><a href="templates/modifInfos2.php">Modifier les informations</a></p>
                    <p id="g1"><a href="templates/planing.php">Planning</a></p>
                    <p id="g3"><a href="templates/tempsPause.php">Récapitulatif Temps de Pause</a></p>
                    <p id="g4">Déconnexion</p>
		</div>
                    
                        
                <div id="menuClient">    
                    <p id="gTitre"><a href="templates/modifInfos2.php">Modifier les informations</a></p>
                    <p id="g1"><a href="templates/planing.php">Planning</a></p>
                    <p id="g3"><a href="templates/tempsPause.php">Récapitulatif Temps de Pause</a></p>
                    <p id="g4">Déconnexion</p>
                </div>

                <div id="menuMoniteur">
                    <p id="gTitre"><a href="templates/modifInfos2.php">Modifier les informations</a></p>
                    <p id="g1"><a href="templates/planing.php">Planning</a></p>
                    <p id="g2"><a href="templates/planing.php">Eleve</a></p>
                    <p id="g3"><a href="templates/planing.php">Moniteur</a></p>
                    <p id="g4"><a href="templates/planing.php">Cours</a></p>
                    <p id="g5">Déconnexion</p>
                </div>
			
			
			<article id="nos_services">
				<div class="espace"></div>
				<center>
					<div id="aac" class="prestations">
						<p>Conduite accompagnée</p>
					</div>
					<div class="separator"></div>
					<div id="moto" class="prestations">
						<p>Moto</p>
					</div>
					<div class="separator"></div>
					<div id="forfait" class="prestations">
						<p>Forfait</p>
					</div>
					<div id="permis_am" class="prestations">
						<p>Permis AM</p>
					</div>
					<div class="separator"></div>
					<div id="retrait" class="prestations">
						<p>Retrait</p>
					</div>
				</center>
			</article>
			<article id="l_auto_ecole" >
				 <center>
				 	<div class="historique">
					 	<h1> L'auto-école</h1>
						<p class="texte">L’auto école Circuit 2000 est un établissement de formation à la conduite, à la moto et au scooter implanté sur Lens depuis plus de 30 ans et depuis 2014 sur Loison sous Lens au 1 Rue du 11 Novembre en face de la grande place de la Mairie et sur Lievin au 2 Rue Jean Baptiste Defernez au rond point de la piscine </br></br>
						L'auto-école Circuit 2000 souhaite satisfaire un maximum sa clientèle en leur offrant un service sur mesure et en répondant le plus efficacement aux attentes de nos clients. </br></br>
						Notre but : vous donnez toutes les capacités pour réussir votre examen au permis le plus facilement et le plus rapidement possible.</br></br>
						N'hésitez pas à nous contacter ou à passer directement dans nos bureaux de Lens, Lievin ou Loison pour plus d'informations.</br></br>
						A très bientôt sur les routes,</br></br>
						L'école de conduite Circuit 2000.
						</p>
					</div> 
				</center>
			</article>
			<article id="nos_bureaux">
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
			<article id="faq">
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
			<!--<article id="espace_clients">
				<div id='identification'>
					<div id="div_bonhomme"></div>
					<hr id='soulignement'/></br>
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
					<label></label><input id="login" name="login" type="text" placeholder="Identifiant"/><br/>
					<label></label><input id="password" name="password" type="password" placeholder="Mot de passe"/><br/>
					<input type="hidden" name="action" value="get" />
					<input id="submit_connexion" type="submit" value="Se connecter" />
					<p><span id="oubliMdp">Mot de passe oublié ?</span></p>
					<div id="msgErrorConnexion"></div>
				</div>
			</article>-->
			<article id="contact">
				<div id="formulaire_contact">
					<h1 id='titre_contact'>Vous souhaitez nous rencontrer ?</h1>
					<label class='label_contact'>Nom : </label><input id="contact_nom" type="text" /><br/>	
					<label class='label_contact'>Prénom : </label><input id="contact_prenom" type="text" /><br/>	
					<label class='label_contact'>Adresse e-mail : </label><input id="contact_e_mail" type="text" /><br/>		
					<label class='label_contact'>Objet : </label><input id="contact_objet" type="text" /><br/>
					<label class='label_contact'>Votre demande :</label><textarea id="textarea_contact"></textarea><br/>
					<input id="submit_contact" type="button" value="Envoyer"/>
					<div id="msgErrorContact"></div>
				</div>
			</article>
		</section>
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
	</body>
</html>

<?php

ob_end_flush();

?>