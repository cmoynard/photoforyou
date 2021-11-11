<?php
include ('include/entete.inc.php') ?>
<div class="container">
  <div class="py-5 text-center">
  	<h1 class="display-5">Rajouter des crédits</h1>
    <hr class="my-4">
  </div>
  <form action="rajcredit_pdo.php" method="post" id="form" novalidate>
    <div class="form-group mb-4">
      <label for="cred">Nombre de crédits</label>
      <input type="number" class="form-control" id="cred" name="cred" required>
      <div class="invalid-feedback">
        Le champ ne peut être vide.
      </div>
    </div>
    <button type="submit" value="rajouter" name="rajouter" class="btn btn-lg btn-outline-success">Rajouter</button>
  </form>
  <div class="py-5 text-left mb-5">
    <hr class="my-4">
    <a href="profil.php"><button class="btn btn-lg btn-outline-danger float-left">Annuler</button></a>
  </div>
</div><br>

<script>
var Credit=document.getElementById("cred");
Credit.addEventListener("blur", function (evt) {
  validationMotDePasse();
});

(function() {
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add("was-validated")
    }, false)
  }, false)

}())
</script>

<?php
include ('include/piedpage.inc.php') ?>