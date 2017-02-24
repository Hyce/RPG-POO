<?php
/**
 * Created by PhpStorm.
 * User: annel
 * Date: 22/02/2017
 * Time: 18:56
 */
require ('conf/bd.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<form class="form-horizontal" method="post" action="index.php">
        <div class="modal-header">
            <h4>Créer un compte</h4>
        </div>
        <div class="modal-body">
            <div class="col-lg-3">Nom :</div>
                <div class="form-group col-lg-9"><input class="form-control" type="text" name="pseudo" placeholder="Nom">
            </div>
            <div class="col-lg-3">Prénom :</div>
            <div class="form-group col-lg-9"><input class="form-control" type="text" name="pseudo" placeholder="prenom">
            </div>
            <div class="col-lg-3">Pseudo :</div>
                <div class="form-group col-lg-9"><input class="form-control" type="text" name="pseudo" placeholder="Pseudo">
            </div>
            <div class="col-lg-3">Email :</div>
                <div class="form-group col-lg-9"><input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="col-lg-3">Mot de passe :</div>
                <div class="form-group col-lg-9"><input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" value="Log in" class="btn  btn-primary ">
        </div>
    </form>
    </body>

<?php
if (isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["pseudo"]) &&
    isset($_POST["email"]) &&
    isset($_POST["password"])) {

    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);


    $q = $this->_db->prepare('INSERT INTO joueur (nom, prenom, pseudo, email, password) VALUES (:nom, :prenom, :pseudo, :email, :password)');
    $q->execute();
}
?>