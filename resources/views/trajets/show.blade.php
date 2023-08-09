<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Détails du trajet</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Détails du trajet</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <p><strong>Ville de départ :</strong> {{ $trajet->ville_de_depart }}</p>
            <p><strong>Ville d'arrivée :</strong> {{ $trajet->ville_d_arrivee }}</p>
            <p><strong>Places disponibles :</strong> {{ $trajet->place_disponibles }}</p>
            <p><strong>Date de départ :</strong> {{ $trajet->date_depart }}</p>
            <p><strong>Heure de départ :</strong> {{ $trajet->heure_depart }}</p>

    <div class="mt-6">
                <a href="{{ route('trajets.edit', $trajet->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md mr-2 transition-colors duration-300 ease-in-out transform hover:scale-105">Modifier</a>
                <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-300 ease-in-out transform hover:scale-105">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
