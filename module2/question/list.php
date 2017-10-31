<?php
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
    <th>Intitulé</th>
    <th>Catégorie</th>
    <th>Niveau de difficulté</th>
    <th>Actions</th>
  </tr>
  <?php foreach($questions as $question): ?>
  <tr>
    <td><?= $question->title ?></td>
    <td><?= $question->category ?></td>
    <td><?= $question->level ?></td>
    <td>
      <a href="?route=question/edit&id=<?=$question->id?>" class="btn btn-primary btn-xs">Modifier</a>
    </td>
    <td>
      <a href="?route=question/delete&id=<?=$question->id?>" class="btn btn-danger btn-xs">Supprimer</a>
    </td>
  </tr>
<?php endforeach ?>
</table>
