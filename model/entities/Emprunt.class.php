<?php

namespace Mediatheque\Model\Entities;

class Emprunt {

  protected $id;
  protected $date_emprunt;
  protected $date_retour;
  protected $utilisateur_id;
  protected $document_id;

  function getId() {
      return $this->id;
  }
  
  function getDate_emprunt() {
      $this->date_emprunt = new \DateTime;
      return $this->date_emprunt;
  }

  function getDate_retour() {
      return $this->date_retour;
  }

  function getUtilisateur_id() {
      return $this->utilisateur_id;
  }

  function getDocument_id() {
      return $this->document_id;
  }

  function setId($id) {
      $this->id = $id;
  }
  
  function setDate_emprunt($date_emprunt) {
      $this->date_emprunt = new DateTime('date', $date_emprunt);
  }

  function setDate_retour($date_retour) {
      $this->date_retour = $date_retour;
  }

  function setUtilisateur_id($utilisateur_id) {
      $this->utilisateur_id = $utilisateur_id;
  }

  function setDocument_id($document_id) {
      $this->document_id = $document_id;
  }

  
    
}
