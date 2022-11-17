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

$stmt = $dbh->query('SELECT * FROM auteurs');
$auteurs = $stmt->fetchAll();

if (isset($_POST['submit']) && isset($validGet)) {
    $stmt = $dbh->prepare('UPDATE livres SET livre_nom = :livre_nom, livre_synopsis = :livre_synopsis, livre_auteur = :livre_auteur, livre_date_parution = :livre_date_parution WHERE livre_id = :livre_id');
    $stmt->bindParam(":livre_nom", $_POST['nom']);
    $stmt->bindParam(":livre_synopsis", $_POST['synopsis']);
    $stmt->bindParam(":livre_auteur", $_POST['auteur']);
    $stmt->bindParam(":livre_date_parution", $_POST['date_parution']);
    $stmt->bindParam(":livre_id", $_GET['id']);
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
        <link rel="stylesheet" href="./css/update.css">
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
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" value="<?php if (isset($validGet)) echo $livre['livre_nom']; ?>" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Synopsis du livre</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="synopsis" required> <?php if (isset($validGet)) echo $livre['livre_synopsis']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nom de l'auteur</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="auteur">
                            <?php
                                foreach ($auteurs as $auteur) {
                                    if ($auteur['auteur_id'] == $livre['livre_auteur']) {
                                        ?><option value=<?= $auteur['auteur_id'];?> selected><?= $auteur['auteur_nom'] ?></option><?php
                                    } else {
                                        ?><option value=<?= $auteur['auteur_id'];?>><?= $auteur['auteur_nom'] ?></option><?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlDate1">Date de parution</label>
                        <input type="date" class="form-control" id="exampleFormControlDate1" name="date_parution" value="<?= $livre['livre_date_parution'] ?>" required  />
                    </div>
                    <a href="./list.php" id="link" >Retourner à la liste</a>
                    <input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour le livre" />
                </form>
            </div>
        </main>
    </body>
</html>