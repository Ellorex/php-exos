<?php

function listApprenants(){
$apprenants = array(
  array(
    'id' => 1,
    'nom' => 'abecassis',
    'prenom' => 'stéphane',
    'totem' => 'backet.png',
    'notes' => array(8,5,11),
    'password' => 'azerty'),
  array(
    'id' => 2,
    'nom' => 'chauvet',
    'prenom' => 'steVens',
    'totem' => 'crayons.jpeg',
    'notes' => array(12,12,13),
    'password' => 'fhrtbnt'),
  array(
    'id' => 3,
    'nom' => 'grivel',
    'prenom' => "sébastien",
    'totem' => 'c.png',
    'notes' => array(18,19,18,20),
    'password' => 'ntyntz'),
    array(
      'id' => 4,
      'nom' => 'jafari',
      'prenom' => "sajjad",
      'totem' => 'css.jpeg',
      'notes' => array(13),
      'password' => 'kjhgtfrd'),
    array(
      'id' => 5,
      'nom' => 'langlais',
      'prenom' => "rémi",
      'totem' => 'remi.jpg',
      'notes' => array(12,15,17),
      'password' => 'xccvfre'),
      array(
        'id' => 6,
        'nom' => 'vautour',
        'prenom' => "jessy",
        'totem' => 'nike.jpeg',
        'notes' => array(16,18,12,17),
        'password' => 'sertyuk'),
      array(
        'id' => 7,
        'nom' => 'ayoubi',
        'prenom' => "rayane",
        'totem' => 'rayane.jpeg',
        'notes' => array(12,10,15,13),
        'password' => 'njuylkj'),
      array(
        'id' => 8,
        'nom' => 'pelé',
        'prenom' => "françois",
        'totem' => 'pele.jpeg',
        'notes' => array(12,16,14,11),
        'password' => 'mlkj'),
      array(
        'id' => 9,
        'nom' => 'jeannine',
        'prenom' => "christiane",
        'totem' => 'chriss.jpeg',
        'notes' => array(10,12,15,13),
        'password' => 'mlkjio'),
      array(
        'id' => 10,
        'nom' => 'poisson',
        'prenom' => "nadia",
        'totem' => 'nadia.png',
        'notes' => array(14,15,12,16),
        'password' => 'lkjhghyu'),
);
return $apprenants;
}

function apprenantParId($id) {
  //prend un integer en entrée
  // retourne un tableau associatif représentant un stagiaire
  $apprenant = NULL;
  foreach (listApprenants() as $a) {
    if($a['id'] == $id){
      $apprenant = $a;
      break; //sortie de boucle si l'id est trouvé
    }
  }
  return $apprenant;
}

 ?>
