<?php
/*
 * Nom de fichier : espace_clients.php
 * Description : Fichier PHP contenant la structure et le script JQuery de l'espace perso
 * Auteur(s) : Maxence DELATTRE
*/

?>

<div id="espace_perso">
	<?php include('sous_menu.php'); ?>
	<div id="container">
		<div id="slider">
			<ul>
				<li><?php include("client.php"); ?></li>
				<li><?php include("planning.php"); ?></li>
				<li><?php include('infos_prat.php'); ?></li>
			</ul>
		</div>

		<div id="navigation">
			<div id="buttons">
				<button id="left"><img src="/images/left.png" alt="gauche"></button>
				<button id="right"><img src="/images/right.png" alt="droite"></button>
			</div>	
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			var slider      = $('#slider ul'), // contient la liste des différents slides
			  	slide       = slider.children('li'), // contient tous les différents slides
				slide_width = slide.width(), // Largueur de slide
				btn_left    = $('#navigation').find('#left'), // .find : Get the descendants of each element in the current set of matched elements
				btn_right   = $('#navigation').find('#right'),
				compteur    = 0,
				i           = 0;
			
			$('#container').css("height",0.73*$(window).height());


			$(window).resize(function() {
				$('#container').css("height",0.73*$(window).height());
				slide_width = slide.width();

				$('#sous_menu li:first-child()').children(".cercle").css("opacity","1");
				$('#sous_menu li:first-child()').children("a").css("color","rgb(255,255,255)");

				$("#sous_menu li a").each(function() { // Pour chaque item
					if($(this).attr("href") == item_sous_menu) { // On cherche à sélectionner le dernier qui a été cliqué avant
						$(this).parent().children(".cercle").css("opacity","0");
						$(this).css("color","rgb(200,200,200)");
					}
				});

				item_sous_menu = "#clients"; // On sauvegarde ensuite l'id du nouvel item cliqué

				var indice = 0; // On recupère l'index du bouton cliqué
				slider.animate({marginLeft : slide_width * (-indice)},1000,'easeInOutQuad'); // L'animation de l'image se fait de la droite vers la gauche

				compteur = indice;
			});

			/*** MENU ***/

			// Effets lors du clic
			var currentDot = $('#sous_menu ul li').index(); // On récupère l'index du bouton (premier bouton) en cours (actuellement sélectionné)

			var item_sous_menu = "#clients";

			$("#sous_menu li").each(function() { // Pour chaque item
				if($(this).children('a').attr("href") == item_sous_menu) { // On cherche à sélectionner le dernier qui a été cliqué avant
					$(this).children(".cercle").css("opacity","1");
					$(this).children('a').css("color","rgb(255,255,255)");
				}
			});

			$(document).on("click","#sous_menu li", function() { // Au clic sur un item du menu de l'espace clients
				if($(this).children('a').attr('href') != item_sous_menu) {
					$(this).children(".cercle").css("opacity","1");
					$(this).children("a").css("color","rgb(255,255,255)");

					$("#sous_menu li a").each(function() { // Pour chaque item
						if($(this).attr("href") == item_sous_menu) { // On cherche à sélectionner le dernier qui a été cliqué avant
							$(this).parent().children(".cercle").css("opacity","0");
							$(this).css("color","rgb(200,200,200)");
						}
					});

					item_sous_menu = $(this).children("a").attr("href"); // On sauvegarde ensuite l'id du nouvel item cliqué

					var indice = $(this).index(); // On recupère l'index du bouton cliqué
					slider.animate({marginLeft : slide_width * (-indice)},1000,'easeInOutQuad'); // L'animation de l'image se fait de la droite vers la gauche

					compteur = indice;
				}
				else {
					$(this).children(".cercle").css("opacity","1");
					$(this).children("a").css("color","rgb(255,255,255)");
				}

				$('html, body').animate({scrollTop:$('#espace_clients').offset().top - (0.115*$(window).height())},1000);
				return false;
			});

			$(document).on("mouseover","#sous_menu li", function() { // Au clic sur un item du menu de l'espace clients
				$(this).children(".cercle").css("opacity","1");
				$(this).children("a").css("color","rgb(255,255,255)");
			});

			$(document).on("mouseout","#sous_menu li", function() { // Au clic sur un item du menu de l'espace clients
				if($(this).children("a").attr("href") != item_sous_menu) {
					$(this).children(".cercle").css("opacity","0");
					$(this).children("a").css("color","rgb(200,200,200)");
				}
			});

			/*** NAVIGATION AVEC LES FLECHES ***/

			btn_right.click(function() {
				if(compteur < slide.length -1){
				 	compteur++;
					slider.animate({
						marginLeft : slide_width * (-compteur)
					},1000,'easeInOutQuad');

					$("#sous_menu li").each(function() {
						if($(this).children('a').attr("href") == item_sous_menu) {
							$(this).children(".cercle").css("opacity","0");
							$(this).children("a").css("color","rgb(200,200,200)");
							$(this).next().children(".cercle").css("opacity","1");
							$(this).next().children("a").css("color","rgb(255,255,255)");
							item_sous_menu = $(this).next().children('a').attr('href');
							return false;
						}
					});
				}
			}); 

			btn_left.click(function() {
				if(compteur > 0) {
				 	compteur--;
					slider.animate({
						marginLeft : '+=' + slide_width
					},1000,'easeInOutQuad');

					$("#sous_menu li").each(function() {
						if($(this).children('a').attr("href") == item_sous_menu) {
							$(this).children(".cercle").css("opacity","0");
							$(this).children("a").css("color","rgb(200,200,200)");
							$(this).prev().children(".cercle").css("opacity","1");
							$(this).prev().children("a").css("color","rgb(255,255,255)");
							item_sous_menu = $(this).prev().children('a').attr('href');
							return false;
						}
					});
				}
			});
		});
	</script>
</div>