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

class ValidationInscription extends Controller{  
    

    public function run() {
        
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
        $mdp_confirmation = filter_input(INPUT_POST, 'mdp_confirmation', FILTER_SANITIZE_STRING);
        
        if ($prenom && $nom && $login && $mdp) {
            
            if ($mdp == $mdp_confirmation) {
            
                if (!ManagerUtilisateurs::verifierSiLoginEstUtilise($login)) {

                    $mdp_hashe = password_hash($mdp, PASSWORD_DEFAULT);
                    ManagerUtilisateurs::enregistrerUtilisateur($prenom, $nom, $login, $mdp_hashe);
                    header("Location: index.php?action=Enregistrement",true,303);

                }else{
                    $this->errors = 'Ce nom d\'utilisteur est déjà pris par un utilisateur';
                }

            }else{
                $this->errors = 'Les 2 mots de passes sont différents';
            }
            
           
        }else{
            $this->errors = 'Toutes les données sont obligatoires';
        }
        
        if ($this->hasErrors()){
            //rebuild the form
            $view = new \Mediatheque\View\View('InscriptionView'); 
            $view->render(array("errors"=> $this->errors)); 
        }
    }

}
