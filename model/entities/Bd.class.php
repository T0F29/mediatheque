<?php

namespace Mediatheque\Model\Entities;

require_once(dirname(__FILE__).'/Document.class.php');

class Bd extends Document {
    
    
    protected $id;
    //protected $document_id;
    protected $auteur;
    protected $illustrateur;
    
    function getId() {
        return $this->id;
    }
    
//    function getDocument_id() {
//        return $this->document_id;
//    }
    
    function getAuteur() {
        return $this->auteur;
    }
    
    function getIllustrateur() {
        return $this->illustrateur;
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
    
    function setIllustrateur($illustrateur) {
        $this->illustrateur = $illustrateur;
    }


    
    
}

