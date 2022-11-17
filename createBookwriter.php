<?php 
include('./connect.php');
$stmt = $dbh->query('SELECT * FROM auteurs');
$auteurs = $stmt->fetchAll();

if (isset($_POST['submit'])) {
    $stmt = $dbh->prepare('INSERT INTO auteurs (auteur_nom) VALUES(:auteur_nom)');
    $stmt->bindParam(":auteur_nom", $_POST['auteur_nom']);
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
        <link rel="stylesheet" href="./css/create.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <?php 
            include('./includes/header.php');
        ?>
        <main>
            <div id="table">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nom de l'auteur</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="auteur_nom">
                    </div>
                    <a href="./list.php" id="link">Retourner à la liste</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Créer le livre" />
                </form>
            </div>
        </main>
    </body>
</html>