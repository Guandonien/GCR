<?php
require_once INCLUDES_ENTETE;
?>

<div id="droite">
    <h1>Pharmacopée</h1>

    <?php
    switch ($_REQUEST['action']) {
        case PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_FAMILLE:
            ?>
            <form name="formChoixFamilleMedicament" id="formChoixFamilleMedicament" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_MEDICAMENT; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisir une famille de médicament', 'lstFamilleMedicament', 'lstFamilleMedicament', 5, getListeFamilleMedicament())
                . formBoutonSubmit('btnFamilleMedicamentOk', 'btnFamilleMedicamentOk', 'Ok', 10);
                ?>
            </form>
            <?php
            break;

        case PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_MEDICAMENT:
            ?>
            <form name="formChoixFamilleMedicament" id="formChoixFamilleMedicament" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_MEDICAMENT; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisir une famille de médicament', 'lstFamilleMedicament', 'lstFamilleMedicament', 5, getListeFamilleMedicament(), $_POST['lstFamilleMedicament'])
                . formBoutonSubmit('btnFamilleMedicamentOk', 'btnFamilleMedicamentOk', 'Ok', 10);
                ?>
            </form>

            <form name="formChoixMedicament" id="formChoixMedicament" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_MEDICAMENTS_AFFICHAGE_FICHE; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisir un médicament', 'lstMedicament', 'lstMedicament', 15, getListeMedicament($_POST['lstFamilleMedicament']), $_POST['lstFamilleMedicament'])
                . formBoutonSubmit('btnMedicamentOk', 'btnMedicamentOk', 'Ok', 20)
                . formInputHidden('hdChoixFamilleMedicament', 'hdChoixFamilleMedicament', $_POST['lstFamilleMedicament']);
                ?>
            </form>

            <?php
            break;

        case PAGE_FORMULAIRE_MEDICAMENTS_AFFICHAGE_FICHE:
            ?>
            <form name="formChoixFamilleMedicament" id="formChoixFamilleMedicament" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_MEDICAMENT; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisir une famille de médicament', 'lstFamilleMedicament', 'lstFamilleMedicament', 5, getListeFamilleMedicament(), $_POST['hdChoixFamilleMedicament'])
                . formBoutonSubmit('btnFamilleMedicamentOk', 'btnFamilleMedicamentOk', 'Ok', 10)
                ?>
            </form>

            <form name="formChoixMedicament" id="formChoixMedicament" method="post" action="index.php?action=<?php echo PAGE_FORMULAIRE_MEDICAMENTS_AFFICHAGE_FICHE; ?>">
                <?php
                echo formSelectDepuisRecordset('Choisir un médicament', 'lstMedicament', 'lstMedicament', 15, getListeMedicament($_POST['hdChoixFamilleMedicament']), $_POST['lstMedicament'])
                . formBoutonSubmit('btnMedicamentOk', 'btnMedicamentOk', 'Ok', 20)
                . formInputHidden('hdChoixFamilleMedicament', 'hdChoixFamilleMedicament', $_POST['hdChoixFamilleMedicament']);
                ?>
            </form>

            <?php
            $resultat = getInfosMedicament($_POST['lstMedicament']);
            $ligne = $resultat->fetch();

            echo formInputText('DEPOT LEGAL', 'txtDepotLegal', 'txtDepotLegal', $ligne['LAB_NOM'], 25, 25, 25, true, false)
            . formInputText('NOM COMMERCIAL', 'txtNomCommercial', 'txtNomCommercial', $ligne['MED_NOM'], 10, 25, 30, true, false)
            . formInputText('FAMILLE', 'txtFamille', 'txtFamille', $ligne['FAM_LIBELLE'], 3, 25, 35, true, false)
            . formTextArea('COMPOSITION', 'txtComposition', 'txtComposition', $ligne['MED_COMPO'], 50, 2, 125, 40, true)
            . formTextArea('EFFETS', 'txtEffets', 'txtEffets', $ligne['MED_EFFETS'], 50, 5, 125, 45, true)
            . formTextArea('CONTRE INDIC.', 'txtContreIndic', 'txtContreIndic', $ligne['MED_CONTREINDIC'], 50, 5, 125, 50, true);

            break;
    }
    ?>
</div>

<?php
require_once INCLUDES_PIED;
?>