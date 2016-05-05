/*
 * Nom de fichier : script.js
 * Description : Fichier JQuery pour la page principale
 * Auteur(s) : Maxence DELATTRE
*/

$(document).ready(function() {
	$(window).resize(function() { // Lorsque la fenètre est redimensionnée
		$("body").css("padding-top",0.115*$(window).height());
		// On change le padding du haut du body car comme la hauteur de la fenêtre change, 
		// la hauteur du menu change aussi donc le début du corps du texte change également
		$("article").css("height",0.885*$(window).height());
		// Pour chaque article (page du site), on attribue la hauteur de la fenêtre moins la hauteur du menu
		$(".historique").css("height",0.885*$(window).height());
		// Concerne les pages "L'auto-école" et "FAQ"
		// Pour que les divisions de fond de couleur blanche correspondent à la hauteur de la fenêtre

		/*var windowHeight = $(window).height();
		var windowWidth = $(window).width();

		var height = windowHeight/705;
		var width = windowWidth/1366;
		console.log(width + ' ' + height);

		if(height > width)
			$('body').css('font-size',width + "em");
		else if(width > height)
			$('body').css('font-size',height + "em");
		else
			$('body').css('font-size',height + "em");*/
	});

	var item_menu = "#nos_services"; // Contient le href de l'item du menu principal qui a été cliqué en dernier

	$("#menu li").click(function() { // Au clic sur un item du menu principal
		if($(this).children("a").attr("href") != item_menu) { // Si l'item cliqué est différent de celui cliqué précédemment
			$("#menu li a").each(function() { // Pour chaque item
				if($(this).attr("href") == item_menu) { // On cherche à sélectionner le dernier qui a été cliqué avant
					$(this).css("border-bottom-color","transparent"); // On rend sa bordure inférieure transparente
					$(this).css("color","rgb(200,200,200)"); // On rend sa couleur de police un peu moins blanche
				}
			});

			item_menu = $(this).children("a").attr("href"); // On sauvegarde ensuite le href du nouvel item cliqué
		}
		else { // Si l'item cliqué est le même que celui cliqué précédemment
			$(this).children("a").css("border-bottom-color","rgb(255,255,255)"); // On laisse la bordure inférieure apparente
			$(this).children("a").css("color","rgb(255,255,255)"); // On laisse la couleur de police en blanc
		}

		var speed = 1000; // Durée de l'animation (en ms)
		$('html, body').animate({scrollTop:$(item_menu).offset().top - (0.115*$(window).height())},speed);
		return false;
	});

	$("#menu li").mouseover(function() { // Lorsque la souris est au-dessus d'un item du menu principal
		$(this).children("a").css("border-bottom-color","rgb(255,255,255)");
		$(this).children("a").css("color","rgb(255,255,255)");
	});

	$("#menu li").mouseout(function() { // Lorsque la souris quitte un item du menu principal
		if($(this).children("a").attr("href") != item_menu) { // Si on est pas sur le dernier item cliqué
			// Pour laisser les items cliqués blancs avec une bordure tout le temps qu'on aura pas cliqué sur un autre item
			$(this).children("a").css("border-bottom-color","transparent");
			$(this).children("a").css("color","rgb(200,200,200)");
		}
	});

	/*if(window.location.hash) {
		console.log(window.location.hash);
		$("#menu li a").each(function() { // Pour chaque item
			if($(this).attr("href") == window.location.hash) { // On cherche à sélectionner le dernier qui a été cliqué avant
				$(this).css("border-bottom-color","transparent"); // On rend sa bordure inférieure transparente
				$(this).css("color","rgb(200,200,200)"); // On rend sa couleur de police un peu moins blanche

				item_menu = window.location.hash;

				console.log($(this).html());

				var speed = 1000; // Durée de l'animation (en ms)
				$('html, body').animate({scrollTop:$(item_menu).offset().top - (0.115*$(window).height())},0);
				return false;
			}
		});
	}*/

	$('.prestations').click(function() { // Au clic sur l'une des 5 images de la page "Nos services"
		$.ajax({
			type:'GET',
			url:'./prestations/' + $(this).attr('id') + '.html', // On va "chercher" la page correspondant à l'image cliquée
			success:function(result, textStatus, jqXHR) {
				var $html = $.parseHTML(result);
				$("#nos_services").append($html); // On ajoute la page récupérée en AJAX à la fin de la page "Nos services"
				$('#prestation').fadeIn(500); // On fait apparaître cette page
			},
            error : function(resultat, statut, erreur) {
                console.log('Erreur AJAX sur la prestation ' + $(this).attr('id'));
            }
		});
	});

	$(document).on("click", '.home', function() { // Au clic sur l'image de maison présente dans les pages de prestations
		$('#prestation').fadeOut(500,function() { // On fait disparaître la prestation affichée
			$('#prestation').remove(); // Puis, à la fin de l'animation, on l'enlève du DOM
		});
	});

	$(document).on('click','#butConnexion',function() { // Au clic sur le bouton de connexion dans le formulaire d'identification
		afficherEspaceClients();
                document.location.href="../accueil.php";
	});

	$(document).on('keypress','#passe',function(e) { // Sur l'appui d'une touche dans un input du formulaire d'identification
		// Permet de taper sur "Entrée" lorsque l'on se situe dans le champ login ou le champ password
		if(e.which == 13){ // Si cette touche est la touche "Entrée"
			afficherEspaceClients();
                        document.location.href="../accueil.php";
                    }
	});

	$(document).on('click',"#oubliMdp",function() { // Au clic sur le bouton "Mot de passe oublié"
		if($('#login').val() != "") // Si le login n'est pas vide
			$('#new_password input[type="text"]').val($('#login').val());
			// On le met dans l'adresse email à laquelle la réinitialisation de mot de passe sera faite
		$('#new_password').show(); // On affiche la div de réinitialisation de mot de passe
	});

	$(document).on('click','#reinit',function() { // Au clic sur le bouton d'envoi d'email pour la réinitialisation de mot de passe
		if($('#emailReinit').val() != "") { // Si l'email renseigné n'est pas vide
			$.ajax({
				type:'POST',
				url:'templates/data.php',
				data:{action:'reinitMDP',email:$('#emailReinit').val()},
				success:function(result, textStatus, jqXHR) {
					if(result.search('erreur:') != -1) {
						$('#msgErrorConnexion').text(result.substring(7,result.length));
						// On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
						$('#msgErrorConnexion').css('border-color','red');
						$('#msgErrorConnexion').show(); // On affiche le message
						$('#msgErrorConnexion').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
					}
					else { // Si pas d'erreurs
						$('#msgErrorConnexion').text(result);
						// On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
						$('#msgErrorConnexion').css('border-color','green');
						$('#msgErrorConnexion').show(); // On affiche le message
						$('#msgErrorConnexion').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
					}
				},
	            error : function(resultat, statut, erreur) {
	                console.log('Erreur AJAX sur la réinitialisation du mot de passe');
	            }
			});
			$('#new_password').hide(); // On fait disparaître la div de réinitialisation de mot de passe
		}
		else {
			$('#msgErrorConnexion').css('border-color','red');
			$('#msgErrorConnexion').text('Veuillez saisir votre adresse e-mail');
			$('#msgErrorConnexion').show(); // On affiche le message d'erreur
			$('#msgErrorConnexion').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
		}
	});

	$(document).on('click','#submit_contact',function() { // Au clic sur le bouton d'envoi du formulaire de contact
		var condition = true;

		if($('#contact_nom').val() == "") condition = false;
		if($('#contact_prenom').val() == "") condition = false;
		if($('#contact_e_mail').val() == "") condition = false;
		if($('#contact_objet').val() == "") condition = false;
		if($('#textarea_contact').val() == "") condition = false;

		if(condition) {
			$.ajax({
				type:'POST',
				url:'templates/data.php',
				data:{action:'envoyerDemandeContact',nom:$('#contact_nom').val(),prenom:$('#contact_prenom').val(),email:$('#contact_e_mail').val(),objet:$('#contact_objet').val(),message:$('#textarea_contact').val()},
				success:function(result, textStatus, jqXHR) {
					if(result.search('erreur:') != -1) {
						$('#msgErrorContact').text(result.substring(7,result.length));
						// On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
						$('#msgErrorContact').css('border-color','red');
						$('#msgErrorContact').show(); // On affiche le message
						$('#msgErrorContact').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
					}
					else { // Si pas d'erreurs
						$('#msgErrorContact').text(result);
						// On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
						$('#msgErrorContact').css('border-color','green');
						$('#msgErrorContact').show(); // On affiche le message
						$('#msgErrorContact').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
					}
				},
	            error : function(resultat, statut, erreur) {
	                console.log('Erreur AJAX sur l\'envoi du formulaire de contact');
	            }
			});
		}
		else {
			$('#msgErrorContact').text('Veuillez remplir tous les champs');
			$('#msgErrorContact').css('border-color','red');
			$('#msgErrorContact').show(); // On affiche le message d'erreur
			$('#msgErrorContact').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
		}
	});

	$(document).on('click','#identification #image_new_password',function() { // Au clic sur la croix dans la div de réinitialisation de mot de passe
		$('#new_password').hide();
	});

	$(document).on('click','.deco',function() { // Au clic sur le bouton de déconnexion
		$.ajax({
			type:'POST',
			url:'./templates/recup_data.php',
			data:{action:"deconnecter"},
			success:function(result, textStatus, jqXHR) {
				$('#identification').show(); // On réaffiche la page de connexion
				$('#espace_perso').remove();// On retire du DOM l'espace perso
                                $('#menuAdmin').hide();
                                $('#menuClient').hide();
                                $('#menuMoniteur').hide();  
                                $("#connexion").show();
			},
	        error : function(resultat, statut, erreur) {
	            console.log('Erreur AJAX sur le chargement de l\'espace clients');
	        }
		});
	});
});