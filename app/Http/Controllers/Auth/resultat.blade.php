<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <title>Résultats de recherche des trajets</title>
</head>
<body>
    <h1>Résultats de recherche des trajets</h1>

    <div>
        <p>Vous avez recherché des trajets de {{ $villeDepart }} à {{ $villeArrivee }} le {{ $dateDepart }}.</p>
    </div>

    <div>
        <h2>Trajets disponibles :</h2>

        @if ($trajets->isEmpty())
            <p>Aucun trajet trouvé pour les critères de recherche spécifiés.</p>
        @else
            <ul>
                @foreach ($trajets as $trajet)
                    <li>
                        <p>De : {{ $trajet->ville_de_depart }}</p>
                        <p>À : {{ $trajet->ville_d_arrivee }}</p>
                        <p>Date de départ : {{ $trajet->date_depart }}</p>
                        <p>Heure de départ : {{ $trajet->heure_depart }}</p>
                        <p>Heure d'arrivée : {{ $trajet->heure_d_arrivee }}</p>
                        <p>Places disponibles : {{ $trajet->place_disponibles }}</p>
                        <p>Prix par place : {{ $trajet->prix_par_place }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>
