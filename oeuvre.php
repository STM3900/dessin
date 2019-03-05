<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Comfortaa|Quicksand" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
</head>
<?php include('Ressources/tableau.php') ?>
<?php 
$numero_oeuvre = 1;
if (isset($_GET['oeuvre'])) {
    //Si la question existe on la règle à sa valeur dans l'url (si question = 7 alors $question = 7)
    $numero_oeuvre = intval($_GET['oeuvre']);
}

if ($numero_oeuvre > count($tableau)) {
    //Si la variable est supérieure au nombre de questions on redirige l'utilisateur vers la page du résultat
    header('Location: oeuvre.php?oeuvre=' . count($tableau));
    die(); //La fonction die() permet de stopper le script
}

// On vérifie qu'on est pas en dehors du tableau 
//(par exemple si l'utilisateur rentre dans l'url question=0 cela le redirigera vers la première question)
if ($numero_oeuvre < 1) {
    header('Location: oeuvre.php?oeuvre=1');
    die();
}
?>
<body>
    <header>
        <p><i><?= $tableau[$numero_oeuvre-1]["titre"] ?></i></p>
    </header>
    <section id="oeuvre">
        <article id="elément">
            <a href="oeuvre.php?oeuvre=<?= $numero_oeuvre + 1 ?>"><img id="fleche" src="images/gauche.png" alt=""> </a> 
        </article>
        <article id="element" id="image">
            <?= $tableau[$numero_oeuvre-1]["image"] ?>
            <p><?= $tableau[$numero_oeuvre-1]["description"] ?></p>
        </article>
        <article id="elément">
            <a href="oeuvre.php?oeuvre=<?= $numero_oeuvre - 1 ?>"><img id="fleche" src="images/droite.png" alt=""></a>
        </article>
    </section> 
    <footer>
        <p>Fait avec ❤ par <a href="https://cc-c-t-o.000webhostapp.com/">Théo</a> !</p>
    </footer>
</body>
    <head>
        <title>Les Conneries de Lasr | <?= $tableau[$numero_oeuvre-1]["titre"] ?></title>
    </head>
</html>