<?php

function SGBDConnect() {
    try {
        $connexion = new PDO('mysql:host=svrslam01;dbname=gsb', 'PPEgsb', 'gsb');
        $connexion->query('SET NAMES UTF8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '<p><b>Erreur : ' . $e->getMessage() . '</b></p><br />';
        exit();
    }

    return $connexion;
}

// ----------------- INFORMATIONS -----------------
function getInfosPraticien($noPraticien) {
    try {
        $connexion = SGBDConnect();

        $requete = 'SELECT PRA_NUM, PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_CP, PRA_VILLE, PRA_COEF, TYP_CODE, TYP_LIBELLE'
                . ' FROM praticien INNER JOIN type_praticien'
                . ' ON praticien.PRA_TYPE = type_praticien.TYP_CODE'
                . ' WHERE PRA_NUM = ' . $noPraticien;

        $resultat = $connexion->query($requete);
        $resultat->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo '<p><b>Erreur : ' . $e->getMessage() . '</b></p><br />';
        exit();
    }

    return $resultat;
}

function getInfosMedicament($codeMedicament) {
    try {
        $connexion = SGBDConnect();

        $requete = 'SELECT MED_CODE, MED_LABO, MED_FAMILLE, LAB_NOM, MED_NOM, FAM_LIBELLE, MED_COMPO, MED_EFFETS, MED_CONTREINDIC'
                . ' FROM (medicament INNER JOIN famille'
                . ' ON medicament.MED_FAMILLE = famille.FAM_CODE) INNER JOIN laboratoire'
                . ' ON medicament.MED_LABO = laboratoire.LAB_CODE'
                . ' WHERE MED_CODE = \'' . $codeMedicament . '\'';

        $resultat = $connexion->query($requete);
        $resultat->setFetchMode(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo '<p><b>Erreur : ' . $e->getMessage() . '</b></p><br />';
        exit();
    }

    return $resultat;
}

function getInformationsConnexionUtilisateur($utilId) {
    $connexion = SGBDConnect();

    $requete = 'SELECT visiteur.VIS_NOM, visiteur.VIS_PRENOM, travail.TRA_ROLE, region.REG_NOM, travail.TRA_DATAFF'
            . ' FROM (travail INNER JOIN visiteur'
            . ' ON travail.TRA_VIS = visiteur.VIS_CODE) INNER JOIN region'
            . ' ON travail.TRA_REG = region.REG_CODE'
            . ' WHERE travail.TRA_VIS = \''. $utilId .'\''
            . ' AND travail.TRA_DATAFF = ( SELECT MAX(travail.TRA_DATAFF) AS \'DERNIER_DATEAFF\' FROM travail WHERE travail.TRA_VIS = \'' . $utilId . '\')';

    $resultat = $connexion->query($requete);

    return $resultat;
}

// -------------------- LISTES --------------------
function getListePraticiens() {
    $connexion = SGBDConnect();

    $requete = 'SELECT PRA_NUM, CONCAT(PRA_NOM, \' \', PRA_PRENOM)'
            . ' FROM praticien'
            . ' ORDER BY PRA_NOM';

    $resultat = $connexion->query($requete);


    return $resultat;
}

function getListeFamilleMedicament() {
    $connexion = SGBDConnect();

    $requete = 'SELECT FAM_CODE, FAM_LIBELLE'
            . ' FROM famille';

    $resultat = $connexion->query($requete);


    return $resultat;
}

function getListeMedicament($famille) {
    $connexion = SGBDConnect();

    $requete = 'SELECT MED_CODE, MED_NOM'
            . ' FROM medicament'
            . ' WHERE MED_FAMILLE = \'' . $famille . '\'';

    $resultat = $connexion->query($requete);

    return $resultat;
}

// A PART
function existeCompteVisiteur($utilisateur, $motDePasse) {
    $connexion = SGBDConnect();

    $requete = 'SELECT visiteur.VIS_CODE, visiteur.VIS_PASSE'
            . ' FROM visiteur'
            . ' WHERE visiteur.VIS_CODE = \'' . $utilisateur . '\''
            . ' AND visiteur.VIS_PASSE = \'' . $motDePasse . '\'';

    $resultat = $connexion->query($requete);

    return $resultat->rowCount();
}

?>