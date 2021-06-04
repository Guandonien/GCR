<?php

/*********************** IMPORTANTS ***********************/

// TETE ET PIED DES PAGES
define('INCLUDES_ENTETE', './Includes/entete.inc.php');
define('INCLUDES_PIED', './Includes/pied.inc.php');

// TETE ET PIED DE LA PAGE DE CONNEXION
define('INCLUDES_ENTETE2', './Includes/entete2.inc.php');
define('INCLUDES_PIED2', './Includes/pied2.inc.php');

/**********************************************************/

/********************** PAGES **********************/

// PAGE DE CONNEXION
define('PAGE_CONNEXION', './Identif.php');                                      // Chemin du fichier
define('PAGE_CONNEXION_AFFICHAGE', 0);                                          // Affichage du formulaire de connexion
define('PAGE_CONNEXION_TRAITEMENT_CONNEXION', 1);                               // Traitement de la connexion
define('PAGE_CONNEXION_FERMETURE_SESSION', 2);                                  // Fermeture de la session

// PAGE D'ACCUEIL
define('PAGE_ACCUEIL_AFFICHAGE', 5);                                            // Affichage de la page d'accueil

// PAGE DE FORMULAIRE DES PRATICIENS
define('PAGE_FORMULAIRE_PRATICIENS', './formPRATICIEN.php');                    // Chemin du fichier
define('PAGE_FORMULAIRE_PRATICIENS_SELECTION_PRATICIENS', 30);                  // Selection du praticien
define('PAGE_FORMULAIRE_PRATICIENS_AFFICHAGE_INFORMATIONS', 31);                // Affichage des informations

// PAGE DE FORMULAIRE DES MEDICAMENTS
define('PAGE_FORMULAIRE_MEDICAMENTS', './formMEDICAMENT.php');                  // Chemin du fichier
define('PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_FAMILLE', 50);                    // Selection de la famille
define('PAGE_FORMULAIRE_MEDICAMENTS_SELECTION_MEDICAMENT', 51);                 // Selection du medicament
define('PAGE_FORMULAIRE_MEDICAMENTS_AFFICHAGE_FICHE', 52);                      // Affichage de la fiche

/***************************************************/

?>