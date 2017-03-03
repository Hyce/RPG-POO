<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
<div class="container">
    <div class="row">
        <h3>Profils</h3>
    </div>
    <div class="row">
        <p>
            <a href="add.php" class="btn btn-success">Create</a>
        </p>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Profils</div>
            <div class="panel-body">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </div>

            <!-- Table -->
            <table class="table">
                <tbody>
                <?php
                include 'Database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM joueur ORDER BY id DESC';
                foreach ($pdo->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>'. $row['nom'] . '</td>';
                    echo '<td>'. $row['prenom'] . '</td>';
                    echo '<td>'. $row['email'] . '</td>';
                    echo '<td><a class="btn" href="read.php?id='.$row['id'].'">Afficher</a></td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- /container -->
</body>
</html>