<?php

namespace Mediatheque\Model\Entities;

class Reservation {

  protected $id;
  protected $date_reservation;
  protected $utilisateur_id;
  protected $document_id;

  function getId() {
      return $this->id;
  }
  
  function getDate_reservation() {
      return $this->date_reservation;
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
  
  function setDate_reservation($date_reservation) {
      $this->date_reservation = $date_reservation;
  }

  function setUtilisateur_id($utilisateur_id) {
      $this->utilisateur_id = $utilisateur_id;
  }

  function setDocument_id($document_id) {
      $this->document_id = $document_id;
  }


  
    
}
