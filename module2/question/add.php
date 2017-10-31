<?php

if (isset($_POST['submit'])) {
  //var_dump($_POST);

  // 1-Validation des données
$cond1 = $_POST['title']            != "";
$cond2 = $_POST['category']         != "0";
$cond3 = intval($_POST['level'])    != 0;

if ($cond1 && $cond2 && $cond3) {
  // Toutes les conditions sont remplies
  // 2- Enregistrement des données en DB
    // a- préparation de la requête
  $query = $db->prepare('INSERT INTO question (title, category, level) VALUES (:title, :category, :level)');
    // b- exécution
    // intval() converti la valeur en entier
  $result = $query->execute(array(
    ':title'     => $_POST['title'],
    ':category'  => $_POST['category'],
    ':level'     => intval($_POST['level']),
  ));

if ($result){
  //echo '<p>Enregistrement réussi</p>';
  header('location:?route=question/list');
} else {
  echo '<p>L\'enregistrement a échoué</p>';
}
} else
echo "Merci de renseigner correctement tous les champs";
}

?>

<h2>Ajout d'une question</h2>

<form style="width:30%" method="POST">

  <div class="form-group">
    <label for="">Intitulé</label>
    <input type="text" name="title" value="" class="form-control">
  </div>

  <div class="form-group">
    <select name="category">
      <option value="0">Choisir une catégorie</option>
      <option>Sports</option>
      <option>Littérature</option>
      <option>Politique</option>
      <option>Cuisine</option>
      <option>Programmation</option>
      <option>Histoire</option>
      <option>Cinéma</option>
      <option>Divers</option>
    </select>
  </div>
  <div class="form-group">
    <select name="level">
      <option value="0">Choisir un niveau de difficulté</option>
      <option value="1">Facile</option>
      <option value="2">Moyen</option>
      <option value="3">Difficile</option>
    </select>
  </div>
  <input type="submit" class="btn btn-primary" value="Enregistrer" name="submit">
</form>
