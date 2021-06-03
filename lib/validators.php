<?php

// fonction de validation
function est_vide(string $valeur): bool {
    return empty($valeur);
}

function est_entier($valeur): bool {
   // $entier = (int) $valeur;
    return is_numeric($valeur);
}

function est_superieur(int $valeur): bool {
    return $valeur > VAL;
}

function verif_taille(string $valeur): bool {
    return strlen($valeur) <= 19;
}

/**
 * validation login
 *
 * @param mixed $valeur
 * @param string $key
 * @return array
 */
function validation_login($valeur, string $key, array &$arrayError): void {
    if (est_vide($valeur)) {
        $arrayError[$key] = "Le login est obligatoire";
    } elseif (!est_email($valeur)) {
        $arrayError[$key] = "Le login doit être un email";
    }
}

function validation_password($valeur, string $key, array &$arrayError, int $min = 6, int $max = 10): void {
    if (est_vide($valeur)) {
        $arrayError[$key] = "Le password est obligatoire";
    } elseif (strlen($valeur) < $min || strlen($valeur) > $max) {
        $arrayError[$key] = "Le password doit être compris entre ".$min." et ".$max;
    }
} 

/**
 * validation du formulaire
 *
 * @param array $arrayError
 * @return boolean
 */
function form_valid(array $arrayError): bool {
    return count($arrayError) == 0;
}

function est_email($valeur): bool {
    return filter_var($valeur, FILTER_VALIDATE_EMAIL);
}

function validation_champ($valeur, string $key, array &$arrayError): void {
    if (est_vide($valeur)) {
        $arrayError[$key] = "Le champ est obligatoire";
    }
}

?>