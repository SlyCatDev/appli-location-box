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

    <h2>Liste des box de stockage</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Réservation</th>
                    <th>Nom du Locataire</th>
                    <th>Numéro du Box</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($boxes as $box)
                <tr>
                    <td>{{ $box->id }}</td>
                    <td>{{ $box->nom_locataire }}</td>
                    <td>{{ $box->numero_box }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>