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

class ValidationEnregistrement extends Controller{  
    

    public function run() {
        $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        
        
        if ($login && $password){
            
            
            $utilisateur = ManagerUtilisateurs::getUtilisateur($login);
            if (!$utilisateur){
                $this->errors = "Mauvais login ou mot de passe";
            }else{

                 if (!password_verify($password, $utilisateur->getPassword())){
                     
                     $this->errors= "Mauvais login ou mot de passe";


                }else{
                    $_SESSION['user_id'] = $utilisateur->getId();
                    $_SESSION['current_user'] = $utilisateur->getLogin();
                    //fake admin role
                    $_SESSION['isadmin'] = false;
                    if ($utilisateur->getLogin()=='admin'){
                        $_SESSION['isadmin'] = true;
                    }

                    header("Location: index.php?action=Nouveautes",true,303);
                    
                }
                
                
                
            }
            
           
            
           
        }else{
            $this->errors = 'Le login et le mot de passe sont obligatoires';
        }
        
        if ($this->hasErrors()){
            //rebuild the form
            $view = new \Mediatheque\View\View('EnregistrementView'); 
            $view->render(array("errors"=> $this->errors)); 
        }
    }

}
