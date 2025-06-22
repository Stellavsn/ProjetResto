<?php
include_once "bd.pdo.php";
function getLeUtilisateurByMailU($mailU){
    try{
        $connex = connexionPDO();
        $req = $connex->prepare("select * from utilisateur where mailU=?");
        $req->bindValue(1, $mailU);
        $req->execute();
        $util = $req->fetch(PDO::FETCH_OBJ);
        return $util;
    }
    catch(PDOException $e){
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
?>