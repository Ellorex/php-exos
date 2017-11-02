<?php
include('category.php');
include('levels.php');
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = $db->prepare('SELECT * FROM question WHERE id = :id');
  $query->execute(array(
    ':id' => intval($id)
  ));
  $question = $query->fetch(PDO::FETCH_OBJ); // fetch ne renvoie qu'un objet quand fetchall renvoie toute la ligne du tableau (ici)
}

if (isset($_POST['submit'])) {
  $cond1 = $_POST['title']            != "";
  $cond2 = $_POST['category']         != "0";
  $cond3 = intval($_POST['level'])    != 0;

  if ($cond1 && $cond2 && $cond3) {
      $query = $db->prepare(
      ' UPDATE question
        SET title = :title, category = :category, level = :level
        WHERE id = :id'
      );
      $result = $query->execute(array(
        ':title' => $_POST['title'],
        ':category' => $_POST['category'],
        ':level' => intval($_POST['level']),
        ':id' => intval($_POST['id'])
      ));
      if($result) {
          header('location:?route=question/list');
      } else {
        echo '<p>La mise à jour a échoué</p>';
      }
  }
  else {
      echo "Merci de renseigner correctement tous les champs";

  }
}

?>
<form style="width:30%" method="POST">

  <div class="form-group">
    <label for="">Intitulé</label>
    <input type="text" name="title" value="<?=$question->title?>" class="form-control">
  </div>

  <div class="form-group">
    <select name="category">
      <option value="0">Choisir une catégorie</option>
      <?php foreach($categories as $category): ?>
        <?php if($question->category == $category): ?>
          <option selected><?= $category ?></option>
        <?php else: ?>
          <option><?= $category ?></option>
        <?php endif ?>
      <?php endforeach ?>
    </select>
  </div>
  <div class="form-group">
    <select name="level">
      <option value="0">Choisir un niveau</option>
      <?php foreach($levels as $k => $level): ?>
        <?php if($question->level == $k): ?>
          <option value="<?=$k?>" selected><?=$level?></option>
        <?php else: ?>
          <option value="<?=$k?>"><?=$level?></option>
        <?php endif ?>
      <?php endforeach ?>
    </select>
  </div>
  <!-- le champs hidden permet d'ajouter dans $_POST les informations que l'on souhaite conserver. ici l'id de la question -->
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="submit" class="btn btn-primary" value="Mettre à jour" name="submit">
</form>
