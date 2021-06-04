<?php

session_start();

function valideInfosCompteUtilisateur($utilisateur, $motDePasse) {
    // Ne pas oublier de convertir le mot de passe en md5, aussi non cela retourne 0 tous le temps.
    return existeCompteVisiteur($utilisateur, md5($motDePasse));
}

function ouvreSessionUtilisateur($utilisateur) {
    $resultat = getInformationsConnexionUtilisateur($utilisateur);
    $ligne = $resultat->fetch();
    
    $_SESSION['utilId'] = $utilisateur;
    $_SESSION['nomUtil'] = $ligne['VIS_NOM'];
    $_SESSION['prenomUtil'] = $ligne['VIS_PRENOM'];
    $_SESSION['roleUtil'] = $ligne['TRA_ROLE'];
    $_SESSION['regionUtil'] = $ligne['REG_NOM'];
}

function estSessionUtilisateurOuvert() {
    return isset($_SESSION['utilId']);
}

function fermeSessionUtilisateur() {
    session_destroy();
}

?>