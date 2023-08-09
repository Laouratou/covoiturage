<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier un trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <h1 class="text-2xl font-bold text-center my-6">Modifier un trajet</h1>
    <form action="{{ route('trajets.update', $trajet->id) }}" method="POST" class="bg-white bg-opacity-70 p-6 mx-auto rounded-md shadow-md max-w-md" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="ville_de_depart" class="block mb-2 text-gray-800 font-bold">Ville de départ</label>
        <input type="text" name="ville_de_depart" value="{{ $trajet->ville_de_depart }}" class="w-full px-4 py-2 mb-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-500" required>
        <label for="ville_d_arrivee" class="block mb-2 text-gray-800 font-bold">Ville d'arrivée</label>
        <input type="text" name="ville_d_arrivee" value="{{ $trajet->ville_d_arrivee }}" class="w-full px-4 py-2 mb-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-500" required>
        <label for="ville_d_arrivee" class="block mb-2 text-gray-800 font-bold">Heure d'arrivee</label>
        <input type="text" name="heure_d_arrivee" value="{{ $trajet->heure_d_arrivee }}" class="w-full px-4 py-2 mb-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-500" required>
        <label for="place_disponibles" class="block mb-2 text-gray-800 font-bold">Places disponibles</label>
        <input type="number" name="place_disponibles" value="{{ $trajet->place_disponibles }}" class="w-full px-4 py-2 mb-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-500" required>
        <label for="date_depart" class="block mb-2 text-gray-800 font-bold">Date de départ</label>
        <input type="date" name="date_depart" value="{{ $trajet->date_depart }}" class="w-full px-4 py-2 mb-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-500" required>
        <label for="heure_depart" class="block mb-2 text-gray-800 font-bold">Heure de départ</label>
        <input type="time" name="heure_depart" value="{{ $trajet->heure_depart }}" class="w-full px-4 py-2 mb-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:border-blue-500" required>
        <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">Modifier</button>
    </form>
</body>
</html>
