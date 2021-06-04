<?php
require_once INCLUDES_ENTETE;
?>

<div id="droite">
    <h1>Praticiens</h1>

    <?php
    switch ($_REQUEST['action']) { // Voici l'erreur : switch (isset($_REQUEST['action']))
        case PAGE_FORMULAIRE_PRATICIENS_SELECTION_PRATICIENS:
            ?>
            <form id="formListeRecherche" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_PRATICIENS_AFFICHAGE_INFORMATIONS; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisissez un praticiens', 'lstPrat', 'lstPrat', '5', getListePraticiens())
                . formBoutonSubmit('btnOk', 'btnOk', 'Ok', '10');
                ?>
            </form>

            <?php
            break;

        case PAGE_FORMULAIRE_PRATICIENS_AFFICHAGE_INFORMATIONS:
            ?>
            <form id="formListeRecherche" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_PRATICIENS_AFFICHAGE_INFORMATIONS; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisissez un praticiens', 'lstPrat', 'lstPrat', '5', getListePraticiens(), $_POST['lstPrat'])
                . formBoutonSubmit('btnOk', 'btnOk', 'Ok', '10');
                ?>
            </form>

            <?php
            $resultat = getInfosPraticien($_POST['lstPrat']);
            $ligne = $resultat->fetch();

            $size = 50;

            echo formInputText('NOM', 'txtNom', 'txtNom', $ligne['PRA_NOM'], $size, '25', 20, true, false)
            . formInputText('PRÉNOM', 'txtPrenom', 'txtPrenom', $ligne['PRA_PRENOM'], $size, '30', 25, true, false)
            . formInputText('ADRESSE', 'txtAdresse', 'txtAdresse', $ligne['PRA_ADRESSE'], $size, '50', 30, true, false)
            . formInputText('VILLE', 'txtVille', 'txtVille', $ligne['PRA_CP'] . ' ' . $ligne['PRA_VILLE'], $size, '30', 35, true, false)
            . formInputText('COEFF NOTORIÉTÉ', 'txtCoefNotoriete', 'txtCoefNotoriete', $ligne['PRA_COEF'], $size, '10', 40, true, false)
            . formInputText('MÉTIER', 'txtNom', 'txtNom', $ligne['TYP_LIBELLE'], $size, '25', 45, true, false);

            break;
    }
    ?>
</div>

<?php
require_once INCLUDES_PIED;
?>