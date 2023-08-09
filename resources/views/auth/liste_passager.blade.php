<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @foreach ($trajetsConducteurs as $tc)
    <div class="rounded-lg bg-white shadow-md p-6 mb-6">
        <div class="flex items-center mb-4">
            <h3 class="text-xl font-semibold mr-2">Informations du Trajet</h3>
            <div class="w-4 h-4 rounded-full bg-blue-500 flex items-center justify-center">
                <i class="text-white fas fa-map-marker-alt"></i>
            </div>
        </div>
        <p class="mb-2"><span class="font-semibold">Ville d'arrivée :</span> {{ $tc['trajet']->ville_d_arrivee }}</p>
        <p class="mb-2"><span class="font-semibold">Ville de départ :</span> {{ $tc['trajet']->ville_de_depart }}</p>
        <p class="mb-2"><span class="font-semibold">Places disponibles :</span> {{ $tc['trajet']->place_disponibles }}</p>
        <p class="mb-4"><span class="font-semibold">Prix par place :</span> {{ $tc['trajet']->prix_par_place }}</p>

        <div class="flex items-center">
            <h3 class="text-xl font-semibold mr-2">Informations du Conducteur</h3>
            <div class="w-4 h-4 rounded-full bg-green-500 flex items-center justify-center">
                <i class="text-white fas fa-user"></i>
            </div>
        </div>
        <p class="mb-2"><span class="font-semibold">Nom du Conducteur :</span> {{ $tc['conducteur']->name }}</p>
        <p><span class="font-semibold">Email du Conducteur :</span> {{ $tc['conducteur']->email }}</p>
    </div>
    <hr class="border-t-2 border-gray-200 mb-6">
@endforeach

</body>
</html>
