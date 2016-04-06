<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Ajouter un cours</title>
	</head>
	<body>
		<?php
			include('../libs/bdd.php');
			$moniteur=getNomPrenomMoniteurs();  
			$eleve=getNomPrenomEleves();
		?>
		
		<form method="post" action="">		 
			<label for="moniteur">Moniteur</label><br />			
			<select name="moniteur" id="moniteur">
				<optgroup label="Sélectionnez le moniteur">				
					<?php foreach ($moniteur as $data):?>		
					<option value="<?php echo $data['nom']; ?>"> <?php echo $data['nom'] .' '. $data['prenom']; ?></option>
					<?php endforeach;?>	
				</optgroup>
			</select>
		
			</br></br>

		
			<label for="eleve">Eleve</label><br />			
			<select name="eleve" id="eleve">
				<optgroup label="Sélectionnez l'eleve">
					<?php foreach ($eleve as $donnees):?>
					<option value="<?php echo $donnees['nom']; ?>"> <?php echo $donnees['nom'] .' '. $donnees['prenom']; ?></option>
					<?php endforeach;?>
				</optgroup>	
			</select>
		
			</br></br>
		
		
			<label for="description">Description :</label>
			<input type="text" name="descripion" id="descripion" />
			</br></br>
			<input type="submit" value="Valider" />
		
		</form>
		
	</body>
</html>