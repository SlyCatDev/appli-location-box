<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Controle des box</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body>

    <h2>Liste des réservations de box de stockage</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Réservation</th>
                    <th>Nom du Locataire</th>
                    <th>Numéro du Box</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->nom_locataire }}</td>
                    <td>{{ $reservation->numero_box }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>