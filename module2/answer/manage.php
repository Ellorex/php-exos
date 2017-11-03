<?php

function getAnswerById($answers, $id){
    $answer = NULL;
    foreach ($answers as $a) {
      if($a->id == $id) {
        $answer = $a;
      break;
    }
    }
    return $answer;
}

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


// Si l'on est en mode édition
if (isset($_GET['edit']) && isset($_GET['id_answer'])) {
  $answerEdit = getAnswerById($answers, intval($_GET['id_answer']));
}
}
if (isset($_POST['insert'])){
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

if (isset($_POST['update'])) {
  $correct=0;
  if(isset($_POST['correct'])) $correct=1;

$query = $db->prepare(
  'UPDATE answer
   SET body = :body, correct = :correct
   WHERE id = :id'
);

$result = $query->execute(array(
  ':body' => $_POST['body'],
  ':correct' => $correct,
  ':id' => intval($_POST['id_answer'])
));

$url = '?route=answer/manage&id_question='.$_POST['id_question'];

($result)
? header('location:'. $url)
: print('<p class="alert">Echec de la mise à jour</p>');
}
?>

<h2>Question : <?= $title ?></h2>


<div class="container">
  <div class="row">
    <div class="col-md-7">
      <h3>Liste des réponses</h3>
      <?php if(sizeof($answers) == 0): ?>
        <p>Aucune réponse enregistrée pour cette question.</p>
      <?php else: ?>
        <table class="table table-bordered">
              <tr>
                <th>#</th>
                <th>Réponse</th>
                <th>Bonne réponse</th>
                <th>Actions</th>
              </tr>
            <?php $i=0 ?>
          <?php foreach($answers as $answer):?>
            <tr>
              <td><?= ++$i?></td>
              <td><?=$answer->body?></td>
              <td>
                <?php
                  echo ($answer->correct ==1) ? 'Bonne' : 'Mauvaise';
                ?>
                &nbsp;réponse
              </td>
              <td>
                <?php
                  $urlEdit = '?route=answer/manage&id_question=' . $id_question;
                  $urlEdit .= '&edit=true&id_answer=' . $answer->id;

                  $urlDel = '?route=answer/delete&id_answer='.$answer->id;
                  $urlDel .= '&id_question=' . $id_question
                ?>
                  <a href="<?=$urlEdit?>" class="btn btn-default btn-xs">Modifier</a>
                  <a href="<?=$urlDel?>" class="btn btn-danger btn-xs">Supprimer</a>

              </td>
            </tr>
          <?php endforeach ?>
        </table>
      <?php endif ?>
    </div>

    <div class="col-md-5">
      <?php if (!isset($_GET['edit'])): ?>

      <h3>Ajouter une réponse</h3>
      <form method="POST">
        <div class="form-group">
          <label for="body">Texte de la réponse</label>
          <textarea name="body" rows="8" cols="80" required></textarea>
        </div>
        <div class="form-group">
          <label for="correct">Bonne réponse</label>
          <input type="checkbox" name="correct"/>
        </div>
        <input type="hidden" name="id_question" value="<?=$id_question?>">
        <input type="submit" name="insert" value="Enregistrer">
      </form>
    </div>
  </div>
</div>
<?php else: ?>
  <h3>Modifier une réponse</h3>
  <form method="POST">
    <div class="form-group">
      <label for="body">Texte de la réponse</label>
      <textarea name="body" rows="8" cols="80" required><?= $answerEdit->body ?></textarea>
    </div>
    <div class="form-group">
      <label for="correct">Bonne réponse</label>
      <?php if ($answerEdit->correct == 1): ?>
        <input type="checkbox" name="correct" checked/>
      <?php else: ?>
        <input type="checkbox" name="correct"/>
      <?php endif; ?>

    </div>
    <input type="hidden" name="id_question" value="<?=$id_question?>">
    <input type="hidden" name="id_answer" value="<?=$answerEdit->id?>">
    <input type="submit" name="update" value="Mettre à jour">

    <?php
      $url ='?route=answer/manage&id_question=' . $id_question;
    ?>
    <a href="<?= $url?>">Annuler</a>
  </form>
<?php endif ?>
