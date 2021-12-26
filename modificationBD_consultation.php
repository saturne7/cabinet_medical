<HTML>

<head>
    <title>Modification Consultation</title>
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
        <h2>Modifier une consultation</h2>
        <?php
        include("connexion_base.php");

        $date = $_GET["date"];
        $duree = $_GET["duree"];
        $heure = $_GET["heure"];
        $id_medecin = $_GET["id_medecin"];
        $id_usager = $_GET["patient"];

            $reqUsager = 'SELECT id_medecin
            FROM usager
            WHERE id_usager = '.$_GET['patient'].'';
            $contenuUsager = $linkpdo->prepare($reqUsager);
            $id_medecin = $contenuUsager->execute();
            
            $req = $linkpdo->prepare('UPDATE rendez_vous SET date_rdv=:rdv, duree=:duree, heure_rdv=:heure, id_usager=:id_usager, id_medecin=:id_medecin WHERE id_rendez_vous = :num LIMIT 1');
            $req->bindValue(':num', $_GET['id']);
            $req->bindValue(':rdv', $_GET['date']);
            $req->bindValue(':duree', $_GET['duree']);
            $req->bindValue(':heure', $_GET['heure']);
            $req->bindValue(':id_usager', $_GET['patient']);
            $req->bindValue(':id_medecin', $id_medecin);
            $resultat = $req->execute();
            if ($resultat) {
                echo "La consultation a été modifiée";
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