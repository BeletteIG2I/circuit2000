<?php
/*
 * Nom de fichier : data.php
 * Description : Fichier PHP contenant toutes les actions à faire en fonction des variables passées en GET ou POST
 * Auteur(s) : Clément RUFFIN, Maxime DE COSTER, Maxence DELATTRE
*/

session_start();

if(!isset($_SESSION['connecte']))
	$_SESSION['connecte'] = false;

include('../libs/bdd.php');
include('../libs/maLibUtils.php');
include('../libs/maLibSecurisation.php');

foreach($_POST as $key => $value) {
    $postkeyname = "POST".$key;
	if(ctype_digit($value)) {
		$value = intval($value);
	}
	else {
		// $value = mysql_real_escape_string($value);
		$value = addcslashes($value, '%_');
	}
    $$postkeyname = htmlentities($value,ENT_QUOTES,"UTF-8");
}

foreach($_GET as $key => $value) {
    $getkeyname = "GET".$key;
	if(ctype_digit($value)) {
		$value = intval($value);
	}
	else {
		// $value = mysql_real_escape_string($value);
		$value = addcslashes($value, '%_');
	}
    $$getkeyname = htmlentities($value,ENT_QUOTES,"UTF-8");
}

if($action = valider('action')) {
	switch ($action) {
        /* *** PARTIE CLIENT *** */
        /* Auteur : Clément Ruffin */
        case 'recupUsers' : { // On récupère les id, noms et prénoms des clients
            $clients = getClients();
            echo(json_encode($clients));
        }break;
		
		case 'recupMoniteurs' : { // On récupère les id, noms, prénoms et immatVoiture des moniteurs
            $moniteurs = getMoniteurs();
            echo(json_encode($moniteurs));
        }break;
			
        case 'recupTpsPauseMoniteurs' : {

            $tpsPause = getTpsPauseMoniteur();
            echo(json_encode($tpsPause));

        }break;
		
		case 'recupVehicules' : { // On récupère les infos des vehicules
            $vehicule = getVehicules();
            echo(json_encode($vehicule));
        }break;
		
		case 'recupCours' : { // On récupère les id, noms, prénoms et immatVoiture des moniteurs
            $cours = getCours();
            echo(json_encode($cours));
        }break;

        case 'recupInfoUser' : { // On récupère toutes les infos d'un client
            $var = getInfosClient($_GET["id"]);
            echo(json_encode($var));
			
        }break;
		
		case 'recupInfoMoniteur' : { // On récupère toutes les infos d'un client
            $var = getInfosClient($_GET["id"]);
            echo(json_encode($var));
			
        }break;
		
		case 'recupInfoCours' : { // On récupère toutes les infos d'un client
			if($_SESSION["admin"]==0){
				//$var = getCoursParEleve($_GET["idUser"]);
				$var = getCoursParEleve($_SESSION["idUser"]);
				
				echo(json_encode($var));
				
			}else if($_SESSION["admin"]==2){
				//$var = getCoursParMoniteur($_GET["idUser"]);
				$var = getCoursParMoniteur($_SESSION["idUser"]);
				echo(json_encode($var));
			}
            
			
        }break;


        case 'recupDatesUser' : { // On récupère les dates (côté admin) au format aaaa-mm-jj
            $var = getInfosEleve($_GET["id"]);
			
            $dateCode = $var[0]['dateCode'];
            $datePermis = $var[0]['datePermis'];

            $dates = array();

            if ($dateCode != "0000-00-00 00:00:00") {
                $dateCode = EcrireDate($var[0]['dateCode']);
                $dates[0] = $dateCode;
            }
            if ($datePermis != "0000-00-00 00:00:00") {
                $datePermis = EcrireDate($var[0]['datePermis']);
                $dates[1] = $datePermis;
            }

            echo(json_encode($dates));
        }break;

        case 'recupDatesUser2' : { // On récupère les dates (côté client) au format jj mois aaaa
            $var = getInfosEleve($_GET["id"]);

            $dateCode = $var[0]['dateCode'];
            $datePermis = $var[0]['datePermis'];

            $dates = array();

            if ($dateCode != "0000-00-00 00:00:00") {
                $dateCode = EcrireDate($var[0]['dateCode']);
                $dates[0] = $dateCode;
            }
            if ($datePermis != "0000-00-00 00:00:00") {
                $datePermis = EcrireDate($var[0]['datePermis']);
                $dates[1] = $datePermis;
            }
            echo(json_encode($dates));
        }break;

        case 'ajouterClient' : {
            $res = NULL;
            // Après avoir vérifié les champs passés en paramètres, on insère le nouveau client en base
           if (($nomClient = valider("nomClient", "GET")) && ($prenomClient = valider("prenomClient", "GET")) 
						&& ($mailClient = valider("mailClient", "GET")) 
						&& ($telClient = valider("telClient", "GET")) 
						&& ($dateNaissClient = valider("dateNaissClient", "GET"))
						&& ($mdpClient = valider("mdpClient", "GET"))
						&& ($numAdrClient = valider("numAdrClient", "GET"))
						&& ($rueAdrClient = valider("rueAdrClient", "GET"))
						&& ($villeAdrClient = valider("villeAdrClient", "GET"))
						&& ($codePostalClient = valider("codePostalAdrClient", "GET"))) {
                $res = InsertClient($nomClient, $prenomClient, $mailClient,$telClient
				,$dateNaissClient,$mdpClient,$numAdrClient,$rueAdrClient,$villeAdrClient,$codePostalClient);
                $last = getLastClients();
                $res2 = InsertClientEleve($last);

            	if($res != false) { // Si le mail passé en paramètre est valide
					        
		            $mail = $mailClient;//'maxencedelattre62@gmail.com'; // Déclaration de l'adresse de destination.
		            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
		                $passage_ligne = "\r\n";
		            else
		                $passage_ligne = "\n";

		            // On rédige le corps du message et l'objet du mail
		            $message_mail = "Bonjour," . $passage_ligne . $passage_ligne;
		            $message_mail .= "Bienvenue chez Circuit 2000 ! Vous venez d'être inscrit sur notre site internet circuit2000.fr" . $passage_ligne;
		           	$message_mail .= "Pour vous connecter à votre espace personnel, veuillez utilser les identifiants suivants :" . $passage_ligne;
		           	$message_mail .= "Identifiant : " . $mailClient . $passage_ligne;
		           	$message_mail .= "Mot de passe " . $mdp . $passage_ligne;

		            $message_mail .=  $passage_ligne . "Cordialement," . $passage_ligne;
		            $message_mail .= "L'équipe Circuit 2000." . $passage_ligne . $passage_ligne;
		            $message_mail .= "---------- Message généré à partir du site web de Circuit 2000 ---------- ";

		            $objet = "Création de votre compte Circuit 2000";
		             
		            // Création du header de l'e-mail.
					$header = "From: " . utf8_decode("Circuit 2000") . "<aecircuit2000@gmail.com>".$passage_ligne;
					$header.= "Reply-to: " . utf8_decode("Circuit 2000") . "<aecircuit2000@gmail.com>".$passage_ligne;
					$header.= "MIME-Version: 1.0".$passage_ligne;
					$header.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
					$header.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

		            $message= $passage_ligne.$message_mail.$passage_ligne;

		            // Ajout du message au format HTML
		            /*$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
		            $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		            $message.= $passage_ligne . $message_mail . $passage_ligne;*/
		             
		            $envoiMail = mail($mail,utf8_decode($objet),$message,$header); // Envoi de l'e-mail.

		            if($envoiMail)
		                echo('Ajout du client réussi. Un e-mail vient de lui être envoyé');
		            else { // Si échec de l'envoi => suppression de l'utilisateur tout juste créé
		            	$SQL = "DELETE FROM users WHERE id=" . $res;
		            	$res = SQLDelete($SQL);

		        		echo("erreur:Echec de l'ajout du client");
		            }
		        }
		        else
		        	echo("erreur:Echec de l'ajout du client");
            }
            else
                echo ("erreur:Veuillez remplir tous les champs");

        }break;

        case 'updateAdresse' : {
            $res = NULL;
            // Après avoir vérifié l'adresse, on modifie en base
            if ($num = valider("num", "GET") && $rue = valider("rue", "GET") && $ville = valider("ville", "GET") && $codePostal = valider("codePostal", "GET")  )
                $res = UpdateAdresse($_GET["id"], $_GET["num"],$_GET["rue"],$_GET["ville"],$_GET["codePostal"]);

            if ($res != NULL) {
                $clientUpdate = getInfosClient($_GET["id"]);
				
				$nouvelleAdresse = $clientUpdate[0]['numeroADR'] . " - " . $clientUpdate[0]['rueADR'] . " - " . $clientUpdate[0]['villeADR'] . " - " . $clientUpdate[0]['codePostal'];
                echo $nouvelleAdresse;
            }
            else
                echo("erreur:Echec de la modification de l'adresse");
        }break;

        case 'updateMail' : {
            $res = NULL;
            // Après avoir vérifié l'email, on modifie en base
            if ($mail = valider("mail", "GET"))
                $res = UpdateMail($_GET["id"], $mail);

            if ($res != NULL) {
                $clientUpdate = getInfosClient($_GET["id"]);
                echo $nouveauMail = $clientUpdate[0]['mail'];
            }
            else
                echo("erreur:Echec de la modification de l'e-mail");
        }break;

        case 'updateTel' : {
            $res = NULL;

            // Après avoir vérifié le numéro de téléphone, on modifie en base
            if ($tel = valider("tel", "GET"))
                $res = UpdateTel($_GET["id"], $tel);

            if ($res != NULL) {
                $clientUpdate = getInfosClient($_GET["id"]);
                echo $nouveauTel = $clientUpdate[0]['telephone'];
            }
            else
                echo("erreur:Echec de la modification du téléphone");
        }break;

        case 'updateCode' : {
            $res = NULL;

            if ($dateCode = valider("date", "GET")) {
                echo " dateCode = " . $dateCode;
                $client = getInfosClient($_GET["id"]);
                print_r($client);
                $ancienneDate = substr($client[0]['dateCode'], 0, 10);
                echo " ancienneDate = " . $ancienneDate;
                if ($ancienneDate != $dateCode) // Si c'est une date différente de celle existante, on met à jour
                    $res = UpdateDateCode($_GET["id"], $dateCode);
                else
                    $res = 1;
            }

            if ($res != NULL) {
                $clientUpdate = getInfosClient($_GET["id"]);
                echo $nouvelleDate = $clientUpdate[0]['dateCode'];
            }
            else
                echo ("erreur:Echec de la modification de la date d'obtention du code");
        }break;


        case 'updatePermis' : {
            $res = NULL;

            if ($datePermis = valider("date", "GET")) {
                $client = getInfosClient($_GET["id"]);
                $ancienneDate = substr($client[0]['datePermis'], 0, 10);
                if ($ancienneDate != $datePermis) // Si c'est une date différente de celle existante, on met à jour
                    $res = UpdateDatePermis($_GET["id"], $datePermis);
                else
                    $res = 1;
            }

            if ($res != NULL) {
                $clientUpdate = getInfosClient($_GET["id"]);
                echo $nouvelleDate = $clientUpdate[0]['datePermis'];
            }
            else
                echo ("erreur:Echec de la modification de la date d'obtention du permis");
        }break;

        case 'updateTpsPause':{
            
            $res = NULL;
            //Après avoir vérifier le temps de pause et l'id, on modifie en base
            if($tpsPause = valider("newTpsPause","GET") && $idCours = valider("idCours","GET"))
                $res = UpdateTpsPause($_GET["idCours"], $_GET["newTpsPause"]);

            if($res != NULL){

                $tpsPauseUpdate = getTpsPauseParCours($_GET["idCours"]);
                $nouveauTpsPause = $tpsPauseUpdate[0]['temps_pause'];
                
                echo $nouveauTpsPause;

            }
            else
                echo("erreur:Echec de la modification du temps de pause");
        }        

        break;

        case 'envoyerMail' : { // On recupère les informations utiles sur le client (prénom, nom, email)
            $client = getInfosClient($_GET["id"]);
            $prenom = $client[0]["prenom"];
            $nom = $client[0]["nom"];
            $email = $client[0]["mail"];

            $mail = 'aecircuit2000@gmail.com'; // Déclaration de l'adresse de destination.
            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
                $passage_ligne = "\r\n";
            else
                $passage_ligne = "\n";

            // On rédige le corps du message et l'objet du mail
            $message_mail = "Bonjour," . $passage_ligne . $passage_ligne;

            if ($_GET['requete'] == 1) {
                $message_mail .= "Où en suis-je dans ma formation ?" . $passage_ligne;
                $objet = "[Circuit 2000] Avancement dans ma formation";
            }
            else if ($_GET['requete'] == 2) {
                $message_mail .= "Combien me reste-t-il à payer ?" . $passage_ligne;
                $objet = "[Circuit 2000] Reste a payer";
            }
            else if ($_GET['requete'] == 3) {
                $message_mail .= "Pouvez-vous me transmettre ma dernière facture" . $passage_ligne;
                $objet = "[Circuit 2000] Ma derniere facture";
            }

            $message_mail .=  $passage_ligne . "Cordialement," . $passage_ligne;
            $message_mail .= $prenom . " " . $nom . $passage_ligne . $passage_ligne;
            $message_mail .= "---------- Message généré à partir du site web de Circuit 2000 ---------- ";
             
            // Création du header de l'e-mail.
            $header = "From: " . utf8_decode($prenom . " " . $nom) . "<" . $email . ">".$passage_ligne;
            $header.= "Reply-to: " . utf8_decode($prenom . " " . $nom) . "<" . $email . ">".$passage_ligne;
            $header.= "MIME-Version: 1.0".$passage_ligne;
            $header.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
            $header.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

            $message= $passage_ligne.$message_mail.$passage_ligne;

            // Ajout du message au format HTML
            /*$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
            $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
            $message.= $passage_ligne . $message_mail . $passage_ligne;*/
             
            $envoiMail = mail($mail,utf8_decode($objet),$message,$header); // Envoi de l'e-mail.

            if($envoiMail)
                echo('Le message a bien été envoyé');
            else
                echo("erreur:Echec de l'envoi de l'e-mail");
        }break;
        /* *** FIN PARTIE CLIENT *** */

        /* *** PARTIE PLANNING *** */
        /* Auteur : Maxime De Coster */
        case 'ajouterPlanning' : {
            $res = NULL;
            $intitule = NULL;
            
            if(($date = valider("date", "POST"))&& ($hDebut = valider("hD", "POST")) && ($hFin = valider("hF", "POST"))) {
                $intitule = valider("intitule", "POST");
                $mDebut = valider("mD", "POST");
                $mFin = valider("mF", "POST");
                
                if($mDebut == "0")
                    $mDebut = "00";
                if($mFin == "0")
                    $mFin = "00";
                    
                $sql = "INSERT INTO choixsurplanning (id ,intitule ,dateDebut ,dateFin)";
                //$sql.="   VALUES (NULL , 'test3', '".$date. "  " . $hDebut.":00:00', '".$date." ".$hFin.":00:00')";
                $sql.=" VALUES (NULL , '$intitule', '$date $hDebut:$mDebut:00', '$date $hFin:$mFin:00')";
                
                $res = SQLInsert($sql); 
            }
            echo("$date , $hDebut , $hFin , $mDebut, $mFin, $intitule</br>\n");
            echo("$_POST[date], $_POST[hD], $_POST[hF], $_POST[mD], $_POST[mF] </br>\n");
                            
            if($res != NULL)
                echo("Id associé à l'insertion sur planning : " . $res);
            else
                echo("Problème");
            
        }break;

        case 'consulterPlanning' : {                
            $res = NULL;
            $tab = array();
            
            $sql = "SELECT * FROM choixsurplanning ";
            
            if(($start = valider("start", "GET")) && ($end = valider("end", "GET")))//start=2015-02-02&end=2015-02-08
                $sql.= " WHERE (dateDebut BETWEEN '$start' AND '$end')  AND (dateFin BETWEEN '$start' AND '$end')";
            
            $res = SQLSelect($sql);
            $tab = parcoursRs($res);
            
            /* construction du nouveau tableau de valeurs avec index consécutif */
            $newTab = array();
            $index_new_values = 0;
            foreach( $tab as $tableau ) {   
                $sousTab = array("id"=>$tableau["id"],"title"=>$tableau["intitule"], "start"=>$tableau["dateDebut"], "end"=>$tableau["dateFin"]);
                
                $newTab[$index_new_values] = $sousTab;
                $index_new_values++;
            }
            header('Content-Type:application/json');
            
            echo json_encode($newTab);
        }break;
        
        case 'supprimerCreneau' : {
            $res = NULL;
            if(isset($_GET["id"])) {
                $sql = "DELETE FROM choixsurplanning WHERE id = " . $_GET["id"];
                $res = SQLInsert($sql);
            }
            else {
                $res="Problème de suppression";
            }
            echo($res);
            
        }break;

        case 'modifierHeure' : {
            //"&start="+event.start+"&end="+event.end
            $res = NULL;
        
            if(($id = valider("id", "GET") )&& ($start = valider("start", "GET")) && ($end = valider("end", "GET"))) {
                //UPDATE client SET DatePermis='" . $date_permis . "' WHERE idPersonne=" . $id;
                $start = str_replace("T", " ", $start);
                $end = str_replace("T", " ", $end);
                //UPDATE `pinf`.`choixsurplanning` SET `dateDebut` = '2015-02-04 09:10:00' WHERE `choixsurplanning`.`id` =21;
                
                $sql = "UPDATE choixsurplanning SET dateDebut ='$start', dateFin ='$end' WHERE id =$id";
                $res = SQLUpdate($sql);
            }
            else {
                $res="Problème d'update";
            }
            echo($res);
            //echo($sql);
        }break;

        case 'supprimerTout':{
            $res = NULL;
            $sql = "DELETE FROM choixsurplanning";
            
            $res = SQLInsert($sql);
            
            echo($res);
        }break;
        /* *** FIN PLANNING *** */

        /* *** PARTIE INFOS PRATIQUES *** */
        /* Auteur : Maxence Delattre */
		case 'getFichierConseils':{ // On recupère le texte contenu dans le fichier conseils.txt pour l'afficher après dans la textarea
			$fp = fopen("conseils.txt","r"); // Ouverture du fichier en lecture seule
			if ($fp) { // Si on a réussi à ouvrir le fichier
				while (!feof($fp)) { // Tant que l'on est pas à la fin du fichier
					$buffer = fgets($fp); // On lit la ligne courante
					echo $buffer; // Et on l'affiche
				}
				fclose($fp); // Fermeture du fichier
			}
		}break;

		case 'setFichierConseils':{ // On modifie le texte du fichier conseils.txt
			if(isset($_POST['texte'])) { // Si un texte (tapé par l'administrateur) est présent
				$fp = fopen("conseils.txt", "w");
				fclose($fp);
                // Les deux lignes de commande précédentes permettent d'effacer tout le contenu du fichier conseils.txt
                // Ainsi, on pourra écrire dans ce fichier le texte que l'administrateur a tapé
				$fp1 = fopen("conseils.txt","r+"); // Ouverture du fichier en lecture et écriture
				fwrite($fp1,$_POST['texte']); // On ajoute le texte au fichier
				fclose($fp1); // Fermeture du fichier
			}
		}break;

		case 'Ajouter un fichier':{ // Ajout d'un fichier choisi par l'administrateur
			if (isset($_FILES['fichier'])) {
                $tab = upload('fichier', '../fichiers/', 0, array("jpg", "jpeg", "png", "PNG", "JPG", "JPEG", "gif","GIF", 'mp4','docx','pdf'));
                $tab = json_encode($tab[0]);
                ?>
                <script language="javascript" type="text/javascript">window.top.window.finUpload(<?php echo $tab; ?>);</script>
                <?php
            }
		}break;

		case 'getFichiers':{ // On recupère tous les fichiers mis à disposition par l'administrateur
			$dir = '../fichiers'; // Les fichiers se trouvent dans le répertoire '/fichiers'
			$files = scandir($dir); // On recupère tous les noms de fichiers du répertoire
			echo(json_encode($files)); // On renvoie ces noms de fichiers dans un tableau JSON
		}break;

		case 'supprimerFichier':{ // Suppression d'un fichier
			if(isset($_POST['fichier'])) {
				unlink('../fichiers/' . $_POST['fichier']);
                // Supprime le fichier dans le répertoire '/fichiers' dont le nom est précisé dans la variable $_POST['fichier']
			}
		}break;
        /* *** FIN PARTIE INFOS PRATIQUES *** */
		
        /* *** PARTIE REINITIALISATION MOT DE PASSE *** */
        /* Auteur : Maxence Delattre */
        case 'reinitMDP':{
            if(isset($_POST['email'])) {
                $i = 0;
                $mdp = "";
                $chaine = "abcdefghijklmnpqrstuvwxyABCDEFGHIJKLMNOPQRSUTVWXYZ0123456789";
                // Caractères pouvant constituer le mot de passe
                $nb_chars = strlen($chaine); // Variable contenant la longeur de la chaine

                for($i = 0 ; $i < 10 ; $i++) { // Création du mot de passe de 10 caractères
                    $mdp .= $chaine[rand(0, ($nb_chars-1))];
                }
                $mdp_crypte = sha1(md5(sha1($mdp))); // On crypte le mot de passe

                $SQL = "SELECT id FROM users WHERE mail='" . $_POST['email'] . "'";
                $res = SQLGetChamp($SQL);

                if($res != false) { // Si le mail passé en paramètre est valide
                    UpdateMdp($res, $mdp_crypte); // Modification du mot de passe en base

					$mail = $_POST['email'];
					if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bugs.
						$passage_ligne = "\r\n";
					else
						$passage_ligne = "\n";

					// Déclaration des messages au format texte et au format HTML.
					$message_mail = "Bonjour," . $passage_ligne . $passage_ligne;

					$message_mail .= "Vous avez demandé une réinitialisation de votre mot de passe pour la connexion à votre espace personnel sur le site de l'auto-école Circuit 2000." . $passage_ligne;
					$message_mail .= "Votre nouveau mot de passe est : " . $mdp . $passage_ligne;
					$message_mail .= "Pour rappel, votre identifiant est votre adresse e-mail" . $passage_ligne . $passage_ligne;

					$message_mail .= "Cordialement," . $passage_ligne;
					$message_mail .= "L'équipe Circuit 2000." . $passage_ligne . $passage_ligne;
					$message_mail .= "---------- Message généré à partir du site web de Circuit 2000 ---------- " . $passage_ligne;
					 
					// Définition du sujet.
					$sujet = "[Circuit 2000] Demande de réinitialisation de mot de passe";
					 
					// Création du header de l'e-mail.
					$header = "From: " . utf8_decode("Circuit 2000") . "<aecircuit2000@gmail.com>".$passage_ligne;
					$header.= "Reply-to: " . utf8_decode("Circuit 2000") . "<aecircuit2000@gmail.com>".$passage_ligne;
					$header.= "MIME-Version: 1.0".$passage_ligne;
					$header.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
					$header.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

					$message.= $passage_ligne.$message_mail.$passage_ligne;

					// Ajout du message au format HTML
					/*$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
					$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
					$message.= $passage_ligne . $message_mail . $passage_ligne;*/
					 
					$envoiMail = mail($mail,utf8_decode($sujet),$message,$header); // Envoi de l'e-mail.

                    if($envoiMail)
                        echo('Le message a bien été envoyé');
                    else
                        echo("Problème");
                }
                else {
                    echo('erreur:E-mail invalide');
                    die("");
                }
            }
        }break;
        /* *** FIN PARTIE REINITIALISATION MOT DE PASSE *** */
        
        /* *** PARTIE FORMULAIRE DE CONTACT *** */
        /* Auteur : Maxence Delattre */
        case 'envoyerDemandeContact':{
            $condition = true;

            if(!isset($_POST['nom'])) $condition = false;
            if(!isset($_POST['prenom'])) $condition = false;
            if(!isset($_POST['email'])) $condition = false;
            if(!isset($_POST['objet'])) $condition = false;
            if(!isset($_POST['message'])) $condition = false;

            if($condition) {
                $mail = 'aecircuit2000@gmail.com'; // Déclaration de l'adresse de destination.
                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
                    $passage_ligne = "\r\n";
                else
                    $passage_ligne = "\n";

                // Déclaration des messages au format texte et au format HTML.
                $message_mail = $_POST['message'];
                 
                // Définition du sujet.
                $sujet = $_POST['objet'];
                 
                // Création du header de l'e-mail.
                $header = "From: " . utf8_decode($_POST['prenom'] . " " . $_POST['nom']) . "<" . $_POST['email'] . ">".$passage_ligne;
                $header.= "Reply-to: " . utf8_decode($_POST['prenom'] . " " . $_POST['nom']) . "<" . $_POST['email'] . ">".$passage_ligne;
                $header.= "MIME-Version: 1.0".$passage_ligne;
                $header.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
                $header.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

                $message= $passage_ligne.$message_mail.$passage_ligne;

                // Ajout du message au format HTML
                /*$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
                $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
                $message.= $passage_ligne . $message_mail . $passage_ligne;*/
                 
                $envoiMail = mail($mail,utf8_decode($sujet),$message,$header); // Envoi de l'e-mail.

                if($envoiMail)
                    echo('Le message a bien été envoyé');
                else
                    echo("erreur:Problème");
            }
            else {
                echo('erreur:Veuillez remplir tous les champs');
                die("");
            }
        }break;
        /* *** FIN FORMULAIRE DE CONTACT *** */

		default:{

		}break;
	}
}

