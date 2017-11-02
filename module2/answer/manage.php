<?php

if (isset($_GET['id_question'])) {
  $id_question = $_GET['id_question'];

  $query = $db->prepare(
  ' SELECT title
    FROM question
    WHERE id = :id_question
    ');
  $query->execute(array(
    ':id_question' => $id_question
  ));
  $title = $query->fetch(PDO::FETCH_OBJ)->title;

  $query2 = $db->prepare(
    ' SELECT id, body, correct
      FROM answer
      WHERE id_question = :id_question
    ');
  $query2->execute(array(
    ':id_question' => $id_question
  ));
  $answers = $query2->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_POST['submit'])){
  $correct = 0;
  if(isset($_POST['correct'])) $correct = 1;

  $query = $db->prepare(
    ' INSERT INTO answer (body, correct, id_question)
      VALUES (:body, :correct, :id_question)
    ');

  $result = $query->execute(array(
    ':body' => $_POST['body'],
    ':correct' => $correct,
    ':id_question' => intval($_POST['id_question'])
  ));
  ($result)
  ? header('location:?route=answer/manage&id_question='.$_POST['id_question'])
  : print '<p>L\'enregistrement de la réponse a échoué.</p>';
}

?>

<h2>Question : <?= $title ?></h2>

<h3>Liste des réponses</h3>
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <?php if(sizeof($answers) == 0): ?>
        <p>Aucune réponse enregistrée pour cette question.</p>
      <?php else: ?>
        <table class="table table-bordered">
              <tr>
                <th>Réponse</th>
                <th>Bonne réponse</th>
                <th>Actions</th>
              </tr>
          <?php foreach($answers as $answer):?>
            <tr>
              <td><?=$answer->body?></td>
              <td>
                <?php
                  echo ($answer->correct ==1) ? 'Bonne' : 'Mauvaise';
                ?>
                &nbsp;réponse
              </td>
              <td>
                  <a href="?route=answer/edit&id=<?=$answer->id?>" class="btn btn-default btn-xs">Modifier</a>
                <?php
                  $url = '?route=answer/delete&id_answer='.$answer->id;
                  $url .= '&id_question=' . $id_question
                ?>
                <a href="?route=answer/delete&id_answer=<?=$url?>" class="btn btn-danger btn-xs">Supprimer</a>

              </td>
            </tr>
          <?php endforeach ?>
        </table>
      <?php endif ?>
    </div>
    <div class="col-md-5">
      <h3>Ajouter une réponse</h3>
      <form method="POST">
        <div class="form-group">
          <label for="body">Texte de la réponse</label>
          <textarea name="body" rows="8" cols="80" require></textarea>
        </div>
        <div class="form-group">
          <label for="correct">Bonne réponse</label>
          <input type="checkbox" name="correct"/>
        </div>
        <input type="hidden" name="id_question" value="<?=$id_question?>">
        <input type="submit" name="submit" value="Enregistrer">
      </form>
    </div>
  </div>
</div>
