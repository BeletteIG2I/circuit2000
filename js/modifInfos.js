 $(document).ready(function () {
		actuData();
		function actuData(){
			var idUser = 2;
			alert(idUser);
			/** Au chargement de la page, on récupère les infos sur le client et on les affiche sur la page
			  (adresse, email, téléphone, dates d'obtention du code et du permis) */
			$.ajax({
				type:"GET",
				url:"templates/data.php?action=recupInfoUser&id=" + idUser,
				success:function(result, htmlStatus, jqXHR) {
					
					result = $.parseJSON(result);
					var adresse = result[0].numeroADR + " - " + result[0].rueADR + " - " + result[0].villeADR + " - " + result[0].codePostal;
					alert(result[0].nom);
					//$("#nom").html(result[0].nom);
					$("#nom").value = result[0].nom;
					//$("#htmlMailClient").html(result[0].mail);
					$//("#htmlTelClient").html(result[0].telephone);
				},
				error : function(jqXHR, htmlStatus, htmlError) {
					console.log("Status :" + htmlStatus + " \nError : " + htmlError);
				}
			});
		}
});