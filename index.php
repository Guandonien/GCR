<?php

// Fichier contenant toutes les constantes utilisées par l'application web
require_once './Includes/Constantes.inc.php';

/* Pas besoin de mettre des constantes pour ces importations, car on les importent qu'une seul fois */
require_once './Includes/SourceDonnees.inc.php';
require_once './Includes/Bibliotheque01.inc.php';
require_once './Includes/Securite.inc.php';

// ==============================================================
// Session ouverte:
//  - 0 : Page de connexion                                 => non
//  - 1 : Page de connexion (verification)                  => non
//  - 2 : Page de connexion (fermeture)                     => non
//  - 5 : Page d'accueil                                    => oui - AFFICHAGE DE LA PAGE DE CONNEXION
// Session non ouverte:
//  - Première entrée                                       => oui - AFFICHAGE DE LA PAGE DE CONNEXION
//  - 0 : Page de connexion                                 => oui - AFFICHAGE DE LA PAGE DE CONNEXION
//  - 1 : Page de connexion (verification)                  => non
//  - 2 : Page de connexion (fermeture)                     => oui - AFFICHAGE DE LA PAGE DE CONNEXION
//  - 5 : Page d'accueil                                    => oui - AFFICHAGE DE LA PAGE DE CONNEXION
// ==============================================================

if (!estSessionUtilisateurOuvert() && (!isset($_REQUEST['action']) || $_REQUEST['action'] != PAGE_CONNEXION_TRAITEMENT_CONNEXION)) {
    $_REQUEST['action'] = PAGE_CONNEXION_AFFICHAGE;
}

switch ($_REQUEST['action']) {
    case PAGE_CONNEXION_AFFICHAGE:
        require PAGE_CONNEXION;
        break;
    case PAGE_CONNEXION_TRAITEMENT_CONNEXION:
        require PAGE_CONNEXION;
        break;
    case PAGE_CONNEXION_FERMETURE_SESSION:
        require PAGE_CONNEXION;
        break;
    case PAGE_ACCUEIL_AFFICHAGE:
        require INCLUDES_ENTETE;
        require INCLUDES_PIED;
        break;
    case PAGE_FORMULAIRE_PRATICIENS_SELECTION_PRATICIENS:
        require PAGE_FORMULAIRE_PRATICIENS;
        break;
    case PAGE_FORMULAIRE_PRATICIENS_AFFICHAGE_INFORMATIONS:
        require PAGE_FORMULAIRE_PRATICIENS;
        break;
    case PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_FAMILLE:
        require PAGE_FORMULAIRE_MEDICAMENTS;
        break;
    case PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_MEDICAMENT:
        require PAGE_FORMULAIRE_MEDICAMENTS;
        break;
    case PAGE_FORMULAIRE_MEDICAMENTS_AFFICHAGE_FICHE:
        require PAGE_FORMULAIRE_MEDICAMENTS;
        break;
    default:
        require PAGE_CONNEXION;
        break;
}
?>