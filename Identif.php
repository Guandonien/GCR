<?php
// IDENTIFIANT : a131
// MOT DE PASSE : u532YQf

switch ($_REQUEST['action']) {
    case PAGE_CONNEXION_AFFICHAGE:
        require_once INCLUDES_ENTETE2;
        ?>
        <form name="formIdentification" id="formIdentification" method="post" action="index.php?action=<?php echo PAGE_CONNEXION_TRAITEMENT_CONNEXION; ?>">
            <fieldset>
                <legend>Identifiez-vous</legend>
                <?php
                $size = 25;

                echo formInputText('Utilisateur', 'txtUtilisateur', 'txtUtilisateur', '', $size, 4, 5, false, true)
                . formInputPassword('Mot de passe', 'pwMotDePasse', 'pwMotDePasse', '', $size, 25, 10, false, true)
                . formBoutonSubmit('btnValider', 'btnValider', 'Valider', 15);
                ?>
            </fieldset>
        </form>
        <?php
        require_once INCLUDES_PIED2;

        break;

    case PAGE_CONNEXION_TRAITEMENT_CONNEXION;
        if (valideInfosCompteUtilisateur($_POST['txtUtilisateur'], $_POST['pwMotDePasse'])) {
            // Créer la variable de session utilId pour stocker l'identifiant de l'utilisateur
            ouvreSessionUtilisateur($_POST['txtUtilisateur']);

            // Redirection vers la page d'accueil
            header("Location: index.php?action=" . PAGE_ACCUEIL_AFFICHAGE);
            exit();
        } else {
            require_once INCLUDES_ENTETE2;
            ?>
            <form name="formIdentification" id="formIdentification" method="post" action="index.php?action=<?php echo PAGE_CONNEXION_TRAITEMENT_CONNEXION; ?>">
                <fieldset>
                    <legend>Identifiez-vous</legend>
                    <?php
                    $size = 25;

                    echo formInputText('Utilisateur', 'txtUtilisateur', 'txtUtilisateur', '', $size, 4, 5, false, true)
                    . formInputPassword('Mot de passe', 'pwMotDePasse', 'pwMotDePasse', '', $size, 25, 10, false, true)
                    . formBoutonSubmit('btnValider', 'btnValider', 'Valider', 15);
                    ?>
                </fieldset>
            </form>

            <p class="erreur">Utilisateur et/ou mot de passe invalide(s)</p>
            <?php
            require_once INCLUDES_PIED2;
        }

        break;
    case PAGE_CONNEXION_FERMETURE_SESSION:
        // Ferme la session
        fermeSessionUtilisateur();

        // Redirection vers la page de connexion
        header("Location: index.php?action=" . PAGE_CONNEXION_AFFICHAGE);
        exit();

        break;
}
?>