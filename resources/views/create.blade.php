<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Controle des box</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>

    <h2>Créer une box</h2>
    <form action="boxes.blade.php" method="post">
        <input name="nom" type="text"/>
        <label>Votre nom</label>

        <button type="submit">Créer la box</button>
        <?php header('boxes');?>
    </form>
        
    </body>
</html>