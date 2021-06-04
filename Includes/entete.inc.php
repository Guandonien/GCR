<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>GSB : Suivi de la Visite médicale </title>

        <link rel="stylesheet" href="Styles/gcr.css">
    </head>
    <body>
        <!-- Présentation -->
        <div id="haut">
            <h1>
                <img src="Images/logo.jpg" alt="Logo de GCR" width="100" height="60" />
                Gestion des visites
            </h1>
        </div>

        <!-- Menu de naviguation -->
        <div id="gauche">
            
            <p id="infosUtil">
                <?php echo $_SESSION['prenomUtil'] . ' ' . $_SESSION['nomUtil'] ?><br />
                <?php echo $_SESSION['roleUtil'] ?><br />
                <?php echo 'Region ' . $_SESSION['regionUtil'] ?>
            </p>
            
            <h2>Outils</h2>
            <ul>
                <li>
                    Comptes-Rendus
                    <ul>
                        <li><a href="formRAPPORT_VISITE.html" >Nouveaux</a></li>
                        <li>Consulter</li>
                    </ul>
                </li>
                <li>
                    Consulter
                    <ul>
                        <li><a href="index.php?action=<?php echo PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_FAMILLE; ?>" >Médicaments</a></li>
                        <li><a href="index.php?action=<?php echo PAGE_FORMULAIRE_PRATICIENS_SELECTION_PRATICIENS; ?>" >Praticiens</a></li>
                        <li><a href="formVISITEUR.html" >Autres visiteurs</a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?action=<?php echo PAGE_CONNEXION_FERMETURE_SESSION; ?>">Fermer la session</a>
                </li>
            </ul>
        </div>
