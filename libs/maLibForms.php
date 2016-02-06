<?php

/*
Ce fichier d�finit diverses fonctions permettant de faciliter la production de mises en formes complexes : 
tableaux, formulaires, ...
*/

function mkSelect($nomChampSelect, $tabData,$champValue, $champLabel,$selected=false,$champLabel2=false) {
	// Produit un menu d�roulant portant l'attribut name = $nomChampSelect

	// Produire les options d'un menu d�roulant � partir des donn�es pass�es en premier param�tre
	// $champValue est le nom des cases contenant la valeur � envoyer au serveur
	// $champLabel est le nom des cases contenant les labels � afficher dans les options
	// $selected contient l'identifiant de l'option � s�lectionner par d�faut
	// si $champLabel2 est d�fini, il indique le nom d'une autre case du tableau 
	// servant � produire les labels des options

	echo "<select name=\"$nomChampSelect\">";

	foreach ($tabData as $data)
	{
		$sel = "";
		if ($selected == $data[$champValue])
			$sel = "selected";

		echo "<option $sel value=\"$data[$champValue]\">";
		echo  $data[$champLabel];
		if ($champLabel2) echo  " - $data[$champLabel2]";
		echo "</option>\n"; 
	}

	echo "</select>";
}

function mkInput($type,$name,$value="") {
	echo "<input type=\"$type\" name=\"$name\" id=\"$name\" value=\"$value\" />";
}

?>