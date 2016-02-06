/*
 * Nom de fichier : infos_prat.js
 * Description : Fichier JQuery de la partie "Infos Pratiques" dans l'espace perso
 * Auteur(s) : Maxence DELATTRE
*/

$(document).ready(function() {
	lireConseils(1); // Affiche le fichier de conseils dans un textarea si l'utilisateur est administrateur
	selectFichiers(1); // Sélectionne le nom des fichiers mis à disposition et permet la suppression d'un ou de fichiers si l'utilisateur est administrateur
	lireConseils(2); // Affiche le fichier de conseils dans une div si l'utilisateur est un client de l'auto-école
	selectFichiers(2); // Sélectionne le nom des fichiers et les met à disposition des clients

	$('#envoyerConseils').click(function() { // Au clic sur l'envoi des informations contenues dans le textarea (partie administrateur)
		$.ajax({
			type:'POST',
			url:'templates/data.php',
			data:{action:"setFichierConseils",texte:$('#conseils textarea').val()},
			success:function(result, textStatus, jqXHR) {
				$('#conseils textarea').text(result);
				$('#messageResultat').text('Les conseils et astuces ont bien été enregistrées.');
				$('#messageResultat').css('border-color','green');
				$('#messageResultat').show();
				$('#messageResultat').fadeOut(5000,'easeInExpo');
			},
            error : function(resultat, statut, erreur) {
                console.log('Erreur AJAX sur l\'écriture du fichier de conseils');
            }
		});
	});

	$('#supprimerFichier').click(function() { // Au clic sur le bouton de suppression de fichiers (partie administrateur)
		var nbLi = $('#selectSuppFiles ul li').length; // On recupère le nombre de fichiers actuellement enregistrés sur le serveur
		var i = 0, // Variable d'incrémentation
			res = 1,  // Variable qui va contenir true après la boucle for ci-dessous si tous les fichiers ont été correctement supprimés et false sinon
			compteur = 0; // Variable qui va contenir le nombre de fichiers supprimés

		for(i = 0 ; i < nbLi ; i++) { // On va regarder chaque fichier
			if($('#selectSuppFiles ul li:nth-child(' + (i + 1) + ')').children('input').is(':checked')) {
				// Si le fichier a été coché pour être supprimé
				compteur++; // On incrémente le nombre de fichiers traités
				$.ajax({ // Et on éxécute une requête qui va supprimer le fichier
					type:'POST',
					url:'templates/data.php',
					data:{action:"supprimerFichier",fichier:$('#selectSuppFiles ul li:nth-child(' + (i + 1) + ')').children('input').val()},
					success:function(result, textStatus, jqXHR) {
						res *= 1;
					},
		            error : function(resultat, statut, erreur) {
		                res *= 0;
		            }
				});
			}
		}
		
		$('#messageResultat').css('border-color','red');

		switch(compteur) { // On affiche un message en fonction du nombre de fichiers traités
			case 0 : { // Pas de fichiers sélectionnés
				$('#messageResultat').text('Pas de fichier(s) sélectionné(s)');
			}break;

			case 1 : { // 1 fichier sélectionné
				if(res) { // Tout s'est bien passé
					$('#messageResultat').text('Le fichier a bien été supprimé');
					$('#messageResultat').css('border-color','green');
				}
				else {
		            console.log('Erreur AJAX sur la suppression d\'un fichier');
					$('#messageResultat').text('Une erreur s\'est produite sur la suppression d\'un fichier');
				}
			}break;

			default : { // Plusieurs fichiers supprimés
				if(res) { // Tout s'est bien passé
					$('#messageResultat').text('Les fichiers ont bien été supprimés');
					$('#messageResultat').css('border-color','green');
				}
				else {
		            console.log('Erreur AJAX sur la suppression d\'un fichier ou de fichiers');
					$('#messageResultat').text('Une erreur s\'est produite sur la suppression d\'un ou de plusieurs fichiers');
				}
			}break;
		}
		selectFichiers(1); // On rafraichît la liste des fichiers disponibles
		$('#messageResultat').show();
		$('#messageResultat').fadeOut(5000,'easeInExpo');
		
	});

	$('#clic_verif_exter').click(function() { // Au clic sur la div des vérifications extérieures (partie client)
		$.ajax({
			type:'POST',
			url:'templates/verifications.php',
			data:{verif:"exter"},
			success:function(result, textStatus, jqXHR) {
				$('#slider ul li:nth-child(3)').append(result); // Affichage des vérifications extérieures
				$('#infos_prat').fadeOut(500); // On cache la page des Infos Pratiques
			},
            error : function(resultat, statut, erreur) {
                console.log('Erreur AJAX sur l\'affichage des vérifications extérieures');
            }
		});
	});

	$('#clic_verif_inter').click(function() { // Au clic sur la div des vérifications intérieures (partie client)
		$.ajax({
			type:'POST',
			url:'templates/verifications.php',
			data:{verif:"inter"},
			success:function(result, textStatus, jqXHR) {
				$('#slider ul li:nth-child(3)').append(result); // Affichage des vérifications intérieures
				$('#infos_prat').fadeOut(500); // On cache la page des Infos Pratiques
			},
            error : function(resultat, statut, erreur) {
                console.log('Erreur AJAX sur l\'affichage des vérifications intérieures');
            }
		});
	});

	$(document).on('click','#backEspacePerso',function() { // Au clic sur le bouton de retour des vérifications
		$('#infos_prat').fadeIn(500); // Affichage de la page Infos Pratiques
		$('#verifications').remove(); // On enlève la page de banque de questions de vérifications du DOM
	});
});

