<?php

namespace Mediatheque\Model\Entities;

class Utilisateur {
    protected $id;
    protected $nom;
    protected $prenom;
    protected $login;
    protected $password;
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    function setLogin($login) {
        $this->login = $login;
    }
    
    function setPassword($password) {
        $this->password = $password;
    }




}
