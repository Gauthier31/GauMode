<?php

/**
 * sessionhelpers.php
 * @author Equipe 6 | Gauthier Guirola-Boe , Simon Launay , Tatiana Borgi , Gabriel Benniks-Chabbert
 * @SyndicSaas 2021-2022
 */

namespace yasmf;

/**
 * Méthodes utilitaires permettant la gestion des sessions
 * @package yasmf
 */
class sessionhelpers
{

    /**
     * Teste si une session est en route et le cas échéant en lance une.
     */
    public function start_session()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}
