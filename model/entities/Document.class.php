<?php

namespace Mediatheque\Model\Entities;

class Document {
    
    
    protected $id;
    protected $document_id;
    protected $code_ref;
    protected $date_d_enregistrement;
    protected $titre;
    protected $image;
    
    public function getId() {
        return $this->id;
    }
    
    function getDocument_id() {
        return $this->document_id;
    }
    
    function setDocument_id($document_id) {
        $this->document_id = $document_id;
    }
    
    public function getCode_ref() {
        return $this->code_ref;
    }
    
    public function getDate_d_enregistrement() {
        return $this->date_d_enregistrement;
    }
    
    public function getTitre() {
        return $this->titre;
    }
    
    public function getImage() {
        return $this->image;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setCode_ref($code_ref) {
        $this->code_ref = $code_ref;
    }

    public function setDate_d_enregistrement($date_d_enregistrement) {
        $this->date_d_enregistrement = $date_d_enregistrement;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    
}

