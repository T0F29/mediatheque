<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mediatheque\Controller;


include(dirname(__FILE__).'/Controller.class.php');

class ValidationDeconnexion extends Controller{

    public function run() {
        session_destroy();
        header("Location: index.php?action=Accueil");
    }

}
