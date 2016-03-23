<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/modifInfos2.css"/>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

    
</head>


<script>
        $(document).ready(function(){
            
           
            
            $("#envoie").click(function(){
                
                nouveauNom = $(".nom").val();
				nouveauPrenom = $(".prenom").val();
				nouveauMail = $(".mail").val();
				nouveauMdp= $(".mdp").val();
				nouveauTel = $(".telephone").val();
				nouveauDateNaiss = $(".naissJour").val() + "/" + $(".naissMois").val() + "/" + $(".naissAnnee").val();
                numNouvelleAdresse = $(".numeroADR").val();
                rueNouvelleAdresse = $(".rueADR").val();
                villeNouvelleAdresse = $(".villeADR").val();
                codePostalNouvelleAdresse = $(".codePostal").val();
                
			/*
				 var $this = $(this).parent();

					$.ajax({
						url: "templates/data.php?action=ajouterClient",
						type: "POST",
						data: $this.serialize(), // On sérialise les données (On envoie toutes les valeurs présentes dans le formulaire)
						success: function (result, textStatus, jqXHR) {
							if(result.search('erreur:') != -1) {
								$('#messageCreation').css("border-color","red");
								$('#messageCreation').text(result.substring(7,result.length));
								// On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
							}
							else { // Si pas d'erreurs
								$('#messageCreation').css("border-color","green");
								$('#messageCreation').text(result);
							}
							$('#messageCreation').show(); // On affiche le message
							$('#messageCreation').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo

							// Chaque fois que l'admin ajoute un client, on met à jour la liste déroulante des clients
							actualiserListeClients();
						},
						error: function (jqXHR, textStatus, textErreur) {
							alert("Status :" + textStatus + " \nErreur : " + textErreur);
						}
					});*/
				
                $.ajax({
                    type: "GET",
                    url: "../templates/data.php",
                    data:{action:"ajouterClient",nomClient:nouveauNom,prenomClient:nouveauPrenom,mailClient:nouveauMail,telClient:nouveauTel,dateNaissClient:nouveauDateNaiss,mdpClient:nouveauMdp,num:numNouvelleAdresse,rue:rueNouvelleAdresse,ville:villeNouvelleAdresse,codePostal:codePostalNouvelleAdresse},
                    success: function (result, htmlStatus, jqXHR) {
                        if(result.search('erreur:') != -1) {
						alert(result.substring(7,result.length));
                            $('#msgErrorMesInfos').text(result.substring(7,result.length));
                            $('#msgErrorMesInfos').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
                            
                           /* $('#msgErrorMesInfos').text("Adresse modifiée");
                            $('#msgErrorMesInfos').css("border-color","green");*/
                            $(".numeroADR").val(numNouvelleAdresse);
                            $(".rueADR").val(rueNouvelleAdresse);
                            $(".villeADR").val(villeNouvelleAdresse);
                            $(".codePostal").val(codePostalNouvelleAdresse); // On recopie la nouvelle adresse sur la page
                            
                        }
                        $('#msgErrorMesInfos').show(); // On affiche le message
                        $('#msgErrorMesInfos').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                    },
                    error: function (jqXHR, htmlStatus, htmlError) {
                        console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                    }
                });
                
                
            });
        
        });
        
        
    </script>


<div id="barre_blanche">
<nav>
	<img id="logo" src="../images/CIRCUIT_2000.png">
	<div id="entete"> 
		<h2>Modifier les informations</h2>
	</div>
	

</div>	


<div id="modifs">
    
				 
					
					<fieldset>
						<legend>Informations générales</legend>
						  <label for="nom">Nom </label>
						  <input id="nom" placeholder="Belette" autofocus="" required="" class="nom"><br>
						  <label for="nom">Prénom </label>
						  <input id="nom"  autofocus="" required="" class="prenom"><br>
						  <label for="naiss">Date de naissance: </label>
							<SELECT id="naiss" name="naiss" size="1" class="naissJour">
							<option value="" disabled selected>Jour</option> 
							<OPTION>1	
							<OPTION>2
							<OPTION>3
							<OPTION>4
							<OPTION>5
							<OPTION>6
							<OPTION>7
							<OPTION>8
							<OPTION>9
							<OPTION>10
							<OPTION>11
							<OPTION>12
							<OPTION>13
							<OPTION>14
							<OPTION>15
							<OPTION>16
							<OPTION>17
							<OPTION>18
							<OPTION>19
							<OPTION>20
							<OPTION>21
							<OPTION>22
							<OPTION>23
							<OPTION>24
							<OPTION>25
							<OPTION>26
							<OPTION>27
							<OPTION>28
							<OPTION>29
							<OPTION>30
							<OPTION>31
							</SELECT>
							
							
							
							<SELECT id="naiss" name="naiss" size="1" class="naissMois">
							<option value="" disabled selected>Mois</option>
							<OPTION>01	
							<OPTION>02
							<OPTION>03
							<OPTION>04
							<OPTION>05
							<OPTION>06
							<OPTION>07
							<OPTION>08
							<OPTION>09
							<OPTION>10
							<OPTION>11
							<OPTION>12
							</SELECT>
							
							
							
							<SELECT id="naiss" name="naiss" size="1" class="naissAnnee">
							<option value="" disabled selected>Année</option>
							<OPTION>1998	
							<OPTION>1997
							<OPTION>1996
							<OPTION>1995
							<OPTION>1994
							<OPTION>1993
							<OPTION>1992
							<OPTION>1991
							<OPTION>1990
							<OPTION>1989
							<OPTION>1988
							<OPTION>1987
							</SELECT></br>
							
						  
						  <label for="email">Email </label>
						  <input id="email" type="textarea" placeholder="flolafleur@kikoo.lol" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu" class="mail"><br>
						  <label for="telephone">Portable</label>
							  <input id="telephone" type="tel" placeholder="06xxxxxxxx" pattern="06[0-9]{8}" class="telephone"><br>
					</fieldset>
					  
					  
					  <fieldset>
						<legend>Modification de mot de passe</legend>
						   <label for="pseudo">Entrez le nouveau mot de passe :</label>
						   <input type="password" name="pass1" id="pass" class="mdp"/> </br>
						   
						   
						   <label for="pass">Confirmation du mot de passe :</label>
						   <input type="password" name="pass2" id="pass" class="mdp2"/>
						   
					  </fieldset>
					  
					  
					 
					  <fieldset>
						<legend>Adresse</legend>
						   <label for="champs">N° : </label>
						   <input type="number" name="num" id="champs" class="numeroADR"/></br>
						   
						   <label for="champs">Rue : </label>
						   <input type="text" name="rue" id="champs" class="rueADR"/></br>
						   
						   <label for="champs">Ville : </label>
						   <input type="text" name="ville" id="champs" class="villeADR"/></br>
						
						   <label for="champs">Code Postal : </label>
						   <input type="text" name="post" id="champs" class="codePostal"/></br>
					  </fieldset>
					  
					  <p><input type="button" value="Soummettre" id="envoie"></p>

					
			</div>
</div>
