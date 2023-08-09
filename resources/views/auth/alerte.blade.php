<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com/2.2.17"></script>
</head>
<body>
    <nav class=" sticky top-0 right-0 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class="mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex items-center space-x-2">
                    <img src="img/logo.png" alt="Logo Blabberide" class="w-10 h-10 rounded-full">
                    <span class="text-2xl font-bold text-white">Blabberide</span>
                </a>
                <button class="md:hidden focus:outline-none">
                    <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <div class="hidden md:flex space-x-4 text-white">
                    <a href="/" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        Accueil
                    </a>
                    @auth
                    <a href="/reservations" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        Réservation
                    </a>
                    <a href="/messages" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        Messages
                    </a>
                    @endauth
                    @guest
                    <a href="/inscription" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        Inscription
                    </a>
                    <a href="/login" class="hover:text-pink-200 transition duration-300 ease-in-out">
                        Connexion
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
                                <a href="/profile" class="hover:text-pink-200 block transition duration-300 ease-in-out">
                                    Mon profil
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="py-2">
                                    @csrf
                                    <button type="submit" class="hover:text-red-700 border-b-2 text-black">Déconnexion</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    @if(session('success'))
    <div class="bg-green-300 p-4 mb-4 h-32 font-bold text-3xl text-white flex justify-center items-center">
        {{ session('success') }}
    </div>
@endif
<div class="expand">
    <div class="py-8 flex items-center justify-center">
        <div class="w-full md:w-2/3 h-96 bg-white shadow-md">
            <div class="flex flex-col bg-purple-600 p-3 space-y-2 md:flex-row md:items-center md:justify-between">
                <h2 class="p-3">
                    <a href="/dashboard" class="text-lg flex items-center text-white hover:text-indigo-600 hover:underline">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Retour au tableau de bord
                    </a>
                </h2>
                <h1 class="text-xl font-bold text-white py-3 m-5">Mes alertes</h1>
            </div>
            <div class="px-4 bg-gray-100 h-full" style="color: #777f8a;">
                <div class="shadow-lg p-3 py-8 h-64 font-light" style="background: #f6f8fa;">
                    <!-- Formulaire -->
                    <form action="{{ route('alerte.store') }}" method="POST">
                        @csrf
                        <!-- Champs du formulaire -->
                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter" name="newsletter" class="form-checkbox h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded" value="1" {{ old('newsletter') ? 'checked' : '' }}>
                            <label for="newsletter" class="ml-2 text-gray-700">Recevoir notre actualité</label>
                        </div>
                        <p class="ml-7 md:ml-2">Nouvelles fonctionnalités, annonces de notre sympathique équipe...</p>
                        <div class="flex items-center py-8">
                            <input type="checkbox" id="declare_Covoiturages" name="declare_covoiturages" class="form-checkbox h-5 w-5 text-primary focus:ring-primary border-gray-300 rounded" value="1" {{ old('declare_covoiturages') ? 'checked' : '' }}>
                            <label for="declare_Covoiturages" class="ml-2 text-gray-700">Déclarer mes covoiturages</label>
                        </div>
                        <p class="-mt-8">Aidez notre équipe à mesurer l'impact positif du site : déclarez anonymement les covoiturages réalisés.</p>
                        <p class="mt-8">Vos alertes covoiturage</p>
                        <p>Pour régler vos alertes covoiturage, rendez-vous sur la page «<a href="/trajets" class="text-blue-500 hover:text-black">gestion de vos annonces</a>»</p>
                        <div class="py-3">
                            <button type="submit" class="bg-purple-500 hover:bg-green-400 text-white font-semibold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out mt-8">Enregistrer</button>
                        </div>
                    </form>

                    <!-- Fin du formulaire -->
                </div>
            </div>
        </div>
    </div>

</div>
   <section class="py-10 mt-28 bg-gray-200 shadow-md">
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ml-auto">À propos</h2>
                <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des
                    conducteurs et des passagers partageant le même itinéraire.
                      </p>
            </div>
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Mentions légales</h2>
                <div class="py-3">
                    <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="politique"
                            class=" hover:text-blue-700">Politique de Confidentialité</a> </p>
                    <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="/conditions"
                            class=" hover:text-blue-700">Conditions générales</a> </p>
                </div>
            </div>
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Contactez-nous</h2>
                <div class="py-3">
                    <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i> Burkina Faso-Ouagadougou
                    </p>
                    <p class="my-2"><i class="fas fa-phone"></i> (+226) 63 17 48 48 / 64 20 37 86</p>
                    <p class="my-2"><i class="fas fa-envelope"></i> <a href="#"
                            class="text-black  hover:underline">traorelaw687@gmail.com</a> </p>
                </div>
            </div>
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Guide d'utilisation</h2>
                <div class="py-3">
                    <p class="my-2"> <i class="fas fa-angle-double-right"></i><a href="#"
                            class=" hover:text-blue-700"> Comment ça marche</a> </p>
                    <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="#"
                            class=" hover:text-blue-700"> Le covoiturage en 4 points</a> </p>
                </div>
                <img src="img/paiement.png" alt="" class="w-36">
            </div>
        </div>
        <div class="text-center">
            <p>Copyright © 2023
                <a href="https://www.votreplateforme.com"><span class="text-red-500">Plateforme</span></a>. Tous
                droits réservés.</p>
        </div>
    </div>
</section>

<script>
    // Récupérer les éléments du dropdown
    const dropdownTrigger = document.getElementById('profileDropdown');
    const dropdownContent = document.getElementById('profileDropdownContent');

    // Ajouter un écouteur d'événement pour le clic sur le lien de déclenchement
    dropdownTrigger.addEventListener('click', () => {
      dropdownContent.classList.toggle('hidden');
    });

    // Fermer le dropdown lorsque l'utilisateur clique en dehors de celui-ci
    window.addEventListener('click', (event) => {
      if (!dropdownTrigger.contains(event.target)) {
        dropdownContent.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
