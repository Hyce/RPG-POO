<?php

require_once ('../Database.php');

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">

    <title>Crud</title>
</head>
<body>
    <h2>Liste</h2>
    <a href="add.php">Ajouter<br></a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Pseudo</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
                $stmt = $db = $db->prepare("SELECT id, nom, prenom, pseudo, email FROM joueur");
                $stmt->execute();
                $result = $stmt->fetchAll();
                    foreach ($result as $row) {


                        ?>

                        <tr>
                            <td><?php $row['id']; ?></td>
                            <td><?php $row['nom']; ?></td>
                            <td><?php $row['prenom']; ?></td>
                            <td><?php $row['pseudo']; ?></td>
                            <td><?php $row['email']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php $row['id']?>">Edit</a> |
                                <a href="delete.php">Delete</a>


                            </td>
                        </tr>

                        <?php
                    }
            ?>

        </table>
</body>
</html>