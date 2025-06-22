<h1><?php
        echo "<p>$laDescription->nomR ";

        if($unLike){
          echo  "<a href='./?action=aimer&idR=$laDescription->idR'>
            <img class='aimer' src='images/aime.png' alt='jaime ce restaurant'></a>"; 
        }else{
            echo  "<a href='./?action=aimer&idR=$laDescription->idR'>
            <img class='aimer' src='images/aimepas.png' alt='jaime ce restaurant'></a>"; 
        }
        echo "</p>";
    ?> 
</h1>

<span id="note">
    <?php
    for ($i = 1; $i <= 5; $i++) {
        echo "<img class='note' src='images/like.png' alt=''>";
    }
    ?>
</span>

<section>
    <h3>Type de cuisine</h3>
    <?php 
    foreach($typesCuisines as $typeCuisine){
        echo "<ul id='tagFood'>
            <li class='tag'><span class='tag'>#".$typeCuisine->libelleTC."</span></li>
        </ul>";
        }
    ?>
</section>
<section>
    <h3>Description</h3>
    <?php
        echo "<p>$laDescription->descR</p>";
    ?>
</section>

<h2 id="adresse">
    Adresse
</h2>
<?php
    echo "<p>$laDescription->numAdrR $laDescription->voieAdrR $laDescription->cpR $laDescription->villeR</p>";
?>

<h2 id="photos">
    Photos
</h2>
<?php    
        echo "<ul id='galerie'>";
            foreach($lesPhotos as $unePhoto){
            echo "<li><img class='galerie' src='photos/$unePhoto->cheminP' alt=''/> </li>";
            }
        echo "</ul>";
?>

<h2 id="horaires">Horaires</h2> 
<?php 
echo "<p>$laDescription->horairesR</p>";
?>

<h2 id="crit">Critiques</h2>
<?php 
foreach($lesCritiques as $uneCritique){
    echo"<ul id='critiques'>
            $uneCritique->mailU </br>
            $uneCritique->note/5 $uneCritique->commentaire
    </ul>";
    echo "<input type=button name='Supprimer' value='Supprimer'>";
}
?>
<?php
$aDejaCommente = false;
    foreach ($lesCritiques as $uneCritique) {
        if ($uneCritique->mailU == $mailU) {
            $aDejaCommente = true;
            break;
        }
    }
    echo "<form action='./?action=critiquer&resto=$laDescription->idR' method='post'>";
?>
        <?php if (!$aDejaCommente) { ?>
        <label for="commentaire">Commentaire :</label><br>
        <textarea id="commentaire" name="commentaire" rows="4" cols="50"></textarea><br><br>

        <label>Note :</label><br>
        <input type="radio" id="note1" name="note" value="1">
        <label for="note1">1</label>

        <input type="radio" id="note2" name="note" value="2">
        <label for="note2">2</label>

        <input type="radio" id="note3" name="note" value="3">
        <label for="note3">3</label>

        <input type="radio" id="note4" name="note" value="4">
        <label for="note4">4</label>

        <input type="radio" id="note5" name="note" value="5" checked>
        <label for="note5">5</label><br><br>

        <button type="submit">Enregistrer le commentaire</button>
        <?php } ?>
    </form>