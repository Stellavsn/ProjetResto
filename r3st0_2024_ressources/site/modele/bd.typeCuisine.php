<?php
include_once "bd.pdo.php";
function getLesTypesCuisinesbyIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from typecuisine inner join proposer on proposer.idTC=typecuisine.idTC where idR = ?");
        $req->bindValue(1, $idR);
        $req->execute();
        $typesCuisines = $req->fetchAll(PDO::FETCH_OBJ);
        return $typesCuisines;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getLesTypesCuisines(){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from typecuisine");
        $req->execute();
        $tousLesTC = $req->fetchAll(PDO::FETCH_OBJ);
        return $tousLesTC;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>