<?php
include_once "bd.pdo.php";

function getCritiquerByIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from critiquer where idR = ?");
        $req->bindValue(1, $idR);
        $req->execute();
        $lesCritiques = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesCritiques;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getCritiquerById($idR, $mailU){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from critiquer where idR = ? AND mailU=?");
        $req->bindValue(1, $idR);
        $req->bindValue(2, $mailU);
        $req->execute();
        $lesCritiques = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesCritiques;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delCritiquer($idR, $mailU){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("DELETE FROM critiquer WHERE idR=? AND mailU=?");
        $req->bindValue(1, $idR);
        $req -> bindValue(2,$mailU);
        $req->execute();
        $lesCritiques = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesCritiques;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function addCritiquer($idR, $mailU, $note, $commentaire){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("INSERT INTO critiquer VALUES(?,?,?,?)");
        $req->bindValue(1, $idR);
        $req->bindValue(2, $mailU);
        $req->bindValue(3, $note);
        $req->bindValue(4, $commentaire);
        $req->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

?>