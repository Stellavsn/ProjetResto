<?php
include_once "$racine/modele/authentification.php";
include_once "$racine/modele/bd.aimer.php";

if (isLoggedOn()){
    $mailU=getMailULoggedOn();
    $idR=$_GET['idR'];

    if(getAimerById($mailU, $idR)){
        delAimer($mailU,$idR);
        header("Location: ./?action=detail&resto=$idR");
    }else{
        addAimer($mailU, $idR);
        header("Location: ./?action=detail&resto=$idR");
    }
}

?>