<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Comfortaa|Quicksand" rel="stylesheet">
    <title>Les Conneries de Lasr | Créations</title>
    <link rel="icon" href="images/favicon.png">
</head>
    <?php include('Ressources/tableau.php') ?>
<body>
    <header>
        <p><i>Mes créations</i></p>
    </header>
        <section class="imagegroupe">
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
        <?php 
            $i = 0;
            for($i = count($tableau); $i>0; $i=$i-1){
                echo'<article class="imageelement">
                <a href="oeuvre.php?oeuvre='; 
                echo count($tableau)-$i+1;
                echo'">';  
                echo $tableau[count($tableau)-$i]["image"]; 
                echo '</a>
                </article>'; 
            }
        ?>
        </section>
    <footer>
        <p>Fait avec ❤ par <a href="https://www.theomigeat.com/">Théo</a> !</p>
    </footer>
</body>
</html>