<?php

include('data.php');

//$cours = getCoursParMoniteur($_SESSION["id"]);
$id=1;
$con = mysqli_connect("localhost","root","","circuit2000");
//$sql = "SELECT * FROM cours WHERE idMoniteur =" . $id;
$res = mysqli_query($con,"SELECT * FROM cours WHERE idMoniteur =" . $id);

while ($data = mysqli_fetch_array($res)) {
	// on affiche les résultats
	echo 'Numero : '.$data['numero'].'<br />';
	echo 'Date debut : '.$data['date_debut'].'<br /><br />';
	echo 'Date fin : '.$data['date_fin'].'<br /><br />';
	echo 'Temps pause : '.$data['temps_pause'].'<br /><br />';
	echo 'Date : '.$data['date'].'<br /><br />';
	echo 'Description : '.$data['description'].'<br /><br />';
	echo 'Commentaire : '.$data['Commentaire'].'<br /><br />';
    echo '<input type="button" class ="btn" value="Lancer le cours" id="'.$data['id'].'" onclick="getId(this)"/>';

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
        var sec = 0;
        var centi = 0; // initialise les dixtièmes
        var secon = 0;//initialise les secondes
        var minu = 0; //initialise les minutes

        function chrono(){
        centi++; //incrémentation des dixièmes de 1
        if (centi > 9) { centi = 0; secon++; sec++;} //si les dixièmes > 9, on les réinitialise à 0 et on incrémente les secondes de 1
        if (secon > 59) { secon = 0; minu++;} //si les secondes > 59, on les réinitialise à 0 et on incrémente les minutes de 1
        document.forsec.secc.value = " " + centi; //on affiche les dixièmes
        document.forsec.seca.value = " " + secon; //on affiche les secondes
        document.forsec.secb.value = " " + minu; //on affiche les minutes
        compte = setTimeout('chrono()', 100); //la fonction est relancée tous les 10° de secondes
        }

        function rasee(){ //fonction qui remet les compteurs à 0
        clearTimeout(compte) //arrête la fonction chrono()
            $.ajax({
                url: 'data.php',
                data: 'Temps=' + sec,
                success: function (reponse) {
                    alert(reponse); // reponse contient l'affichage du fichier PHP (soit echo)
                }
            });
            sec = 0;
        centi=0;
        secon=0;
        minu=0;
        document.forsec.secc.value = " " + centi;
        document.forsec.seca.value = " " + secon;
        document.forsec.secb.value = " " + minu;
        }

        function getId(ele){
            id = ele.id;
            $.ajax({
                url: 'data.php',
                data: 'id=' + id,
                success: function (reponse) {
                    alert(reponse); // reponse contient l'affichage du fichier PHP (soit echo)
                }
            });
        }
    </script>

</head>
<body>

<div id="pause">
        <form action="data.php" method="post" name="forsec">
        <input type="text" size="3" name="secb"> minute(s)
        <input type="text" size="3" name="seca"> secondes
        <input type="text" size="3" name="secc"> dixiemes

        <input type="button" value="Commencer pause" onclick="chrono()">
        <input type="submit" value="Arreter pause" onclick="rasee()"> 
</div>

</body>
</html>