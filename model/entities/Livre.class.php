<?php

namespace Mediatheque\Model\Entities;

require_once(dirname(__FILE__).'/Document.class.php');

class Livre extends Document {
    
    
    protected $isbn;
    //protected $document_id;
    protected $auteur;
    
    function getIsbn() {
        return $this->isbn;
    }
    
//    function getDocument_id() {
//        return $this->document_id;
//    }
    
    function getAuteur() {
        return $this->auteur;
    }

    function setIsbn($isbn) {
        $this->isbn = $isbn;
    }
    
//    function setDocument_id($document_id) {
//        $this->document_id = $document_id;
//    }

    function setAuteur($auteur) {
        $this->auteur = $auteur;
    }


    
    
}

