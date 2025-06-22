<?php 
include_once "$racine/modele/authentification.php";
include_once "$racine/modele/bd.critiquer.php";

$mailU=getMailULoggedOn();
$idR=$_GET['resto'];

$note = $_POST['note'];
$commentaire = $_POST['commentaire'];


if (isLoggedOn()){
   
    if(getCritiquerById($mailU, $idR)){
        delCritiquer($idR, $mailU, $note, $commentaire);
        header("Location: ./?action=detail&resto=$idR");
    }else{
        addCritiquer($idR, $mailU, $note, $commentaire);
        header("Location: ./?action=detail&resto=$idR");
    }
}
include_once "$racine/vue/vueDetailResto.php";
?>