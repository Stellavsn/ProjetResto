<?php
include_once "bd.pdo.php";
function getLaPhotoByIdResto($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from photo where idR = ?");
        $req->bindValue(1, $idR);
        $req->execute();
        $laPhoto = $req->fetch(PDO::FETCH_OBJ);
        return $laPhoto;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getLesPhotosByIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from photo where idR = ?");
        $req->bindValue(1, $idR);
        $req->execute();
        $lesPhotos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesPhotos;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>