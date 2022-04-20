<?php
include ('include/entete.inc.php')
?>

  <section class="vh-100 bg-image">  <!-- formulaire de login avec données bbd et verification -->
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Se connecter :</h2>
  
                <form action="login_pdo.php" id="form" method="post" novalidate>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Votre email</label>
                    <input type="email" id="email" name="mail" class="form-control form-control-lg" aria-describedby="emailHelp" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="3" required>
                    <div class="invalid-feedback">
                      Il vous faut fournir un email valide.
                    </div>
                  </div>
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="motdepasse">Mot de passe</label>
                    <input type="password" id="motdepasse" name="motdepasse" class="form-control form-control-lg" minlength="8" required>
                    <div class="invalid-feedback">
                      Il vous faut fournir un mot de passe valide.
                    </div>
                  </div>
  
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input
                      class="form-check-input me-2"
                      type="checkbox"
                      value=""
                      id="form2Example3cg"
                    />
                    <label class="form-check-label" for="form2Example3g">
                      Mémoriser mes identifiants.
                    </label>
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <button type="identifier" name="identifier" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Se connecter</button>
                  </div>
  
                  <p class="text-center text-muted mt-5 mb-0">Vous n'avez pas de compte ? <a href="register.php" class="fw-bold text-body"><u>Inscrivez-vous !</u></a></p>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
  var mail=document.getElementById("email"); //javascript pour la verification des mails
mail.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le mail");
});

var motDePasse=document.getElementById("motdepasse"); //js pour la verif des mdp
motDePasse.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le mdp");
});

(function() { //fonction pour affichage dynamique des erreur sur le formulaires
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation() //la ligne nest pas validé, elle devient rouge
      }
      form.classList.add("was-validated") //la ligne est validé dnas le formulaire (cest vert)
    }, false)
  }, false)

}())
</script>

<?php
include ('include/piedpage.inc.php');
?>