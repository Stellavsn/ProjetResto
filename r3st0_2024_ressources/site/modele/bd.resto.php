<?php
include_once "bd.pdo.php";
function getLesRestos(){
    try{
        // A COMPLETER
        $connex = connexionPDO();
        $req = $connex->prepare("select * from resto");
        $req->execute();
        $lesRestos = $req->fetchAll(PDO::FETCH_OBJ);
        return $lesRestos;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getLeRestoByIdR($idR){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from resto where idR = :idR");
        $req->bindParam(':idR', $idR);
        $req->execute();
        $leResto = $req->fetch(PDO::FETCH_OBJ);
        return $leResto;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getLesRestosByNoms($nomR){
    try{
        $connex=connexionPDO();
        $req = $connex->prepare("select * from resto where nomR LIKE ?");
        $req->bindValue(1, "%".$nomR."%");
        $req->execute();
        $nomsResto=$req->fetchAll(PDO::FETCH_OBJ);
        return $nomsResto;
    }
    catch(PDOException $e){
        print "Erreur !: ". $e->getMessage();
        die();
    }
}
function getLesRestosByAdresse($voieAdrR,$cpR,$villeR){
    try{
        $connex=connexionPDO();
        $req = $connex->prepare("select * from resto where voieAdrR LIKE ? AND cpR LIKE ? AND villeR LIKE ?");
        $req->bindValue(1, "%".$voieAdrR."%");
        $req->bindValue(2, "%".$cpR."%");
        $req->bindValue(3, "%".$villeR."%");
        $req->execute();
        $lesAdresses=$req->fetchAll(PDO::FETCH_OBJ);
        return $lesAdresses;
    }
    catch(PDOException $e){
        print "Erreur !: ". $e->getMessage();
        die();
    }
}
function getLesRestosByTC($tabIdTC){
    if (count($tabIdTC) > 0) {
        $filtre = "(";
        foreach($tabIdTC as $idTC){
            $filtre .= "$idTC,";
        }
        $filtre .= "null)";
 
        try{
            $connex = connexionPDO();
            $prep = $connex->prepare("select distinct resto.* from resto inner join proposer on resto.idR=proposer.idR where idTC IN $filtre");
            $prep->execute();
            return $prep->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }else{
        return false;
    }
}
?>