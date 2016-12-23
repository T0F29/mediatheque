<?php

namespace Mediatheque\Model\Entities;

require_once(dirname(__FILE__).'/Document.class.php');

class Cd extends Document {
    
    
    protected $id;
    //protected $document_id;
    protected $auteur;
    
    
    function getId() {
        return $this->id;
    }
    
//    function getDocument_id() {
//        return $this->document_id;
//    }
    
    function getAuteur() {
        return $this->auteur;
    }

    function setId($id) {
        $this->id = $id;
    }
    
//    function setDocument_id($document_id) {
//        $this->document_id = $document_id;
//    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }


    
    
}

