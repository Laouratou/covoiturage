<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer une voiture</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <nav class="flex items-center justify-between bg-white shadow shadoow-lg py-4 px-6">
        <div class="flex items-center">
            <a href="#" class="text-blue-500 text-2xl font-bold">Mon application</a>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-blue-500  mr-4">
                <i class="fas fa-search"></i> Rechercher un trajet
            </a>
            <a href="#" class="text-yellow-700  mr-4">
                <i class=""></i> Proposer un trajet
            </a>
        </div>
    </nav>
    <section class="bg-blue-800">
        <div class="container mx-auto py-10">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-2">Stimulez vos gains</h1>
                <p class="text-white">Renseignez les informations concernant votre voiture et postez des photos d’elle sous son meilleur jour !</p>
            </div>
        </div>
    </section>
    <div class="container mx-auto my-8">
        <div class="bg-white rounded-lg shadow-lg p-8 mx-auto w-full md:w-2/3 lg:w-1/2">
            <h1 class="text-2xl font-bold mb-4">Ajouter une voiture</h1>
            <form action="{{ route('voitures.store') }}" method="POST" enctype="multipart/form-data">

                @csrf


                <div class="mb-6">
                    <label for="marque" class="block text-gray-700">Marque :</label>
                    <input type="text" name="marque" id="marque" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="modele" class="block text-gray-700">Modèle :</label>
                    <input type="text" name="modele" id="modele" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="couleur" class="block text-gray-700">Couleur :</label>
                    <input type="text" name="couleur" id="couleur" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="type" class="block text-gray-700">Type :</label>
                    <input type="text" name="type" id="type" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="nombre_places" class="block text-gray-700">Nombre de places :</label>
                    <input type="number" name="nombre_places" id="nombre_places" class="form-input mt-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="climatisee" class="flex items-center">
                        <input type="checkbox" name="climatisee" id="climatisee" class="form-checkbox" value="1">
                        <span class="ml-2 text-gray-700">Climatisée</span>
                    </label>
                </div>
                <div class="mb-6">
                    <label for="assuree" class="flex items-center">
                        <input type="checkbox" name="assuree" id="assuree" class="form-checkbox" value="1">
                        <span class="ml-2 text-gray-700">Assurée</span>
                    </label>
                </div>
                <div class="mb-4">
                    <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo</label>
                    <input type="file" id="photo" name="photo" accept="image/*" required class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    @error('photo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="mt-6">
                    <button type="submit" class="py-2 px-4 bg-yellow-700 hover:bg-blue-700 text-white rounded-md focus:outline-none">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
