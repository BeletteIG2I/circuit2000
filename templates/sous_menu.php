<?php
/*
 * Nom de fichier : sous_menu.php
 * Description : Fichier PHP contenant la structure et le style du menu de l'espace perso
 * Auteur(s) : Maxence DELATTRE
*/
?>
<style type="text/css">
	#sous_menu {
		color:white;
		list-style-type:none;
		text-align:center;
		width:100%;
		height:4.7%;
		margin:1.19% 0;
		padding:0;
	}

	#sous_menu li {
		display:inline-block;
		margin:0 50px;
		font-size:110%;
		text-align:center;
	}

	#sous_menu li a, .cercle {display:block;}
	#sous_menu li:hover {transition:all 0.5s;cursor:pointer;}
	/*#sous_menu li:hover .cercle {transition:all 0.5s;}*/
	#sous_menu a:focus {outline:0;}

	#sous_menu a {
		color:rgb(200,200,200);
		transition:all 0.5s;
		text-decoration:none;
	}

	.cercle {
		transition:all 0.5s;
		width:4px;
		height:4px;
		border-radius:50%;
		background:rgba(255,255,255,0.9);
		margin:auto;
		margin-top:3px;
		display:block;
		opacity:0;
	}

	#separation {
		height:1px;
		border-radius:100%;
		background-color:white;
		width:90%;
	}
</style>
<ul id="sous_menu">
	<li><a href="#clients"><?php echo((isset($_SESSION['admin']) && $_SESSION['admin']) ? 'Clients' : 'Formation'); ?></a><span class="cercle"></span></li>
	<li><a href="#planning">Planning</a><span class="cercle"></span></li>
	<li><a href="#infos_prat"><?php echo((isset($_SESSION['admin']) && $_SESSION['admin']) ? 'Gestion Infos Pratiques' : 'Infos Pratiques'); ?></a><span class="cercle"></span></li>
</ul>
<hr id="separation"/>