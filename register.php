<?php
include ('include/entete.inc.php')
?>

<br><br>

  <section class="vh-100 bg-image w-100 h-200">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-10">
                <h2 class="text-uppercase text-center mb-1">Formulaire d'inscription :</h2>
  
                <form action="register_pdo.php" method="post" id="form" enctype="multipart/form-data" novalidate>
  
                  <div class="form-outline">
                    <label class="form-label" for="nom">Votre Nom</label>
                    <input type="text" id="nom" name="nom" class="form-control" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" minlength="3" maxlength="30" required>
                    <div class="valid-feedback">
                      Nom OK !
                    </div>
                    <div class="invalid-feedback">
                      Veuillez entrer un nom valide (entre 3 et 30 caractères) !
                    </div>
                  </div>

                  <div class="form-outline">
                    <label class="form-label" for="prenom">Votre prénom</label>
                    <input type="text" id="prenom" name="prenom" class="form-control" pattern="[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ-]+" minlength="3" maxlength="30" required>
                    <div class="valid-feedback">
                      Prénom OK !
                    </div>
                    <div class="invalid-feedback">
                      Veuillez entrer un Prénom valide (entre 3 et 30 caractères) !
                    </div>
                  </div>
  
                  <div class="form-outline">
                    <label class="form-label" for="email">Votre email</label>
                    <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" maxlength="60" required >
                    <div class="valid-feedback">
                      Email OK !
                    </div>
                    <div class="invalid-feedback">
                      Veuillez entrer un Email valide !
                    </div>
                  </div>
  
                  <div class="form-outline">
                    <label class="form-label" for="mdp">Mot de passe (8 caractères MIN et 20 MAX)</label>
                    <input type="password" oninput='mdp.setCustomValidity(mdp.value != mdp.value ?  "Mot de passe non identique" : "")' id="mdp" name="mdp" class="form-control" minlength="8" maxlength="20" required>
                    <div class="valid-feedback">
                      Mot de passe OK !
                    </div>
                    <div class="invalid-feedback">
                      Veuillez entrer un MDP valide (entre 8 et 20 caractères) !
                    </div>
                  </div>
  
                  <div class="form-outline mb-2">
                    <label class="form-label" for="mdpconf">Confirmez votre mot de passe</label>
                    <input type="password" oninput='mdpconf.setCustomValidity(mdpconf.value != mdp.value ?  "Mot de passe non identique" : "")' id="mdpconf" name="mdpconf" class="form-control" required>
                    <div class="valid-feedback">
                      Confirmation OK !
                    </div>
                    <div class="invalid-feedback">
                      Les deux mots de passe ne sont pas identiques !
                    </div>
                  </div>

                  <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                    <label class="btn btn-dark">
                      <input type="radio" name="choixType" id="client" value="client" onchange="aff_cach_input('client')" checked>
                      Client
                    </label>
                    <label class="btn btn-dark">
                      <input type="radio" name="choixType" id="photographe" onchange="aff_cach_input('photographe')" value="photographe">
                      Photographe
                    </label>
                  </div>

                  <!-- Partie Photographe -->
        
                  <div id="blockPhotographe">
                    <div class="form mb-2">
                      <label for="siteWeb" id="siteWeb">Site Web</label>
                      <div class="form-group">
                        <input type="url" class="form-control col-md-3" name="siteWeb" id="siteWeb">
                      </div>
                        <label for="siret" id="siteWeb">Numéro de siret</label>
                        <div class="form-group">
                          <input type="text" class="form-control col-md-3" name="siret" id="siret" placeholder="Exemple : 12345678900013" pattern="[0-9]{14}">
                          <div class="invalid-feedback">
                          Le numéro de SIRET est obligatoire et ce présente sous cette forme 12345678900013
                        </div>
                        </div>
                    </div>
                  </div> 

    <!-- Partie Client -->
                  <div id="blockClient">
                    <div class="form mb-2">
                      <label for="indice">Date de naissance</label>
                      <input type="date" class="form-control col-md-3" name="dateNaissance">
                      <div class="invalid-feedback">
                        La date de naissance est obligatoire
                      </div>
                    </div>
                  </div>
        

                  <div class="form-group row">
                    <div class="d-flex justify-content-left mb-2">
                      <div class="float-left">
                      <input type="file" onchange="actuPhoto(this)" class="form-control mb-2" id="photoUser" name="photoUser" accept="image/jpeg, image/png, image/gif">
                      <img src="" id="photo" class="img-responsive float-right" width=20%>
                      </div>
                    </div>
                    
                  </div>
  
                  <div class="d-flex justify-content-center">
                    <button type="submit" value="insert" name="insert" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">S'inscrire</button>
                  </div>
  
                  <p class="text-center text-muted mt-5 mb-0">Vous avez déjà un compte ? <a href="login.php" class="fw-bold text-body"><u>Connectez-vous !</u></a></p>
  
                </form>
  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<br><br><br><br>


<script>
     function actuPhoto(element) // Fonction qui permet d'afficher l'image uploadée  
      {
        var image=document.getElementById("photoUser");
        var fReader = new FileReader();
        fReader.readAsDataURL(image.files[0]);
        fReader.onloadend = function(event)
        {
          var img = document.getElementById("photo");
          img.src = event.target.result;
        }
      }

    aff_cach_input('client');

    function aff_cach_input(action) // Fonction qui permet d'afficher ou cacher les champs de saisie pour le client
    { 
      if (action == "photographe") //Si le choix est photographe
      {
          document.getElementById('blockPhotographe').style.display="inline"; 
          document.getElementById('blockClient').style.display="none"; 
      }
      else if (action == "client") //Si le choix est client
      {
          document.getElementById('blockPhotographe').style.display="none"; 
          document.getElementById('blockClient').style.display="inline"; 
      }
      return true;
    }

    function validationMotDePasse() { // Fonction qui permet de vérifier que les mots de passe sont identiques
        $mdp=document.getElementById("mdp").value;
        console.log($motDePasse1);
        $mdpconf=document.getElementById("mdpconf").value;
        if ($mdp != $mdpconf)
        {
          document.getElementById("erreurMotDePasse").value="Erreur";
        }
    }

    var mail=document.getElementById("email");
    mail.addEventListener("blur", function (evt) {
      console.log("Perte de focus pour le mail"); // On vérifie que le mail est valide
    });

    var motDePasse=document.getElementById("mdpconf");
    motDePasse.addEventListener("blur", function (evt) {
      validationMotDePasse(); // On vérifie que les mots de passe sont identiques
    });

    (function() {
      "use strict"
      window.addEventListener("load", function() {
        var form = document.getElementById("form")
        form.addEventListener("submit", function(event) {
          if (form.checkValidity() == false) { // On vérifie que les champs sont valides
            event.preventDefault()
            event.stopPropagation() // On empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
          }
          form.classList.add("was-validated") // On ajoute la classe was-validated pour que le formulaire soit valide
        }, false)
      }, false)

    }())
</script>

<?php
include ('include/piedpage.inc.php')
?>