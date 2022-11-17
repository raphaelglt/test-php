<?php 
include('./connect.php');
if (isset($_GET['id'])) {
    $stmt = $dbh->prepare('SELECT livre_id FROM livres WHERE livre_id = ?');
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    if ($stmt->rowCount()==1) {
        $validGet=true;
    }
}   

$stmt = $dbh->prepare('SELECT * FROM livres INNER JOIN auteurs ON livres.livre_auteur = auteurs.auteur_id WHERE livre_id = ?');
$stmt->bindParam(1, $_GET['id']);
$stmt->execute();
$livre = $stmt->fetch();

if (isset($_POST['submit']) && isset($validGet)) {
    $stmt = $dbh->prepare('DELETE FROM livres WHERE livre_id = ?');
    $stmt->bindParam(1, $_GET['id']);
    $stmt->execute();
    header('Location: ./list.php');
}
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
        <link rel="stylesheet" href="./css/delete.css">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><?php if (isset($validGet)) echo $livre['livre_id']; ?></th>
                            <td><?php if (isset($validGet)) echo $livre['livre_nom']; ?></td>
                            <td><?php if (isset($validGet)) echo $livre['livre_synopsis']; ?></td>
                            <td><?php if (isset($validGet)) echo $livre['auteur_nom']; ?></td>
                            <td><?php if (isset($validGet)) echo $livre['livre_date_parution']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <form method="post" action="">
                    <a href="./list.php" id="link" >Retourner à la liste</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Supprimer le livre" />
                </form>
            </div>
        </main>
    </body>
</html>