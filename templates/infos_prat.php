<?php
/*
 * Nom de fichier : infos_prat.php
 * Description : Fichier PHP contenant la structure de la partie "Infos Pratiques" de l'espace perso
 * Auteur(s) : Maxence DELATTRE
*/
?>

<link rel="stylesheet" type="text/css" href="../css/infos_prat.css">
<script type="text/javascript" src="../js/infos_prat.js"></script>
<div id="infos_prat">
	<?php if(isset($_SESSION['admin']) && $_SESSION['admin']) { ?>
	<div id="conseils">
		<h1>Conseils et astuces</h1>
		<div class="form">
			<textarea></textarea>
			<input type="submit" id="envoyerConseils" name="envoyer" value="Envoyer" />
		</div>
	</div>
	<div class="separateur"></div>
	<div id="fichiers">
		<h1>Fichiers mis à disposition</h1>
		<form class="form" action="../templates/data.php" method="post" enctype="multipart/form-data"  target="upload_target" id="form">
            <input type="file" name="fichier"/><br />
            <input type="submit" id="ajouterFichier" name="action" value="Ajouter un fichier"><br />
            <iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
        </form>
		<div class="form" id="supprimer">
			<!-- <select id="selectSuppFiles"></select><br/> -->
			<div id="selectSuppFiles"></div><br/>
			<input type="submit" id="supprimerFichier" name="action" value="Supprimer le(s) fichier(s) sélectionné(s)" />
		</div>
	</div>
	<?php } else { ?>
	<div id="verif">
		<h1>Vérifications intérieures</h1>
		<div id="clic_verif_inter">
			<!-- <img src="./images/verif_inter.png"> -->
		</div>
		<h1 class="titre2">Vérifications extérieures</h1>
		<div id="clic_verif_exter">
			<!-- <img src="./images/verif_exter.png"> -->
		</div>
	</div>
	<div class="separateur"></div>
	<div id="conseils_fichiers">
		<h1>Conseils et astuces</h1>
		<div id="conseils_astuces">

		</div>
		<h1 class="titre2">Fichiers mis à disposition</h1>
		<div id="fichiersDispos">
			
		</div>
	</div>
	<?php } ?>
	<div id="messageResultat"></div>
</div>