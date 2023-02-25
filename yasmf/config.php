<?php

/**
 * config.php
 * @author Equipe 6 | Gauthier Guirola-Boe , Simon Launay , Tatiana Borgi , Gabriel Benniks-Chabbert
 * @SyndicSaas 2021-2022
 */

namespace yasmf;

/**
 * Permet de gérer les paramètres de la configuration de l'application
 * @package yasmf
 */
class config
{
    /**
     * Racine du site à partir de la racine du server
     */
    const RACINE = "";

    /**
     * Permet d'accéder à la racine du serveur, utile pour tout lien absolu du site
     * @return string chemin d'accès à la racine du serveur
     */
    public static function getRacine()
    {
        return self::RACINE;
    }
}
