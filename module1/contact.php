<?php include('header.php'); ?>

<h2>Contact</h2>
<form style="width:50%" action="form.php" method="POST">
  <div class="form-group">
    <label for="objet">Objet :</label>
    <input type="text" name="objet">
  </div>
<div class="form-group">
  <label for="message">Message :</label>
  <textarea rows="5" cols="40" name="message"></textarea>
</div>
  <input type="submit" value="Valider">
</form>

<?php include('footer.php'); ?>
