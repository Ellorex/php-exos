<?php

function getNumAnswers($db, $id_question) {
  $query = $db->prepare('SELECT COUNT(*) FROM answer WHERE id_question = :id_question');
  $query->execute(array(
    ':id_question' => $id_question
  ));
  $num = $query->fetch(PDO::FETCH_NUM);
  return $num[0];
}
// 1-Préparation de la requête
$query = $db->prepare('SELECT * FROM question ORDER BY id DESC'); // * selecteur universel

// 2-Exécution
$query->execute();

// 3- Récupération des données (fetch)
$questions = $query->fetchAll(PDO::FETCH_OBJ);

//var_dump($questions);
?>

<h2>Liste des questions</h2>
<table class="table table-bordered table-stripped">
  <tr>
    <th>#</th>
    <th>Intitulé</th>
    <th>Catégorie</th>
    <th>Niveau de difficulté</th>
    <th>Actions</th>
  </tr>
  <?php $i=0 ?>
  <?php foreach($questions as $question): ?>
  <tr>
    <td><?=++$i?></td>
    <td><?= $question->title ?></td>
    <td><?= $question->category ?></td>
    <td><?= $question->level ?></td>
    <td>
      <a href="?route=question/edit&id=<?=$question->id?>" class="btn btn-default btn-xs">Modifier la question</a>
      <a href="?route=answer/manage&id_question=<?=$question->id?>" class="btn btn-default btn-xs"><?=getNumAnswers($db, $question->id)?> réponse(s)</a>
      <a href="?route=question/delete&id=<?=$question->id?>" class="btn btn-danger btn-xs">Supprimer</a>
    </td>
  </tr>
<?php endforeach ?>
</table>
