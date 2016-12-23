<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mediatheque\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../model/dao/ManagerReservations.php');
include(dirname(__FILE__).'/../model/dao/ManagerDocuments.php');


class MesReservations extends Controller{

    public function run() {
        
        $view = new \Mediatheque\View\View('MesReservationsView');

        $reservationsBds = \Mediatheque\Model\Dao\ManagerReservations::recupererReservationsBdsDUnUtilisateur($_SESSION['user_id']);
        $reservationsCds = \Mediatheque\Model\Dao\ManagerReservations::recupererReservationsCdsDUnUtilisateur($_SESSION['user_id']);
        $reservationsLivres = \Mediatheque\Model\Dao\ManagerReservations::recupererReservationsLivresDUnUtilisateur($_SESSION['user_id']);

        //render view

        $view->render(array("reservationsBds"=>$reservationsBds, "reservationsCds"=>$reservationsCds, "reservationsLivres"=>$reservationsLivres));
        
        
    }

}
