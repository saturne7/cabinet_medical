<HTML>

<head>
    <title>Listes consultations</title>
</head>
<link rel="stylesheet" href="style.css">

<body>
    <ul>
        <li><a href="afficherUsager.php">Patients</a></li>
        <li><a href="afficherMedecin.php">Medecins</a></li>
        <li><a class="active" href="afficherConsultation.php">Consultations</a></li>
        <li><a href="statistique.php">Statistiques</a></li>
        <li><a href="index.html">Deconnexion</a></li>
    </ul>
    <div style="margin-left:25%;padding:1px 16px;height:1000px;">
        <h2>Suppression d'une consultation :</h2>

        <?php
        include("connexion_base.php");
        $req = $linkpdo->prepare('DELETE FROM rendez_vous WHERE id_rendez_vous = :num LIMIT 1');

        $req->bindValue(':num', $_GET['numRDV'], PDO::PARAM_STR);

        $resultat = $req->execute();

        if ($resultat) {
            echo "La consultation a été supprimé";
        } else {
            echo "Une erreur est survenue";
        }
        ?>

        <form method="POST" action="afficherConsultation.php">
            <input type="submit" value="Retour"></p>
        </form>
    </div>
</body>

</HTML>