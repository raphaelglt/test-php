<?php 
include('./connect.php');
$stmt = $dbh->query('SELECT * FROM auteurs');
$auteurs = $stmt->fetchAll();

if (isset($_POST['submit'])) {
    if (!empty($_POST['nom']) && !empty($_POST['synopsis']) && !empty($_POST['auteur']) && !empty($_POST['date_parution'])) {
        if (strlen()$_POST['nom'] > 3) {
            if (strlen()$_POST['synopsis'] > 15) {
                $stmt = $dbh->prepare('INSERT INTO livres (livre_nom, livre_synopsis, livre_auteur, livre_date_parution) VALUES(:livre_nom, :livre_synopsis, :livre_auteur, :livre_date_parution)');
                $stmt->bindParam(":livre_nom", trim($_POST['nom']));
                $stmt->bindParam(":livre_synopsis", trim($_POST['synopsis']));
                $stmt->bindParam(":livre_auteur", trim($_POST['auteur']));
                $stmt->bindParam(":livre_date_parution", trim($_POST['date_parution']));
                $stmt->execute();
                header('Location: ./list.php');
            }    
        }    
    }    
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
                        <label for="exampleFormControlInput1">Nom du livre</label>
                        <input minlength="3" maxlength="255" type="text" class="form-control" id="exampleFormControlInput1" name="nom">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Synopsis du film</label>
                        <textarea minlength="15" class="form-control" id="exampleFormControlTextarea1" rows="3" name="synopsis"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nom de l'auteur</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="auteur">
                            <?php
                                foreach ($auteurs as $auteur) {
                                    ?><option value=<?= $auteur['auteur_id'];?>><?= $auteur['auteur_nom'] ?></option><?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlDate1">Date de parution</label>
                        <input type="date" class="form-control" id="exampleFormControlDate1" name="date_parution" />
                    </div>
                    <a href="./list.php" id="link">Retourner à la liste</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Créer le livre" />
                </form>
            </div>
        </main>
    </body>
</html>