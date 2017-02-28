<?php session_start();
require ('conf/bd.php');
?>

    <body>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <form class="form-horizontal" method="post" action="personnage.php">
        <div class="modal-header">
            <h4>Connexion</h4>
        </div>
        <div class="modal-body">
            <div class="col-lg-3">Pseudo :</div>
            <div class="form-group col-lg-9"><input class="form-control" type="text" name="pseudo" placeholder="Pseudo"></div>
            <div class="col-lg-3">Mot de passe :</div>
            <div class="form-group col-lg-9"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <input type="submit" value="Log in" class="btn  btn-primary ">
        </div>
    </form>
    </body>

<?php
if (isset($_POST["pseudo"]) &&
    isset($_POST["password"])) {

    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $password = htmlspecialchars($_POST["password"]);


    $request = $db->prepare("SELECT id FROM mydb WHERE pseudo LIKE :pseudo AND password= :password");
    $request->execute(
        array(
            "pseudo" => $pseudo,
            "password" => $password
        )
    );
    $members = $request->fetchAll();
    if (sizeof($members) > 0) {
        $id_member = $members[0]["id"];
        $_SESSION["id_member"] = $id_member;
    }
    else {
        echo "Error : pseudo/password is incorrect";
    }
}
?>