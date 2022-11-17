<?php 
include('./connect.php');
$stmt = $dbh->query('SELECT * FROM livres INNER JOIN auteurs ON livres.livre_auteur = auteurs.auteur_id');
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/common.css">
        <link rel="stylesheet" href="./css/list.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php 
            include('./includes/header.php');
        ?>
        <main>
            <div id="table">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Synopsis</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Date de parution</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($rows as $row) {
                                ?>
                                    <tr>
                                        <th><?= $row['livre_id'] ?></th>
                                        <td><?= $row['livre_nom'] ?></td>
                                        <td><?= $row['livre_synopsis'] ?></td>
                                        <td><?= $row['auteur_nom'] ?></td>
                                        <td><?= $row['livre_date_parution'] ?></td>
                                        <td><a href="./update.php?id=<?=$row['livre_id']?>">Editer</a></td>
                                        <td><a href="./delete.php?id=<?=$row['livre_id']?>">Supprimer</a></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <a href="./create.php">Créer un livre</a>
                <a href="./createBookwriter.php">Créer un auteur</a>
            </div>
        </main>
    </body>
</html>