<?php

$cnx = new PDO('mysql:host=127.0.0.1;dbname=nolark', 'nolarkuser', 'nolarkpwd');

$fichier = basename($_SERVER['PHP_SELF']);

if ($fichier == 'route.php') {
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 4';
} else if ($fichier == 'piste.php') {
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 3';
} else if ($fichier == 'enfants.php') {
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 2';
} else if ($fichier == 'cross.php') {
    $req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
    $req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
    $req .= ' INNER JOIN marque ON casque.marque=marque.id';
    $req .= ' WHERE type.id = 1';
}

$res = $cnx->query($req);

echo '<section id="casques">';

while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
    echo '<article id="casques">';
    echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,
    '" alt="', $ligne->modele,'" class="img">';
    echo '<p class="prix">',$ligne->prix, '€','</p>','<p class="',GetStock($ligne->stock),'">',$ligne->stock,'</p>','<p class="marque">', $ligne->nom,'</p>','<p class="modele">', $ligne->modele,'</p>','<div class="classement"','<p class="classement',GetClassement($ligne->classement),'">', $ligne->classement,'</p>','</div>';
    echo '</article>';
}


function GetStock($stock) {
    if ($stock > 0) {
        return 'stockok';
    }
    else {
        return 'stockko';
    }
    
}

function GetClassement($classement){
   return $classement==0?'00':(string)classement;
}

echo '</section>';

//ok
//<?php //
//
///*
// * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
// * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
// */
//
//$cnx = new PDO('mysql:host=127.0.0.1;dbname=nolark', 'nolarkuser', 'nolarkpwd');
//$req = 'SELECT casque.id, nom, modele, libelle, prix, classement, image, stock';
//$req .= ' FROM casque INNER JOIN type ON casque.type=type.id';
//$req .= ' INNER JOIN marque ON casque.marque=marque.id';
//$res = $cnx->query($req);
//echo '<section id="casques">';
//
//$fichier=__FILE__;
////if(fichier=='route.php'){
//    
//while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
//    echo '<article>';
//    echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,
//    '" alt="', $ligne->modele, '">';
//    echo $ligne->prix , $ligne ->stock,'<br>', $ligne->nom, '<br>', $ligne->modele, '<br> </t>', $ligne->classement;
//    echo '</article>';
//}
//echo '</section>';







//}

//while ($ligne = $res->fetch(PDO::FETCH_OBJ)) {
//    echo '<article>';
//    echo '<img src="../images/casques/', $ligne->libelle, '/', $ligne->image,
//    '" alt="', $ligne->modele, '/', $ligne->libelle, '/', $ligne->libelle, '">';
//    echo '</article>';
//    echo '<p>', $ligne->libelle, '</p>'; // Ajout pour afficher la marque
//}
//echo '</section>';
