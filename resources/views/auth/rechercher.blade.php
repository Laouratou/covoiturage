<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .book-shadow {
            background: rgba(0, 0, 0, 0.1);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        <form action="{{ route('trajets.search') }}" method="GET" class="p-6 space-y-4 bg-white rounded-lg book-shadow">
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/2 px-2">
                    <label for="ville_depart" class="block mb-1">Lieu de départ</label>
                    <input type="text" name="ville_depart" id="ville_depart" placeholder="Lieu de départ" class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>
                <div class="w-full md:w-1/2 px-2">
                    <label for="ville_d_arrivee" class="block mb-1">Lieu d'arrivée</label>
                    <input type="text" name="ville_d_arrivee" id="ville_d_arrivee" placeholder="Lieu d'arrivée" class="w-full border border-gray-300 rounded-md px-4 py-2">
                </div>
            </div>
            <div class="w-full md:w-1/2 px-2">
                <label for="date" class="block mb-1">Date de départ</label>
                <input type="date" name="date" id="date" placeholder="Date de départ" class="w-full border border-gray-300 rounded-md px-4 py-2">
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2">Rechercher</button>
        </form>
    </div>
</body>
</html>
