
<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="../css/modifInfos2.css"/>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

    
</head>


<script>
        $(document).ready(function(){
           //recupération du user connecté
           $idUser = <?php echo $_SESSION["idUser"]; ?>;
           
           
           $("#envoie").click( function() {
            
            //Envoie du mail avec le mdp
            if($("#mail").val() === $("#mail2").val()){
                $("#chargement").show();
                $.ajax({
                    type : "POST",
                    url: "templates/data.php?action=envoyerMailMdpOublie&id=" + $idUser,
                    success : function(result, htmlStatus, jqXHR){
                        if(result.search('erreur:') != -1) {
                            $('#msgErrorSuivi').text(result.substring(7,result.length));
                            $('#msgErrorSuivi').css("border-color","red");
                            // On enlève la chaîne de caractères 'erreur:' pour afficher le message d'erreur
                        }
                        else { // Si pas d'erreurs
                            $('#msgErrorSuivi').text(result);
                            $('#msgErrorSuivi').css("border-color","green");
                            alert("Message envoyé.");
                            $("#chargement").hide();
                        }
                        $('#msgErrorSuivi').show(); // On affiche le message
                        $('#msgErrorSuivi').fadeOut(4000,'easeInExpo'); // On le fait disparaître en 4s en easeInExpo
                    },
                    error: function(jqXHR, htmlStatus, htmlError){
                        console.log("Status :" + htmlStatus + " \nError : " + htmlError);
                    }
                });
            }
        });
            
           
                
        });
        
        
    </script>


<div id="barre_blanche">
<nav>
	<img id="logo" src="../images/CIRCUIT_2000.png">
	<div id="entete"> 
		<h2>Inscription</h2>
	</div>
	

</div>	


<div id="modifs">
							
    <fieldset>	  
        <legend>Veuillez entrer votre e-mail</legend>
	<label for="email">Email </label>
	<input id="email" type="textarea" placeholder="flolafleur@kikoo.lol" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu" class="mail"><br>
	<label for="email2">Confirmer votre e-mail </label>
	<input id="email2" type="textarea" placeholder="flolafleur@kikoo.lol" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu" class="mail2"><br>					  
    </fieldset>
	<p><input type="button" value="Soummettre" id="envoie"> <img src="../images/ajax-loader.gif" alt="chargement" id="chargement"/></p>
                                          
					
</div>
</div>


