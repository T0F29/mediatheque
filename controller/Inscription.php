<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mediatheque\Controller;

use \Mediatheque\Model\Dao\ManagerUtilisateurs;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../model/dao/ManagerUtilisateurs.php');

class Inscription extends Controller{  
    

    public function run() {
        if (isset($_SESSION['user_id']))
        {
            header("Location: index.php?action=Catalogue",true,303);
        }
        else
        {
            $view = new \Mediatheque\View\View('InscriptionView');
            $view->render(NULL); 
        }
        

    }

}
