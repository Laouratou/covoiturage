<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotrePlateformeCovoiturage - Envoyer un message</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">
</head>
<body class="bg-gray-100">
    <nav class="w-full sticky top-0 left-0 right-0 bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class=" px-4">
            <div class="flex items-center justify-between py-4">
                <a href="/" class="flex items-center space-x-2">
                    <img src="img/logo.png" alt="Logo Blabberide" class="w-10 h-10 rounded-full">
                    <span class="text-2xl font-bold text-white">Blabberide</span>
                </a>
                <button class="md:hidden focus:outline-none">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="hidden md:flex space-x-4 text-white">
                    <a href="/" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        <span class="text-lg">Accueil</span>
                    </a>
                    @auth
                    <a id="reservation-link" href="#" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        <span class="text-lg">Réservation</span>
                    </a>
                    @endauth
                    @auth
                    <a href="/messages" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        <span class="text-lg">Messages</span>
                    </a>
                    @endauth
                    @guest
                    <a href="/inscription" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        <span class="text-lg">Inscription</span>
                    </a>
                    <a href="/login" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        <span class="text-lg">Connexion</span>
                    </a>
                    @endguest
                    @auth
                    <div class="relative">
                        <button id="profileDropdown"
                            class="flex items-center hover:text-pink-200 focus:outline-none transition duration-300 ease-in-out"
                            type="button">
                            <span class="mr-2">
                                @if(Auth::user()->photo)
                                <img src="{{ '/storage/' . Auth::user()->photo }}" alt="Profil Picture"
                                    class="w-10 h-10 rounded-full">
                                @else
                                <img src="/path/to/default-profile-image.png" alt="Profil Picture"
                                    class="w-10 h-10 rounded-full">
                                @endif
                            </span>
                            <svg class="w-4 h-4 text-white fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 14l5-5H5l5 5z"></path>
                            </svg>
                        </button>

                        <div id="profileDropdownContent"
                            class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-lg hidden">

                            <h6 class="px-4 py-2 font-bold text-black border-b-2">
                                Bienvenue, <span class="text-animation">{{ Auth::user()->name }}</span>
                            </h6>
                            <div class="px-4 py-2">
                                <div class="">
                                    <a href="/profile"
                                        class="hover:text-pink-200 block transition duration-300 ease-in-out">
                                        <span class="text-lg text-black hover:text-red-700">Mon profil</span>
                                    </a>
                                </div>
                                <form method="POST" action="{{ route('logout') }}" class="py-2">
                                    @csrf
                                    <button type="submit" class=" hover:text-red-700 border-b-2 text-black">Déconnexion</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    <div class="max-w-xl mx-auto bg-white rounded shadow-lg mt-8 py-8">
        <div class="p-4 border-b">
            <h1 class="text-xl font-bold">Envoyer un message</h1>
        </div>
        <div class="p-4">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="receiver_id" class="block font-bold">Destinataire :</label>
                    <select name="receiver_id" id="receiver_id" class="w-full p-2 border border-gray-300 rounded">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="content" class="block font-bold">Contenu :</label>
                    <textarea name="content" id="content" rows="4" class="w-full p-2 border border-gray-300 rounded"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    <section class="py-10 mt-28 bg-gray-300">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ml-auto">À propos</h2>
                    <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire. <span
                            class="text-red-500 hover:text-blue-500">Lire plus</span></p>
                </div>
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300">Mentions légales</h2>
                    <div class="py-3">
                        <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="#"
                                class="hover:text-blue-700">Politique de Confidentialité</a></p>
                        <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="#"
                                class=" hover:text-blue-700">Conditions générales</a></p>
                    </div>
                </div>
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300">Contactez-nous</h2>
                    <div class="py-3">
                        <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i> Burkina
                            Faso-Ouagadougou</p>
                        <p class="my-2"><i class="fas fa-phone"></i> (+226) 63 17 48 48 / 64 20 37 86</p>
                        <p class="my-2"><i class="fas fa-envelope"></i> <a href="#"
                                class="text-black hover:underline">traorelaw687@gmail.com</a></p>
                    </div>
                </div>
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300">Guide d'utilisation</h2>
                    <div class="py-3">
                        <p class="my-2"><i class="fas fa-angle-double-right"></i><a href="#"
                                class=" hover:text-blue-700"> Comment ça marche</a></p>
                        <p class="my-2"><i class="fas fa-angle-double-right"></i><a href="#"
                                class=" hover:text-blue-700"> Le covoiturage en 4 points</a></p>
                    </div>
                    <img src="img/paiement.png" alt="" class="w-36 mx-auto mt-6">
                </div>
            </div>
            <div class="text-center mt-10">
                <p class="">© 2023 <a href=""class="text-red-500">Plateforme</a>.Tous droits réservés.</p>
            </div>
        </div>
    </section>
</body>
</html>