function upload($index, $destination = 0, $destinationBDD = 0, $extensions, $maxsize=1073741824) {
    if($_FILES[$index]['name'] != '') {
        $return = array();

        $file = $_FILES[$index]['tmp_name'];

        if($_FILES[$index]['size'] < $maxsize ) {
            $info_fichiers = pathinfo($_FILES[$index]['name']);

            $info_fichiers["extension"] = strtolower($info_fichiers["extension"]);

            $extension_upload= $info_fichiers ['extension'];
            $extension_autorise = $extensions;

            $datepub = date("Y-m-d");
            $heure = date("His");

            $nom_fichier = $info_fichiers['filename'] . '_' . $datepub . '_' . $heure . '.' . $info_fichiers['extension'];


            if(in_array($extension_upload , $extension_autorise)) {
                $type = '';
                if($destination == 0 && ($info_fichiers['extension'] == "jpg" || $info_fichiers['extension'] == "jpeg" || $info_fichiers['extension'] == "png" ||
                        $info_fichiers['extension'] == "PNG" || $info_fichiers['extension'] == "JPG" || $info_fichiers['extension'] == "JPEG"
                        || $info_fichiers['extension'] == "gif" || $info_fichiers['extension'] =="GIF")) {
                    // $destination = 'images/';
                    $type = 'image';
                }
                elseif($destination == 0 && ($info_fichiers['extension'] == "mp4" || $info_fichiers['extension'] == "MP4" ||$info_fichiers['extension'] == "ogg" ||$info_fichiers['extension'] == "OGG" || $info_fichiers['extension'] == "webm" || $info_fichiers['extension'] == "WEBM" )) {
                    // $destination = 'video/';
                    $type = "video";
                }

                echo $destination;
                if(!file_exists($destination)){
                    mkdir($destination);
                }
                move_uploaded_file($file,$destination.basename($nom_fichier));

                if($destinationBDD == 0) {
                    $chemin = explode('/', $_SERVER['REQUEST_URI']);
                    array_pop($chemin);
                    $chemin = implode('/', $chemin);
                    $array[] = array('name' => $_FILES[$index]['name'], 'path' => 'http://'.$_SERVER['HTTP_HOST'].$chemin . '/' . $destination . basename($nom_fichier),'type' => $type);
                }else
                    $array[] = array('name' => $_FILES[$index]['name'] , 'path' => $destination.basename($nom_fichier), 'pathBDD' => $destinationBDD.basename($nom_fichier),'type' => $type);
                return $array;
            }else{
                return array(0);
            }
        }else{
            return array(-1);
        }
    }
    return array(1);
}