function selectFichiers(choix) { // Fonction d'affichage des fichiers disponibles sur le serveur
	$.ajax({
		type:'POST',
		url:'templates/data.php',
		data:{action:"getFichiers"},
		success:function(result, textStatus, jqXHR) {
			result = JSON.parse(result);
			var i = 2;
			if(choix == 1) {
				// On veut la liste des fichiers avec une checkbox à côté pour chaque fichier
				// Cela permet notamment à l'administrateur de supprimer des fichiers
				var chaine = "";
				$('#selectSuppFiles').html("<ul></ul>");
				for(i = 2 ; i < result.length ; i++) {
					chaine = "";
					chaine += '<li><input type="checkbox" value="';
					chaine += result[i];
					chaine += '" /><a class="file ';
					chaine += result[i].substring(result[i].lastIndexOf('.')+1,result[i].length);
					chaine += '" href="fichiers/';
					chaine += result[i] + '">' + result[i];
					chaine += '</a></li>';
					$('#selectSuppFiles ul').append(chaine);
				}			
			}
			else if(choix == 2) {
				// On veut seulement la liste des fichiers
				$('#fichiersDispos').html("<ul></ul>");
				for(i = 2 ; i < result.length ; i++) {
					$('#fichiersDispos ul').append('<li><a class="file ' + result[i].substring(result[i].lastIndexOf('.')+1,result[i].length) + '" href="fichiers/' + result[i] + '">' + result[i] + '</a></li>');
				}				
			}
		},
        error : function(resultat, statut, erreur) {
            console.log('Erreur AJAX sur la prestation sur la lireConseilsture du fichier de conseils');
        }
	});
}

function finUpload(json) { // Fonction qui termine l'upload de fichiers en affichant un message et en rafraichissant la liste des fichiers dispos
	console.log(json);
	var msg = '';
		
	$('#messageResultat').css('border-color','red');
	if(json == 0)
		msg = "Ce format de fichier n'est pas pris en charge !";
	else if(json == 1)
		msg = "Vous n'avez pas selectionné de fichiers !";
	else if(json == -1)
		msg = "Votre fichier est trop lourd !";
	else{
		msg = 'Votre fichier "' + json.name + '" a été uploadé !';
		$('#messageResultat').css('border-color','green');
	}
	$('#messageResultat').text(msg);
	$('#messageResultat').show();
	$('#messageResultat').fadeOut(5000,'easeInExpo');

	selectFichiers(1);

	return true;
}

function lireConseils(choix) { // Fonction d'affichage du fichier de conseils
	$.ajax({
		type:'POST',
		url:'templates/data.php',
		data:{action:"getFichierConseils"},
		success:function(result, textStatus, jqXHR) {
			if(choix == 1) { // Administrateur
				$('#conseils textarea').html(result);
			}
			else if(choix == 2) { // Client
				$('#conseils_astuces').html(result.replace(/(\r\n|\n\r|\r|\n)/g, "<br/>"));
			}
		},
        error : function(resultat, statut, erreur) {
            console.log('Erreur AJAX sur la prestation sur la lecture du fichier de conseils');
        }
	});
}