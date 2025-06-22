<?php
include_once "bd.pdo.php";
function getAimerById($mailU, $idR){
    try{
        $connex= connexionPDO();
        $req = $connex->prepare("select * from aimer WHERE mailU=? AND idR=?");
        $req -> bindValue(1,$mailU);
        $req -> bindValue(2,$idR);
        $req->execute();
        $unLike = $req->fetch(PDO::FETCH_OBJ);
        return $unLike;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function addAimer($mailU, $idR){
    try{
        $connex= connexionPDO();
        $req = $connex->prepare("INSERT INTO aimer VALUES(?,?)");
        $req -> bindValue(1,$idR);
        $req -> bindValue(2,$mailU);
        $req->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delAimer($mailU, $idR){
    try{
        $connex= connexionPDO();
        $req = $connex->prepare("DELETE FROM aimer WHERE mailU=? AND idR=?");
        $req -> bindValue(1,$mailU);
        $req -> bindValue(2,$idR);
        $req->execute();
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>