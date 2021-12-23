<HTML>

<head>
    <title>Ajouter une consultation</title>
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
    <div style="margin-left:25%;padding:1px 16px;">
        <h2>Ajout d'une consultation</h2>
        <?php

        include("connexion_base.php");

        $date = $_POST["date_rdv"];
        $duree = $_POST["duree"];
        $heure = $_POST["heure_rdv"];
        $id_medecin = $_POST["id_medecin"];
        $id_usager = $_POST["id_usager"];

        $req = $linkpdo->prepare('INSERT INTO rendez_vous(date_rdv, duree, heure_rdv, id_medecin, id_usager) 
    VALUES(:date_rdv, :duree, :heure_rdv, :id_medecin, :id_usager)');
        $req->execute(array(
            'date_rdv' => $date,
            'duree' => $duree,
            'heure_rdv' => $heure,
            'id_medecin' => $id_medecin,
            'id_usager' => $id_usager
        ));

        if ($req) {
            echo 'Consultation enregistrée';
        } else {
            echo "Échec de l'opération d'insertion";
        }
        ?>
        <form method="POST" action="afficherConsultation.php">
            <input type="submit" value="Retour"></p>
        </form>
    </div>
</body>

</HTML>