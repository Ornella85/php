<?php
/*
- Faille de sécurité XSS :
		Faille XSS : Mettre une alerte à l'infini dans le corps du message :
			<script type="text/javascript">
			var point = true;
			while(point == true)
			alert("bonjour")
			</script>
		Faille 2/  Mettre une injection css dans le corps du message : 
			<style>
				body{
				display: none;
				}
			</style>
		...injection de fichier JS venant de l'exérieur, redirection forcé (document.location), vol de cookie (document.cookie), redirection non voulu (document.location),  etc.
------------------------------------------------------------------------------------------------
	- Faille de sécurité par INJECTION SQL :
	Exemple d'injection SQL (dans le champ message) :  
		-- ok'); DELETE FROM commentaire; (
------------------------------------------------------------------------------------------------
	- Moyen de contre :
	- strip_tags() permet de supprimer toutes les balises HTML.
	- htmlspecialchars() permet de rendre innoffensives les balises HTML.
	- htmlentities() permet de convertir les balises HTML.
	- prepare + execute permettent d'empécher les injections.
		// $r = $pdo->prepare("INSERT INTO commentaires (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)");
		// $r->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR); // le parametre de la requête SQL, la valeur qu'on lie, le type attendu
		// $r->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
		// $r->execute();
 */
?>