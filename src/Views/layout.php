<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— ToDoList —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <header>
        <nav>
            <a href="/" class="logo"></a>
            <div class="hoverLink">
                <a href="/" class="icon"><i class="fas fa-home"></i></a>
                <p class="hidden">Accueil</p>
            </div>
            <div class="hoverLink">
                <a href="/stagiaire/ShowAll" class="icon"><i class="fas fa-list-ul"></i></a>
                <p class="hidden">Tableau Stagiaire</p>
            </div>
            <div class="hoverLink">
                <a href="/stagiaire" class="icon"><i class="fas fa-user-plus"></i></a>
                <p class="hidden">Ajouter un stagiaire</p>
            </div>
            <div class="hoverLink">
                <a href="/stagiaire/formDelete" class="icon"><i class="fas fa-user-minus"></i></a>
                <p class="hidden">Supprimer Stagiaire</p>
            </div>
            <div class="hoverLink">
                <a href="/stagiaire/formStagiaire" class="icon"><i class="fas fa-user-edit"></i></a>
                <p class="hidden">modifier un Stagiaire</p>
            </div>
        </nav>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
</body>
    <?php
    if (isset($javascript)){
        echo $javascript;
    }

    ?>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);

