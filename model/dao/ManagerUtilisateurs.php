<?php

namespace Mediatheque\Model\Dao;

require_once(dirname(__FILE__).'/DB.php');
require_once(dirname(__FILE__).'/../entities/Utilisateur.class.php');

use \Mediatheque\Model\Entities\Utilisateur;
use \PDO as PDO;

class ManagerUtilisateurs {

    static function verifierSiLoginEstUtilise($login){
        
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare("SELECT count(*) FROM utilisateur WHERE login = :login");
        $stmt->bindValue(':login', $login);
        $stmt->execute();
	$res = $stmt->fetchColumn();
        return ($res>0);
    }

    static function recupererUtilisateurDUneReservation($id_reservation){
        $pdo = DB::getConnection();
	
	$stmt = $pdo->prepare('SELECT utilisateur.nom, utilisateur.prenom, utilisateur.id FROM reservation INNER JOIN utilisateur ON reservation.utilisateur_id=utilisateur.id WHERE reservation.id=:id_reservation');
        $stmt->bindValue(':id_reservation', $id_reservation, PDO::PARAM_INT);
        $utilisateur = $stmt->execute();
        $utilisateur = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Utilisateur::class);
		   
	return $utilisateur;
    }
    
    static function recupererUtilisateurDUnEmprunt($id_emprunt){
        $pdo = DB::getConnection();
	
	$stmt = $pdo->prepare('SELECT utilisateur.nom, utilisateur.prenom, utilisateur.id FROM emprunt INNER JOIN utilisateur ON emprunt.utilisateur_id=utilisateur.id WHERE emprunt.id=:id_emprunt');
        $stmt->bindValue(':id_emprunt', $id_emprunt, PDO::PARAM_INT);
        $utilisateur = $stmt->execute();
        $utilisateur = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Utilisateur::class);
		   
	return $utilisateur;
    }

    static function enregistrerUtilisateur($prenom, $nom, $login, $mdp){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('
            INSERT INTO utilisateur (nom, prenom, login, password)
                VALUES (:nom, :prenom, :login, :mdp)');
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':login', $login, PDO::PARAM_STR);
        $stmt->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $res = $stmt->execute();
        if ($res){
            return $pdo->lastInsertId();
        }else {
            return -1;
        }
    }
    
    static function getUtilisateur($login){
	$pdo = DB::getConnection();
	
	$stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE login = :login');
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Utilisateur::class);
	$utilisateur = $stmt->fetch();


	return $utilisateur;
    }
}
