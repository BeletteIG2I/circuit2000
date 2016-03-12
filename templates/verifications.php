<?php
/*
 * Nom de fichier : verifications.php
 * Description : Fichier PHP contenant la structure et le script JQuery des vérifications de la partie "Infos Pratiques" pour le client de l'espace perso
 * Auteur(s) : Maxence DELATTRE
*/
?>
<div id="verifications">
	<link rel="stylesheet" type="text/css" href="css/verifications.css">
	<div id="container_verif">
		<div id="slider_verif">
			<?php if(isset($_POST['verif']) && $_POST['verif'] == 'inter') { ?>
				<ul id="verif_inter">
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>1</td>
									<td><p>Effectuez un appel lumineux.</p></td>
									<td><p>Feux de route/feux de croisement ou appel de feux de route.</p></td>
								</tr>
								<tr>
									<td>2</td>
									<td><p>Vérifiez la présence du certificat d'immatriculation du véhicule (carte grise).</p></td>
									<td><img src="./images/verif/2.png" alt="Certificat d'immatriculation"></td>
								</tr>
								<tr class="derniere_question">
									<td>3</td>
									<td><p>Actionnez la commande du clignotant droit et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/3.png" alt="Clignotant droit"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>4</td>
									<td><p>Que vous indique un voyant de couleur verte ?</p></td>
									<td><p>Le fonctionnement des feux de position ou de croisement ou de brouillard avant.</p></td>
								</tr>
								<tr>
									<td>5</td>
									<td><p>Actionnez la commande du clignotant gauche et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/5.png" alt="Clignotant gauche"></td>
								</tr>
								<tr class="derniere_question">
									<td>6</td>
									<td><p>Mettez le système de chauffage sur la position "air froid".</p></td>
									<td><img src="./images/verif/6.png" alt="Air froid"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>7</td>
									<td><p>Montrez comment régler la hauteur de l'appuie-tête du siège conducteur.</p></td>
									<td><img src="./images/verif/7.png" alt="Réglage appuie-tête"></td>
								</tr>
								<tr class="derniere_question">
									<td>8</td>
									<td><p>Montrez l'emplacement du dispositif de réglage intérieur des blocs optiques.</p></td>
									<td><img src="./images/verif/8.png" alt="Réglage intérieur des blocs optiques"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>9</td>
									<td><p>Montrez ou indiquez où se trouve la boîte à fusibles.</p></td>
									<td><img src="./images/verif/9.png" alt="Boîte à fusibles"></td>
								</tr>
								<tr class="derniere_question">
									<td>10</td>
									<td><p>Allumez les feux de croisement et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/10.png" alt="Feux de croisement"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>11</td>
									<td><p>Vérifiez la présence du constat amiable.</p></td>
									<td><img src="./images/verif/11.png" alt="Constat amiable"></td>
								</tr>
								<tr class="derniere_question">
									<td>12</td>
									<td><p>Montrez sur le tableau de bord l'indicateur permettant de contrôler le niveau du carburant.</p></td>
									<td><img src="./images/verif/12.png" alt="Niveau de carburant"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>13</td>
									<td><p>Montrez la commande des feux de détresse.</p></td>
									<td><img src="./images/verif/13.png" alt="Feux de détresse"></td>
								</tr>
								<tr class="derniere_question">
									<td>14</td>
									<td><p>Actionnez la commande de dégivrage de la lunette arrière et montrez le voyant ou le repère indiquant son fonctionnement.</p></td>
									<td><img src="./images/verif/14.png" alt="Dégivrage arrière"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>15</td>
									<td><p>Montrez sur le tableau de bord le voyant signalant la mauvaise fermeture d'un portière.</p></td>
									<td><img src="./images/verif/15.png" alt="Fermeture portière"></td>
								</tr>
								<tr class="derniere_question">
									<td>16</td>
									<td><p>Faites fonctionner le lave-glace avant du véhicule.</p></td>
									<td><img src="./images/verif/16.png" alt="Lave-glace avant"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>17</td>
									<td><p>Montrez sur le tableau de bord le témoin d'alerte signalant une pression insuffisante d'huile dans le moteur.</p></td>
									<td><img src="./images/verif/17.png" alt="Pression insuffisante d'huile"></td>
								</tr>
								<tr class="derniere_question">
									<td>18</td>
									<td><p>Faites fonctionner l'essuie-glace arrière du véhicule.</p></td>
									<td><img src="./images/verif/18.png" alt="Essuie-glace arrière"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>19</td>
									<td><p>Que vous indique l'allumage d'un voyant de couleur rouge lorsque le véhicule roule ?</p></td>
									<td><p>Une anomalie de fonctionnement ou un danger.</p></td>
								</tr>
								<tr>
									<td>20</td>
									<td><p>Montrez où se situe la commande de réglage de hauteur du volant.</p></td>
									<td><img src="./images/verif/20.png" alt="Réglage hauteur du volant"></td>
								</tr>
								<tr class="derniere_question">
									<td>21</td>
									<td><p>Faites fonctionner le lave-glace arrière du véhicule.</p></td>
									<td><img src="./images/verif/21.png" alt="Lave-glace arrière"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>22</td>
									<td><p>Montrez tous les volets d'aération permettant de diriger l'air arrivant dans l'habitacle.</p></td>
									<td><img src="./images/verif/22.png" alt="Volets d'aération"></td>
								</tr>
								<tr class="derniere_question">
									<td>23</td>
									<td><p>Mettez le système de ventilation sur la position permettant le désembuage du pare-brise.</p></td>
									<td><img src="./images/verif/23.png" alt="Désembuage"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>24</td>
									<td><p>Montrez sur le tableau de bord le témoin d'alerte signalant un défaut ou une insuffisance de charge de la batterie.</p></td>
									<td><img src="./images/verif/24.png" alt="Défaut charge de la batterie"></td>
								</tr>
								<tr class="derniere_question">
									<td>25</td>
									<td><p>Montrez sur le tableau de bord le témoin d'alerte avertissant du serrage de frein à main.</p></td>
									<td><img src="./images/verif/25.png" alt="Frein à main"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>26</td>
									<td><p>Montrez sur le tableau de bord le témoin d'alerte signalant un niveau insuffisant du liquide de frein.</p></td>
									<td><img src="./images/verif/26.png" alt="Insuffisance du liquide de frein"></td>
								</tr>
								<tr class="derniere_question">
									<td>27</td>
									<td><p>Montrez la commande permettant de régler la vitesse du ventilateur d'air.</p></td>
									<td><img src="./images/verif/27.png" alt="Frein à main"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>28</td>
									<td><p>Montrez l'emplacement des coussins gonflables de sécurité (air bags) dans la voiture.</p></td>
									<td><img src="./images/verif/28.png" alt="Air bags"></td>
								</tr>
								<tr class="derniere_question">
									<td>29</td>
									<td><p>Faites fonctionner les essuie-glaces avant du véhicule.</p></td>
									<td><img src="./images/verif/29.png" alt="Essuie-glaces avant"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>30</td>
									<td><p>Montrez où se situe la commande de réglage de l'inclinaison du dossier du siège conducteur.</p></td>
									<td><img src="./images/verif/30.png" alt="Inclinaison du siège conducteur"></td>
								</tr>
								<tr>
									<td>31</td>
									<td><p>Que vous indique l'allumage d'un voyant de couleur orange ?</p></td>
									<td><p>Signale au conducteur un élément important, mais non dangereux.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>32</td>
									<td><p>Montrez sur le tableau de bord le témoin d'alerte ou la zone rouge de l'indicateur de température signalant une température élevée du liquide de refroidissement.</p></td>
									<td><img src="./images/verif/32.png" alt="Température élevée du liquide de refroidissement"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>33</td>
									<td><p>Allumez les feux de position et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/33.png" alt="Feux de position"></td>
								</tr>
								<tr class="derniere_question">
									<td>34</td>
									<td><p>Actionnez la commande des feux de détresse et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/34.png" alt="Feux de détresse"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>35</td>
									<td><p>Allumez le(s) feu(x) de brouillard arrière et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/35.png" alt="Feu brouillard arrière"></td>
								</tr>
								<tr class="derniere_question">
									<td>36</td>
									<td><p>Allumez les feux de brouillard avant et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/36.png" alt="Feux brouillard arrière"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>37</td>
									<td><p>Ouvrez ou fermez la vitre latérale côté conducteur.</p></td>
									<td><img src="./images/verif/37.png" alt="Vitre latérale"></td>
								</tr>
								<tr class="derniere_question">
									<td>38</td>
									<td><p>Actionnez la commande intérieure de fermeture centralisée des portes du véhicule.</p></td>
									<td><img src="./images/verif/38.png" alt="Fermeture centralisée"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>39</td>
									<td><p>Montrez l'emplacement de toutes les buses d'aération sur le tableau de bord du véhicule.</p></td>
									<td><img src="./images/verif/39.png" alt="Buses d'aération"></td>
								</tr>
								<tr class="derniere_question">
									<td>40</td>
									<td><p>Mettez le rétroviseur intérieur en position "nuit".</p></td>
									<td><img src="./images/verif/40.png" alt="Rétroviseur intérieur en mode nuit"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>41</td>
									<td><p>Montrez, sans l'actionner, la commande de l'avertisseur sonore.</p></td>
									<td><img src="./images/verif/41.png" alt="Avertisseur sonore"></td>
								</tr>
								<tr>
									<td>42</td>
									<td><p>De quelle couleur est le voyant qui indique au conducteur que le feu de brouillard arrière est allumé ? Quand l'utilisez-vous ?</p></td>
									<td><p>Orange ou orangée. Par temps de brouillard et de chute de neige.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>43</td>
									<td><p>Montrez la commande permettant de diriger l'air arrivant dans l'habitacle vers le pare-brise.</p></td>
									<td><img src="./images/verif/43.png" alt="Direction de l'air dans l'habitacle"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>44</td>
									<td><p>Allumez les feux de route et montrez le voyant correspondant sur le tableau de bord.</p></td>
									<td><img src="./images/verif/44.png" alt="Feux de route"></td>
								</tr>
								<tr>
									<td>45</td>
									<td><p>Que vous indique le voyant de couleur bleue ?</p></td>
									<td><p>Le fonctionnement des feux de route.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>46</td>
									<td><p>Indiquez, sur le tableau de bord, le voyant signalant l'absence de bouclage de la ceinture de sécurité.</p></td>
									<td><img src="./images/verif/46.png" alt="Absence de bouclage de la ceinture de"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>47</td>
									<td><p>Vérifiez la présence de l'attestation d'assurance du véhicule et de sa vignette sur le pare-brise.</p></td>
									<td><img src="./images/verif/47.png" alt="Attestation d'assurance du véhicule"></td>
								</tr>
								<tr class="derniere_question">
									<td>48</td>
									<td><p>Mettez la commande du chauffage sur "air chaud".</p></td>
									<td><img src="./images/verif/48.png" alt="Air chaud"></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>49</td>
									<td><p>Manipulez le pare-soleil reservé au conducteur de façon à l'orienter du côté de la portière avant gauche et le remettre en position normale.</p></td>
									<td><img src="./images/verif/49.png" alt="Pare-soleil"></td>
								</tr>
								<tr class="derniere_question">
									<td>50</td>
									<td><p>Montrez, sur le tableau de bord, le voyant d'alerte de niveau minimum de carburant.</p></td>
									<td><img src="./images/verif/50.png" alt="Niveau minimum de carburant"></td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>
			<?php } else { ?>
				<ul id="verif_exter">
					<li>
						<h1>Compartiment moteur</h1>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Lave-glace</td>
								</tr>
								<tr class="premiere_question derniere_question">
									<td>1</td>
									<td>Montrez l'orifice de remplissage du produit lave-glace. Pourquoi est-il préférable d'utiliser un liquide spécial en hiver ?</td>
									<td>Pour éviter le gel du liquide</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Refroidissement</td>
								</tr>
								<tr class="premiere_question">
									<td>2</td>
									<td><p>Montrez où doit s'effectuer le contrôle du niveau du liquide de refroidissement.</p><p>Quel est le danger si l'on effectue ce contrôle avec le moteur chaud ?</p></td>
									<td><p>Vase d'expansion ou bocal de réserve.</p><p>Risque de brûlures.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>3</td>
									<td><p>Montrez où doit s'effectuer le contrôle du niveau du liquide de refroidissement.</p><p>Quelle est la principale conséquence d'un liquide de refroidissement ?</p></td>
									<td><p>Vase d'expansion ou bocal de réserve.</p><p>Risque d'échauffement anormal du moteur.</p></td>
								</tr>
							</tbody>
						</table>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Niveau d'huile</td>
								</tr>
								<tr class="premiere_question">
									<td>4</td>
									<td><p>Montrez où doit s'effectuer le contrôle du niveau d'huile moteur.</p><p>En général, dans quelles conditions effectuez-vous cette opération ?</p></td>
									<td><p>La jauge.</p><p>Moteur froid et sur plan horizontal.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>5</td>
									<td><p>Montrez où doit s'effectuer le contrôle du niveau d'huile moteur.</p><p>Où doit se situer le niveau de l'huile ?</p></td>
									<td><p>La jauge.</p><p>Entre repère mini et maxi.</p></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Remplissage huile</td>
								</tr>
								<tr class="premiere_question">
									<td>6</td>
									<td><p>Montrez l'orifice de remplissage d'huile moteur.</p><p>Avec quel fluide complétez-vous le niveau si nécessaire ?</p></td>
									<td>Pour moteur de même type (essence ou diesel), avec de l'huile ayant des caractéristiques identiques.</td>
								</tr>
								<tr class="derniere_question">
									<td>7</td>
									<td><p>Montrez l'orifice de remplissage d'huile moteur.</p><p>Quel est le principal risque d'un manque d'huile moteur ?</p></td>
									<td>Risque de détérioration ou de casse moteur.</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Assistance de direction</td>
								</tr>
								<tr class="premiere_question">
									<td>8</td>
									<td><p>Montrez où doit s'effectuer le contrôle du niveau du liquide d'assistance de direction.</p><p>Quelle est la principale conséquence d'un manque de liquide d'assistance de direction ?</p></td>
									<td><p>Plus d'assistance de direction.</p><p>Le volant devient difficile à tourner.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>9</td>
									<td><p>Montrez où doit s'effectuer le contrôle du niveau du liquide d'assistance de direction.</p><p>Que faire en cas de baisse importante du niveau du liquide d'assistance de direction ?</p></td>
									<td>Faire examiner le véhicule par un spécialiste ou un garagiste.</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Frein</td>
								</tr>
								<tr class="premiere_question">
									<td>10</td>
									<td><p>Montrez où doit s'effectuer le contrôle du liquide de frein.</p><p>Quel est le principal risque d'un défaut d'entretien relatif au liquide de frein ?</p></td>
									<td>Risque de perte d'efficacité totale ou partielle du freinage.</td>
								</tr>
								<tr class="derniere_question">
									<td>11</td>
									<td><p>Montrez où doit s'effectuer le contrôle du liquide de frein.</p><p>Que faire en cas de baisse importante du niveau de liquide de frein ?</p></td>
									<td>Faire examiner le véhicule par un spécialiste ou un garagiste.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Batterie</td>
								</tr>
								<tr class="premiere_question">
									<td>12</td>
									<td><p>Montrez où se trouve la batterie du véhicule.</p><p>Qu'est-ce qui peut provoquer la décharge d'une batterie ?</p></td>
									<td>Tous les feux ou les accesoires électriques ou l'auto-radio.</td>
								</tr>
								<tr class="derniere_question">
									<td>13</td>
									<td><p>Montrez où se trouve la batterie du véhicule.</p><p>Quelle est la solution en cas de panne de batterie pour démarrer le véhicule sans la déplacer ?</p></td>
									<td>Brancher une deuxième batterie en parallèle (les "+" ensemble et les "-" ensemble) ou la remplacer.</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tbody>
								<tr>
									<td class="sous_titre" colspan="3">Réglage des feux</td>
								</tr>
								<tr class="premiere_question derniere_question">
									<td>14</td>
									<td><p>Indiquez dans le compartiment moteur où s'effectue le réglage des feux.</p><p>Quelles sont les conséquences d'un mauvais réglage des feux ?</p></td>
									<td>Mauvaise vision vers l'avant, risque d'être moins bien vu et risque d'éblouissement des autres usagers.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Avant : éclairage obligatoire</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>15</td>
									<td><p>Montrez l'emplacement où s'effectue le changement des ampoules sur l'un des feux à l'avant du véhicule.</p><p>Quelle est la précaution à prendre pour manipuler une ampoule halogène ?</p></td>
									<td>Ne pas toucher avec les doigts.</td>
								</tr>
								<tr>
									<td>16</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de position.</p><p>Quand les utilise-t-on ?</p></td>
									<td>De nuit, pour circuler dans une agglomération éclairée. Pour s'arrêter et stationner sur la chaussée, en agglo lorsque la chaussée n'est pas éclairée et hors agglo lorsque les circonstances l'exigent.</td>
								</tr>
								<tr>
									<td>17</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de croisement.</p><p>Quelles sont les conséquences en cas de panne d'un feu de croisement ?</p></td>
									<td>Diminution de l'éclairage et risque d'être confondu avec un véhicule à deux roues.</td>
								</tr>
								<tr>
									<td>18</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de croisement.</p><p>Quelles sont les conséquences d'un mauvais réglage de ces feux ?</p></td>
									<td>Mauvaise vision vers l'avant er risque d'éblouissement des autres usagers.</td>
								</tr>
								<tr>
									<td>19</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de route.</p><p>Dans quel cas utilise-t-on l'appel lumineux ?</p></td>
									<td>Pour avertir de son approche.</td>
								</tr>
								<tr class="derniere_question">
									<td>20</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des clignotants droits, y compris des répétiteurs latéraux s'ils existent.</p><p>Quelle est la signification de l'augmentation de la fréquence de clignotement au niveau du feu et du voyant du tableau de bord ?</p></td>
									<td>Non fonctionnement de l'un des indicateurs de changement de direction (ou des clignotants).</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>21</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des clignotants droits, y compris des répétiteurs latéraux s'ils existent.</p><p>Quand les utilise-t-on ?</p></td>
									<td>Pour avertir lors des changements de direction, lors des arrêts et des départs.</td>
								</tr>
								<tr>
									<td>22</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des clignotants gauches, y compris des répétiteurs latéraux s'ils existent.</p><p>Quelle est la signification de l'augmentation de la fréquence de clignotement au niveau du feu et du voyant du tableau de bord ?</p></td>
									<td>Non fonctionnement de l'un des indicateurs de changement de direction (ou des clignotants).</td>
								</tr>
								<tr>
									<td>23</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des clignotants gauches, y compris des répétiteurs latéraux s'ils existent.</p><p>Quand les utilise-t-on ?</p></td>
									<td>Pour avertir lors des changements de direction, lors des arrêts et des départs.</td>
								</tr>
								<tr>
									<td>24</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de détresse à l'avant et à l'arrière du véhicule.</p><p>Quelle est la signification de l'augmentation de la fréquence de clignotement au niveau du feu et du voyant du tableau de bord ?</p></td>
									<td>Non fonctionnement de l'une des ampoules des feux de détresse.</td>
								</tr>
								<tr class="derniere_question">
									<td>25</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de détresse à l'avant et à l'arrière du véhicule.</p><p>Quand les utilise-t-on ?</p></td>
									<td>En cas de ralentissement important, pour signaler un véhicule en panne ou accidenté sur la chaussée.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Avant : éclairage facultatif</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>26</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de brouillard avant.</p><p>Dans quel cas peut-on les utiliser en complément des feux de route ?</p></td>
									<td>La nuit, hors agglo, sur route sinueuse, hors cas de croisement ou de dépassement.</td>
								</tr>
								<tr>
									<td>27</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux de brouillard avant.</p><p>Dans quels cas les utilise-t-on ?</p></td>
									<td>Brouillard, neige, forte pluie, routes sinueuses.</td>
								</tr>
								<tr class="derniere_question">
									<td>28</td>
									<td><p>Contrôlez l'état de tous vos balais d'essuie-glace du véhicule.</p><p>Comment détecte-t-on leur usure en circulation ?</p></td>
									<td><p>Soulever le balai pour effectuer un contrôle visuel.</p><p>En cas de pluie, ils laissent des traces sur le pare-brise.</p></td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Essuie-glace et pare-brise</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>29</td>
									<td><p>Contrôlez l'état de tous vos balais d'essuie-glace du véhicule.</p><p>Avant le départ, quelle est la précaution à prendre en cas de neige sur le pare-brise ?</p></td>
									<td><p>Soulever le balai pour effectuer un contôle visuel.</p><p>Dégager la totalité du pare-brise.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>30</td>
									<td><p>De l'extérieur, contrôlez l'état et la propreté du pare-brise.</p><p>Est-il possible de faire réparer un impact ? Si oui, par qui ?</p></td>
									<td>OUI, par un spécialiste.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Pneumatiques</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>31</td>
									<td><p>Contrôlez le flanc extérieur sur l'un des pneumatiques avant.</p><p>Qu'est-ce que l'aquaplanage et quelle peut-être sa conséquence ?</p></td>
									<td><p>Pas de déchirures ni de hernie.</p><p>Présence d'un film d'eau entre le pneu et la chaussée. Perte d'adhérence des pneus sur la chaussée.</p></td>
								</tr>
								<tr>
									<td>32</td>
									<td><p>Contrôlez le flanc extérieur sur l'un des pneumatiques avant.</p><p>Quelle est la conséquence d'un défaut de parallélisme sur les pneumatiques ?</p></td>
									<td><p>Pas de déchirures ni de hernie.</p><p>Usure rapide et anormale des pneus.</p></td>
								</tr>
								<tr>
									<td>33</td>
									<td><p>Contrôlez le flanc extérieur sur l'un des pneumatiques avant.</p><p>En règle générale, dans quelle condition devez-vous contrôler la pression ?</p></td>
									<td><p>Pas de déchirures ni de hernie.</p><p>Lorsque le pneu est froid.</p></td>
								</tr>
								<tr>
									<td>34</td>
									<td><p>Contrôlez le flanc extérieur sur l'un des pneumatiques arrière.</p><p>A l'aide de la notice d'utilisation ou de la plaque indicative située sur le véhicule, indiquez les pressions préconisées pour ce véhicule.</p></td>
									<td><p>Pas de déchirures ni de hernie.</p><p>Voir la plaque du véhicule, à défaut la notice d'utilisation.</p></td>
								</tr>
								<tr class="derniere_question">
									<td>35</td>
									<td><p>Montrez une valve de gonflage d'un pneumatique.</p><p>Quelles sont les vérifications à effectuer au niveau d'un flanc du véhicule ?</p></td>
									<td>Pas de déchirures ni de hernie.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Divers</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>36</td>
									<td><p>Contrôlez l'état et la propreté de tous les rétroviseurs extérieurs du véhicule.</p><p>Qu'appelle-t-on "angle mort" ?</p></td>
									<td>C'est une zone sans visibilité depuis le poste de conduite.</td>
								</tr>
								<tr>
									<td>37</td>
									<td><p>Contrôlez l'état et la propreté de tous les rétroviseurs extérieurs du véhicule.</p><p>Quels sont les 3 principaux dangers répresentés par les "angles morts" ?</p></td>
									<td>Risque d'accident, gêne, défaut ou manque d'informations.</td>
								</tr>
								<tr>
									<td>38</td>
									<td><p>Indiquez où se situe la sécurité enfant sur l'une des portières arrière du véhicule.</p><p>En règle générale, où doit être placé un passager de moins de 10 ans ?</p></td>
									<td>A l'arrière.</td>
								</tr>
								<tr class="derniere_question">
									<td>39</td>
									<td><p>Ouvrez la trappe de carburant et/ou vérifiez la bonne fermeture du bouchon.</p><p>Quelles sont les précautions à prendre lors du remplissage du réservoir ?</p></td>
									<td>Arrêter le moteur et ne pas faire déborder le carburant du réservoir.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Arrière : éclairage et plaque</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>40</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement du ou des feux brouillard arrière.</p><p>Dans quels cas les utilise-t-on ?</p></td>
									<td>Brouillard et neige.</td>
								</tr>
								<tr>
									<td>41</td>
									<<td><p>Contrôlez l'état, la propreté et le fonctionnement du ou des feux brouillard arrière.</p><p>Peut-on les utiliser par temps de pluie ?</p></td>
									<td>NON.</td>
								</tr>
								<tr>
									<td>42</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux stop (avec l'assistance de l'accompagnateur).</p><p>Quelle est la conséquence en cas de panne des feux stop ?</p></td>
									<td>Absence d'information pour le véhicule suiveur avec risque de collision.</td>
								</tr>
								<tr class="derniere_question">
									<td>43</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement des feux stop (avec l'assistance de l'accompagnateur).</p><p>Quelle est leur utilité ?</p></td>
									<td>Avertir le véhicule suiveur lors d'un ralentissement ou d'un arrêt.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>44</td>
									<td><p>Contrôlez l'état, la propreté et le fonctionnement du ou des feux de marche arrière.</p><p>A quoi sert-il ?</p></td>
									<td>Eclairer la zone de marche arrière la nuit ou avertir les autres usagers de son intention de reculer.</td>
								</tr>
								<tr>
									<td>45</td>
									<td><p>Vérifiez l'état et la propreté des plaques d'immatriculation et des dispositifs réfléchissants (catadioptres).</p><p>Quelle est l'utilité des dispositifs réfléchissants ?</p></td>
									<td>Rendre visible le véhicule la nuit.</td>
								</tr>
								<tr>
									<td>46</td>
									<td><p>Vérifiez l'état et la propreté des plaques d'immatriculation et des dispositifs réfléchissants (catadioptres).</p><p>Quel dispositif est obligatoire pour rendre la plaque d'immatriculation arrière lisible la nuit ?</p></td>
									<td>L'éclairage.</td>
								</tr>
								<tr class="derniere_question">
									<td>47</td>
									<td><p>Vérifiez l'état et la propreté des plaques d'immatriculation et des dispositifs réfléchissants (catadioptres).</p><p>Une plaque d'immatriculation arrière à fond blanc est-elle autorisée ?</p></td>
									<td>OUI.</td>
								</tr>
							</tbody>
						</table>
					</li>
					<li>
						<h1>Equipement de secours</h1>
						<table>
							<tbody>
								<tr class="premiere_question">
									<td>48</td>
									<td><p>Montrez l'emplacement où s'effectue le changement des ampoules sur l'un des feux à l'arrière du véhicule.</p><p>Quelle est la précaution à prendre pour manipuler une ampoule halogène ?</p></td>
									<td>Ne pas toucher avec les doigts.</td>
								</tr>
								<tr class="derniere_question">
									<td>49</td>
									<td><p>Montrez où se trouve la roue de secours (ou en son absence la bombe anticrevaison) dans le véhicule.</p><p>Pourquoi devez-vous vérifier régulièrement l'état et la pression des pneumatiques ?</p></td>
									<td>Pour avoir une bonne tenue de route, pour éviter l'échauffement voire l'éclatement, l'aquaplanage et ne pas augmenter la consommation de carburant (pneus sous gonflés).</td>
								</tr>
							</tbody>
						</table>
						<h1>Chargement</h1>
						<table>
							<tbody>
								<tr class="premiere_question derniere_question">
									<td>50</td>
									<td><p>Vérifiez le contenu du coffre.</p><p>Lorsque vous transportez un poids important dans le coffre de votre véhicule, quelles sont les précautions à prendre, en ce qui concerne les pneumatiques et les feux avant ?</p></td>
									<td>Augmenter la pression des pneus si nécessaire et régler les feux avant.</td>
								</tr>
							</tbody>
						</table>
					</li>
				</ul>
			<?php } ?>
		</div>
		<div id="navigation_verif">
			<button id="top"></button>
			<?php if(isset($_POST['verif']) && $_POST['verif'] == 'inter') { ?>
			<div class="menu_verif" id="menu_verif_inter"></div>
			<?php } else { ?>
			<div class="menu_verif" id="menu_verif_exter"></div>
			<?php } ?>
			<button id="bottom"></button>
			<div title="Retour à l'espace perso" id="backEspacePerso"></div>
		</div>
		<div id="zoom_image"></div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			var sliderVerif  = $('#slider_verif ul'), // contient la liste des différents slides
			  	slides       = sliderVerif.children('li'), // contient tous les différents slides
				slidesHeight = 500, // slides.height(), // Largueur de slide
				slidesLength = slides.length; // Nombre de slides
				btn_top      = $('#navigation_verif').find('#top'), // .find : Get the descendants of each element in the current set of matched elements
				btn_bottom   = $('#navigation_verif').find('#bottom'),
				compteurVerif     = 0,
				iVerif            = 0;

			// console.log(slidesHeight);
			// console.log($('#slider_verif').height());
			/*** MENU ***/
			if(slidesLength) { // S'il y a des slides
				$('<ul></ul>').appendTo('.menu_verif'); // On ajoute le menu dans le bloc #navigation
				for(iVerif = 0 ; iVerif < slidesLength; iVerif++){ // On parcourt les slides
					$('<li>').appendTo($('.menu_verif ul')); // On rajoute les boutons au menu
					slides[iVerif] === $('.menu_verif ul li')[iVerif]; // On fait correspondre le slide avec le bouton adéquat (1 avec 1, 2 avec 2, etc...)
				}

				// Effets lors du clic
				var slide_actuel = $('.menu_verif ul li').index(); // On récupère l'index du bouton (premier bouton) en cours (actuellement sélectionné)
				$('.menu_verif ul li').eq(slide_actuel).addClass('nav-active'); // On sélectionne le bouton d'index slide_actuel avec .eq() auquel on affecte la classe nav-active

				$('.menu_verif ul li').click(function() { // Au clic sur un bouton du menu
					$('.menu_verif ul li').removeClass('nav-active');
					var indice = $(this).index(); // On recupère l'index du bouton cliqué
					compteurVerif = indice;
					$(this).addClass('nav-active'); // On ajoute à celui-ci la classe nav-active
					sliderVerif.animate({marginTop : slidesHeight * (-indice)});// Et on récupère grâce à l'indice la bonne position de l'image
				});
			}

			/*** NAVIGATION AVEC LES FLECHES ***/
			btn_top.click(function() { // Au clic sur la flèche du haut
				if(compteurVerif > 0){
				 	compteurVerif--;
					sliderVerif.animate({marginTop : '+=' + slidesHeight},'slow','easeInOutCirc');
					changerBoutonsMenu($(this),compteurVerif);
				 }
			}); 

			btn_bottom.click(function() { // AU clic sur la flèche du bas
				if(compteurVerif < slidesLength -1){
				 	compteurVerif++;
					sliderVerif.animate({marginTop : slidesHeight * (-compteurVerif)},'slow','easeInOutCirc');
					changerBoutonsMenu($(this),compteurVerif);	
				 }
			});

			$(document).on('click','#slider_verif #verif_inter tr td img',function() {
				$('#zoom_image').html('<div id="retour_verif"></div>');
				$('#zoom_image').append('<img src="' + $(this).attr('src') + '" />');
				$('body').addClass('affichageImageBody');
				$('html').addClass('affichageImageHtml');
				$('#zoom_image').fadeIn(500);
			});

			$(document).on('click','#retour_verif',function() {
				$('body').removeClass('affichageImageBody');
				$('html').removeClass('affichageImageHtml');
				$('#zoom_image').fadeOut(500);
			});
		});

		function changerBoutonsMenu(bouton,compteurVerif){
			bouton.parent().find('li').removeClass('nav-active');
			bouton.parent().find('li:eq('+ compteurVerif + ')').addClass('nav-active');
		}
	</script>
</div>