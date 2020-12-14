<?php

/**
 * @return PDO
 */
function connectPDOModel()
{
    try {
        $connexion = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_USER, DB_PWD);
        if(PROD===false) {
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $connexion;

    } catch (PDOException $e) {
        $erreur = $e->getCode();
        $erreur .= " : ";
        $erreur .= $e->getMessage();
        die($erreur);
    }
}