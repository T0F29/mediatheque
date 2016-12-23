<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mediatheque\Controller;

include(dirname(__FILE__).'/Controller.class.php');
include(dirname(__FILE__).'/../model/dao/ManagerDocuments.php');
include(dirname(__FILE__).'/../model/dao/ManagerReservations.php');

class Catalogue extends Controller{

    public function run() {
        
        $view = new \Mediatheque\View\View('CatalogueView');


        $catalogueBds = \Mediatheque\Model\Dao\ManagerDocuments::recupererCatalogueBds();
        $catalogueCds = \Mediatheque\Model\Dao\ManagerDocuments::recupererCatalogueCds();
        $catalogueLivres = \Mediatheque\Model\Dao\ManagerDocuments::recupererCatalogueLivres();

        //render view

        $view->render(array("catalogueBds"=>$catalogueBds, "catalogueCds"=>$catalogueCds, "catalogueLivres"=>$catalogueLivres));
        
        
    }

}
