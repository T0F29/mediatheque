<?php

namespace Mediatheque\Model\Dao;

require_once(dirname(__FILE__).'/DB.php');
require_once(dirname(__FILE__).'/../entities/Bd.class.php');
require_once(dirname(__FILE__).'/../entities/Cd.class.php');
require_once(dirname(__FILE__).'/../entities/Livre.class.php');


use Mediatheque\Model\Dao\ManagerReservations;
use \PDO as PDO;
use \Mediatheque\Model\Entities\Document as Document;
use \Mediatheque\Model\Entities\Bd as Bd;
use \Mediatheque\Model\Entities\Cd as Cd;
use \Mediatheque\Model\Entities\Livre as Livre;

class ManagerDocuments {
    

     static function recupererNouveautesBds(){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->query("SELECT * FROM document inner join bd on document.id = bd.document_id WHERE document.date_d_enregistrement > CURDATE() - INTERVAL 2 MONTH ORDER BY document.date_d_enregistrement DESC");

	$nouveautesBds = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Mediatheque\Model\Entities\Bd::class);
		   
	return $nouveautesBds;
    }
    
     static function recupererNouveautesCds(){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->query("SELECT * FROM document inner join cd on document.id = cd.document_id WHERE document.date_d_enregistrement > CURDATE() - INTERVAL 2 MONTH ORDER BY document.date_d_enregistrement DESC");

	$nouveautesCds = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Mediatheque\Model\Entities\Cd::class);
		   
	return $nouveautesCds;
    }
    
       static function recupererNouveautesLivres(){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->query("SELECT * FROM document inner join livre on document.id = livre.document_id WHERE document.date_d_enregistrement > CURDATE() - INTERVAL 2 MONTH ORDER BY document.date_d_enregistrement DESC");

	$nouveautesLivres = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Mediatheque\Model\Entities\Livre::class);
		   
	return $nouveautesLivres;
    }

     static function recupererCatalogueBds(){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->query("SELECT * FROM document inner join bd on document.id = bd.document_id ORDER BY document.date_d_enregistrement DESC");

	$catalogueBds = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Mediatheque\Model\Entities\Bd::class);
		   
	return $catalogueBds;
    }
    
     static function recupererCatalogueCds(){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->query("SELECT * FROM document inner join cd on document.id = cd.document_id ORDER BY document.date_d_enregistrement DESC");

	$catalogueCds = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Mediatheque\Model\Entities\Cd::class);
		   
	return $catalogueCds;
    }
    
       static function recupererCatalogueLivres(){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->query("SELECT * FROM document inner join livre on document.id = livre.document_id ORDER BY document.date_d_enregistrement DESC");

	$catalogueLivres = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Mediatheque\Model\Entities\Livre::class);
		   
	return $catalogueLivres;
    }    
    
    static function recupererDocumentParId($document_id){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->prepare("SELECT * FROM document WHERE id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Document::class);
	$doc = $stmt->fetch();

	return $doc;
    }
    
    static function recupererBdParId($document_id){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->prepare("SELECT * FROM bd INNER JOIN document ON bd.document_id = document.id WHERE bd.document_id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Bd::class);
	$bd = $stmt->fetch();

	return $bd;
    }
    
    /**
     * obtenir document par son identifiant
     * @param type $document_id id du document
     * @return type /Cd
     */
    static function recupererCdParId($document_id){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->prepare("SELECT * FROM cd INNER JOIN document ON cd.document_id = document.id WHERE cd.document_id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Cd::class);
        $stmt->execute();
	$cd = $stmt->fetch();

	return $cd;
    }
    
    static function recupererLivreParId($document_id){
        $pdo = DB::getConnection();
			
	$stmt = $pdo->prepare("SELECT * FROM livre INNER JOIN document ON livre.document_id = document.id WHERE livre.document_id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Livre::class);
	$livre = $stmt->fetch();

	return $livre;
    }
    
    static function verifierSiDocumentEstBd($document_id){
        
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare("SELECT count(*) FROM bd WHERE document_id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->execute();
	$res = $stmt->fetchColumn();
        return ($res>0);
    }
    
    static function verifierSiDocumentEstCd($document_id){
        
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare("SELECT count(*) FROM cd WHERE document_id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->execute();
	$res = $stmt->fetchColumn();
        return ($res>0);
    }

    static function verifierSiDocumentEstLivre($document_id){
        
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare("SELECT count(*) FROM livre WHERE document_id = :document_id");
        $stmt->bindValue(':document_id', $document_id);
        $stmt->execute();
	$res = $stmt->fetchColumn();
        return ($res>0);
    }    
   
       /**
    *
    *@return last inserted id or -1 if any problem
    **/
    static function save(PlayList $playList){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('
            INSERT INTO playlist ( name, description, user_id, picture)
                VALUES (:name, :description, :user_id, :picture)');
        $stmt->bindValue(':name', $playList->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $playList->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $playList->getUser_id(), PDO::PARAM_INT);
        $stmt->bindValue(':picture', $playList->getPicture(), PDO::PARAM_STR);
        $res = $stmt->execute();
        if ($res){
            return $pdo->lastInsertId();
        }else {
            return -1;
        }
        
    }
    /**
     * check if playList belong to user
     * @param type $playListId
     * @param type $userId
     * @return boolean true if playListId belongs to userId
     */
    static function exist($playListId, $userId){
        
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare("SELECT count(*) FROM playlist WHERE id = :playlist_id AND user_id = :user_id");
        $stmt->bindValue(':playlist_id', $playListId);
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
	$res = $stmt->fetchColumn();
        return ($res>0);
    }
    
    static function delete($playListId, $trackId, $userId){
        
        if (self::exist($playListId,$userId )){
        
            $pdo = DB::getConnection();

            $stmt = $pdo->prepare('DELETE FROM playlist_track WHERE playlist_id = :playlist_id AND track_id = :track_id');
            $stmt->bindValue(':playlist_id', $playListId);
            $stmt->bindValue(':track_id', $trackId);

            return $stmt->execute();
        }else{
            throw new \Exception("playlist id ". $playListId."is not owned by user id:" . $userId);
        }
    }
    
    static function  getPlayLists($userid){
       // connection BDD
	$pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM playlist WHERE user_id = :user_id");
        $stmt->bindValue(':user_id', $userid);
        $stmt->execute();

	$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, PlayList::class);
		   
	return $pls;
          
    }
    
    static function getPlayListById($playlist_id){
        $pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM playlist WHERE id = :playlist_id");
        $stmt->bindValue(':playlist_id', $playlist_id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, PlayList::class);
	$pl = $stmt->fetch();


	return $pl;
    }
    
     static function getTracks($playlist_id){
        $pdo = DB::getConnection();
	
			
	$stmt = $pdo->prepare("SELECT * FROM track inner join playlist_track on track.id = playlist_track.track_id WHERE playlist_track.playlist_id = :playlist_id");
        $stmt->bindValue(':playlist_id', $playlist_id);
        $stmt->execute();

	$playLists = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \PlayStore\Model\Entities\Track::class);
		   
	return $playLists;
    }
    
    static function addTrack($playlist_id, $track_id){
        $pdo = DB::getConnection();
        
        $stmt = $pdo->prepare('
            INSERT INTO playlist_track ( playlist_id, track_id)
                VALUES (:playlist_id, :track_id)');
        $stmt->bindValue(':playlist_id', $playlist_id, PDO::PARAM_INT);
        $stmt->bindValue(':track_id', $track_id, PDO::PARAM_INT);

        return $stmt->execute();
       
    }
}