function EcrireDate($datetime) {
    // Ecrit une date sous le format jj mois aaaa à hh h mm à partir d'une variable de type datetime (aaaa-mm-jj hh:mm:ss)
    list($jour, $heure) = explode(' ', $datetime); // On sépare la variable datetime pour mettre aaaa-mm-jj dans $jour et hh:mm:ss dans $heure
    list($year, $month, $day) = explode('-', $jour); // On sépare $jour pour mettre aaaa dans $year, mm dans $month et jj dans $day
    list($hour, $min, $sec) = explode(':', $heure); // Même chose pour l'heure
    switch ($month) { // On transforme le mois sous forme de numéro en mois sous forme de chaine de caractères
        case '01' :$mois = 'janvier';break;
        case '02' :$mois = 'février';break;
        case '03' :$mois = 'mars';break;
        case '04' :$mois = 'avril';break;
        case '05' :$mois = 'mai';break;
        case '06' :$mois = 'juin';break;
        case '07' :$mois = 'juillet';break;
        case '08' :$mois = 'août';break;
        case '09' :$mois = 'septembre';break;
        case '10' :$mois = 'octobre';break;
        case '11' :$mois = 'novembre';break;
        case '12' :$mois = 'décembre';break;
        default:$mois = 'Pas de mois correspondant';break;
    }
    $chaine = $day . ' ' . $mois . ' ' . $year;
    return $chaine;
}

function EcrireDate2($datetime) {
    // Ecrit une date sous le format aaaa-mm-jj à partir d'une variable de type datetime (aaaa-mm-jj hh:mm:ss)
    list($jour, $heure) = explode(' ', $datetime); // On sépare la variable datetime pour mettre aaaa-mm-jj dans $jour et hh:mm:ss dans $heure
    list($year, $month, $day) = explode('-', $jour); // On sépare $jour pour mettre aaaa dans $year, mm dans $month et jj dans $day
    list($hour, $min, $sec) = explode(':', $heure); // Même chose pour l'heure

    $chaine = $year . '-' . $month . '-' . $day;
    return $chaine;
}

?>