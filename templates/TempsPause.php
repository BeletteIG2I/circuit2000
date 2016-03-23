<?php

include('data.php');

echo $_SESSION["id"];
$id=$_SESSION["id"];
$cours = getCoursParMoniteur($id);
if($action = valider('action')) {
	switch ($action) {
        case 'Sauver temps de pause':

        $temps = $_GET["seca"];
        $idCours = $_GET["id"];
        $sql = "UPDATE cours SET temps_pause='".$temps."' WHERE id=".$idCours ;

        $res=SQLUpdate($sql);
        
        break;
    }
}
    foreach ($cours as $valeur){
    echo 'Numero : '.$valeur['numero'].'<br />';
	echo 'Date debut : '.$valeur['date_debut'].'<br /><br />';
	echo 'Date fin : '.$valeur['date_fin'].'<br /><br />';
	echo 'Temps pause : '.$valeur['temps_pause'].'<br /><br />';
	echo 'Date : '.$valeur['date'].'<br /><br />';
	echo 'Description : '.$valeur['description'].'<br /><br />';
	echo 'Commentaire : '.$valeur['Commentaire'].'<br /><br />';
    echo '<input type="button" class ="btn" value="Lancer le cours" id="'.$valeur['id'].'" onclick="getId(this)"/>';


}



?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title></title>

    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script>
    var id = 0;
        var centi = 0; // initialise les dixtièmes
        var secon = 0;//initialise les secondes
        var minu = 0; //initialise les minutes

        function chrono(){
        centi++; //incrémentation des dixièmes de 1
        if (centi > 9) { centi = 0; secon++;} //si les dixièmes > 9, on les réinitialise à 0 et on incrémente les secondes de 1
        if (secon > 59) { secon = 0; minu++;} //si les secondes > 59, on les réinitialise à 0 et on incrémente les minutes de 1
        document.forsec.secc.value = " " + centi; //on affiche les dixièmes
        document.forsec.seca.value = " " + secon; //on affiche les secondes
        document.forsec.secb.value = " " + minu; //on affiche les minutes
        compte = setTimeout('chrono()', 100); //la fonction est relancée tous les 10° de secondes
        }

        function rasee(){ //fonction qui remet les compteurs à 0
        clearTimeout(compte); //arrête la fonction chrono()
        /*alert(secon);
        console.log(secon);
        console.log(id);*/
        document.forsec.secc.value = " " + centi;
        document.forsec.seca.value = " " + secon;
        document.forsec.secb.value = " " + minu;
        }


        function getId(ele){
            id = ele.id;
            document.forsec.id.value = " " + id;
            /*alert(id);
            console.log(id);
            */
        }
    </script>

</head>
<body>

<div id="pause">
        <form action="testPause.php" method="get" name="forsec">
            <input type="hidden" name="id">
            <input type="text" size="3" name="secb"> minute(s)
            <input type="text" size="3" name="seca"> secondes
            <input type="text" size="3" name="secc"> dixiemes

            <input type="button" value="Commencer pause" onclick="chrono()">
            <input type="button" value="Arreter pause"  onclick="rasee()">
            <input type="submit" value="Sauver temps de pause" name="action">
        </form> 
</div>

</body>
</html>