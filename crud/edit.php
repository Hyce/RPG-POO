<?php

require_once ('../Database.php');

if(isset($_POST['btn'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];

    if(!empty($nom)) {
        try {
            $stmt->prepare("INSERT INTO joueur (nom, prenom, pseudo, email) VALUES (:nom, :prenom, :pseudo, :email)");
            $stmt->execute(array(':nom' => $nom, ':prenom' => $prenom, ':pseudo' => $pseudo, ':email' => $email));

            header('Location:joueur.php');
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }

    }
    else{
        echo 'input';
    }
}

    exit();
    $nom = '';
    $prenom = '';
    $pseudo = '';
    $email = '';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $stmt = $db->prepare('SELECT FROM joueur WHERE id =:id');
        $stmt->execute(array(':id'=>$id));
        $row = $stmt->fetch();
            $id = $row['id'];
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $pseudo = $row['pseudo'];
            $email = $row['email'];
    }

?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom" value="<?php $name; ?>"></td>
            </tr>

            <tr>
                <td>Prenom</td>
                <td><input type="text" name="prenom" value="<?php $prenom; ?>"></td>
            </tr>

            <tr>
                <td>Pseudo</td>
                <td><input type="text" name="pseudo" value="<?php $pseudo; ?>"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?php $email; ?>"></td>
            </tr>
            <td><input type="submit" name="btn" class="btn btn-info"></td>
        </table>
    </form><?php
/**
 * Created by PhpStorm.
 * User: annel
 * Date: 03/03/2017
 * Time: 19:11
 */