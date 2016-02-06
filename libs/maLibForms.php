<?php

/*
Ce fichier définit diverses fonctions permettant de faciliter la production de mises en formes complexes : 
tableaux, formulaires, ...
*/

function mkSelect($nomChampSelect, $tabData,$champValue, $champLabel,$selected=false,$champLabel2=false) {
	// Produit un menu déroulant portant l'attribut name = $nomChampSelect

	// Produire les options d'un menu déroulant à partir des données passées en premier paramètre
	// $champValue est le nom des cases contenant la valeur à envoyer au serveur
	// $champLabel est le nom des cases contenant les labels à afficher dans les options
	// $selected contient l'identifiant de l'option à sélectionner par défaut
	// si $champLabel2 est défini, il indique le nom d'une autre case du tableau 
	// servant à produire les labels des options

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