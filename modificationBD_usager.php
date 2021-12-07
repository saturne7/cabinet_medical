<HTML>

<head>
    <title>Modification Patient</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <ul>
        <li><a class="active" href="afficherUsager.php">Patients</a></li>
        <li><a href="afficherMedecin.php">Medecin</a></li>
        <li><a href="rdv.php">Consultation</a></li>
        <li><a href="index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Modifier un patient</h2>
        <?php
        include("connexion_base.php");

        $req = $linkpdo->prepare('UPDATE usager SET civilite=:civilite, nom=:nom, prenom =:prenom, adresse=:adresse, ville=:ville, codepostal=:codepostal, date_naissance=:date_naissance, lieu_naissance=:lieu_naissance, num_secu=:num_secu, id_medecin=:id_medecin WHERE id_usager = :num LIMIT 1');
        $req->bindValue(':num', $_GET['id'], PDO::PARAM_STR);
        $req->bindValue(':civilite', $_GET['civilite'], PDO::PARAM_STR);
        $req->bindValue(':nom', $_GET['nom'], PDO::PARAM_STR);
        $req->bindValue(':prenom', $_GET['prenom'], PDO::PARAM_STR);
        $req->bindValue(':adresse', $_GET['adresse'], PDO::PARAM_STR);
        $req->bindValue(':ville', $_GET['ville'], PDO::PARAM_STR);
        $req->bindValue(':codepostal', $_GET['codepostal'], PDO::PARAM_STR);
        $req->bindValue(':date_naissance', $_GET['date_naissance'], PDO::PARAM_STR);
        $req->bindValue(':lieu_naissance', $_GET['lieu_naissance'], PDO::PARAM_STR);
        $req->bindValue(':num_secu', $_GET['num_secu'], PDO::PARAM_STR);
        $req->bindValue(':id_medecin', $_GET['Medecin'], PDO::PARAM_STR);

        $resultat = $req->execute();

        if ($resultat) {
            echo "Le patient a été modifié";
        } else {
            echo "Une erreur est survenue";
        }
        ?>


        <form method="POST" action="afficherUsager.php">
            <input type="submit" value="Retour"></p>
        </form>
    </div>
</body>

</HTML>