<?php
/**
 * Created by PhpStorm.
 * User: annel
 * Date: 02/03/2017
 * Time: 22:04
 */
require_once ('../Database.php');

$id ='';
$nom ='';
$prenom ='';
$pseudo ='';
$email ='';
$password ='';

function getPosts()
{
 $posts = array();
    $posts[0] = $_POST['id'];
    $posts[0] = $_POST['nom'];
    $posts[0] = $_POST['prenom'];
    $posts[0] = $_POST['pseudo'];
    $posts[0] = $_POST['email'];
    $posts[0] = $_POST['password'];

    return $posts;
}

// display

if (isset($_Post['search'])){
    $data = getPosts();
    if (empty($data[0]))
    {
        echo 'Entrer un id';
    }
    else{

        $searchStmt = $con->prepare('SELECT * FROM joueur WHERE id = :id');
        $searchStmt->execute(array(
            ':id'=> $data[0]
        ));

        if($searchStmt) {
            $user = $searchStmt->fetch();
        if (empty($user))
            {
                echo 'aucun id';
            }
            $id = $user[0];
            $nom = $user[1];
            $prenom = $user[2];
            $pseudo = $user[3];
            $email = $user[4];
            $password = $user[5];
        }
    }
}

// insert data

if (isset($_POST['insert']))
{
    
}
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Crud</title>
</head>
<body>
<div class="row">
    <form action="joueur.php" method="post" class="modal-body">
        <div class="col-lg-3">Id :</div>
            <div class="form-group col-lg-9"><input type="text" class="form-control" name="id" placeholder="id" value="<?php echo $id; ?>"></div>
        <div class="col-lg-3">Nom :</div>
            <div class="form-group col-lg-9"><input type="text" class="form-control" name="nom" placeholder="nom" value="<?php echo $nom; ?>"></div>
        <div class="col-lg-3">Prénom :</div>
            <div class="form-group col-lg-9"> <input type="text" class="form-control" name="prenom" placeholder="prenom" value="<?php echo $prenom; ?>"></div>
        <div class="col-lg-3">Pseudo :</div>
            <div class="form-group col-lg-9"><input type="text" class="form-control" name="pseudo" placeholder="pseudo" value="<?php echo $pseudo; ?>"></div>
        <div class="col-lg-3">Email :</div>
            <div class="form-group col-lg-9"><input type="email" class="form-control" name="email" placeholder="email" value="<?php echo $email; ?>"></div>
        <div class="col-lg-3">Mot de passe :</div>
        <div class="form-group col-lg-9"><input type="password" class="form-control" name="password" placeholder="password" value="<?php echo $password; ?>"></div>
    </div>
        <input type="submit" class="btn btn-info" name="insert" value="insert">
        <input type="submit" class="btn btn-success" name="update" value="update">
        <input type="submit" class="btn btn-danger" name="delete" value="delete">
        <input type="submit" class="btn btn-warning" name="search" value="search">
    </form>
</div>
</body>