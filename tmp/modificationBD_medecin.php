<HTML>

<head>
    <title>Modification Medecin</title>
</head>
<link rel="stylesheet" href="../style/style.css">

<body>
    <ul>
        <li><a href="afficherUsager.php">Patients</a></li>
        <li><a class="active" href="afficherMedecin.php">Medecins</a></li>
        <li><a href="afficherConsultation.php">Consultations</a></li>
        <li><a href="statistique.php">Statistiques</a></li>
        <li><a href="../index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Modifier un medecin</h2>
        <?php
        include("connexion_base.php");
        $req = $linkpdo->prepare('UPDATE medecin SET civilite = :civilite, nom = :nom , prenom = :prenom WHERE id_medecin = :num LIMIT 1');

        $req->bindValue(':civilite', $_GET['civilite'], PDO::PARAM_STR);
        $req->bindValue(':nom', $_GET['nom'], PDO::PARAM_STR);
        $req->bindValue(':prenom', $_GET['prenom'], PDO::PARAM_STR);
        $req->bindValue(':num', $_GET['id'], PDO::PARAM_STR);

        $resultat = $req->execute();

        if ($resultat) {
            echo "Le medecin a été modifié";
        } else {
            echo "Une erreur est survenue";
        }
        ?>


        <form method="POST" action="afficherMedecin.php">
            <input type="submit" value="Retour"></p>
        </form>
    </div>
</body>

</HTML>